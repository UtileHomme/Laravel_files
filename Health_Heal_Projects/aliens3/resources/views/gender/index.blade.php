@extends('layout.app');

@section('title','Gender')
@section('body')



<br>


<a href="/genders/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Gender list</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($genders as $gender)
  <li class="list-group-item">
  
	</br>{{$gender->id}}&emsp;
	   {{$gender->gendertypes}}&emsp;
<div>
<a href="{{'/genders/'.$gender->id.'/edit'}}">Edit</a>

<form action="{{'/genders/'.$gender->id}}" method="post">
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