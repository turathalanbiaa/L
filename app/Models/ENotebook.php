<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ENotebook extends Model
{
    protected $table = 'e_notebooks';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
