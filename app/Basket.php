<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function basketProducts()
    {
        return $this->hasMany(BasketProducts::class);
    }

    public function getBasketIdForUser()
    {
        return auth()->user()->baskets()->select('id')->where('is_active', '=', 1)->first();
    }
}
