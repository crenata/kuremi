<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumType extends Model
{
    protected $table = 'album_type';

    public function album() {
    	return $this->belongsTo('App\Models\Album');
    }
}
