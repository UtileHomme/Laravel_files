@extends('layout.app')
@section('body')
<br>
<a href="/city" class="btn btn-info" >Back</a>

<div class="col-lg-4 col-lg-offset-4">
<h1>{{substr(Route::currentRouteName(),5)}} item</h1>
<form class="form-horizontal" action="/city/@yield('editid')" method="POST">
{{csrf_field()}}
@section('editMethod')
@show
  <fieldset>
    <div class="form-group">
    <div class="col-lg-10">
       <label>Branch <input type="text" class="form-control" rows="5" name="name" id="name" value="@yield('editname')"></label>
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </div>
  </fieldset>
</form>
  @include('partial.errors')
</div>
@endsection