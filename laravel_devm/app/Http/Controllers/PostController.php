<?php

// Controller for Creating and Managing Posts

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Log;
use App\User;
use DB;
use App\Tag;
use Purifier;
use Image;

class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function __construct()
  {
    //only authenticated users can access the posts
    $this->middleware('auth');
  }

  public function index()
  {
    /*
    store all the blogs inside a variable
    pass the variable into the view
    */

    $posts = Post::orderBy('id','desc')->paginate(2);
    return view('posts.index',compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */

  // creation and showing the form
  // we'll then pass all this to the store function
  public function create()
  {
    $categories = Category::all();
    $tags = Tag::all();

    //to show the form we call the function and redirect to the mentioned post
    return view('posts.create',compact('categories','tags'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  //this needs to be a POST request
  public function store(Request $request)
  {
    /** first validate the data
    then store in the database
    then redirect it to some other page
    */

    // Good for debugging
    // dd($request);

    $this->validate($request,
    array(
      'title' => 'required|max:255',
      'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
      'category_id' => 'required|integer',
      'body' => 'required'
    ));

    //Eloquent is a way to work with the Database

    // This is a new instance of the Model
    $post = new Post;
    $post->title = $request->title;
    $post->slug = $request->slug;
    $post->category_id = $request->category_id;
    $post->body = Purifier::clean($request->body);

    /*
      Image gets saved at a particular location and db tells where
    */
    if($request->hasFile('featured_image'))
    {
      $image = $request->file('featured_image');

      //this will get the file extension
      //to rename the file use $image->encode('.png')
      $filename = time().'.'.$image->getClientOriginalExtension();
      $location = public_path('images/'.$filename);
      Image::make($image)->resize(800,400)->save($location);

      $post->image = $filename;
    }

    $post->save();

    // This is for sending the data of tags to db
    $post->tags()->sync($request->tags,false);

    // if($post->isDirty('title'))
    // {
    //   $log->title = $post->title;
    // }

    // showing flash message
    // to make it permanent(till session expires) use 'put' instead of 'flash'
    Session::flash('success','The Blog Post was Successfully Saved!!');

    //go to the posts page -- we also need to add the post id
    return redirect()->route('posts.show', $post->id);

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  //To Look at a particular Blog Post, we need the id as well.. this is passed from
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show',compact('post'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  // To edit a Blog Post
  public function edit($id)
  {
    /*
    Find the post in the db and save it as a variable
    return the view and return the variable along with that
    */

    $post = Post::find($id);
    $categories = Category::all();

    $cats = array();

    foreach($categories as $category)
    {
      $cats[$category->id] = $category->name;
    }

    $tags = Tag::all();
    $tags2 = array();
    foreach($tags as $tag)
    {
      $tags2[$tag->id] = $tag->name;
    }

    return view('posts.edit',['post'=>$post, 'categories'=>$cats, 'tags'=>$tags2]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  // This is needs to be PATCH request
  public function update(Request $request, $id)
  {
    /*
    Validate the data then
    save the data to the database
    set flash data with success message
    redirect with flash data to posts.show
    */

    $post = Post::find($id);
    if($request->input('slug') == $post->slug)
    {
      $this->validate($request,
      array(
        'title' => 'required|max:255',
        'category_id' => 'required|integer',
        'body' => 'required'
      ));
    }
    else
    {
      $this->validate($request,
      array(
        'title' => 'required|max:255',
        'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
        'category_id' => 'required|integer',
        'body' => 'required'
      ));
    }

    $user = new User;

    $post = Post::find($id);
    $user = User::find($id);

    $post->title = $request->input('title');
    $post->slug = $request->input('slug');
    $post->category_id = $request->input('category_id');
    $post->body = Purifier::clean($request->input('body'));

    $post->save();

    if(isset($request->tags))
    {
    $post->tags()->sync($request->tags);
    }
    else
    {
      $post->tags()->sync(array());
    }

    Session::flash('success','The Blog Post was Successfully Updated!!');

    return redirect()->route('posts.show',$post->id);

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->tags()->detach();

    $post->delete();

    Session::flash('success','The Post was Successfully Deleted');
    return redirect()->route('posts.index');
  }
}
