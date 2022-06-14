@extends('layouts.layout')
@section('title','Main Page')
@section('content')
    @if(session()->has('message'))
        {{session()->get('message')}}
    @endif


<a href="{{ route('posts.create') }}">Create Post</a>


<div class="row">
    @foreach($myposts as $post)
        <div class="card col-4 mx-4 my-4" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h5>
                <p class="card-text">{{$post->content}} - {{$post->category->name}}</p>
                @can('update', $post)
                    <a class="btn btn-primary" href="{{route('posts.edit', $post->id)}}">Edit</a>
                @else
                    <a href="">x</a>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection
