<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        $patients = Patient::latest()->get();
        return view ('patient.patientlist',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('patient.addpatient');
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
        $patient = new Patient();
        $patient->patient_name = $request->patient_name;
        $patient->patient_fname = $request->patient_fname;
        $patient->phone_number = $request->phone_number;
        $patient->address = $request->address;
        $patient->type_of_service = $request->type_of_service;
        $patient->OPD = $request->OPD;
        $patient->gender = $request->gender;
        $patient->remark = $request->remark;
        $patient->date = $request->date;
        $patient->save();
        return redirect()->back()->with('message','Patient Added Successfully');
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
        $edit = Patient::findorfail($id);
        return view('patient.editpatient',compact('edit'));
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
        $patient = Patient::findorfail($id);
        $patient->patient_name = $request->patient_name;
        $patient->patient_fname = $request->patient_fname;
        $patient->phone_number = $request->phone_number;
        $patient->address = $request->address;
        $patient->type_of_service = $request->type_of_service;
        $patient->OPD = $request->OPD;
        $patient->gender = $request->gender;
        $patient->remark = $request->remark;
        $patient->date = $request->date;
        $patient->save();
        return redirect()->route('patient.index')->with('message','Patient Edited  Successfully');
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
    }
}
