<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Patient_Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::latest()->get();
        return view ('patient.patientpayment',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $payment = new Patient_Payment;
        $payment->patient_id = $request->patient_id;
        $payment->loan_amount = $request->loan_amount;
        $payment->total_fee = $request->total_fee;
        $payment->pay_amount = $request->pay_amount;
        $payment->new_loan_amount = $request->new_loan_amount;
        $payment->date = $request->date;
        $payment->remark = $request->remark;
        $payment->save();
        $patient_id = $request->input('patient_id');
        if ($request->loan_amount == 0){
            \DB::table('patients')->where('id',$patient_id)->increment('total_fee',$request->total_fee);
            \DB::table('patients')->where('id',$patient_id)->increment('received_amount',$request->pay_amount);
            \DB::table('patients')->where('id',$patient_id)->increment('loan_amount',$request->new_loan_amount);
        }

         elseif($request->loan_amount > 0){

             \DB::table('patients')->where('id',$patient_id)->increment('received_amount',$request->pay_amount);
             \DB::table('patients')->where('id',$patient_id)->decrement('loan_amount',$request->pay_amount);
         }
        else{
            return "Nothing worked";
        }

        return redirect()->back()->with('message','Patient Payment Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $patient_id = DB::table('patient__payments')->where('id',$id)->value('patient_id');

        $total_fee = Patient_Payment::where(function($query) use($patient_id,$id){
            $query->where('id',$id);
            $query->where('patient_id',$patient_id);
        })-> value('total_fee');
        $loan_amount = Patient_Payment::where(function($query) use($patient_id,$id){
            $query->where('id',$id);
            $query->where('patient_id',$patient_id);
        })-> value('loan_amount');
        $pay_amount = Patient_Payment::where(function($query) use($patient_id,$id){
            $query->where('id',$id);
            $query->where('patient_id',$patient_id);
        })-> value('pay_amount');

        $new_loan = Patient_Payment::where(function($query) use($patient_id,$id){
            $query->where('id',$id);
            $query->where('patient_id',$patient_id);
        })-> value('new_loan_amount');

        if ($loan_amount == 0){
            \DB::table('patients')->where('id',$patient_id)->decrement('total_fee',$total_fee);
            \DB::table('patients')->where('id',$patient_id)->decrement('received_amount',$pay_amount);
            \DB::table('patients')->where('id',$patient_id)->decrement('loan_amount',$new_loan);
        }

        elseif($loan_amount > 0){

            \DB::table('patients')->where('id',$patient_id)->decrement('received_amount',$pay_amount);
            \DB::table('patients')->where('id',$patient_id)->increment('loan_amount',$pay_amount);
        }
        else{
            return "Nothing worked";
        }

        $del =Patient_Payment::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Payment Successfully Deleted');
    }
}
