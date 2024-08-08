<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->text('description');
            $table->string('image', 100);
            $table->string('color', 15);
            $table->integer('stock')->length(5);
            $table->float('delivery_price', 8,2);
            $table->text('specifications');
            $table->float('minPrice', 8,2);
            $table->float('maxPrice',8,2);
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
        Schema::dropIfExists('products');
    }
}
