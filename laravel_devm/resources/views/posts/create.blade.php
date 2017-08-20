<!-- This is the view for creating the post -->

@extends('main')

<!-- Give a new title  || use yield where you want this title to come -->
@section('title','| Create New Post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
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

<!-- The content that we wish to display on this page -->
@section('content')

  <div class="row">
    <!-- To push the element by 2 columns use col-md-offset-2 -->
    <div class="col-md-8 col-md-offset-2">
      <h1>Create New Post</h1>
      <hr>

      <!-- Here javascript validation starts -->
      <!-- This is the name of the route -->

      <!-- This is for opening the form .. Also gives CSRF function -->
      <!-- Take this form to store function of Post Controller  -->
        {!! Form::open(array('route'=>'posts.store','data-parsley-validate'=>'','files'=>true)) !!}

            <!-- This for a label -->
            {{Form::label('title','Title:')}}

            <!-- column from table,default value,array of classes or other options -->
            {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}

            {{ Form::label('slug','Slug:')}}
            {{ Form::text('slug',null, array('class'=>'form-control','required'=>'','minlength' => '5','maxlength' => '255'))}}

            {{ Form::label('category', 'Category:')}}
            <select name="category_id" class="form-control">
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach

            </select>

            {{ Form::label('tags', 'Tags:')}}
            <select name="tags[]" class="form-control select2-multi" multiple="multiple">
              @foreach($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach

            </select>

            <!-- Adding image here -->

            {{ Form::label('featured_image','Upload Featured Image:')}}
            {{ Form::file('featured_image') }}

            {{Form::label('body','Post Body')}}
            {{Form::textarea('body',null,array('class'=>'form-control'))}}

            {{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px;'))}}
        {!! Form::close() !!}
    </div>
  </div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>
@endsection
