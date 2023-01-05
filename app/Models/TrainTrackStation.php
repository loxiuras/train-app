<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainTrackStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_track_id',
        'station_id',
        'order',
    ];

    protected $hidden = [];

    protected $casts = [];

    ##### RELATIONS #####

    public function trainTrack(): belongsTo
    {
        return $this->belongsTo(Station::class);
    }

    public function station(): belongsTo
    {
        return $this->belongsTo(Station::class);
    }
}
