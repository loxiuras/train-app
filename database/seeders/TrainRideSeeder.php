<?php

namespace Database\Seeders;

use App\Models\Train;
use App\Models\TrainRide;
use App\Models\TrainTrack;
use Illuminate\Database\Seeder;

class TrainRideSeeder extends Seeder
{
    private int $secondsPerSubStation = 240;

    public function run(): void
    {
        $this->createTrainRide(1, 1);
        $this->createTrainRide(2, 2);
        $this->createTrainRide(3, 3);
    }

    private function createTrainRide(int $trainId, int $trainTrackId): void
    {
        $trainTrack = TrainTrack::find($trainTrackId);

        $stations = $trainTrack->trainTrackStations;
        $durationInSeconds = (count($stations) - 1) * $this->secondsPerSubStation;

        TrainRide::updateOrCreate([
            'number' => rand(100000000, 999999999),
            'train_id' => $trainId,
            'train_track_id' => $trainTrackId,
        ], [
            'start_at' => now(),
            'end_at' => now()->addSeconds($durationInSeconds),
        ]);
    }
}
