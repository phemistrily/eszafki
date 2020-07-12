@extends('layouts.app')

@section('content')
<div id="app">
    <div class="row justify-content-center" id="product-page">
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
            <form id="product-form" action="/basket/product" method="POST">
                @csrf
                <input type="hidden" value={{ $product['id'] }} name="product_id" />
            <div class="row py-4">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 px-0 pb-4">
                            <img class="col-12 pl-0" src="{{ asset("/img/product/exampleProduct.png") }}" alt="">
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
                                                <selected-nozka :selected="selectedNozki"></selected-nozka>
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
                <div class="row mt-4">
                <div class="gray pl-5 pt-4 pb-0" style="width: calc(100% - 15px);">
                    <product-summary></product-summary>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-5 col-form-label" style="padding-top: 20px;"><span>Liczba sztuk</span></label>
                            <div class="col-md-8 col-7" style= "padding-left: 0px;">
                                <div class="input-group">
                                    <input type="button" @click="substractQuantity" value="-" class="button-minuss" data-field="quantity">
                                    <input type="number" step="1" min="1" v-bind:value="quantity" @input="setQuantity" @change="setQuantity" name="quantity" class="quantity-field">
                                    <input type="button" @click="additionQuantity" value="+" class="button-pluss" data-field="quantity">
                                    <button class="btn btn-primary" type="submit" style="margin-top: -5px;">
                                        <img src="/img/common/cart.svg" alt="dodaj do koszyka"> Dodaj do koszyka
                                    </button>
                                </div>       
                            </div>
                        </div>
                    </div>
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
    <product-nozki @modal-select-nozki="selectNozki" :nozki="{{ $feets }}"></product-nozki>
</div>

<div class="modal fade" id="summary-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Dodano produkt do koszyka</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row my-5">
                <div class="col-md-3 col-12"></div>
                <div class="col-md-9 col-12">
                    <div class="row mb-5">
                        <div class="col-12">
                            <b style="font-size: 24px;">Szafka wisząca prosta</b>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-4">
                                    Wymiary <br />
                                    Nóżki <br />
                                    Front <br />
                                    <br />
                                    Akcesoria <br />
                                    Drzwiczki <br />
                                    Uwagi <br />
                                </div>
                                <div class="col-8">
                                    <b><span id="summary-dimensions"></span><br />
                                    <span id="summary-nozki"></span><br />
                                    <span id="summary-front"></span><br />
                                    <br />
                                    <span id="summary-akcesoria"></span><br />
                                    <span id="summary-doors"></span><br />
                                    <span id="summary-uwagi"></span><br /></b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-4">
                                    Brutto <br />
                                    Netto <br />
                                    <br />
                                    Ilość <br />
                                </div>
                                <div class="col-8 align-right">
                                    <b><span id="summary-brutto"></span><br />
                                    <span id="summary-netto"></span><br />
                                    <br />
                                    <span id="summary-quantity"></span><br /></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Dodaj kolejny produkt</button>
            <button type="button" class="btn btn-primary change-form" data-dismiss="modal">Zobacz koszyk</button>
        </div>
        </div>
    </div>
</div>
</div> <!-- end app -->
@endsection