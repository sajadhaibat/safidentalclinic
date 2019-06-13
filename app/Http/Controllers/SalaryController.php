<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class SalaryController extends Controller
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
        if (!\Illuminate\Support\Facades\Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $salary = new Salary();
        $salary->staff_id = $request->staff_id;
        $salary->amount = $request->amount;
        $salary->date = $request->date;
        $salary->save();
        $staff_id = $request->input('staff_id');
        \DB::table('staff')->where('id',$staff_id)->decrement('advance_money',$request->advance);
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
        if (!\Illuminate\Support\Facades\Gate::allows('isAdmin')){
            abort(404,"Sorry, You cant do this action");
        }
        $del = Salary::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Salary Successfully Deleted');
    }
}
