<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use JordanMiguel\LaravelPopular\Traits\Visitable;

class Album extends Model
{
    use Visitable;
    
    public function status() {
    	return $this->belongsTo('App\Models\Status');
    }

    public function musim() {
    	return $this->belongsTo('App\Models\Musim');
    }

    public function day() {
        return $this->belongsTo('App\Models\Day');
    }

    public function genres() {
    	return $this->belongsToMany('App\Models\Genre');
    }

    public function types() {
    	return $this->belongsToMany('App\Models\Type');
    }

    public function insights() {
        return $this->hasMany('App\Models\Insight');
    }

    public function videos() {
        return $this->hasMany('App\Models\Video');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
