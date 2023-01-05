<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    public const FUEL_TYPE_ELECTRIC = 'electric';

    public const FUEL_TYPE_DIESEL = 'diesel';

    protected $fillable = [
        'number',
        'brand',
        'type',
        'drive',
        'fuel_type',
        'horse_power',
    ];

    protected $hidden = [];

    protected $casts = [];
}
