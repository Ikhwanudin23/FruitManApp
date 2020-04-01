<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFruitCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fruit_collectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','50');
            $table->string('email','50')->unique();
            $table->text('password');
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->enum('status',['1','0']);
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
        Schema::dropIfExists('fruit_collectors');
    }
}
