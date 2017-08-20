@extends('layout.app')

@section('body')
    <br />
    <div class="col-lg-offset-4 col-lg-4">
        <h1 class="text-center">{{$item->title}}</h1>
        <p class="text-center">{{$item->body}}</p>
    </div>
@endsection
