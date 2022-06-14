@extends('layouts.layout')
@section('title','Create Page')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>

    @endif
    <div class="row">
        <div class="card col-4 mx-4 my-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</a></h5>
                <p class="card-text">{{$post->content}}</p>
                <a class="btn btn-primary mb-2" href="{{route('posts.edit', $post->id)}}">Edit</a>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">DELETE</button>
                </form>
            </div>
        </div>
    </div>

    <ol class="list-group">
        @foreach($post->comments as $comment)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                    Wroted by: {{$comment->user->name}}
                    </div>
                    {{$comment->text}}
                </div>
                @can('delete', $comment)
                    <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-close"></button>
                    </form>
                @endcan
            </li>
        @endforeach
    </ol>

@auth
    <form class="mt-3" action="{{route('comments.store')}}" method="post">
        @csrf
        <textarea class="form-control" name="text" cols="20" rows="2"></textarea>
        <input name="post_id" value="{{$post->id}}" type="hidden">
        <button class="btn btn-success mt-2" type="submit">Save</button>
    </form>
@endauth

@endsection
