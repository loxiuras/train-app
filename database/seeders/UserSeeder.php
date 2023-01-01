<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private string $password = 'Password123!';

    private int $amountOfMachinists = 5;
    private int $amountOfConductors = 15;
    private int $amountOfCustomers = 100;

    public function run(): void
    {
        // Administrator
        User::updateOrCreate([
           'email' => 'admin@train-app.com',
        ],[
            'type' => 'admin',
            'name' => 'Administrator',
            'date_of_birth' => now()->subYears(20),
            'password' => Hash::make($this->password),
        ]);

        // Machinist
        User::factory()
            ->count($this->amountOfMachinists)
            ->create([
                'type' => User::USER_TYPE_MACHINIST,
                'staff_number' => 'M' . rand(100000000, 999999999),
            ]);

        // Conductor
        User::factory()
            ->count($this->amountOfConductors)
            ->create([
                'type' => User::USER_TYPE_CONDUCTOR,
                'staff_number' => 'C' . rand(100000000, 999999999),
            ]);

        // Customers
        User::factory()
            ->count($this->amountOfCustomers)
            ->create([
                'type' => User::USER_TYPE_CUSTOMER,
                'customer_number' => 'U' . rand(100000000, 999999999),
            ]);
    }
}
