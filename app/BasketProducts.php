<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketProducts extends Model
{
    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }

    
    public function children()
    {
        return $this->hasMany(BasketProducts::class, 'parent');
    }
}
