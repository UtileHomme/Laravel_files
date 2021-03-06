<!-- This page contains all the partials and generic code being used in multiple websites -->

<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Here all the head code is present -->
@include('partials/_head')
  </head>

<body>
@include('partials/_nav')
  <!-- Default bootstarp navbar -->


  <div class="container">
        <!-- Here we have all the messages -->
    @include('partials/_messages')

    <!-- put the content section here from welcome.blade.php -->
    @yield('content')

  @include('partials/_footer')

  </div>
  <!-- end of container -->

  @include('partials/_javascript')

  @yield('scripts')
</body>
</html>
