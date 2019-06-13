<?php

namespace App\Http\Controllers;

use App\Labratory;
use App\LabratoryRecord;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class LabratoryRecordController extends Controller
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
        $lab_records = LabratoryRecord::latest()->get();
        return view('labratory.laboratoryrecords',compact('lab_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $laboratories = Labratory::latest()->get();
        $patients = Patient::latest()->get();
            return view('labratory.laboratoryorder',compact('laboratories','patients'));
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
    // dd($request->input('company'));
      $lab=LabratoryRecord::create([
          'teeth' => serialize($request->input('teeth')),
          'patient_id' =>$request->input('patient_id'),
          'labratory_id' =>$request->input('laboratory_id'),
          'outpot' =>$request->input('outpot_date'),
          'teeth_number' =>$request->input('teeth_number'),
          'company' =>$request->input('company'),
          'color' =>$request->input('color'),
          'type' =>$request->input('type'),
          'price' =>$request->input('price'),

      ]);
        $lab->save();
//        $lab = new LabratoryRecord();
//        $lab->patient_id = $request->patient_id;
//        $lab->labratory_id = $request->laboratory_id;
//        $lab->outpot = $request->outpot_date;
//        $lab->teeth_number = $request->teeth_number;
//        $lab->color = $request->color;
//        $lab->type = $request->type;
//        $lab->price = $request->price;

        $lab_id = $request->input('laboratory_id');
        \DB::table('labratories')->where('id',$lab_id)->increment('total_amount',$request->price);
        \DB::table('labratories')->where('id',$lab_id)->increment('loan_amount',$request->price);
        return redirect()->back()->with('message','Order Successfully Added');

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
        $lab_id = DB::table('labratory_records')->where('id',$id)->value('labratory_id');
        $price = DB::table('labratory_records')->where('id',$id)->value('price');
        DB::table('labratories')->where('id',$lab_id)->decrement('total_amount',$price);
        DB::table('labratories')->where('id',$lab_id)->decrement('loan_amount',$price);
        $del = LabratoryRecord::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Order Successfully Deleted');
    }
}
