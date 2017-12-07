@extends('admin.layout.app')

@section('headSection')

<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
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
                        <h3 class="box-title">Titles</h3>
                    </div>

                    @include('include/messages')

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('post.update',$post->id) }}" method="POST">
                        {{ csrf_field()}}
                        {{ method_field('PATCH')}}
                        <div class="box-body">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Post Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{$post->subtitle}}">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Post Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">File input</label>
                                    <input type="file" id="image" name="image">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" @if($post->status == 1)
                                        checked
                                        @endif> Publish
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Write Post Body Here
                                    <small>Simple and fast</small>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>

                            <!-- for multi select -->
                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select><span class="select2 select2-container select2-container--default select2-container--focus select2-container--open select2-container--above" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="true" tabindex="-1" aria-owns="select2-nwks-results" aria-activedescendant="select2-nwks-result-jwpp-Alabama"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 518.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea class="textarea" placeholder="Place some text here" name="body"
                                style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  > {{$post->body}}</textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{route('post.index') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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

@section('footerSection')

<script type="text/javascript" src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}">

</script>

<script type="text/javascript">

        $(document).ready(function() {
            $('.select2').select2()
        });
</script>

@endsection
