<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'type', 'stage',
        'email', 'phone', 'password',
        'gender', 'country', 'image',
        'birth_date', 'address', 'scientific_degree',
        'register_date', 'last_login', 'state',
        'remember_token'
    ];
}
