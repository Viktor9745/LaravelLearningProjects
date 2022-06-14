@extends('layouts.base')

@section('title', 'Добавление объявления:: Мои объявления')

@section('main')
    <form action="{{route('bb.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for = 'txtTitle'>Товар</label>
            <input name="title" id="txtTitle" class="form-control" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="txtContent">Описание</label>
            <textarea name="content" id="txtContent" class="form-control" row="3" value="{{old('content')}}"></textarea>
        </div>
        <div class="form-control">
            <label for="txtPrice">Цена</label>
            <input name="price" id="txtPrice" class="form-control" value="{{old('price')}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection
