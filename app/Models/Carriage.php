<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carriage extends Model
{
    use HasFactory;

    public const CLASS_TYPE_FIRST = 'first';
    public const CLASS_TYPE_SECOND = 'second';
    public const CLASS_TYPE_mixed = 'mixed';

    protected $fillable = [
        'number',
        'seats',
    ];

    protected $hidden = [];

    protected $casts = [
        'seats' => 'integer',
    ];
}
