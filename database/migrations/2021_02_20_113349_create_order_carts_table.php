<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            // keep it for history, since the price of product might change
            $table->integer('price');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('shop_orders')
                ->onDelete('CASCADE');

            $table->foreign('product_id')
                ->references('id')
                ->on('shop_products')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders_carts');
    }
}
