@extends('layout.app');

@section('title','vertical')
@section('body')



<br>


<a href="/verticals/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Vertical Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($verticals as $vertical)
  <li class="list-group-item">
  
	</br>{{$vertical->id}}&emsp;
	   {{$vertical->verticaltype}}&emsp;&emsp;&emsp;
	    {{$vertical->servicetype}}&emsp;&emsp;&emsp;
	
<div>
<a href="{{'/verticals/'.$vertical->id.'/edit'}}">Edit</a>

<form action="{{'/verticals/'.$vertical->id}}" method="post">
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