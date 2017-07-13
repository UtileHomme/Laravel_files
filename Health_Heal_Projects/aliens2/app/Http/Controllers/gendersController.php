<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gender;
use DB;

class gendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $genders= gender::paginate(1000);
        return view('gender.index',compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('gender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $gender = new gender;
        $this->validate($request,[
                'gendertypes'=>'required',
            ]);
       $gender->gendertypes=$request->gendertypes;
       
       $gender->save();
       return redirect('/genders');
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
       $gender = gender::find($id);
        return view('gender.edit',compact('gender'));
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
        $gender = gender::find($id);
        $gender->gendertypes=$request->gendertypes;
       $gender->save();
       session()->flash('message','Updated Successfully');
       return redirect('/genders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender=gender::find($id);
       $gender->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/genders');
    }
}
