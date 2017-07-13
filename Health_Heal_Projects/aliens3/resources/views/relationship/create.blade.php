@extends('layout.app')
@section('body')
<br>
<a href="/relationships" class="btn btn-info" >Back</a>

<div class="col-lg-4 col-lg-offset-4">
<h1>{{substr(Route::currentRouteName(),13)}} item</h1>
<form class="form-horizontal" action="/relationships/@yield('editid')" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>
    <div class="form-group">
    <div class="col-lg-10">
       <label>Relationship<input type="text" class="form-control" rows="5" name="relationshiptype" id="relationshiptype" value="@yield('editrelationshiptype')"></label>
        <br>
        
        <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </div>
  </fieldset>
</form>
  @include('partial.errors')
</div>
@endsection