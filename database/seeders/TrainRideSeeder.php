<?php

namespace Database\Seeders;

use App\Models\TrainRide;
use App\Models\TrainTrack;
use Illuminate\Database\Seeder;

class TrainRideSeeder extends Seeder
{
    private int $secondsPerSubStation = 240;

    public function run(): void
    {
        $this->createTrainRide(1, 1, [1, 2, 3, 4, 5]);
        $this->createTrainRide(2, 2, [6, 7, 8, 9, 10]);
        $this->createTrainRide(3, 3, [36, 37, 38, 39, 40]);
    }

    private function createTrainRide(int $trainId, int $trainTrackId, array $carriageIds = null): void
    {
        $trainTrack = TrainTrack::find($trainTrackId);

        $stations = $trainTrack->trainTrackStations;
        $durationInSeconds = (count($stations) - 1) * $this->secondsPerSubStation;

        $trainRide = TrainRide::updateOrCreate([
            'number' => rand(100000000, 999999999),
            'train_id' => $trainId,
            'train_track_id' => $trainTrackId,
        ], [
            'start_at' => now(),
            'end_at' => now()->addSeconds($durationInSeconds),
        ]);

        if (!is_null($carriageIds)) {
            foreach ($carriageIds as $carriageId) {
                $trainRide->carriages()->updateOrCreate([
                    'carriage_id' => $carriageId,
                ], []);
            }
        }
    }
}
