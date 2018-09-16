<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function users() {
    	return $this->belongsToMany('App\User');
    }
}
