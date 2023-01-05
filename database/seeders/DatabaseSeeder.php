<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StationSeeder::class,
            UserSeeder::class,
            TrainSeeder::class,
            CarriageSeeder::class,
            TrainTrackSeeder::class,
        ]);
    }
}
