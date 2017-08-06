@extends('main')

@section('title','| Edit Blog Post')

@section('stylesheets')

{!! Html::style('css/select2.min.css')!!}

<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=16kytntw156ucsj61z5glfyxm196ohze7xlk02nduojp5ynh"></script>

<script>
  tinymce.init(
    {
      selector: 'textarea',
      plugins: 'link code',
      menubar: false,
      // menu:
      // {
      //   view: {title: 'Edit', items: 'cut,copy,paste'}
      // }

    }
  );
</script> -->

@endsection

@section('content')

<div class="row">

  <!-- This post is a model object -->
  <!-- We send the editted data to the PostController update function using this form  -->
  <!-- We are connecting the form to a model -->
  <!-- We have to manually tell the form which method to use since by default a POST request is going -->
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PUT']) !!}

  <div class="col-md-8">

    {{ Form::label('title','Title:')}}

    <!-- This 'title' should match with the one in the database -->
    <!-- input-lg makes the form a larger field -->
    {{ Form::text('title', null, ['class' => 'form-control input-lg'])}}

    {{ Form::label('slug','Slug:',['class'=>'form-spacing-top'])}}
    {{ Form::text('slug',null, ['class'=>'form-control'])}}

    {{ Form::label('category_id', 'Category:', ['class' =>'form-spacing-top'])}}
    {{ Form::select('category_id', $categories,null,['class'=>'form-control'] ) }}

    {{ Form::label('tags','Tags:', ['class' => 'form-spacing-top'])}}
    {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple' => 'multiple'])}}

    <!-- form-spacing-top will give some spacing above the element -->
    {{ Form::label('body','Body:',['class' =>'form-spacing-top'])}}

    {{ Form::textarea('body', null, ['class' => 'form-control'])}}
  </div>

  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y H:ia',strtotime($post->created_at))}}</dd>
      </dl>

      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y H:ia',strtotime($post->updated_at))}}</dd>
      </dl>

      <hr>

      <div class="row">
        <div class="col-sm-6">
          <!-- route,name of the button, any extra parameter we feel like passing,any classes -->
          {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
          <!-- <a href="#" class="btn btn-primary btn-block">Edit</a> -->
        </div>
        <div class="col-sm-6">

          {{ Form::submit('Save Changes',['class'=>'btn btn-block btn-success'])}}

          <!-- route,name of the button, any extra parameter we feel like passing,any classes -->
          <!-- {!! Html::linkRoute('posts.update','Save Changes',array($post->id),array('class'=>'btn btn-success btn-block')) !!} -->
          <!-- <a href="#" class="btn btn-danger btn-block">Delete</a> -->
        </div>
      </div>
    </div>
  </div>

  {!! Form::close() !!}

</div>

@endsection

@section('scripts')
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
$('.select2-multi').select2();

// This is for ensuring that the edit field has all the pre selected tags
$('.select2-multi').select2().val({!! json_encode($post->tags()->pluck('tags.id')) !!}).trigger('change')
</script>
@endsection
