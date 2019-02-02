<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('kode_booking');
            $table->text('kode_verifikasi');
            $table->string('pin')->unique()->nullable();
            $table->float('jumlahPembayaran')->nullable();
            $table->string('tipePembayaran')->nullable();
            $table->string('no_rekening')->nullable();
            $table->enum('status', ['Tunggu', 'Uang Muka', 'Lunas']);
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
        Schema::dropIfExists('pembayarans');
    }
}
