@extends('layout.app')
@section('body')
    {{$song->title}}
    {{'by'}}
    {{$song->artist}}
@endsection
