<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('posts.index')}}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   @if(isset($cats))
                        @foreach($cats as $cat)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('postsByCat',$cat->id)}}">{{$cat->name}}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                @auth
                    <div style="margin-left: 0; width: 20%;">
                        <b>LOGGED IN: {{Auth::user()->name}}</b>
                            <form class="d-flex" action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="btn btn-outline-success" type="submit">Logout</button>
                            </form>
                    </div>
                @else
                    <a href="{{route('login')}}"><b>Log in</b></a>
                @endauth

            </div>
        </div>
    </nav>

    @yield('content')
</div>
</body>
</html>
