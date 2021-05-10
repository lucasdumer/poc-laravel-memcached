<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price', 8, 2);
        });

        Schema::create('sale', function (Blueprint $table) {
            $table->increments('id');
            $table->date('created_at');
            $table->double('total_price', 8, 2);
        });

        Schema::create('sale_product', function (Blueprint $table) {
            $table->integer('sale_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->double('price', 8, 2);
            $table->double('total_price', 8, 2);
            $table->foreign('sale_id')->references('id')->on('sale');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sale_product');
        Schema::drop('sale');
        Schema::drop('product');
    }
}
