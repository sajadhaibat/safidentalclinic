<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\DialyExpense;
use App\LaboratoryPayment;
use App\LabratoryRecord;
use App\Material;
use App\Patient;
use App\Patient_Payment;
use App\Profile;
use App\Salary;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staffs_count = Staff::all()->count();
        $t_appointments_count = Appointment::whereHas('patient', function ($query) {
            $query->where('new_appointment', date("Y-m-d"));
            $query->where('status', 0);
        })->count();
        $patients_count = Patient::all()->count();
        $orders_count = LabratoryRecord::all()->count();
        $today_patients_count = Patient::where('date', date("Y-m-d"))->count();
        $patients_loan_amount = DB::table('patients')->sum('loan_amount');
        $lab_loan_amount = DB::table('labratories')->sum('loan_amount');
        return view('index', compact('staffs_count','today_appointments','orders_count','patients_count' ,'today_patients_count', 't_appointments_count','patients_loan_amount','lab_loan_amount'));
    }


    public function getloanamount(Request $request)
    {

        $total_loan_amount = DB::table('patients')->where('id', $request->id)->value('loan_amount');

        return response()->json($total_loan_amount);

    }

    public function gettotalfee(Request $request)
    {

        $total_fee = DB::table('patients')->where('id', $request->id)->value('total_fee');

        return response()->json($total_fee);
    }


    public function getaddress(Request $request)
    {

        $address = DB::table('patients')->where('id', $request->id)->value('address');

        return response()->json($address);
    }

    public function getphone(Request $request)
    {

        $phone = DB::table('patients')->where('id', $request->id)->value('phone_number');

        return response()->json($phone);
    }

    public function lastappointment(Request $request)
    {

        $last_appointment = DB::table('patients')->where('id', $request->id)->value('last_appointment');

        return response()->json($last_appointment);
    }

    public function todayappointments()
    {
        $t_appointments = Appointment::whereHas('patient', function ($query) {
            $query->where('new_appointment', date("Y-m-d"));
        })->latest()->get();
        return view('appointment.todayappointment', compact('t_appointments'));
    }

    public function upcoming_appointments()
    {
        $upcoming_appointments = Appointment::whereHas('patient', function ($query) {
            $query->where('status', 1);
        })->latest()->get();
        return view('appointment.upcomingappointment', compact('upcoming_appointments'));
    }

    public function closed_appointments()
    {
        $closed_appointments = Appointment::whereHas('patient', function ($query) {
            $query->where('status', 0);
        })->latest()->get();
        return view('appointment.closedappointments', compact('closed_appointments'));
    }


    public function getadvance(Request $request)
    {

        $advance = DB::table('staff')->where('id', $request->id)->value('advance_money');

        return response()->json($advance);
    }

    public function change_appointment_status(Request $request)
    {

        $poll = Appointment::findOrFail($request->id);
        $statusval = $request->input('status');
        if ($statusval == 'on') {
            $statusval = 1;
        } else {
            $statusval = 0;
        }
        $poll->status = $statusval;
        $poll->save();
        return redirect()->back();
    }

    public function aboutus()
    {
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        return view('aboutus');
    }

    public function updatelab(Request $request)
    {

        $up = LabratoryRecord::findorfail($request->id);
        $up->inpot = $request->inpot_date;
        $up->save();
        \DB::table('labratory_records')->where('id',$request->id)->increment('paid_amount',$request->pay_amount);
        $lab_id = $request->input('lab_id');
        \DB::table('labratories')->where('id',$lab_id)->increment('paid_amount',$request->pay_amount);
        \DB::table('labratories')->where('id',$lab_id)->decrement('loan_amount',$request->pay_amount);

        return redirect()->back()->with('messge','Payment Successfully Added');

}

    public function patientrecords($id){
        $appointments = Appointment::where('patient_id',$id)->latest()->get();
        $payments = Patient_Payment::where('patient_id',$id)->latest()->get();
        $lab_records = LabratoryRecord::where('patient_id',$id)->latest()->get();
        $rec_id = LabratoryRecord::where('patient_id',$id)->value('id');
        if ($rec_id == null){
            $teeth = null;
        }
            else{
                $teeth = unserialize(LabratoryRecord::find($rec_id)->teeth);
            }
//dd($teeth);

        return view ('patient.singlepatientrecords',compact('teeth','appointments','payments','lab_records'));

    }
    public function getlabloan(Request $request)
    {

        $loan = DB::table('labratories')->where('id', $request->id)->value('loan_amount');

        return response()->json($loan);
    }

    public function lab_records($id){
        $payments = LaboratoryPayment::where('labratory_id',$id)->latest()->get();
        $lab_records = LabratoryRecord::where('labratory_id',$id)->latest()->get();
        return view ('labratory.singlelaboratorylist',compact('payments','lab_records'));

    }
    public function staffrecords($id){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $salaries = Salary::where('staff_id',$id)->latest()->get();
        return view ('humanresource.singlestaffrecords',compact('salaries'));

    }
    public function changepassword(){

        return view ('changepassword');

    }
    public function changeuserspassword(){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }

        $users = User::where('id','<>',Auth::user()->id)->latest()->get();
        return view ('changeuserspassword',compact('users'));

    }


    public function newpassword(){

        $user = User::find(Auth::user()->id);

        if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('confirmpassword')){

            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return redirect(url('/'))->with('message','Password Successfully Changed');

        }
        else {
            return redirect()->back()->with('message','Password Not Changed!!!');
        }

    }
    public function usernewpassword(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }

        $user = User::findorfail($request->user_id);

        if(Input::get('password') == Input::get('confirmpassword')){

            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return redirect(url('/'))->with('message','Password Successfully Changed');

        }
        else {
            return redirect()->back()->with('message','Password Not Changed!!!');
        }
    }

        public function changeusersprofile(){
            if (!Gate::allows('isAdmin')){
                abort(404,"Sorry, You cant do this action");
            }

            $users = User::where('id','<>',Auth::user()->id)->latest()->get();
            return view ('changeusersprofile',compact('users'));

        }

    public function usernewprofile(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }

        $file = $request->file('banner');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = public_path().'/images';
        $file->move($path,$filename);

        $profile = new Profile();
        $profile->user_id=$request->user_id;
        $profile->banner=$filename;
        $profile->save();
        return redirect(url('/'))->with('message','Profile Successfully Changed');
    }

    public function patienttotalreport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
            $patient_count = DB::table('patients')->whereBetween('date',array($request->start_date,$request->end_date))->count();
        $patients = DB::table('patients')->whereBetween('date',array($request->start_date,$request->end_date))->get();

        return view('report.patienttotalreport',compact('patient_count','patients'));
    }

    public function patientpaymentreport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $payment_count = DB::table('patient__payments')->whereBetween('date',array($request->start_date,$request->end_date))->sum('pay_amount');
        $patients_payments = Patient_Payment::whereHas('patient', function ($query) use ($request) {
            $query->whereBetween('date',array($request->start_date,$request->end_date));
        })->latest()->get();

        return view('report.patientpaymentreport',compact('patients_payments','payment_count'));
    }

    public function appointmentreport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $appointment_count = DB::table('appointments')->whereBetween('new_appointment',array($request->start_date,$request->end_date))->count();
        $appointments = Appointment::whereHas('patient', function ($query) use ($request) {
            $query->whereBetween('new_appointment',array($request->start_date,$request->end_date));
        })->latest()->get();

        return view('report.appointmentreport',compact('appointment_count','appointments'));
    }

    public function laboratoryordersreport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $lab_count = DB::table('labratory_records')->whereBetween('outpot',array($request->start_date,$request->end_date))->count();
        $lab_records = LabratoryRecord::whereHas('patient', function ($query) use ($request) {
            $query->whereBetween('outpot',array($request->start_date,$request->end_date));
        })->latest()->get();

        return view('report.laboratoryordersreport',compact('lab_count','lab_records'));
    }

    public function laboratorypaymentsreport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $total_payment_count = DB::table('laboratory_payments')->whereBetween('date',array($request->start_date,$request->end_date))->sum('pay_amount');
        $item_payment_count = DB::table('labratory_records')->whereBetween('inpot',array($request->start_date,$request->end_date))->sum('paid_amount');
        $total_payment = $total_payment_count + $item_payment_count;

        $total_payments = LaboratoryPayment::whereHas('labratory', function ($query) use ($request) {
            $query->whereBetween('date',array($request->start_date,$request->end_date));
        })->latest()->get();

        $item_payments = LabratoryRecord::whereHas('labratory', function ($query) use ($request) {
            $query->whereBetween('inpot',array($request->start_date,$request->end_date));
        })->latest()->get();

        return view('report.laboratorypaymentreport',compact('total_payment','total_payments','item_payments'));
    }
    public function dailyexpensereport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $expense_count = DB::table('dialy_expenses')->whereBetween('date',array($request->start_date,$request->end_date))->sum('amount');
        $expenses = DialyExpense::whereHas('staff', function ($query) use ($request) {
            $query->whereBetween('date',array($request->start_date,$request->end_date));
        })->latest()->get();


        return view('report.dailyexpensereport',compact('expenses','expense_count'));
    }

    public function materialexpensereport(Request $request){
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $expense_count = DB::table('materials')->whereBetween('date',array($request->start_date,$request->end_date))->sum('amount');
        $expenses = Material::whereHas('staff', function ($query) use ($request) {
            $query->whereBetween('date',array($request->start_date,$request->end_date));
        })->latest()->get();


        return view('report.materialexpensereport',compact('expenses','expense_count'));
    }


    }


