<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const USER_TYPE_CONDUCTOR = 'conductor';

    public const USER_TYPE_MACHINIST = 'machinist';

    public const USER_TYPE_CUSTOMER = 'customer';

    protected $fillable = [
        'type',
        'custom_number',
        'staff_number',
        'name',
        'date_of_birth',
        'street',
        'house_number',
        'house_number_extra',
        'postal_code',
        'city',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
