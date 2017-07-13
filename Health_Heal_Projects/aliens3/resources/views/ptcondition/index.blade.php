@extends('layout.app');

@section('title','Patient Condition')
@section('body')



<br>


<a href="/ptconditions/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Patient Condition Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($ptconditions as $ptcondition)
  <li class="list-group-item">
  
	</br>{{$ptcondition->id}}&emsp;
	   {{$ptcondition->conditiontypes}}&emsp;
<div>
<a href="{{'/ptconditions/'.$ptcondition->id.'/edit'}}">Edit</a>

<form action="{{'/ptconditions/'.$ptcondition->id}}" method="post">
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