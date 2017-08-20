@extends('layout/app')

@section('title','Welcome')

@section('body')
{{-- Welcome {{$user->name}}  --}}
{{-- Welcome {{$user->number}} --}}
@foreach($mobiles as $mobile)
<h4>{{$mobile->number}}</h4>
@endforeach
@endsection
