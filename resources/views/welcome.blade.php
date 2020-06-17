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
            @foreach($categories as $index => $category)
            <div class="col-lg-3  @if($index%4 >= 0 && $index%4 < 3) pr-4 @endif @if($index%4 == 3) pl-4 @endif">
                <a class="block-link" href="{{ 'category/'.$category['slug'] }}">
                    <div class="row gray mb-4 category">
                        <div class="col-12 category-image justify-content-center">
                            <img class="header-img center-block" src="{{ asset('img/categories/default.png') }}" alt="header" />
                        </div>
                        <div class="col-12 category-title">
                            <div style="margin: 10px 24px;">{{ $category->name }}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection