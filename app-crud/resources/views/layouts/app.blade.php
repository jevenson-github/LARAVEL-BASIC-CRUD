<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
<title>{{ config('app.name') }}</title> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- jquery scripts --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- sweet alert script  --}} 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-lg ">
            <div class="container">  
                <a class="navbar-brand text-primary " >
                {{-- <a class="navbar-brand text-white" href="{{ url('/') }}"> --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    PROJECT
                </a>
                <button class="navbar-toggler bg-light text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon "> </span>
                
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- If the user is not logged in  --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                                
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            {{-- After the login  --}}
                        @else 
                                 
                            {{-- Restricting links  based on user role --}}
                            @if (Auth::user()->is_admin == 0 )
                            <li class="nav-item dropdown">
                                <a class="nav-link  text-white " href="{{ route('home')  }}" >
                                 Home
                                  </a> 
                            </li> 
                            {{-- <li class="nav-item dropdown"> 
                                <a class="nav-link  text-white " href="{{ route('product.index')  }}" >
                                  Product
                                </a> 
                            </li>    --}}
                            <li class="nav-item dropdown"> 
                                <a class="nav-link  text-white " href="{{ route('note.index')  }}" >
                                 Notes
                                </a> 
                            </li>  
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>  
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    {{-- Logout form  --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>  
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @yield('jquery_script')
        </main>
    </div>
</body>
</html>
