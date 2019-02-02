<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
	protected $fillable = ['status'];

    public function fasilitas() {
    	return $this->belongsTo('App\Fasilitas');
    }

    public function hotel() {
    	return $this->belongsTo('App\Hotel');
    }

    public function reservasi() {
    	return $this->hasMany('App\Reservasi');
    }
}
