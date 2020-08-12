<?php

namespace App\Models;

use App\Enum\DocumentType;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        "name",
        "type",
        "lang",
        "stage",
        "email",
        "phone",
        "password",
        "gender",
        "country",
        "birth_date",
        "address",
        "certificate",
        "state",
        "token",
        "last_login",
        "created_at",
        "updated_at"
    ];

    public function documents()
    {
        return $this->hasMany("App\\Models\\Document")
            ->orderBy("type");
    }

    public function personalIdentificationDocument()
    {
        return $this->documents()
            ->where("type", "=", DocumentType::PERSONAL_IDENTIFICATION)
            ->first();
    }

    public function religiousRecommendationDocument()
    {
        return $this->documents()
            ->where("type", "=", DocumentType::RELIGIOUS_RECOMMENDATION)
            ->first();
    }

    public function certificateDocument()
    {
        return $this->documents()
            ->where("type", "=", DocumentType::CERTIFICATE)
            ->first();
    }

    public function personalImageDocument()
    {
        return $this->documents()
            ->where("type", "=", DocumentType::PERSONAL_IMAGE)
            ->first();
    }
}
