<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
  public function send()
  {
    Mail::send(['text'=>'mail'],['name','Sarthak'],function($message)
    {
      $message->to('jatins368@gmail.com','To Bitfumes')->subject('Test Email');
      $message->from('bitfumes@gmail.com','User');
    }
  );
}
}
