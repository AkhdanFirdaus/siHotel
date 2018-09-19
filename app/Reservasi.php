<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function guest() {
    	return $this->belongsTo('App\Guest');
    }

    public function kamar() {
    	return $this->belongsTo('App\Kamar');
    }

    public function pembayaran() {
    	return $this->belongsTo('App\Pembayaran');	
    }

    public function feedback() {
        return $this->belongsTo('App\Feedback');  
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($reservasi) { // before delete() method call this
             $reservasi->user()->delete();
             $reservasi->guest()->delete();
             $reservasi->pembayaran()->delete();
             // do the rest of the cleanup...
        });
    }
}
