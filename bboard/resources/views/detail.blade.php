<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$bb->title}} :: Объявления</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    @extends('layouts.base')
    @section('title', $bb->title)
    @section('main')
    <h2>{{$bb->title}}</h2>
    <p>{{$bb->content}}</p>
    <p>{{$bb->price}}</p>
    <p>Автор: {{$bb->user->name}}</p>
    <p><a href = "{{route('index')}}">На перечень объявлений</a></p>
    @endsection('main')
</div>
</body>
</html>
