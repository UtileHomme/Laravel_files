@extends('language.create')


@section('editid', $language->id)
@section('editlanguages',$language->Languages)

@section('editMethod')
{{method_field('PUT')}}
@endsection 