@extends('city.create')


@section('editid', $city->id)
@section('editname',$city->name)

@section('editMethod')
{{method_field('PUT')}}
@endsection 