<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function album() {
    	return $this->belongsTo('App\Models\Album');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function replies() {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }
}
