@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Bitfumes Blog')
@section('sub-heading', 'Learn Together and Grow Together')

@section('head')

<meta name="csrf-token" content="{{ csrf_token() }}">
    <style media="screen">
        .fa-thumbs-up:hover
        {
            color:red;
        }
    </style>

@endsection
@section('main-content')
<!-- Main Content -->
<div class="container" id="app">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

                <posts title='title'></posts>
                <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{$posts->links()}}
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <hr>

    @endsection

    @section('footer')

    <script type="text/javascript" src="{{ asset('js/app.js')}}">

    </script>
    @endsection
