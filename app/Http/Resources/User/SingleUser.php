<?php

namespace App\Http\Resources\User;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Enum\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PeterColes\Countries\CountriesFacade as Countries;

class SingleUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "name"        => $this->name,
            "stage"       => ($this->type == UserType::STUDENT)
                ? Stage::getStageName($this->stage)
                : $this->stage,
            "email"       => $this->email,
            "phone"       => $this->phone,
            "gender"      => Gender::getGenderName($this->gender),
            "country"     => Countries::getValue(app()->getLocale(), $this->country),
            "birth_date"  => $this->birth_date,
            "address"     => $this->address,
            "certificate" => Certificate::getCertificateName($this->certificate),
            "state"       => UserState::getStateName($this->state),
            "token"       => $this->token
        ];
    }
}
