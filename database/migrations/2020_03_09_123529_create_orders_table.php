<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_seller')->unsigned();
            $table->integer('id_fruitCollector')->unsigned();
            $table->integer('bid_price');
            $table->enum('status',['1','0']);
            $table->timestamps();

            $table->foreign('id_seller')->references('id')->on('sellers')->onDelete('CASCADE');
            $table->foreign('id_fruitCollector')->references('id')->on('fruit_collectors')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
