<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eszafki') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body>
        @if (request()->path() != 'login' && request()->path() != 'password/reset')
        <div class="flex-center position-ref full-height">
            <div class="row justify-content-center">
            <div class="col-12 d-block d-md-none" style="margin-top: -25px;">
                <nav class="navbar navbar-expand-lg navbar-light mt-2">
                    <a href="{{ url('/') }}"><img class="logo" src="{{ asset('img/common/logo.svg') }}" alt="logo" /></a>
                    <div>
                        <a href="{{  route('basket') }}"><button class="btn btn-link" type="button">
                            <img src="{{ asset("/img/common/cart.svg") }}" alt="koszyk" width="20">
                        </button></a>
                        <button class="navbar-toggler bg-primary py-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto mt-2">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item active">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/common/dashboard.svg') }}" alt="dashboard" class="menu-img" /> DASHBOARD
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}">
                                <img src="{{ asset('img/common/person.svg') }}" alt="wyloguj" class="menu-img" /> WYLOGUJ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('basket') }}"><img src="{{ asset("/img/common/cart.svg") }}" alt="koszyk"> KOSZYK</a>
                        </li>
                        @else
                        <li>
                        <a href="{{  route('login') }}">Zaloguj</a>
                        </li>
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif --}}
                        @endauth
                        @endif
                          </div>
                      </ul>
                    </div>
                  </nav>
            </div>    
            <div class="col-10 offset-md-1 d-none d-md-block">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="{{ url('/') }}"><img class="logo" src="{{ asset('img/common/logo.svg') }}" alt="logo" /></a>
                    </div>
                    <div class="col-md-9 text-right">
                      @if (Route::has('login'))
                          <div class="top-right links">
                              @auth
                                <a href="{{ url('/') }}"><button type="button" class="btn btn-link"><img src="{{ asset('img/common/dashboard.svg') }}" alt="dashboard" class="menu-img" /> DASHBOARD</button></a>
                                <a href="{{ url('/logout') }}">
                                    <button type="button" class="btn btn-link">
                                        <img src="{{ asset('img/common/person.svg') }}" alt="wyloguj" class="menu-img" /> WYLOGUJ
                                    </button>
                                </a>
                                <a href="{{  route('basket') }}"><button type="button" class="btn btn-primary"><img src="{{ asset("/img/common/cart.svg") }}" alt="koszyk"> KOSZYK</button></a>
                              @else
                                <a href="{{  route('login') }}"><button type="button" class="btn btn-primary">Zaloguj</button></a>
          
                                  {{-- @if (Route::has('register'))
                                      <a href="{{ route('register') }}">Register</a>
                                  @endif --}}
                              @endauth
                          </div>
                      @endif
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        User Management
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> --}}
                </div>
            </div>
        </nav>

        <main class="@if (request()->path() != 'login' && request()->path() != 'password/reset') py-4 @endif">
            @yield('content')
        </main>
    </div>
</body>
</html>
