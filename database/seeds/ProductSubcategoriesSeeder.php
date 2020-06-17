<?php

use Illuminate\Database\Seeder;
use App\ProductSubcategory;

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
    }
}
