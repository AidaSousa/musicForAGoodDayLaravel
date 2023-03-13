
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Good Morning Coder</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style type="text/css">
    </style>
</head>
<body class="body">    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-laravel">
        <div class="container">
            <a href="{{ route('song.index') }}"><img class="navbar-brand" src="{{asset('img/logo.svg') }}"></a>
                <form class="form-inline mx-auto" method="GET" action="{{ route('song.search') }}">
                    <input class="search-i form-control mx-auto mr-sm-0" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="search-b btn btn-primary my-5 my-sm-0" type="submit">Search</button>
                </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
                <ul class="navbar-nav ml-auto">
                    @if(auth()->check())
                        <li class="nav-item">
                            <p class="nav-link">Welcome <b>{{ auth()->user()->username }}</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Add Song</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.destroy') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.index') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.index') }}">Register</a>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
    <div id="content">
        @yield('content')
    </div>

    <footer>
        <div class="containerFooter">
            <p id="textFooter">
                made with ❤ by City Tech
            </p>
        </div>
    </footer>
</body>
</html>