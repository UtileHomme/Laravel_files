<?php

//namespaces are like little containers
//they say we belong in this folder and we cannot leave this folder

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;

//All custom controllers extend the Main controller
class PagesController extends Controller
{
  public function getIndex()
  {
    $posts = Post::orderBy('created_at','desc')->limit(4)->get();
    return view('pages/welcome',compact('posts'));
  }

  public function getAbout()
  {

    $first = 'Alex';
    $last = 'Curtis';

    $full = $first.' '.$last;

    /*
      Different ways of sending data to view starts here
    */

    return view('pages/about')->with('full',$full);

    //another way for arrays
    //$data = [];
    //$data['email']=$email;
    //$data['fullname']=$fullname;
    //return view('pages/about')->withData($data);

    //another method
    //return view('pages/about')->withFull($full)->withEmail($email);

    /*
      Different ways of sending data to view ends here
    */

  }

  public function getContact()
  {
    $first = 'Jatin';
    $last = 'Sharma1';

    $full = $first.' '.$last;

    return view('pages/contact')->with('full',$full);

  }

  //
  public function postContact(Request $request)
  {
    $this->validate($request, [
      'email'=>'required|email',
      'subject' => 'min:3',
      'message' => 'min:10',
    ]);

    $data = array(
      'email' => $request->email,
      'subject' => $request->subject,
      'bodyMessage'=> $request->message
    );
    Mail::send('emails.contact',$data, function($message) use($data)
    {
      $message->from($data['email']);
      $message->to('jatins368@gmail.com');
      $message->subject($data['subject']);
    });

    Session::flash('success', 'Your Email was Sent');

    return redirect()->route('main');
  }

}

?>
