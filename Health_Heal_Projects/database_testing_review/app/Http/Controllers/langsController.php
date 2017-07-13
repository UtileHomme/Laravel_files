<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\language;                               //including lang table model from App folder
use DB;                                     //Calling of DB function this function is used to write the query

class langsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$lang=DB::table('langs')->get();                    // Here we have written the select query for lang table it is similar to query (Select * from table langs)

        $langs= language::paginate(1000);                           // now we are writting the query with paginate function which help us to divide the no. rows into different pages
                                                                // here we have taken 1000 rows per page.

        return view('language.index',compact('langs'));      // here we are redirecting the page to index page of language with the content in it using compact function.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('language.create');                       //this will redirect to create page where we have created a form to insert data into database.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $lang = new language;                                            // here we are creating a object of lang model and save it in some variable.
       $lang->name=$request->name;                                  // here we are fetching all the form fields we have enter in create page with field name
       $lang->save();                                               //  save function is used to insert and save the data into database.
       return redirect('langs');                                    // after saving the data we redirect the home page of language.

     // return $request->all();
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
