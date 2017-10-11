<!-- This is the page the user sees when he first opens the website -->

@extends('main')

@section('title','| HomePage')

@section('stylesheets')

@endsection

<!-- everything inside is labeled as content section  -->
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
      <h1>Welcome to my Blog</h1>
      <p class="lead">Thank you for visiting.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
    </div>
  </div>
</div>
<!-- end of header. row -->

<div class="row">
  <div class="col-md-8" >

    @foreach($posts as $post)

    <div class="post">
      <h3>{{ $post->title }}</h3>
      <p>{{ substr(strip_tags($post->body),0,300)}}
        {{ strlen(strip_tags($post->body)) > 300 ? "...":" "}}
      </p>
        <a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
      </div>

      @endforeach

      <hr>
    </div>
    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
  @endsection

  @section('scripts')

  @endsection
