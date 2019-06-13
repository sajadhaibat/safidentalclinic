<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
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
       $appointments = Appointment::latest()->get();
        return view ('appointment.appointmentlist',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::latest()->get();
        return view ('appointment.addappointment', compact('patients'));
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
        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->last_appointment = $request->last_appointment;
        $appointment->new_appointment = $request->date;
        $appointment->time = $request->time;
        $appointment->remark = $request->remark;
        $appointment->save();
        //$patient_id = $request->input('patient_id');
        $up = Patient::findorfail($request->input('patient_id'));
        $up->last_appointment=$request->date;
        $up->save();
        return redirect()->back()->with('message','Appointment Added Successfully');
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
        $patient_id = \DB::table('appointments')->where('id',$id)->value('patient_id');
        $appointments= DB::table('appointments')->where('patient_id',$patient_id)->value('last_appointment');
        $up = Patient::findorfail($patient_id);
        if ($appointments == "No Appointment Yet"){
            $appointments= null;
            $up->last_appointment=$appointments;
        }
        else{
            $up->last_appointment=$appointments;
        }
        $up->save();
        $del = Appointment::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Appointment Successfully Deleted');
    }
}
