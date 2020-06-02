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
        ProductCategory::create(['name' => 'Meble kuchenne', 'slug' => 'meble_kuchenne']);
        ProductCategory::create(['name' => 'Meble łazienkowe', 'slug' => 'meble_lazienkowe']);
        ProductCategory::create(['name' => 'Szafy przesuwne', 'slug' => 'szafy_przesuwne']);
        ProductCategory::create(['name' => 'Metaloplastyka', 'slug' => 'metaloplastyka']);
        ProductCategory::create(['name' => 'Meble do salonu', 'slug' => 'meble_do_salonu']);
        ProductCategory::create(['name' => 'Meble do przedpokoju', 'slug' => 'meble_do_przedpokoju']);
        ProductCategory::create(['name' => 'Meble', 'slug' => 'meble']);
        ProductCategory::create(['name' => 'Też Meble', 'slug' => 'tez_meble']);
    }
}
