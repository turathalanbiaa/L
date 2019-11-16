<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
