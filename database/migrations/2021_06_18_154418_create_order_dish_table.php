<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order_dish', function (Blueprint $table) {
        $table->unsignedBigInteger('dish_id');
        $table->foreign('dish_id')
              ->references('id')
              ->on('dishes');

        $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')
              ->references('id')
              ->on('orders');

        $table->smallInteger('quantity');
        
        $table->primary(['dish_id', 'order_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_dish');
    }
}
