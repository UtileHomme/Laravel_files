@extends('layout.app');

@section('title','Shift-Required')
@section('body')



<br>


<a href="/shiftrequireds/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Shift Required Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($shiftrequireds as $shiftrequired)
  <li class="list-group-item">
  
	</br>{{$shiftrequired->id}}&emsp;
	   {{$shiftrequired->shiftrequired}}&emsp;&emsp;&emsp;
	
<div>
<a href="{{'/shiftrequireds/'.$shiftrequired->id.'/edit'}}">Edit</a>

<form action="{{'/shiftrequireds/'.$shiftrequired->id}}" method="post">
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