<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('products_categories', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('product_id');
    //         $table->foreignId('category_id');

    //         $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    //         $table->foreign('category_id')->references('id')->on('categories');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('products_categories');
    }
}