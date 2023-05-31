<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumGenre extends Model
{
    protected $table = 'album_genre';

    public function album() {
    	return $this->belongsTo('App\Models\Album');
    }
}
