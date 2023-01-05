<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\TrainTrack;
use Illuminate\Database\Seeder;

class TrainTrackSeeder extends Seeder
{
    public function run(): void
    {
        $this->createTrainTrack(1, 2);
        $this->createTrainTrack(3, 4);
    }

    private function createTrainTrack(int $startStationId, int $endStationId): void
    {
        $startStation = Station::findOrFail($startStationId);
        $endStation = Station::findOrFail($endStationId);

        $trackName = "$startStation->name - $endStation->name";
        $amountOfStations = strlen($trackName) / 5;
        if ($amountOfStations <= 3) {
            $amountOfStations = 5;
        }

        $trainTrack = TrainTrack::updateOrCreate([
            'number' => md5($startStation->name.$endStation->name),
        ], [
            'name' => "Track _ $trackName",
        ]);

        $trainTrack->trainTracks()->updateOrCreate(['station_id' => $startStationId], ['order' => 0]);

        for ($i = 1; $i < ($amountOfStations + 1); $i++) {
            $station = Station::updateOrCreate([
                'name' => "$trackName - Sub station #$i",
            ], [
                'country' => $this->getCountryBasedOnStartAndEndStationsAndAmount(
                    $startStation,
                    $endStation,
                    $amountOfStations,
                    $i,
                ),
            ]);

            $trainTrack->trainTracks()->updateOrCreate(['station_id' => $station->id], ['order' => $i]);
        }

        $trainTrack->trainTracks()->updateOrCreate(['station_id' => $endStationId], ['order' => $amountOfStations + 1]);
    }

    private function getCountryBasedOnStartAndEndStationsAndAmount(Station $startStation, Station $endStation, int $amountOfSubStations, int $currentStation): string
    {
        if ($startStation->country === $endStation->country) {
            return $startStation->country;
        }

        if ($currentStation > ($amountOfSubStations / 2)) {
            return $endStation->country;
        }

        return $startStation->country;
    }
}
