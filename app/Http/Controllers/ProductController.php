<?php

namespace App\Http\Controllers;

use App\Product;
use App\FrontType;
use App\ProductFeets;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $fronts = FrontType::all();
        $nozki = ProductFeets::all();
        return view('front.product')->with([
            'product' => $product,
            'productSubcategory' => $product->productSubcategories[0],
            'productCategory' => $product->productSubcategories[0]->productCategory,
            'fronts' => $fronts,
            'feets' => $nozki
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function getProductPrice(Request $productId)
    {
        $parms = $productId->all();
        //width, height, depth, akcesoria, front, nozki, priceGroup
        $mainProduct = Product::find($productId->productId);
        $price = 0;
        $brutto = 0;
        $price += ($parms['height']/$mainProduct->height) * ($mainProduct->price/3);
        $price += ($parms['width']/$mainProduct->width) * ($mainProduct->price/3);
        $price += ($parms['depth']/$mainProduct->depth) * ($mainProduct->price/3);
        $price *= $parms['quantity'];
        $brutto = $price * ((100+$mainProduct->vat)/100);
        if(isset($parms['nozki']) && is_numeric($parms['nozki'])) {
            $chosenLegs = ProductFeets::find($parms['nozki']);
            $price += (($chosenLegs->price * $mainProduct->product_feets) * $parms['quantity']);
            $brutto += (($chosenLegs->price * ((100+$chosenLegs->vat)/100) * $mainProduct->product_feets) * $parms['quantity']);
        }

        if(isset($parms['front']) && is_numeric($parms['front'])) {
            $chosenFront = FrontType::find($parms['front']);
            $price += $chosenFront->price;
            $brutto += ($chosenFront->price * 1.23);
        }

        if(isset($parms['akcesoria']) && is_numeric($parms['akcesoria'])) {
            switch ($parms['akcesoria']) {
                case '1':
                    $price += 40.00;
                    $brutto += (40.00 * 1.23);
                    break;
                case '2':
                    $price += 30.00;
                    $brutto += (30.00 * 1.23);
                    break;
                default:
                    # code...
                    break;
            }
        }

        if(isset($parms['price_group']) && is_numeric($parms['price_group'])) {
            switch ($parms['price_group']) {
                case '1':
                    $price *=1;
                    $brutto *=1;
                    break;
                case '2':
                    $price *=0.7;
                    $brutto *= 0.7;
                    break;
                default:
                    
                    break;
            }
        }
        return response()->json([
            'netto' => round($price,2),
            'brutto' => round($brutto,2)
        ]);
    }
}
