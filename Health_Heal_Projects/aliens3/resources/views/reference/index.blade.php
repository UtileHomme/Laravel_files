@extends('layout.app');

@section('title','References')
@section('body')



<br>


<a href="/references/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Reference Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($references as $reference)
  <li class="list-group-item">
  
	</br>{{$reference->id}}&emsp;
	   {{$reference->Reference}}&emsp;&emsp;&emsp;
	   {{$reference-> ReferalType}}&emsp;
<div>
<a href="{{'/references/'.$reference->id.'/edit'}}">Edit</a>

<form action="{{'/references/'.$reference->id}}" method="post">
{{csrf_field()}}
{{ method_field('DELETE') }}
<input type="submit" value="Delete">
</form>

    </div>
    
    <br>
  </li>

 @endforeach
</ul>

</div>

@endsection


@section('body')

@endsection