<?php

namespace App\Http\Controllers;

use App\Material;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MaterialController extends Controller
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
            abort(404,"Sorry, You cant do this action");
        }
        $staffs = Staff::latest()->get();
        $materials = Material::latest()->get();
        return view('material.materials',compact('staffs','materials'));
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
        $expense = new Material();
        $expense->staff_id = $request->staff_id;
        $expense->material = $request->material;
        $expense->amount = $request->amount;
        $expense->remark = $request->remark;
        $expense->date= $request->date;
        $expense->save();
        return redirect()->back()->with('message','New Material Added Successfully');
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
        $staffs= Staff::latest()->get();
        $edit = Material::findorfail($id);
        return view('material.editmaterial',compact('edit','staffs'));
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
        $expense= Material::findorfail($id);
        $expense->staff_id = $request->staff_id;
        $expense->material = $request->material;
        $expense->amount = $request->amount;
        $expense->remark = $request->remark;
        $expense->date= $request->date;
        $expense->save();
        return redirect()->route('material.index')->with('message','Material Edited Successfully');
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
        if (!Gate::allows('isAdmin')){
            abort(404);
        }
        $del = Material::findorfail($id);
        $del->delete();
        return redirect()->back()->with('message','Material Deleted Successfully');
    }
}
