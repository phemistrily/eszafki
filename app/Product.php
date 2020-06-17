<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productSubcategories()
    {
        return $this->belongsToMany(ProductSubcategory::class, 'subcat_for_prod');
    }
}
