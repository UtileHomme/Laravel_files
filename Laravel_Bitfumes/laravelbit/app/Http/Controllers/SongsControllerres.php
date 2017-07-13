<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\songs;

class SongsControllerres extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //without model
    public function index()
    {
        $songs = DB::table('songs')->get();
        return view('songs/index',compact('songs'));
    }

    // public function songs()
    // {
    //     $songs1 = songs::all();          //before the :: is the model name
    //     return view('songs/index',compact('songs1'));
    // }


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
        $song = songs::find($id);
        // return $song;
        return view('songs.edit',compact('song'));
    }

    //Another way of doing it
    //The model name is being passed as argument
    // public function edit(Songs $song)
    // {
    //     // return $song;
    //     return view('songs.edit',compact('song'));
    // }

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
