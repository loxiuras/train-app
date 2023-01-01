<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    public function run(): void
    {
        Train::updateOrCreate([
            'number' => rand(100000000, 999999999),
        ],
        [
            'brand' => 'Lima Express',
            'type' => 'DB E880',
            'drive' => '',
            'fuel_type' => Train::FUEL_TYPE_ELECTRIC,
            'horse_power' => 195,
        ]);

        Train::updateOrCreate([
            'number' => rand(100000000, 999999999),
        ],
        [
            'brand' => 'DB Diesellok',
            'type' => 'V60 155',
            'drive' => '',
            'fuel_type' => Train::FUEL_TYPE_DIESEL,
            'horse_power' => 155,
        ]);

        Train::updateOrCreate([
            'number' => rand(100000000, 999999999),
        ],
        [
            'brand' => 'SBB RBe',
            'type' => '4/4 1435',
            'drive' => '',
            'fuel_type' => Train::FUEL_TYPE_ELECTRIC,
            'horse_power' => 195,
        ]);
    }
}
