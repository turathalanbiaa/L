<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
       /* return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'lang' => $this->lang,
            'level' => $this->level,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
            'gender' => $this->gender,
            'country' => $this->country,
            'image' => $this->image,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'scientific_degree' => $this->scientific_degree,
            'register_date' => $this->register_date,
            'last_login_date' => $this->last_login_date,
            'verify_state' => $this->verify_state,
            'remember_token' => $this->remember_token,
        ];*/
    }
}
