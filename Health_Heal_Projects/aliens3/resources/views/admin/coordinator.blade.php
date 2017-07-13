@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Coordinator Dashboard</div>

                <div class="panel-body">
                    You are logged in as Coordinator!
                </div>
                <a href="/cc/create?name={{ Auth::user()->name }}" class="btn btn-info">Create Lead</a>
                <a href="/vh?name={{ Auth::user()->name }} " class="btn btn-info">View Lead</a>
            </div>
        </div>
    </div>
</div>
@endsection
