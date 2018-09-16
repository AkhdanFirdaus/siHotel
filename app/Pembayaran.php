<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public function reservasi() {
    	return $this->hasOne('App\Reservasi');
    }
}
