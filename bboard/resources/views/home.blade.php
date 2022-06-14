@extends('layouts.base')
@section('title', 'Мои объявления')
@section('main')
    <h2>Добро пожаловать, {{Auth::user()->name}}!</h2>
<p class="text-right"><a href="{{route('bb.add')}}">Добавить объявления</a></p>
    @if(count($bbs)>0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Цена, руб.</th>
            <th colspan="2">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($bbs as $bb)
                <tr>
                    <td><h3>{{$bb->title}}</h3></td>
                    <td>{{$bb->price}}</td>
                    <td>
                        <a href="{{route('bb.edit', ['bb'=>$bb->id])}}">Изменить</a>
                    </td>
                    <td>
                        <a href="{{route('bb.delete',['bb'=>$bb->id])}}">Удалить</a>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
    @endif
@endsection
