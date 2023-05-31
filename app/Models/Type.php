<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function albums() {
    	return $this->belongsToMany('App\Models\Album');
    }
}
