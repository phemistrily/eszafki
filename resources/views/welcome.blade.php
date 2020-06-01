@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row gray">
            <div class="col-md-7 header d-flex align-items-center justify-content-center">
                <h1><b>Spersonalizuj swoje <span class="text-primary">meble</span><br/><span>
                    <img class="" src="{{ asset('img/dashboard/by.svg') }}" alt="header" />
                    <img class="" src="{{ asset('img/dashboard/modernstyle.svg') }}" alt="header" />
                </span></b></h1>
                
            </div>
            <div class="col-md-5 header d-flex align-items-center justify-content-center">
                <img class="header-img" src="{{ asset('img/dashboard/header.png') }}" alt="header" />
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-10">
        <div class="row py-4">
            @foreach($users as $index => $user)
            <div class="col-md-3 category @if($index%4 >= 0 && $index%4 < 3) pr-4 @endif @if($index%4 == 3) pl-4 @endif">
                <div class="row gray">
                    <div class="col-12">
                        {{ $index % 4 }}
                        {{ $user->name }} 
                    </div>
                    <div class="col-12">
                        {{ $user->email }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection