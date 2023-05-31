<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use JordanMiguel\LaravelPopular\Traits\Visitable;

class Video extends Model
{
	use Visitable;

    public function album() {
    	return $this->belongsTo('App\Models\Album');
    }
}
