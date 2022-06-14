@extends('layouts.base')

@section('title', 'Правка объявления:: Мои объявления')

@section('main')
    <form action="{{route('bb.update',['bb'=>$bb->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for = 'txtTitle'>Товар</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $bb->title)}}">
            @error('title')
            <span class="invalid-feddback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtContent">Описание</label>
            <textarea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror" row="3" value="{{old('content', $bb->content)}}"></textarea>
            @error('content')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class="form-control">
            <label for="txtPrice">Цена</label>
            <input name="price" id="txtPrice" class="form-control @error('price') is-invalid @enderror" value="{{old('price',$bb->price)}}">
            @error('title')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
@endsection
