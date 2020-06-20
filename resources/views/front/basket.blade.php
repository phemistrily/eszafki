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
            <h1 class="ml-5 py-2"><b>Produkty</b></h1>
            <div class="table-responsive">
                <table class="table basket-table">
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
                        @foreach($basketProducts as $index => $product)
                        @php
                            $totalNetto = $product->product_price;
                            $totalBrutto = $product->product_price*((100+$product->vat)/100);
                        @endphp
                        @foreach ($product['children'] as $element)
                            @php
                                $totalNetto += $element->product_price*$element->quantity;
                                $totalBrutto += $element->product_price*$element->quantity*((100+$element->vat)/100);
                            @endphp
                        @endforeach
                        <tr class="collapsed" data-toggle="collapse" href="#collapseExample{{ $product['id'] }}" role="button" aria-expanded="true" aria-controls="collapseExample{{ $product['id'] }}">
                            <td scope="row">{{ $index+1 }}</td>
                            <td><img src=""></td>
                            <td><b>{{ $product->product_name }}</b></td>
                            <td><b>{{ number_format($totalNetto,2) }}</b> PLN</td>
                            <td><b>{{ number_format($totalBrutto,2) }}</b> PLN</td>
                            <td>
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>                                  
                            </td>
                            <td><b>{{ number_format($totalBrutto*$product->quantity,2) }}</b> PLN</td>
                            <td><button class="btn btn-link"><img src="{{ asset('img/common/trash.svg') }}" alt="usuń"></button></td>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection