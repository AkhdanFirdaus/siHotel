<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('slug');
            $table->integer('lokasi_id')->unsigned();
            $table->string('hotel_image')->default('default.png');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('rekening');
            $table->string('no_rekening');
            $table->string('moto');
            $table->timestamps();
        });

        Schema::table('kamars', function ($table) {
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
