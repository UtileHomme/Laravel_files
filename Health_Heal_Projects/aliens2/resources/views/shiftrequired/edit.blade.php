@extends('shiftrequired.create')


@section('editid', $shiftrequired->id)
@section('editshiftrequired',$shiftrequired->shiftrequired)

@section('editMethod')
{{method_field('PUT')}}
@endsection 