<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserData extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'check_code', 'result',
    ];

    protected $table = 'users_data';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
