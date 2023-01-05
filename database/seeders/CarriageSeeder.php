<?php

namespace Database\Seeders;

use App\Models\Carriage;
use Illuminate\Database\Seeder;

class CarriageSeeder extends Seeder
{
    private int $amountOfCarriages = 20;

    public function run(): void
    {
        // Passenger carriage
        for ($i = 0; $i < $this->amountOfCarriages; $i++) {
            $classTypeIndex = rand(1, 3);

            Carriage::updateOrCreate([
                'number' => rand(100000000, 999999999),
            ],
            [
                'class_type' => $classTypeIndex === 1 ? Carriage::CLASS_TYPE_FIRST : ($classTypeIndex === 2 ? Carriage::CLASS_TYPE_SECOND : Carriage::CLASS_TYPE_MIXED),
                'seats' => rand(10, 25),
            ]);
        }

        // Freight wagon
        for ($i = 0; $i < $this->amountOfCarriages; $i++) {
            Carriage::updateOrCreate([
                'number' => rand(100000000, 999999999),
            ], []);
        }
    }
}
