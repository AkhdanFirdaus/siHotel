<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe');
            $table->mediumText('deskripsi');
            $table->float('harga');
            $table->timestamps();
        });
        Schema::table('kamars', function ($table) {
            $table->foreign('id_fasilitas')->references('id')->on('fasilitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas');
        Schema::table('kamars', function (Blueprint $table) {
            $table->dropColumn(['id_fasilitas']);
        });
    }
}
