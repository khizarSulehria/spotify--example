<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'user_id',
        'playlist_id'
    ];
}
