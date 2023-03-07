<?php

namespace App\Console\Commands;

use App\Models\Station;
use App\Models\TrainTrack;
use App\Models\TrainTrackStation;
use Illuminate\Console\Command;

class SeedRealTrainTracks extends Command
{
    protected $signature = 'seed:real-train-tracks';

    protected $description = '';

    private array $trainRides = [
        [
            'start_station' => [
                'name' => 'Station Ede-Wageningen',
                'long' => '52.027995',
                'lat' => '5.6710488',
                'city' => 'Ede',
                'country' => 'Nederland',
                'postal_code' => '6717 LV',
            ],
            'sub_stations' => 3,
            'end_station' => [
                'name' => 'Station Amsterdam Centraal',
                'long' => '52.3674418',
                'lat' => '4.8801153',
                'city' => 'Amsterdam',
                'country' => 'Nederland',
                'postal_code' => '1012 AB',
            ],
        ],
    ];

    public function handle(): void
    {
        Station::whereNotNull('id')->delete();
        TrainTrack::whereNotNull('id')->delete();
        TrainTrackStation::whereNotNull('id')->delete();

        foreach ($this->trainRides as $trainRide) {
            $startStation = $this->createStation($trainRide['start_station']);
            $endStation = $this->createStation($trainRide['end_station']);

            if (!empty($trainRide['sub_stations'])) {
                for ($i = 1; $i <= $trainRide['sub_stations']; $i++) {
                    $longLat = $this->calculateStationLongLat($startStation, $endStation, $trainRide['sub_stations'], $i);

                    $this->createStation([
                        'name' => "sub-station $i - $startStation->name - $endStation->name",
                        'country' => $startStation->country,
                        'long' => $longLat['long'],
                        'lat' => $longLat['lat'],
                    ]);
                }
            }

            $trainTrack = TrainTrack::updateOrCreate(
                [
                    'name' => "$startStation->name - $endStation->name",
                ],
                [
                    'number' => rand(100000000, 999999999),
                ],
            );
        }
    }

    private function createStation(array $stationData): Station
    {
        return Station::updateOrCreate(
            [
                'name' => $stationData['name'],
            ],
            [
                'long' => $stationData['long'] ?? null,
                'lat' => $stationData['lat'] ?? null,
                'city' => $stationData['city'] ?? null,
                'country' => $stationData['country'],
                'postal_code' => $stationData['postal_code'] ?? null,
            ]
        );
    }

    private function calculateStationLongLat(
        Station $startStation,
        Station $endStation,
        int $amountOfStations,
        int $currentStationNumber,
    ): array {
        $startLong = $startStation->long;
        $endLong = $endStation->long;
        $startLongHigher = $startLong > $endLong;
        $diffLong = $startLongHigher ? $startLong - $endLong : $endLong - $startLong;
        $peaceLong = $diffLong / ($amountOfStations + 1);

        $startLat = $startStation->lat;
        $endLat = $endStation->lat;
        $diffLatHigher = $startLat > $endLat;
        $diffLat = $diffLatHigher ? $startLat - $endLat : $endLat - $startLat;
        $peaceLat = $diffLat / ($amountOfStations + 1);

        $cords = [];
        for ($i = 1; $amountOfStations >= $i; $i++) {
            $cords[$i] = [
                'long' => $startLongHigher ? ($startLong - ($peaceLong * $i)) : ($startLong + ($peaceLong * $i)),
                'lat' => $diffLatHigher ? ($startLat - ($peaceLat * $i)) : ($startLat + ($peaceLat * $i)),
            ];
        }

        return $cords[$currentStationNumber];
    }
}
