<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Объявления</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    @extends('layouts.base')
    @section('title', 'Главная')
    @section('main')
    @if(count($bbs)>0)
    <table class = "table table-striped">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Цена, руб.</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bbs as $bb)
        <tr>
            <td><h3>{{$bb->title}}</h3></td>
            <td>{{$bb->price}}</td>
            <td>
                <a href="{{ route('detail', ['bb'=>$bb->id]) }}">Подробнее...</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        @endif
        @endsection('main')
</div>
</body>
</html>
