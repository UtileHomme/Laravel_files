@extends('layout.app')

@section('body')
<br />
<a href="/todo" class="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
    <h1 class>{{substr(Route::currentRouteName(),5)}} Item</h1>

    <!-- This is for the update function -->
    <form class="form-horizontal" action="/todo/@yield('editId')" method="post">
        {{csrf_field()}}
        @section('editMethod')
        @show
        <fieldset>
            <div class="form-group">
                <div class="col-lg-10">
                    <!-- we want to retrieve the default values of the title that is clicked, therefore we are using "yield" -->
                    <input type="text" name="title" class="form-control" value="@yield('editTitle')" placeholder="Title" />
                </div>
                <br />
                <br />
                <div class="col-lg-10">
                    <textarea class="form-control" name="body" rows="5" id="textArea" placeholder="Body">@yield('editBody')</textarea>
                    <br />
                    <br />
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
    @include('todo.partials.errors')
    </div>

</div>

@endsection
