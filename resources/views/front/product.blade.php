@extends('layouts.app')

@section('content')
<div id="app">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row bread-navigation">
                <div class="col-12" style="padding-left: 0px;">
                    <img class="gray return_arrow" src="{{ asset('img/common/left_arrow.svg') }}" alt="powróć" style="float: left;">
                
                    <div class="gray" style="display: flex; margin-left: 65px;height: 58px;">
                        <div style="margin-left: 30px; margin-top: 19px;">
                            {{ $productCategory['name'] }} / {{ $productSubcategory['name'] }} / <b>{{ $product['name'] }}</b>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/basket/product" method="POST">
                @csrf
                <input type="hidden" value={{ $product['id'] }} name="product_id" />
            <div class="row py-4">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset("/img/product/exampleProduct.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="gray pt-2" style="width: calc(100% - 15px);">
                                <div class="container pt-4 pl-4" style="marign-right: 15px;">
                                    <h2>{{ $product['name'] }}</h2>
                                    <div class="row">
                                        <div class="col-12">&nbsp;
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label for="front" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;"><img style="padding-left: 5px; padding-right: 13px;" src="{{ asset('img/product/front.svg') }}" alt="front" class="menu-img" /><span>Front</span></label>
                                                <selected-front :selected="selectedFront"></selected-front>
                                                <div class="col-md-2 col-2" style="padding-left: 0px; padding-right: 0px;">
                                                    <button type="button" class="btn btn-secondary" style="margin-top: -5px;" data-toggle="modal" data-target="#frontModal">
                                                        Wybierz
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="height" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/height.svg') }}" alt="height" class="menu-img" /><span>Wysokość</span></label>
                                                <div class="col-md-3 col-6" style= "padding-left: 0px;">
                                                    <select name="height" class="form-control">
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
                                                <label for="width" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/width.svg') }}" alt="width" class="menu-img" /><span>Szerokość</span></label>
                                                <div class="col-md-3 col-6" style= "padding-left: 0px;">
                                                    <select name="width" class="form-control">
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
                                                <label for="depth" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;"><img src="{{ asset('img/product/depth.svg') }}" alt="depth" class="menu-img" /><span>Głębokość</span></label>
                                                <div class="col-md-3 col-6" style= "padding-left: 0px;">
                                                    <select name="depth" class="form-control">
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
                                                <label for="height" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;">
                                                    <img src="{{ asset('img/product/nozka.svg') }}" alt="nóżka" class="menu-img" />
                                                    <span>Nóżki</span></label>
                                                <div class="col-md-5 col-xs-8 col-5" style= "padding-top: 7px; padding-left: 0px;">
                                                    <input type="hidden" name="nozki" value="1" />
                                                    <span><b>125 cm</b> (regulacja 114-145)</span>
                                                </div>
                                                <div class="col-md-2 col-xs-4 col-2" style="padding-top: 7px; padding-left: 0px;">
                                                    <button type="button" class="btn btn-secondary" style="margin-top: -11px;" data-toggle="modal" data-target="#nozkiModal">
                                                        Wybierz
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="height" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;">
                                                    <img style="padding-right: 8px;" src="{{ asset('img/product/doors.svg') }}" alt="akcesoria" class="menu-img" />
                                                    <span>Akcesoria</span></label>
                                                <div class="col-md-7 col-xs-12 col-7" style= "margin-top: -5px; padding-left: 0px;">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-light active">
                                                          <input class="form-radio" type="radio" name="akcesoria" id="1" value="1" checked> Blum system
                                                        </label>
                                                        <label class="btn btn-light">
                                                          <input class="form-radio" type="radio" name="akcesoria" id="2" value="2" > Hafelle
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="height" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;">
                                                    <img style="padding-right: 13px;" src="{{ asset('img/product/doors2.svg') }}" alt="akcesoria" class="menu-img" />
                                                    <span>Drzwiczki</span></label>
                                                <div class="col-md-7 col-xs-12 col-7" style= "padding-top: 7px; padding-left: 0px;">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-light active">
                                                          <input class="form-radio" type="radio" name="doors" id="1" value="1" checked> Lewe
                                                        </label>
                                                        <label class="btn btn-light">
                                                          <input class="form-radio" type="radio" name="doors" id="2" value="2"> Prawe
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="height" class="col-md-4 col-xs-12 col-5 col-form-label" style="padding-top: 2px;"><span style="padding-left: 35px;">Uwagi</span></label>
                                                <div class="col-md-7 col-xs-12 col-7" style= "padding-top: 7px; padding-left: 0px;">
                                                    <textarea class="form-control" name="uwagi" placeholder="Uwagi do wybranej pozycji" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row py-4 row justify-content-end">
            
            <div class="col-md-6">
                <div class="row">
                    <product-summary></product-summary>
                </div>
            </div>
        </div>
        </form>
        </div>
<!-- Modal -->
<div class="modal fade" id="frontModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <product-front @modal-select-front="selectFront" :fronts="{{ $fronts }}"></product-front>
</div>

<!-- Modal -->
<div class="modal fade" id="nozkiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>

</div> <!-- end app -->
@endsection