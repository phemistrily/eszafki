@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5">
    <div class="row justify-content-center">
    <div class="col-9">
        <a href="{{ url('/') }}"><img class="logo mt-4" src="{{ asset('img/common/logo.svg') }}" alt="logo" /></a>
        <br /><br /><br /><br />
        <h1 style="font-size: 26px;"><b>Resetowanie hasła</b></h1>
        <br />
        <p>Podaj swój adres email, na który wyślemy Ci link do zresetowania hasła.</p>
        <br />
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary col-12">
                                    {{ __('Resetuj hasło') }}
                                </button>
                            </div>
                        </div>
                        <a class="mb-5 pb-5" style="color: #F1BC32;" href="{{ url('/') }}">Wróć do logowania</a>
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
