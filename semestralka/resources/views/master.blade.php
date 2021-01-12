
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Homepage')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <!--    <a class="navbar-brand" href="#">Navbar</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li>
                    <a class="navbar-brand" href="#">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-headphones" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 0 0-5 5v4.5H2V8a6 6 0 1 1 12 0v4.5h-1V8a5 5 0 0 0-5-5z"/>
                            <path d="M11 10a1 1 0 0 1 1-1h2v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3zm-6 0a1 1 0 0 0-1-1H2v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3z"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/homepage') }}">Home <span class="sr-only">(current)</span></a>
                </li>

                @if (Auth::user() != null && Auth::user()->admin == 1)  
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('track.index') }}">{{ __('Tracks') }}</a>
                </li> 
                @endif

                <li class="nav-item">
                    @auth
                    <a class="nav-link" href="{{ route('user.index') }}">{{ __('Users') }}</a>
                    @endauth
                </li>
            </ul>
               
                <ul class = "navbar-nav ml-auto">
                @if (Route::has('login'))      
                    @auth
                     <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Account</a>
                    </li> 
                    
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>  
                    </li>

                    <li class="nav-item">
                    @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                    </li>    
                    @endauth
                    @endif
                </ul>                    
                       
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Results
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Monthly</a>
                        <a class="dropdown-item" href="music.html">Yearly</a>
                    </div>
                </li>-->
            
        </div>
    </div>
</nav>


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        @yield('header')
    </div>
</div>

<main>
    @yield('content')
</main>

<p>&nbsp;</p> 

<aside class="footer">
        <div class="container">
            <p class="small"> Since 2020</p>
        </div>
</aside>

</body>
</html>