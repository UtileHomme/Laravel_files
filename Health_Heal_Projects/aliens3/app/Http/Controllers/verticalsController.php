<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\vertical;

class verticalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verticals= vertical::paginate(1000);
        return view('vertical.index',compact('verticals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('vertical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $vertical = new vertical;
        $this->validate($request,[
                'verticaltype'=>'required',
                'servicetype'=>'required',
              
            ]);
       $vertical->verticaltype=$request->verticaltype;
       $vertical->servicetype=$request->servicetype;
   
       
       $vertical->save();
       return redirect('/verticals');
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
        $vertical= vertical::find($id);
        return view('vertical.edit',compact('vertical'));
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
       $vertical = vertical::find($id);
        $vertical->verticaltype=$request->verticaltype;
          $vertical->servicetype=$request->servicetype;
       
       $vertical->save();
       session()->flash('message','Updated Successfully');
       return redirect('/verticals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vertical=vertical::find($id);
       $vertical->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/verticals');
    }
}
