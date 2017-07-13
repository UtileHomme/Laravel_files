@extends('layout.app');

@section('title','Lead Type')
@section('body')



<br>


<a href="/leadtypes/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Lead-Type Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($leadtypes as $leadtype)
  <li class="list-group-item">
  
	</br>{{$leadtype->id}}&emsp;
	   {{$leadtype->leadtypes}}&emsp;
<div>
<a href="{{'/leadtypes/'.$leadtype->id.'/edit'}}">Edit</a>

<form action="{{'/leadtypes/'.$leadtype->id}}" method="post">
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