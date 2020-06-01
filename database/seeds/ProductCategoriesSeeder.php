<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::truncate();
        ProductCategory::create(['name' => 'Meble kuchenne']);
        ProductCategory::create(['name' => 'Meble łazienkowe']);
        ProductCategory::create(['name' => 'Szafy przesuwne']);
        ProductCategory::create(['name' => 'Metaloplastyka']);
        ProductCategory::create(['name' => 'Meble do salonu']);
        ProductCategory::create(['name' => 'Meble do przedpokoju']);
        ProductCategory::create(['name' => 'Meble ']);
        ProductCategory::create(['name' => 'Też Meble']);
    }
}
