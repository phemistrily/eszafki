@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
    <div class="row justify-content-center">
    <div class="col-9">
        <a href="{{ url('/') }}"><img class="logo mt-4" src="{{ asset('img/common/logo.svg') }}" alt="logo" /></a>
        <br /><br /><br /><br />
        <h1 style="font-size: 26px;"><b>Zaloguj Się</b></h1>
        <br />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Adres E-Mail') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Hasło') }}</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Zapamiętaj mnie') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6 align-right">
                            @if (Route::has('password.request'))
                                <a style="color: #F1BC32;" href="{{ route('password.request') }}">
                                    <b>{{ __('Zapomniałeś hasła') }}</b>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-5 pb-5">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12">
                                {{ __('ZALOGUJ SIĘ') }}
                            </button>
                        </div>
                    </div>
                </form>
    </div>
    </div>
    </div>
    <div class="col-md-7 d-flex justify-content-center align-items-center" style="background: #F1BC32; min-height: 100vh;">
        <br />
        <img class="header-img" src="{{ asset('img/dashboard/header.png') }}" alt="header" />
    </div>
</div>
@endsection
