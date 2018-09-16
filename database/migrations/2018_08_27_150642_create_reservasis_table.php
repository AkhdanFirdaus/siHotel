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
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('guest_id')->unsigned()->nullable();
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('jml_partisipan')->unsigned();
            $table->integer('kamar_id')->unsigned();
            $table->integer('feedback_id')->unsigned()->nullable();
            $table->integer('pembayaran_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('reservasis', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->foreign('pembayaran_id')->references('id')->on('pembayarans')->onDelete('cascade');
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
            $table->dropColumn(['user_id']);
            $table->dropColumn(['guest_id']);
            $table->dropColumn(['kamar_id']);
            $table->dropColumn(['pembayaran_id']);
        });
        Schema::dropIfExists('reservasis');        
    }
}
