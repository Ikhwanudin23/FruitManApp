<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_seller')->unsigned();
            $table->string('fruit_name','50');
            $table->text('description');
            $table->text('image')->nullable();
            $table->integer('price');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_seller')->references('id')->on('sellers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postings');
    }
}
