<!-- This will demonstrate whether they are logged in or not -->

<!-- For the user -->
@if(Auth::guard('web')->check())
  <p class="text-success">
    You are Logged In as a <strong>User</strong>
  </p>
@else
  <p class="text-danger">
    You are Logged out as the <strong>User</strong>
  </p>
@endif

<!-- For the admin -->
@if(Auth::guard('admin')->check())
  <p class="text-success">
    You are Logged In as a <strong>Admin</strong>
  </p>
@else
  <p class="text-danger">
    You are Logged out as the <strong>Admin</strong>
  </p>
@endif
