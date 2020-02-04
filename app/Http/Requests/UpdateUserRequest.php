<?php

namespace App\Http\Requests;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Stage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PeterColes\Countries\CountriesFacade as Countries;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"        => "required",
            "email"       => "required|email|unique:users,email",
            "phone"       => "required|unique:users,phone",
            "password"    => "required|min:6|confirmed",
            "gender"      => ["required", Rule::in(Gender::getGenders())],
            "country"     => ["required", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
            "stage"       => ["required_if:type,==,1", "nullable", Rule::in(Stage::getStages())],
            "certificate" => ["required_if:type,==,1", "nullable", Rule::in(Certificate::getCertificates())],
            "birth_date"  => "required_if:type,==,1|nullable|date_format:Y-m-d|before_or_equal:".date('Y-m-d', strtotime('-15 years')),
            "address"     => "required_if:type,==,1"
        ];
    }
}
