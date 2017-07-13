@extends('leadtype.create')


@section('editid', $leadtype->id)
@section('editleadtypes',$leadtype->leadtypes)

@section('editMethod')
{{method_field('PUT')}}
@endsection 