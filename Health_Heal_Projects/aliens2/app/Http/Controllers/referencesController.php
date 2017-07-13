<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\reference;

class referencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $references= reference::paginate(1000);
        return view('reference.index',compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference = new reference;
        $this->validate($request,[
                'Reference'=>'required',
                'ReferalType'=>'required',
            ]);
       $reference->Reference=$request->Reference;
       $reference->ReferalType=$request->ReferalType;
       
       $reference->save();
       return redirect('/references');
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
       $reference = reference::find($id);
        return view('reference.edit',compact('reference'));
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
        $reference = reference::find($id);
        $reference->Reference=$request->Reference;
        $reference->ReferalType=$request->ReferalType;
       $reference->save();
       session()->flash('message','Updated Successfully');
       return redirect('/references');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $reference=reference::find($id);
       $reference->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/references');
    }
}
