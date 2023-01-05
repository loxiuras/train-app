<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    public function run(): void
    {
        Station::updateOrCreate([
            'name' => 'Station Ede-Wageningen',
            'city' => 'Ede',
            'country' => 'Nederland',
        ], [
            'street' => 'Stationsweg',
            'postal_code' => '6717 LV',
        ]);

        Station::updateOrCreate([
            'name' => 'Station Hemmen-Dodewaard',
            'city' => 'Dodewaard',
            'country' => 'Nederland',
        ], [
            'street' => 'Boelenhamsestraat',
            'postal_code' => '6669 MN',
        ]);

        Station::updateOrCreate([
            'name' => 'Station Arnhem Centraal',
            'city' => 'Arnhem',
            'country' => 'Nederland',
        ], [
            'street' => 'Nieuwe Stationsstraat',
            'postal_code' => '6811 MA',
        ]);

        Station::updateOrCreate([
            'name' => 'Köln Hauptbahnhof',
            'city' => 'Köln',
            'country' => 'Duitsland',
        ], [
            'street' => 'Trankgasse',
            'house_number' => '11',
            'postal_code' => '50667',
        ]);
    }
}
