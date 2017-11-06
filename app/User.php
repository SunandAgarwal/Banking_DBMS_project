<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //to insert into users table.
    public static function insert_into_user($user) {
        $user = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($user['password'])
        ]);
        
        auth()->login($user);
    }
}
