<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\relationship;

class relationshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $relationships= relationship::paginate(1000);
        return view('relationship.index',compact('relationships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relationship.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $relationship = new relationship;
        $this->validate($request,[
                'relationshiptype'=>'required',
              
            ]);
       $relationship->relationshiptype=$request->relationshiptype;
   
       
       $relationship->save();
       return redirect('/relationships');
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
         $relationship= relationship::find($id);
        return view('relationship.edit',compact('relationship'));
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
        $relationship = relationship::find($id);
        $relationship->relationshiptype=$request->relationshiptype;
       
       $relationship->save();
       session()->flash('message','Updated Successfully');
       return redirect('/relationships');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relationship=relationship::find($id);
       $relationship->delete();
       session()->flash('message','Delete Successfully');
       return redirect('/relationships');
    }
}
