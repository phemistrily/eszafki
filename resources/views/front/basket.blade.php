@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
      <div class="row bread-navigation">
          <div class="col-12 gray" style="padding-left: 0px;">
                <div class="ml-5" style=" margin-top: 19px; height: 38px;">
                    Twój koszyk
                </div>
          </div>
        </div>
        <div class="row py-4">
            <h2 class="ml-5 py-2"><b>Produkty</b></h2>
            <div class="table-responsive accordion-group" id="basket-products">
                <table class="table basket-table" >
                    <thead>
                    <tr>
                        <th scope="col">Lp.</th>
                        <th scope="col"></th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Cena Netto</th>
                        <th scope="col">Cena Brutto</th>
                        <th scope="col">Ilość</th>
                        <th scope="col">Wartość Brutto</th>
                        <th scope="col">Usuń</th>
                        <th scope="col">Szczegóły</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $totalNetto = 0; $totalBrutto = 0; $totalQuantity = 0; $totalCalc = 0; $totalCalcNetto = 0;@endphp
                        @if (!empty($basketProducts))
                        @foreach($basketProducts as $index => $product)
                        @php
                            $totalNetto = $product->product_price;
                            $totalBrutto = $product->product_price*((100+$product->vat)/100);
                            $totalQuantity += $product->quantity;
                            $totalCalcNetto += $product->product_price*$product->quantity;
                        @endphp
                        @if (!empty($product))
                        @foreach ($product['children'] as $element)
                            @php
                                $totalNetto += ($element->product_price*$element->quantity)/$product->quantity;
                                $totalBrutto += ($element->product_price*$element->quantity*((100+$element->vat)/100))/$product->quantity;
                                
                                $totalCalcNetto += $element->product_price*$element->quantity;
                            @endphp
                        @endforeach
                        @endif
                        <tr class="collapsed" data-id="{{ $product->id }}" data-toggle="collapse" data-parent="#basket-products" href="#collapseExample{{ $product['id'] }}" role="button" aria-expanded="true" aria-controls="collapseExample{{ $product['id'] }}">
                            <td scope="row">{{ $index+1 }}</td>
                            <td><img src=""></td>
                            <td><b>{{ $product->product_name }}</b></td>
                            <td><b>{{ round($totalNetto,2) }}</b> PLN</td>
                            <td><b>{{ round($totalBrutto,2) }}</b> PLN</td>
                            <td>
                                <div class="input-group no-collapsable">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="{{ (int) $product->quantity }}" name="quantity" class="quantity-field" disabled>
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>                                  
                            </td>
                            @php $totalCalc += round($totalBrutto*$product->quantity,2); @endphp
                            <td class="total-brutto"><b>{{ number_format(round($totalBrutto*$product->quantity,2),2) }}</b> PLN</td>
                            <td><button class="btn btn-link delete-product no-collapsable" style="z-index: 2;"><img src="{{ asset('img/common/trash.svg') }}" alt="usuń"></button></td>
                            <td>
                                    <span class="if-collapsed"><img src="{{ asset('img/common/plus.svg') }}" alt="rozwiń"> <b>Rozwiń</b></span>
                                    <span class="if-not-collapsed"><img src="{{ asset('img/common/minus.svg') }}" alt="rozwiń"> <b>Zwiń</b></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 0;"></td>   
                            <td colspan="7" style="padding: 0;">
                                <div class="my-4 collapse" id="collapseExample{{ $product['id'] }}">
                                <div class="row">
                                    <div class="col-1">Wymiary</div>
                                    <div class="col-10">
                                        <b>{{ $product['data_1'] }} x {{ $product['data_2'] }} x {{ $product['data_3'] }}</b>
                                    </div>
                                </div>
                                @if (!empty($product['children']))
                                
                                @foreach ($product['children'] as $element)
                                @switch($element['type'])
                                    @case(2)
                                        <div class="row">
                                            <div class="col-1">Nóżki</div>
                                            <div class="col-10">
                                                <b>{{ $element['data_1'] }} cm</b>@if ($element['data_2'] != null && $element['data_3'] != null)
                                                    regulacja ({{ $element['data_2'] }}-{{ $element['data_3'] }}) cm
                                                @endif
                                            </div>
                                        </div>
                                        @break
                                    @case(3)
                                        <div class="row">
                                            <div class="col-1">Front</div>
                                            <div class="col-10">
                                                <b>{{ $element['product_name'] }}</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                &nbsp;
                                            </div>
                                        </div>
                                        @break
                                    @case(4)
                                        <div class="row">
                                            <div class="col-1">Akcesoria</div>
                                            <div class="col-10">
                                                <b>{{ $element['product_name'] }}</b>
                                            </div>
                                        </div>
                                        @break
                                    @default
                                        
                                @endswitch
                                @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-1">Uwagi</div>
                                    <div class="col-10">
                                        <b>@if ($product['uwagi'] != null)
                                            {{ $product['uwagi'] }}
                                        @else
                                            Brak
                                        @endif</b>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="dark-gray">
                            <td colspan="5" class="align-right py-3">
                                Razem produktów
                            </td>
                            <td class="py-3">
                                {{ (int) $totalQuantity }}
                            </td>
                            <td  class="py-3">
                                Razem brutto
                            </td>
                            <td colspan="2" class="py-3 align-center">
                                <span style="font-size: 24px;"><b id="brutto-price"><span class="brutto-change">{{ number_format(round($totalCalc,2),2, ".", "") }}</span> <span style="color: #F1BC32;">PLN</span></b></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <h2 class="ml-5 py-5"><b>Dodatkowe usługi</b></h2>
            <div class="table-responsive accordion-group" id="basket-products">
                <table class="table basket-table" >
                    <thead>
                        <tr>
                            <td>Aktywuj</td>
                            <td colspan="3">Nazwa Usługi</td>
                            <td>Cena netto</td>
                            <td>Cena brutto</td>
                            <td>Szczegóły</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-12">
                <div class="row ">
                    <div class="col-md-6 col-12 order-md-12 align-right gray">
                        <div class="row my-4">
                            <div class="col-md-2 sm-hidden"></div>
                            <div class="col-md-4 col-4">
                                <div style="font-size: 14px; margin-top: 5px;">Do zapłaty</div><br />
                                Netto <br />
                            </div>
                            <div class="col-md-6 col-8">
                                <span style="font-size: 24px;"><b id="brutto-price"><span class="brutto-change">{{ number_format(round($totalCalc,2),2, ".", "") }}</span> <span style="color: #F1BC32;">PLN</span></b></span> <br/>
                                <div style ="margin-top: 12px;"><b>{{ round($totalCalcNetto,2) }}</b> PLN</div>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-9 mt-5"><button class="btn btn-primary" data-toggle="modal" data-target="#orderModal"><img src="/img/product/message.svg" /> POTWIERDŹ ZAMÓWIENIE</button></span></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 order-md-1 gray">
                        <div class="row my-4">
                            <div class="col-12">
                                <h2>Podsumowanie</h2>
                                <span style="font-size: 14px;">Produkty <b><span class="brutto-change">{{ number_format(round($totalCalc,2),2, ".", "") }}</span></b> PLN <br />
                                Dodatkowe usługi <b>0,00</b> PLN <br /></span>
                                <br/>
                                <br/>
                                <a href="/"><button class="btn btn-secondary">
                                <img class="" style="padding-right: 5px;" src="{{ asset('img/common/left_arrow.svg') }}" alt="powróć" style="float: left;">
                                WRÓĆ DO ZAKUPÓW</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><b>Czy na pewno chcesz potwierdzić zamówienie</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NIE, POWRÓĆ DO EDYCJI</button>
            <button type="button" class="btn btn-primary send-basket" data-id="{{ $basket->id }}" data-dismiss="modal">TAK, POTWIERDZAM ZAMÓWIENIE</button>
        </div>
        </div>
    </div>
</div>
@endsection