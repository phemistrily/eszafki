<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesForProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcat_for_prod', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('product_subcategory_id')->unsigned();
            $table->primary(array('product_id','product_subcategory_id'));
            // $table->foreign('product_id')->references('id')->on('products');
            // $table->foreign('product_subcategory_id')->references('id')->on('product_subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcat_for_prod');
    }
}
