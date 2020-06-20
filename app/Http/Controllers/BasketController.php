<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketProducts;
use App\Product;
use App\ProductFeets;
use App\FrontType;
use Illuminate\Http\Request;
use AuthenticatesUsers;

class BasketController extends Controller
{
    private const MAIN_PRODUCT = 1;
    private const DEFAULT_VAT = 23;
    private const PARENT_TYPE = 1;
    private const NOZKA_TYPE = 2;
    private const FRONT_TYPE = 3;
    private const AKCESORIUM_TYPE = 4;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkIsBasket();
        $basketProducts = BasketProducts::with('children')->whereNull('parent')->where('type', '=', '1')->orderBy('type')->get();
        return view('front.basket')->with([
            'basketProducts' => $basketProducts,
        ]);
    }

    public function checkIsBasket()
    {
        $basket = auth()->user()->baskets->where('is_active', '=', 1)->first();
        if($basket == null)
        {
            $this->createBasket(auth()->user()->id);
        }
    }

    private function createBasket($userId)
    {
        $basket = new Basket;
        $basket->user_id = $userId;
        $basket->is_active = 1;
        $basket->save();
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
        if(is_numeric($request->product_id)
        && is_numeric($request->height)
        && is_numeric($request->width)
        && is_numeric($request->depth)
        && is_numeric($request->quantity)
        ) {
            //GET BASKET FOR USER
            $basketModel = new Basket;
            $basket = $basketModel->getBasketIdForUser();
            //TODO obsługa błędów
            //
            //GET Main product
            $mainProduct = Product::find($request->product_id);
            //
            if($mainProduct)
            {
                $parentProduct = new BasketProducts;
                $parentProduct->basket_id = $basket->id;
                $parentProduct->type = self::PARENT_TYPE;
                $parentProduct->data_1 = $request->height;
                $parentProduct->data_2 = $request->width;
                $parentProduct->data_3 = $request->depth;
                $parentProduct->product_name = $mainProduct->name;
                $parentProduct->quantity = $request->quantity;

                $price = 0;
                $price += ($request->height/$mainProduct->height) * ($mainProduct->price/3);
                $price += ($request->height/$mainProduct->width) * ($mainProduct->price/3);
                $price += ($request->height/$mainProduct->depth) * ($mainProduct->price/3);
                
                $parentProduct->product_price = $price;
                $parentProduct->vat = self::DEFAULT_VAT;

                $parentProduct->uwagi = $request->uwagi;
                $parentProduct->save();
            }

            if(is_numeric($request->nozki))
            {
                //GET nzoki todo sprawdzanie błędów
                $chosenLegs = ProductFeets::find($request->nozki);
                //
                $childrenLegs = new BasketProducts;
                $childrenLegs->basket_id = $basket->id;
                $childrenLegs->type = self::NOZKA_TYPE;
                $childrenLegs->data_1 = $chosenLegs->height;
                $childrenLegs->data_2 = $chosenLegs->min_height;
                $childrenLegs->data_3 = $chosenLegs->max_height;
                $childrenLegs->product_name = $chosenLegs->name;
                $childrenLegs->quantity = $mainProduct->product_feets * $parentProduct->quantity;
                $childrenLegs->product_price = $chosenLegs->price;
                $childrenLegs->vat = $chosenLegs->vat;
                $childrenLegs->parent = $parentProduct->id;
                $childrenLegs->save();
            }
            
            if(is_numeric($request->front))
            {
                //GET FRONT todo sprawdzanie błędów
                $chosenFront = FrontType::find($request->front);
                //
                $childrenFront = new BasketProducts;
                $childrenFront->basket_id = $basket->id;
                $childrenFront->type = self::FRONT_TYPE;
                $childrenFront->product_name = $chosenFront->name;
                $childrenFront->quantity = ($request->width * $request->height)/10000;
                $childrenFront->product_price = $chosenFront->price;
                $childrenFront->vat = self::DEFAULT_VAT;
                $childrenFront->parent = $parentProduct->id;
                $childrenFront->save();
            }

            if(is_numeric($request->akcesoria))
            {
                $akcesorium = new BasketProducts;

                switch ($request->akcesoria) {
                    case 1:
                        $akcesoriaName = "Blum system";
                        $akcesoriaPrice = 40.00;
                        break;
                    case 2:
                        $akcesoriaName = "Hafelle";
                        $akcesoriaPrice = 30.00;
                        break;
                    default:
                        # code...
                        break;
                }
                $akcesorium->basket_id = $basket->id;
                $akcesorium->type = self::AKCESORIUM_TYPE;
                $akcesorium->product_name = $akcesoriaName;
                $akcesorium->quantity = 1;
                $akcesorium->product_price = $akcesoriaPrice;
                $akcesorium->vat = self::DEFAULT_VAT;
                $akcesorium->parent = $parentProduct->id;
                $akcesorium->save();
            }
        }
        else {
            return 'error';
        }
        return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
    }
}
