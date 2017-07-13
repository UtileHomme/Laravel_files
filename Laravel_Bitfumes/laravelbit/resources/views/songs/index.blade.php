@extends('layout.app');

@section('title','Songs')
@section('body')
    {{'Songs are everything'}}
    @foreach($songs as $song)
    {{
        $song->title.' '.$song->artist."\n"
    }}
    @endforeach
@endsection
