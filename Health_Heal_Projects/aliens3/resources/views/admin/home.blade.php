@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    You are logged in as admin!

                </div>
                <a href="/cc/create?name={{ Auth::user()->name }} " class="btn btn-info">New Lead</a>
                    <a href="/cc?name={{ Auth::user()->name }} " class="btn btn-info">View Lead</a>
            </div>
                    <div>

                            <div class="panel panel-default">
                <div class="panel-heading">Predefine Database tables</div>
                <div class="panel-body">
                             <div class="links">
                    <a href="/languages" class="btn btn-info">Languages</a> &emsp;&emsp;&emsp;
                    <a href="/city" class="btn btn-info">City</a> &emsp;&emsp;&emsp;
                    <a href="/genders" class="btn btn-info">Gender</a>&emsp;&emsp;
                    <a href="/leadtypes" class="btn btn-info">Lead Type</a>&emsp;&emsp;
                    <a href="/ptconditions" class="btn btn-info">Patient Condition</a>&emsp;&emsp;
                    <a href="/references" class="btn btn-info">References</a>&emsp;&emsp;
                    <a href="/relationships" class="btn btn-info">Relationship</a>&emsp;&emsp;
                    <br> <br>
                    <a href="/shiftrequireds" class="btn btn-info">Shift required</a>&emsp;&emsp;
                    <a href="/verticals" class="btn btn-info">Vertical</a>&emsp;&emsp;
                              
                    <a href="/leadtypes" class="btn btn-info">Lead Type</a>&emsp;&emsp;
                    <a href="/ptconditions" class="btn btn-info">Patient Condition</a>&emsp;&emsp;
                    <a href="/references" class="btn btn-info">References</a>&emsp;&emsp;
                    <br><br>
                    <a href="/relationships" class="btn btn-info">Relationship</a>&emsp;&emsp;
                    <a href="/shiftrequireds" class="btn btn-info">Shift required</a>&emsp;&emsp;
                    <a href="/verticals" class="btn btn-info">Vertical</a> &emsp;&emsp;

                    </div>
                    </div>
        </div>
    </div>
</div>
@endsection
