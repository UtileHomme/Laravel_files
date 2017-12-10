@extends('user/app')

@section('bg-img', asset('user/img/post-bg.jpg'))
@section('title', $slug->title)
@section('sub-heading',$slug->subtitle)
@section('main-content')

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
                <small>Created {{$slug->created_at->diffForHumans()}}</small>

                @foreach($slug->categories as $category)
                <small class="pull-right" style="margin-right: 20px;">
                    {{$category->name}}
                </small>
                @endforeach
                {!! htmlspecialchars_decode($slug->body) !!}

                <h3>Tags</h3>
                @foreach($slug->tags as $tag)
                <small class="pull-left" style="margin-right: 20px; border-radius: 5px; border: 1px solid grey; padding: 5px;">
                    {{$tag->name}}
                </small>
                @endforeach
            </div>
        </div>
    </div>
</article>

<hr>

@endsection
