<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    private string $password = 'Password123!';

    public function definition(...$attributes): array
    {
        return [
            'name' => fake()->name(),
            'date_of_birth' => now()->subYears(rand(15, 50)),
            'street' => fake()->streetName,
            'house_number' => (int)rand(1, 200),
            'house_number_extra' => $this->generateHouseNumberExtra(),
            'postal_code' => fake()->postcode,
            'city' => fake()->city,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make($this->password),
        ];
    }

    private function generateHouseNumberExtra(): ?string
    {
        $rand = rand(0, 4);

        if (empty($rand)) return null;

        return match ($rand) {
            1 => "A",
            2 => "B",
            3 => "C",
            default => "D",
        };
    }
}
