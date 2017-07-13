@extends('layout.app')
@section('body')

@foreach($a as $b)
{{$b}}
@endforeach
<br/> 

request
@foreach($c as $bd)
{{$bd}}
@endforeach

@endsection