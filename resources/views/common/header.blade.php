<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Eszafki</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-2">
                        <img src="{{ asset('img/common/logo.svg') }}" alt="logo" />
                    </div>
                    <div class="col-md-8 text-right">
                      @if (Route::has('login'))
                          <div class="top-right links">
                              @auth
                                <button type="button" class="btn btn-link"><img src="{{ asset('img/common/dashboard.svg') }}" alt="dashboard" class="menu-img" /> DASHBOARD</button>
                                <button type="button" class="btn btn-link">
                                  <img src="{{ asset('img/common/person.svg') }}" alt="wyloguj" class="menu-img" /> WYLOGUJ
                                </button>
                                <button type="button" class="btn btn-primary">KOSZYK</button>
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