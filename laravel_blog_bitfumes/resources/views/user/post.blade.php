@extends('user/app')

@section('bg-img', asset(Storage::disk('local')->url($slug->image)))

@section('head')
<link rel="stylesheet" href="{{ asset('user/css/prism.css')}}">
@endsection
@section('title', $slug->title)
@section('sub-heading',$slug->subtitle)
@section('main-content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=995337880614235';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Post Content -->


<article>
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
                <small>Created {{$slug->created_at->diffForHumans()}}</small>

                @foreach($slug->categories as $category)
                <a href="{{route('category', $category)}}"><small class="pull-right" style="margin-right: 20px;">
                    {{$category->name}}
                </small></a>
                @endforeach
                {!! htmlspecialchars_decode($slug->body) !!}

                <h3>Tags</h3>
                @foreach($slug->tags as $tag)
                <a href="{{route('tag',$tag)}}"><small class="pull-left" style="margin-right: 20px; border-radius: 5px; border: 1px solid grey; padding: 5px;">
                    {{$tag->name}}
                </small></a>
                @endforeach
            </div>

            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>

        </div>
    </div>
</article>

<hr>

@endsection

@section('footer')
<link rel="stylesheet" href="{{ asset('user/js/prism.js')}}">

@endsection
