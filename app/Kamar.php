<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    public function fasilitas() {
    	return $this->belongsTo('App\Fasilitas');
    }

    public function hotel() {
    	return $this->belongsTo('App\Hotel');
    }
}
