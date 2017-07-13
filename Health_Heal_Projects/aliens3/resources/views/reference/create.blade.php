@extends('layout.app')
@section('body')
<br>
<a href="/references" class="btn btn-info" >Back</a>

<div class="col-lg-4 col-lg-offset-4">
<h1>{{substr(Route::currentRouteName(),13)}} item</h1>
<form class="form-horizontal" action="/references/@yield('editid')" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>
    <div class="form-group">
    <div class="col-lg-10">
       <label>Reference<input type="text" class="form-control" rows="5" name="Reference" id="Reference" value="@yield('editReference')"></label>
        <br>
        <label>Reference Type <input type="text" class="form-control" rows="5" name="ReferalType" id="ReferalType" value="@yield('editReferalType')"></label>
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </div>
  </fieldset>
</form>
  @include('partial.errors')
</div>
@endsection