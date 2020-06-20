<?php

use Illuminate\Database\Seeder;
use App\ProductSubcategory;
use App\Product;

class ProductSubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_subcategories')->delete();
        ProductSubcategory::create(['name' => 'Meble kuchenne Dziecko', 'slug' => 'meble_kuchenne_dziecko', 'product_category_id' => '1']);
        DB::table('products')->delete();
        DB::table('subcat_for_prod')->delete();
        Product::create(['name' => 'Produkt testowy', 'width' => 100, 'height' => 100, 'depth' => 100, 'price' => 40.30]);
    }
}
