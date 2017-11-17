@extends('main')

@section('title','| Login')

@section('content')

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <!-- This will provide for csrf protection -->
      {!! Form::open() !!}

        <!-- The second argument is the default value we wish to pass -->
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email',null,['class'=>'form-control']) }}

        <!-- Password only accepts two parameters -->
        {{ Form::label('password', "Password:")}}
        {{ Form::password('password', ['class' => 'form-control']) }}

        <br />
        <!-- For remember me  -->
        {{ Form::checkbox('remember') }}
        {{Form::label('remember',"Remember Me")}}

        <br />

        {{Form::submit('Login',['class'=> 'btn btn-primary btn-block'])}}

        <p><a href="{{ url('password/reset')}}">Forgot My Password</a></p>

      {!! Form::close() !!}

    </div>
  </div>

@endsection
