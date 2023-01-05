<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name',
    ];

    protected $hidden = [];

    protected $casts = [];

    ##### RELATIONS #####

    public function trainTracks(): hasMany
    {
        return $this->hasMany(TrainTrackStation::class);
    }
}
