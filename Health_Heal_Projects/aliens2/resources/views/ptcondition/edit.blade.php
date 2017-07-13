@extends('ptcondition.create')


@section('editid', $ptcondition->id)
@section('editconditiontypes',$ptcondition->conditiontypes)

@section('editMethod')
{{method_field('PUT')}}
@endsection 