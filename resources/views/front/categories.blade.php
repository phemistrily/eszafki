@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-10">
    <div class="row bread-navigation">
        <div class="col-12" style="padding-left: 0px;">
            <a class="block-link" href="/">
                <img class="gray return_arrow" src="http://eszafki.localhost/img/common/left_arrow.svg" alt="header" style="float: left;">
            </a>
            <div class="gray" style="display: flex; margin-left: 65px;height: 58px;">
                <div style="margin-left: 30px; margin-top: 19px;">
                    {{ $categoryName }}
                </div>
            </div>
        </div>
      </div>
      <div class="row py-4">
        @foreach($subcategories as $index => $subcategory)
        <div class="col-lg-3  @if($index%4 >= 0 && $index%4 < 3) pr-4 @endif @if($index%4 == 3) pl-4 @endif">
            <a class="block-link" href="{{ '/subcategory/'.$subcategory['slug'] }}">
                <div class="row gray mb-4 category">
                    <div class="col-12 category-image justify-content-center">
                        <img class="header-img center-block" src="{{ asset('img/categories/default.png') }}" alt="header" />
                    </div>
                    <div class="col-12 category-title">
                        <div style="margin: 10px 24px;">{{ $subcategory->name }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
      </div>
  </div>
</div>
@endsection