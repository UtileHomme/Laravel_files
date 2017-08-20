<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;
use Log;

class todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = todo::all();
        return view('todo.home',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // How to store data inside the db
        // return $request->all();
        $todo = new todo;
        $this->validate($request,
        [
            'body'=>'required',
            'title'=>'required|unique:todos'
        ]);
        $todo->body = $request->body;
        $todo->title = $request->title;
        $todo->save();

        Log::info('User created an item successfully', ['body' => $request->body]);
        return redirect('/todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = todo::find($id);
        return view('todo.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = todo::find($id);

        $log = ['id' => $item->id];
        Log::useFiles(storage_path().'/logs/edit.log');
        Log::info('User tried to edit this item', $log);
        return view('todo.edit',compact('item'));


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
        $todo = todo::find($id);
        $this->validate($request,
        [
            'body'=>'required',
            'title'=>'required'
        ]);
        $todo->body = $request->body;
        $todo->title = $request->title;
        $todo->save();

        // flash session has life for only one request
        session()->flash('message','List Updated Successfully');

        $log = ['id' => $todo->id];

        Log::useFiles(storage_path().'/logs/updated.log');
        Log::info('User has edited this item successfully ', $log);

        return redirect('/todo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=todo::find($id);
        $item->delete();
        session()->flash('message','List Deleted Successfully');
        return redirect('/todo');
    }

    public function logs()
    {

    }
}
