<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Found;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function storeFile(Request $request)
    {
        if($request->hasFile('file'))
        {
            //gives the path for the file
            // $request->file->store('public/upload');

            //gives the name of the file along with extension
            // dd($request->file->getClientOriginalName());

            $filename = $request->file->getClientOriginalName();

            $filesize = $request->file->getClientSize();

            $request->file->storeAs('public/upload',$filename);

            $filename = "jatin.jpg";

            $image = new Found;
            $image->name = $filename;
            $image->size =$filesize;

            $image->save();

            // dd($filename);
            return view('jatin',compact('filename'));
        }
    }
}
