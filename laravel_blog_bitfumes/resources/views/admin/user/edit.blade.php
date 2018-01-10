@extends('admin.layout.app')

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Text Editors
            <small>Advanced form element</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Admin</h3>
                    </div>


                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('user.update',$user->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">

                            @include('include/messages')


                            <div class="col-lg-offset-3 col-lg-6">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{$user->name}}">
                                </div>


                                <div class="form-group">
                                    <label for="email">Email id</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                                </div>


                                <div class="form-group">
                                    <div class="checkbox">
                                        <label for=""><input type="checkbox" name="status"
                                            @if($user->status==1)
                                            checked
                                            @endif
                                             value="1">Status</label>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label>Assign Roles</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label for=""><input type="checkbox" name="role[]" value="{{$role->id}}"

                                                    @foreach($user->roles as $user_role)
                                                        @if($user_role->id==$role->id)
                                                        checked
                                                        @endif
                                                        @endforeach
                                                    >{{$role->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                                <div class="form-group">

                                    <a href="{{route('user.index') }}" class="btn btn-warning">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.box-body -->


                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

    @endsection
