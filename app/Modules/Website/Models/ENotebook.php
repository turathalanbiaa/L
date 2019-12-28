<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ENotebook extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
