<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $fillable = ['nama', 'email', 'kontak'];
    public function reservasi() {
    	return $this->hasOne('App\Reservasi');
    }
}
