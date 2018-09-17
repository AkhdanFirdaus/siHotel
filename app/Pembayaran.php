<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
	protected $fillable = ['kode_booking', 'kode_verifikasi', 'pin', 'jumlahPembayaran', 'tipePembayaran', 'status'];
	protected $primaryKey = 'id';
    public function reservasi() {
    	return $this->hasOne('App\Reservasi');
    }
}
