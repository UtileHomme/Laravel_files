@extends('layout.app');

@section('title','Gender')
@section('body')



<br>


<a href="/languages/create" class="btn btn-info">Add</a>
<div class="col-lg-6 col-lg-offset-3">
<center><h1>Language Details</h1></center>
@include('partial.message')
<ul class="list-group col-lg-15">
   @foreach ($languages as $language)
  <li class="list-group-item">
  
	</br>{{$language->id}}&emsp;
	   {{$language->Languages}}&emsp;
<div>
<a href="{{'/languages/'.$language->id.'/edit'}}">Edit</a>

<form action="{{'/languages/'.$language->id}}" method="post">
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