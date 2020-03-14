<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'lang',
        'title',
        'content',
        'image',
        'url',
        'youtube_video_id',
        'type',
        'state',
        'created_at',
    ];
}
