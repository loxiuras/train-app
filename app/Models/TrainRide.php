<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainRide extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'train_track_id',
        'direction',
        'train_id',
        'start_at',
        'end_at',
    ];

    protected $hidden = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    ##### RELATIONS #####

    public function trainTrack(): belongsTo
    {
        return $this->belongsTo(TrainTrack::class);
    }

    public function train(): belongsTo
    {
        return $this->belongsTo(Train::class);
    }

    public function carriages(): hasMany
    {
        return $this->hasMany(TrainRideCarriage::class);
    }
}
