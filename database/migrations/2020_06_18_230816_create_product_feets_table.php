<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('height');
            $table->integer('min_height');
            $table->integer('max_height');
            $table->decimal('price', 8, 2);
            $table->integer('vat')->default(23);
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
        Schema::dropIfExists('product_feets');
    }
}
