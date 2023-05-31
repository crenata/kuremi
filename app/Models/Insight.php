<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    public function album() {
    	return $this->belongsTo('App\Models\Album');
    }

    public function peran() {
    	return $this->belongsTo('App\Models\Peran');
    }

    public function negara() {
    	return $this->belongsTo('App\Models\Negara');
    }
}
