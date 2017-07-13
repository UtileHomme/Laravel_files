@extends('layout.app');

@section('title','Relationship')
@section('body')



<br>


<a href="/relationships/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Relationship Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($relationships as $relationship)
  <li class="list-group-item">
  
	</br>{{$relationship->id}}&emsp;
	   {{$relationship->relationshiptype}}&emsp;&emsp;&emsp;
	
<div>
<a href="{{'/relationships/'.$relationship->id.'/edit'}}">Edit</a>

<form action="{{'/relationships/'.$relationship->id}}" method="post">
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