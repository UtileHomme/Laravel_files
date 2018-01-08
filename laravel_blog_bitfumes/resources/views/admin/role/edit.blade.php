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
                        <h3 class="box-title">Edit Role</h3>
                    </div>


                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('role.update',$role->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="box-body">

                            @include('include/messages')


                            <div class="col-lg-offset-3 col-lg-6">
                            <div class="form-group">
                                <label for="name">Role Title</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Role" value="{{$role->name}}">
                            </div>



                            <div class="form-group">

                                <a href="{{route('role.index') }}" class="btn btn-warning">Back</a>
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
