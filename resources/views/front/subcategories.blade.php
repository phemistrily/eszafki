@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-10">
      <div class="row bread-navigation">
        <div class="col-12" style="padding-left: 0px;">
            <a class="block-link" href="{{ '/category/'.$productCategory['slug'] }}">
             <img class="gray return_arrow" src="http://eszafki.localhost/img/common/left_arrow.svg" alt="header" style="float: left;">
            </a>
            <div class="gray" style="display: flex; margin-left: 65px;height: 58px;">
                <div style="margin-left: 30px; margin-top: 19px;">
                    {{ $productCategory['name'] }} / {{ $productSubcategory['name'] }}
                </div>
            </div>
        </div>
      </div>
      <div class="row py-4">
        @foreach($products as $index => $product)
        <div class="col-md-3  @if($index%4 >= 0 && $index%4 < 3) pr-md-5 @endif @if($index%4 == 3) pl-md-4 @endif">
            <a class="block-link" href="{{ '/product/'.$product['id'] }}">
                <div class="row gray mb-4 category">
                    <div class="col-12 category-image justify-content-center">
                        <img class="header-img center-block" src="{{ asset('img/categories/default.png') }}" alt="header" />
                    </div>
                    <div class="col-12 category-title  category-title d-flex align-items-end">
                        <div style="margin: 10px 9px;">{{ $product->name }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
      </div>
  </div>
</div>
@endsection