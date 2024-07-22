<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'code',
        'tw',
        'en',
        'locale',
        'zh',
        'lat',
        'lng',
        'emoji',
    ];
}
