@extends('layout.app');

@section('title','City')
@section('body')



<br>


<a href="/city/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>City list</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($city as $city)
  <li class="list-group-item">
  
	</br>{{$city->id}}&emsp;
	   {{$city->name}}&emsp;
<div>
<a href="{{'/city/'.$city->id.'/edit'}}">Edit</a>

<form action="{{'/city/'.$city->id}}" method="post">
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