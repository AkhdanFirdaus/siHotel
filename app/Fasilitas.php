<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    public function kamars() {
    	return $this->belongsToMany('App\Kamar');
    }
}
