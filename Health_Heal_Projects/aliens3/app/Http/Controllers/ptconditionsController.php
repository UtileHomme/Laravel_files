<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ptcondition;

class ptconditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ptconditions= ptcondition::paginate(1000);
        return view('ptcondition.index',compact('ptconditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptcondition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ptcondition = new ptcondition;
        $this->validate($request,[
                'conditiontypes'=>'required',
            ]);
       $ptcondition->conditiontypes=$request->conditiontypes;
       
       $ptcondition->save();
       return redirect('/ptconditions');
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
       $ptcondition = ptcondition::find($id);
        return view('ptcondition.edit',compact('ptcondition'));
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
       $ptcondition = ptcondition::find($id);
        $ptcondition->conditiontypes=$request->conditiontypes;
       $ptcondition->save();
       session()->flash('message','Updated Successfully');
       return redirect('/ptconditions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ptcondition=ptcondition::find($id);
       $ptcondition->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/ptconditions');
    }
}
