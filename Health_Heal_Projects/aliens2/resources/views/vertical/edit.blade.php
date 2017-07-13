@extends('vertical.create')


@section('editid', $vertical->id)
@section('editverticaltype',$vertical->verticaltype)
@section('editservicetype',$vertical->servicetype)

@section('editMethod')
{{method_field('PUT')}}
@endsection 