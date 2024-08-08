<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsOrderlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_orderlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderlist_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->foreign('orderlist_id')->references('id')->on('orderlists')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_orderlists');
    }
}
