@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-10">
    <div class="row bread-navigation">
        <div class="col-12" style="padding-left: 0px;">
            <img class="gray return_arrow" src="http://eszafki.localhost/img/common/left_arrow.svg" alt="header" style="float: left;">
        
            <div class="gray" style="display: flex; margin-left: 65px;height: 58px;">
                <div style="margin-left: 30px; margin-top: 19px;">
                    {{ $productCategory['name'] }} / {{ $productSubcategory['name'] }} / {{ $product['name'] }}
                </div>
            </div>
        </div>
      </div>
      <div class="row py-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="gray" style="width: calc(100% - 15px);">
                    <form class="mt-2">
                        <div class="container pt-4 pl-4" style="marign-right: 15px;">
                            <h2>{{ $product['name'] }}</h2>
                            <div class="row">
                                <div class="col-12">&nbsp;
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label for="height" class="col-md-5 col-6 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/height.svg') }}" alt="front" class="menu-img" /><span>Wysokość</span></label>
                                        <div class="col-md-3 col-5" style= "padding-left: 0px;">
                                            <select class="form-control">
                                                <option>50</option>
                                                <option>100</option>
                                                <option>150</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-1" style="padding-top: 7px; padding-left: 0px;">
                                            cm
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="height" class="col-md-5 col-6 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/width.svg') }}" alt="front" class="menu-img" /><span>Szerokość</span></label>
                                        <div class="col-md-3 col-5" style= "padding-left: 0px;">
                                            <select class="form-control">
                                                <option>50</option>
                                                <option>100</option>
                                                <option>150</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-1" style="padding-top: 7px; padding-left: 0px;">
                                            cm
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="height" class="col-md-5 col-6 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/depth.svg') }}" alt="front" class="menu-img" /><span>Głębokość</span></label>
                                        <div class="col-md-3 col-5" style= "padding-left: 0px;">
                                            <select class="form-control">
                                                <option>50</option>
                                                <option>100</option>
                                                <option>150</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-1" style="padding-top: 7px; padding-left: 0px;">
                                            cm
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection