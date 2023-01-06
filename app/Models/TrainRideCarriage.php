<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainRideCarriage extends Model
{
    use HasFactory;

    protected $fillable = [
        'train_ride_id',
        'carriage_id',
    ];

    protected $hidden = [];

    protected $casts = [];

    ##### RELATIONS #####

    public function trainRide(): belongsTo
    {
        return $this->belongsTo(TrainRide::class);
    }

    public function carriage(): belongsTo
    {
        return $this->belongsTo(Carriage::class);
    }
}
