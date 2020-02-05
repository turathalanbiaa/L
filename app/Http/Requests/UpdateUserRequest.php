<?php

namespace App\Http\Requests;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Language;
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
     * @return array|void
     */
    public function rules()
    {
        return [
            "name"        => ["required_if:update,==,info"],
            "email"       => ["required_if:update,==,info", "email", Rule::unique('users')->ignore($this->input('id'))],
            "phone"       => ["required_if:update,==,info", Rule::unique('users')->ignore($this->input('id'))],
            "password"    => ["required_if:update,==,pass", "min:6", "confirmed"],
            "gender"      => ["required_if:update,==,info", Rule::in(Gender::getGenders())],
            "country"     => ["required_if:update,==,info", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
            "stage"       => ["required_if:update,==,info", "required_if:type,==,1", "nullable", Rule::in(Stage::getStages())],
            "certificate" => ["required_if:update,==,info", "required_if:type,==,1", "nullable", Rule::in(Certificate::getCertificates())],
            "birth_date"  => ["required_if:update,==,info", "required_if:type,==,1", "nullable", "date_format:Y-m-d", "before_or_equal:".date('Y-m-d', strtotime('-15 years'))],
            "address"     => ["required_if:update,==,info", "required_if:type,==,1"]
        ];
    }

    /**
     * Get the messages that apply to the validation rules in the request.
     *
     * @return array
     */
    public function messages()
    {
        if(app()->getLocale() == Language::ARABIC)
            return [
                "name.required_if"        => "الاسم الرباعي واللقب مطلوب",
                "email.required_if"       => "البريد الالكتروني مطلوب",
                "email.email"             => "البريد الالكتروني غير مقبول",
                "email.unique"            => "البريد الالكتروني محجوز",
                "phone.required_if"       => "الهاتف مطلوب",
                "phone.unique"            => "الهاتف محجوز",
                "password.required_if"       => "كلمة المرور مطلوبة",
                "password.min"            => "كلمة المرور اصغر من 6 حروف",
                "password.confirmed"      => "كلمتا المرور غير متطابقتان",
                "gender.required_if"         => "اختيار الجنس مطلوب",
                "gender.in"               => "الجنس غير مقبول",
                "country.required_if"        => "اختيار البلد مطلوب",
                "country.in"              => "البلد غير مقبول",
                "stage.required_if"       => "اختيار المرحلة مطلوب",
                "stage.in"                => "المرحلة غير مقبولة",
                "certificate.required_if" => "اختيار الشهادة مطلوب",
                "certificate.in"          => "الشهادة غير مقبولة",
                "birth_date.required_if"  => "تاريخ الميلاد مطلوب",
                "birth_date.date_format"  => "تنسيق التاريخ غير مقبول",
                "birth_date.before"       => "العمر يجب ان لايقل عن 15 سنة",
                "address.required_if"     => "العنوان مطلوب",
            ];

        return parent::messages();
    }
}
