@extends('todo.create')

@section('editTitle',$item->title)
@section('editBody',$item->body)
@section('editId',$item->id)
@section('editMethod')
    {{method_field('PUT')}}
@endsection
