@extends('layout.app')

@section('body')
<br />
@include('todo.partials.message')
<a href="todo/create" class="btn btn-info">Add New</a>
<div class="col-lg-6 col-lg-offset-3">
    <h1 class="text-center">Todo List</h1>

    <ul class="list-group col-lg-9">
        @foreach($todos as $todo)
        <li class="list-group-item" style="height:60px;" >
            {{--    {{ucfirst($todo->body)}} --}}
            <a href="{{'/todo/'.$todo->id}}">{{$todo->title}}</a>

            <!-- This is for showing the time passed after the item was created -->
            <span class="pull-right">{{$todo->created_at->diffForHumans()}}</span>
        </li>
        @endforeach
    </ul>

    <ul class="list-group col-lg-3">

        @foreach($todos as $todo)
        <li class="list-group-item" style="height:60px;">
            {{--    {{ucfirst($todo->body)}} --}}

            <!-- This is for the edit method -->
            <a href="{{'/todo/'.$todo->id.'/edit'}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <form class="form-group pull-right" action="{{'/todo/'.$todo->id}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="form-control" style="border:none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
        </li>
        @endforeach

    </ul>
</div>
@endsection
