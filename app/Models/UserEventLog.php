<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class UserEventLog extends Model
{
    protected $table = 'users_event_log';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
