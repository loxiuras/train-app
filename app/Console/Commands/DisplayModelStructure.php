<?php

namespace App\Console\Commands;

use App\Models\Carriage;
use App\Models\Train;
use App\Models\User;
use Illuminate\Console\Command;

class DisplayModelStructure extends Command
{
    protected $signature = 'display:model-structure';

    protected $description = 'Displays the model structure with the current data.';

    public function handle(): void
    {
        $this->displayUsers();
        $this->displayTrains();
        $this->displayCarriages();
    }

    private function displayUsers(): void
    {
        $users = User::select(['name', 'date_of_birth', 'email'])->limit(5)->get();

        if ($users) {
            $this->components->info('User model');

            $headers = ['Name', 'Date of birth', 'Email'];

            $items = [];
            foreach ($users as $user) {
                $items[] = [
                    $user->name,
                    $user->date_of_birth->format('d M Y'),
                    $user->email,
                ];
            }
            $items[] = ['...'];

            $this->table($headers, $items);
        }
    }

    private function displayTrains(): void
    {
        $trains = Train::select(['number', 'brand', 'type', 'drive', 'fuel_type'])->limit(5)->get();

        if ($trains) {
            $this->components->info('Train model');

            $headers = ['Number', 'Brand & Type', 'Drive type', 'Fuel type'];

            $items = [];
            foreach ($trains as $train) {
                $items[] = [
                    $train->number,
                    $train->brand . ' ' . $train->type,
                    $train->drive ?? '-',
                    $train->fuel_type ?? '-',
                ];
            }
            $items[] = ['...'];

            $this->table($headers, $items);
        }
    }

    private function displayCarriages(): void
    {
        $passengerCarriages = Carriage::select(['number', 'class_type', 'seats'])->whereNotNull('class_type')->groupBy(['class_type'])->get();
        $freightWagonCarriages = Carriage::select(['number', 'class_type', 'seats'])->limit(3)->orderBy('id', 'desc')->get();

        $carriages = [...$passengerCarriages, ...$freightWagonCarriages];

        if ($carriages) {
            $this->components->info('Carriage model');

            $headers = ['Number', 'Class type', 'Is freight wagon?', 'Seats'];

            $items = [];
            foreach ($carriages as $carriage) {
                $items[] = [
                    $carriage->number,
                    $carriage->class_type,
                    $carriage->seats > 0 ? '<fg=red>X</>' : '<fg=green>V</>',
                    $carriage->seats ?: '-',
                ];
            }
            $items[] = ['...'];

            $this->table($headers, $items);
        }
    }
}
