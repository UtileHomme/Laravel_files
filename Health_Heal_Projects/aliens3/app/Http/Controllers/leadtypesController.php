<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\leadtype;

class leadtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $leadtypes= leadtype::paginate(1000);
        return view('leadtype.index',compact('leadtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('leadtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leadtype = new leadtype;
        $this->validate($request,[
                'leadtypes'=>'required',
            ]);
       $leadtype->leadtypes=$request->leadtypes;
       
       $leadtype->save();
       return redirect('/leadtypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leadtype = leadtype::find($id);
        return view('leadtype.edit',compact('leadtype'));
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
        $leadtype = leadtype::find($id);
        $leadtype->leadtypes=$request->leadtypes;
       $leadtype->save();
       session()->flash('message','Updated Successfully');
       return redirect('/leadtypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $leadtype=leadtype::find($id);
       $leadtype->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/leadtypes');
    }
}
