@extends('reference.create')


@section('editid', $reference->id)
@section('editReference',$reference->Reference)
@section('editReferalType',$reference->ReferalType)

@section('editMethod')
{{method_field('PUT')}}
@endsection 