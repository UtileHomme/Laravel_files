@extends('layout.app')
@section('body')
<br>
<a href="/verticals" class="btn btn-info" >Back</a>

<div class="col-lg-4 col-lg-offset-4">
<h1>{{substr(Route::currentRouteName(),13)}} item</h1>
<form class="form-horizontal" action="/verticals/@yield('editid')" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>
    <div class="form-group">
    <div class="col-lg-10">
       <label>verticaltype<input type="text" class="form-control" rows="5" name="verticaltype" id="verticaltype" value="@yield('editverticaltype')"></label>
        <br>
         <label>service type<input type="text" class="form-control" rows="5" name="servicetype" id="servicetype" value="@yield('editservicetype')"></label>
        <br>
        
        <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </div>
  </fieldset>
</form>
  @include('partial.errors')
</div>
@endsection