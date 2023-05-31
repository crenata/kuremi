<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function albums() {
    	return $this->hasMany('App\Models\Album');
    }
}
