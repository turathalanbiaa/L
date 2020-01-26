<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'type', 'level',
        'email', 'phone', 'password',
        'gender', 'country', 'image',
        'birthdate', 'address', 'scientific_degree',
        'register_date', 'last_login_date', 'verify_state',
        'remember_token'
    ];
}
