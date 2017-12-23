<?php

namespace App\Http\Controllers;
use App\Item;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function create(Request $request)
    {
        $item_details = $request->text;

        $item = new Item;
        $item->item = $item_details;
        $item->save();

        return "Saved";
    }

    public function index()
    {
        $items = Item::all();
        return view('list',compact('items'));

    }
    public function delete(Request $request)
    {
        // return $request->all();

        Item::where('id',$request->id)->delete();

        // return view('list',compact('items'));

    }

    public function update(Request $request)
    {
        // return $request->all();

        $item = Item::find($request->id);
        $item->item = $request->value;
        $item->save();

        return 'Done';



    }

    public function search(Request $request)
    {
        $item = $request->term;
        return $availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
    }
}
