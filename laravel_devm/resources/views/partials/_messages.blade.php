<!-- Check if there is a success message or not -->

<!-- if the session set as success is present -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  <strong>Success:</strong> {{Session::get('success')}}
</div>

@endif

<!-- To check if there are any errors -->
@if(count($errors)>0)
<div class="alert alert-danger">
  <strong>Errors:</strong>
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif
