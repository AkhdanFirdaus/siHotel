<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kamar');
            $table->integer('fasilitas_id')->unsigned();
            $table->integer('hotel_id')->unsigned();
            $table->integer('harga')->unsigned();
            $table->enum('status', ['Tersedia', 'Terisi']);
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
        Schema::dropIfExists('kamars');
    }
}
