<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Country as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Country extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];
}
