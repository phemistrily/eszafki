<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_products', function (Blueprint $table) {
            $table->id();
            $table->integer('basket_id')->unsigned();
            $table->integer('type')->default(1);
            $table->integer('data_1')->nullable();
            $table->integer('data_2')->nullable();
            $table->integer('data_3')->nullable();
            $table->string('product_name');
            $table->decimal('quantity', 9 ,2);
            $table->decimal('product_price', 8, 2);
            $table->integer('vat')->default(23);
            $table->integer('parent')->nullable();
            $table->string('uwagi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_products');
    }
}
