<?php

namespace App\Http\Controllers;

use App\AdvanceMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdvanceMoneyController extends Controller
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
        if (!Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $advance = new AdvanceMoney();
        $advance->staff_id = $request->staff_id;
        $advance->amount = $request->amount;
        $advance->date = $request->date;
        $advance->save();
        $staff_id = $request->input('staff_id');
        \DB::table('staff')->where('id',$staff_id)->increment('advance_money',$request->amount);
        \DB::table('advance_money_increments')->where('id',1)->increment('amount',$request->amount);
        return redirect()->back()->with('message','Payment Added Successfully');
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
    }
}
