<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
      /*
        Fetch from the Db based on slug
        return the view and pass the post object
      */

      $post = Post::where('slug','=',$slug)->first();
      return view('blogs.single',compact('post'));
    }

    public function getIndex()
    {
      $posts = Post::paginate(5);

      return view('blogs.index',compact('posts'));
    }
}
