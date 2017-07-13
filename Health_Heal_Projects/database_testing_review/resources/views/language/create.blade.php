@extends('layout.app')                      <!-- Inluding the template to this page -->

@section('body')                            <!--  start of section tag and under that content we want to show -->
<br>
<a href="/todos" class="btn btn-info" >Back</a>

<div class="col-lg-4 col-lg-offset-4">
<h1>Create new item</h1>


<form class="form-horizontal" action="/langs" method="POST">                <!-- This form is to enter new entry in language table -->
{{csrf_field()}}                                                            <!-- csrf is a unique token given to admin.if the token is miss matching than no other person can enter this form or enter any data in it -->
  <fieldset>
    <div class="form-group">
    <div class="col-lg-10">
        <input type="text" class="form-control" rows="5" name="name" id="name">
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
       </div>
    </div>
  </fieldset>
</form>
</div>
@endsection                                                                 <!-- End of Section -->