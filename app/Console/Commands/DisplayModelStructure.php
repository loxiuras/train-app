<?php

namespace App\Console\Commands;

use App\Models\Carriage;
use App\Models\Train;
use App\Models\TrainRide;
use App\Models\TrainTrack;
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
        $this->displayTrainTracks();
        $this->displayTrainRides();
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
                    $train->brand.' '.$train->type,
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

    private function displayTrainTracks(): void
    {
        $trainTracks = TrainTrack::all();

        if ($trainTracks) {
            $this->components->info('Train track model');

            $headers = ['Number', 'Name', 'Start station', 'End station', 'Amount of substations'];

            $items = [];
            foreach ($trainTracks as $trainTrack) {
                $startTrackStation = $trainTrack->trainTrackStations()->first();
                $endTrackStation = $trainTrack->trainTrackStations()->orderBy('order', 'desc')->first();

                $items[] = [
                    $trainTrack->number,
                    str_replace('Track _', '', $trainTrack->name),
                    $startTrackStation->station->name,
                    $endTrackStation->station->name,
                    $trainTrack->trainTrackStations()
                        ->where('id', '!=', $startTrackStation->id)
                        ->where('id', '!=', $endTrackStation->id)
                        ->count(),
                ];
            }

            $this->table($headers, $items);
        }
    }

    private function displayTrainRides(): void
    {
        $trainRides = TrainRide::all();

        if ($trainRides) {
            $this->components->info('Train ride model');

            $headers = ['Number', 'Direction', 'Time', 'Train', 'Carriage'];

            $items = [];
            foreach ($trainRides as $trainRide) {
                $items[] = [
                    $trainRide->number,
                    $trainRide->direction,
                    $trainRide->start_at->format('d M Y').' - '.$trainRide->end_at->format('d M Y'),
                ];

                $train = $trainRide->train;
                $items[] = [
                    $train->number,
                    '',
                    '',
                    "$train->brand $train->type",
                ];

                $trainRideCarriages = $trainRide->carriages;
                foreach ($trainRideCarriages as $trainRideCarriage) {
                    $carriage = $trainRideCarriage->carriage;

                    $items[] = [
                        $carriage->number,
                        '',
                        '',
                        '',
                        $carriage->class_type.($carriage->seats > 0 ? " ($carriage->seats seats available)" : ''),
                    ];
                }
            }

            $this->table($headers, $items);
        }
    }
}
