<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function kamar() {
    	return $this->hasMany('App\Kamar');
    }

    public function lokasi() {
    	return $this->belongsTo('App\Lokasi');
    }

    public function user() {
    	return $this->hasOne('App\User');
    }
}
