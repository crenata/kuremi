<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    public function insight() {
    	return $this->hasMany('App\Models\Insight');
    }
}
