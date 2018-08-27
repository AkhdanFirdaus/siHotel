<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_staff')->unsigned();
            $table->integer('id_tamu')->unsigned();
            $table->dateTime('tglReservasi');
            $table->dateTime('check_in');
            $table->dateTime('check_on');
            $table->integer('jml_partisipan')->unsigned();
            $table->integer('id_kamar')->unsigned();
            $table->integer('id_pembayaran')->unsigned();
            $table->timestamps();
        });
        Schema::table('reservasis', function ($table) {
            $table->foreign('id_staff')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tamu')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
            $table->foreign('id_pembayaran')->references('id')->on('pembayarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservasis', function(Blueprint $table) {
            $table->dropColumn(['id_staff']);
            $table->dropColumn(['id_tamu']);
            $table->dropColumn(['id_kamar']);
            $table->dropColumn(['id_pembayaran']);
        });
        Schema::dropIfExists('reservasis');        
    }
}
