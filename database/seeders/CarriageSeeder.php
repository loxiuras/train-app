<?php

namespace Database\Seeders;

use App\Models\Carriage;
use Illuminate\Database\Seeder;

class CarriageSeeder extends Seeder
{
    private int $amountOfCarriages = 20;

    public function run(): void
    {
        for ($i = 0; $i < $this->amountOfCarriages; $i++) {
            Carriage::updateOrCreate([
                'number' => rand(100000000, 999999999),
            ],
            [
                'seats' => rand(10, 25),
            ]);
        }
    }
}
