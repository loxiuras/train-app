<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'long',
        'lat',
    ];

    protected $hidden = [];

    protected $casts = [
        'seats' => 'integer',
    ];

    ##### RELATIONS #####

    public function trainTracks(): hasMany
    {
        return $this->hasMany(TrainTrackStation::class);
    }
}
