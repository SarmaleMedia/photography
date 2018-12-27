<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'photo_slug', 'photo_file', 'photo_date', 'photo_location', 'user_id',
    ];
}
