<?php

namespace App\Http\Controllers;

use App\Labratory;
use Illuminate\Http\Request;

class LabratoryController extends Controller
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
        $labratories = Labratory::latest()->get();
        return view('labratory.labratorylist',compact('labratories'));
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
        $labratory = new Labratory();
        $labratory->name = $request->name;
        $labratory->phone_number = $request->phone_number;
        $labratory->address = $request->address;
        $labratory->save();
        return redirect()->back()->with('message','Labratory Added Successfully');
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
        $edit = Labratory::findorfail($id);
        return view('labratory.editlaboratory',compact('edit'));
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
        $labratory = Labratory::findorfail($id);
        $labratory->name = $request->name;
        $labratory->phone_number = $request->phone_number;
        $labratory->address = $request->address;
        $labratory->save();
        return redirect()->route('labratory.index')->with('message','Labratory Edited Successfully');
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
