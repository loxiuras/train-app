<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
        'house_number',
        'house_number_extra',
        'postal_code',
        'city',
        'country',
    ];

    protected $hidden = [];

    protected $casts = [
        'seats' => 'integer',
    ];
}
