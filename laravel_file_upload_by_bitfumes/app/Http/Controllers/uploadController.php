<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class uploadController extends Controller
{
    public function index()
    {
        return view('upload.upload');

    }

    public function store(Request $request)
    {
        $request->file('image');

        if($request->hasFile('image'))
        {
            $request->file('image');

            //for getting the path
            //$request->image->path();

            //for getting the extension
             //$request->image->extension()

            // return $request->image->store('public');

            // return Storage::putFile('public/new',$request->file('image'));

            return $request->image->storeAs('public','jatin.jpg');
        }
        else
        {
            return 'No file selected';
        }
    }

    public function show()
    {
        //to make a directory
        // return Storage::makeDirectory('public/make');

        //to delete a directory
        //return Storage::deleteDirectory('public/make');
        // return Storage::files('public');

        //used for retrieving all the files in the "public" folder and its subfolders
        // return Storage::allFiles('public');

        //after linking
        $url = Storage::url('jatin.jpg');
        return "<img src=' ".$url." ' />";

    }

    public function size()
    {
        //size of the image
        return Storage::size('public/jatin.jpg');

        //time the image was last modified
        return Storage::lastModified('public/jatin.jpg');

        //how to copy a file from one folder to another
        return Storage::copy('public/jatin.jpg','jatin.jpg');

        // how to move a file from one folder to another
        return Storage::move('public/jatin.jpg','jatin.jpg');
    }

    public function create()
    {
        //gives the raw data of the image file
        $raw_content =  Storage::get('jatin.jpg');

        //how to create an image with the above raw data
        return Storage::put('public/newImage.jpg', $raw_content);

        // how to delete any files
        return Storage::delete('public/jatin.jpg');
    }

}
