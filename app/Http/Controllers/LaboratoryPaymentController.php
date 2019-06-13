<?php

namespace App\Http\Controllers;

use App\LaboratoryPayment;
use App\Labratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaboratoryPaymentController extends Controller
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
        //
        $labs = Labratory::latest()->get();
        return view('labratory.laboratorypayments',compact('labs'));
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
        $lab_pay = new LaboratoryPayment();
        $lab_pay->labratory_id = $request->lab_id;
        $lab_pay->loan_amount = $request->loan_amount;
        $lab_pay->pay_amount = $request->pay_amount;
        $lab_pay->new_loan_amount = $request->new_loan_amount;
        $lab_pay->date = $request->date;
        $lab_pay->save();
        \DB::table('labratories')->where('id',$request->lab_id)->increment('paid_amount',$request->pay_amount);
        \DB::table('labratories')->where('id',$request->lab_id)->decrement('loan_amount',$request->pay_amount);
        return redirect()->back()->with('message','Payment Successfully Added');

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
        $lab_id = DB::table('laboratory_payments')->where('id',$id)->value('labratory_id');

        $payment = DB::table('laboratory_payments')->where('id',$id)->value('pay_amount');
        DB::table('labratories')->where('id',$lab_id)->decrement('paid_amount',$payment);
        DB::table('labratories')->where('id',$lab_id)->increment('loan_amount',$payment);
        $del = LaboratoryPayment::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Payment Successfully Deleted');
    }
}
