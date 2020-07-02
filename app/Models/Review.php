<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "id",
        "user_id",
        "course_id",
        "type",
        "rate",
        "comment",
        "state",
        "created_at",
        "updated_at"
    ];

    public function user()
    {
        return $this->belongsTo("App\\Models\\User");
    }
}
