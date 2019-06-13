<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
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
        if (!Gate::allows('isAdmin')){
            abort(404);
        }

        $staffs = Staff::latest()->get();
        return view('humanresource.stafflist',compact('staffs'));
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
            abort(404);
        }
        $staff = new Staff;
        $staff->name = $request->name;
        $staff->phone_number = $request->phone_number;
        $staff->address = $request->address;
        $staff->join_date = $request->date;
        $staff->save();
        return redirect()->back()->with('message','Staff Added Successfully');
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
        if (!Gate::allows('isAdmin')){
            abort(404);
        }
        $edit = Staff::findorfail($id);
        return view('humanresource.editstaff',compact('edit'));
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
        if (!Gate::allows('isAdmin')){
            abort(404);
        }
        $staff = Staff::findorfail($id);
        $staff->name = $request->name;
        $staff->phone_number = $request->phone_number;
        $staff->address = $request->address;
        $staff->join_date = $request->date;
        $staff->save();
        return redirect()->route('staff.index')->with('message','Staff Edited Successfully');
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
