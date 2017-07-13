@extends('gender.create')


@section('editid', $gender->id)
@section('editgendertypes',$gender->gendertypes)

@section('editMethod')
{{method_field('PUT')}}
@endsection 
