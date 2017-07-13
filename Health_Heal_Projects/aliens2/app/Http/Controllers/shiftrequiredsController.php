<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\shiftrequired;

class shiftrequiredsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shiftrequireds= shiftrequired::paginate(1000);
        return view('shiftrequired.index',compact('shiftrequireds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shiftrequired.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shiftrequired = new shiftrequired;
        $this->validate($request,[
                'shiftrequired'=>'required',
              
            ]);
       $shiftrequired->shiftrequired=$request->shiftrequired;
   
       
       $shiftrequired->save();
       return redirect('/shiftrequireds');
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
         $shiftrequired= shiftrequired::find($id);
        return view('shiftrequired.edit',compact('shiftrequired'));
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
       $shiftrequired = shiftrequired::find($id);
        $shiftrequired->shiftrequired=$request->shiftrequired;
       
       $shiftrequired->save();
       session()->flash('message','Updated Successfully');
       return redirect('/shiftrequireds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $shiftrequired=shiftrequired::find($id);
       $shiftrequired->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/shiftrequireds');
    }
}
