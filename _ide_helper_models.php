<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Carriage
 *
 * @property int $id
 * @property string $number
 * @property string|null $class_type
 * @property int $seats
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereClassType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carriage whereUpdatedAt($value)
 */
	class Carriage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Station
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property int|null $house_number
 * @property string|null $house_number_extra
 * @property string $postal_code
 * @property string $city
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereHouseNumberExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 */
	class Station extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Train
 *
 * @property int $id
 * @property string $number
 * @property string|null $brand
 * @property string|null $type
 * @property string|null $drive
 * @property string|null $fuel_type
 * @property int $horse_power
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Train newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Train newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Train query()
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereFuelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereHorsePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Train whereUpdatedAt($value)
 */
	class Train extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TrainTrack
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack query()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrack whereUpdatedAt($value)
 */
	class TrainTrack extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TrainTrackStation
 *
 * @property int $id
 * @property int $train_track_id
 * @property int $station_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Station $station
 * @property-read \App\Models\Station $trainTrack
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereTrainTrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainTrackStation whereUpdatedAt($value)
 */
	class TrainTrackStation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $type
 * @property string|null $customer_number
 * @property string|null $staff_number
 * @property string $name
 * @property \Illuminate\Support\Carbon $date_of_birth
 * @property string|null $street
 * @property int|null $house_number
 * @property string|null $house_number_extra
 * @property string|null $postal_code
 * @property string|null $city
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCustomerNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHouseNumberExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStaffNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

