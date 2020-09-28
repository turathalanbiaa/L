<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Language;
use App\Enum\Stage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PeterColes\Countries\CountriesFacade as Countries;

class CreateUserRequest extends FormRequest
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
            "name"        => ["required"],
            "email"       => ["required", "email", "unique:users,email"],
            "phone"       => ["required", "unique:users,phone"],
            "country"     => ["required", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
            "lang"        => ["required", Rule::in(Language::getLanguages())],
            "password"    => ["required", "min:8", "confirmed"],
            "gender"      => ["required", Rule::in(Gender::getGenders())],
            "stage"       => ["exclude_if:type,2", "required", Rule::in(Stage::getStages())],
            "certificate" => ["exclude_if:type,2", "required", Rule::in(Certificate::getCertificates())],
            "birth_date"  => ["exclude_if:type,2", "required", "date_format:Y-m-d", "before_or_equal:".date('Y-m-d', strtotime('-15 years'))],
            "address"     => ["exclude_if:type,2", "required"]
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
                "name.required"          => "حقل الاسم مطلوب.",
                "email.required"         => "حقل البريد الإلكتروني مطلوب.",
                "email.email"            => "البريد الالكتروني غير مقبول.",
                "email.unique"           => "البريد الالكتروني محجوز.",
                "phone.required"         => "حقل الهاتف مطلوب.",
                "phone.unique"           => "الهاتف محجوز.",
                "country.required"       => "حقل البلد مطلوب.",
                "country.in"             => "البلد المحدد غير مقبول.",
                "lang.required"          => "حقل اللغة مطلوب.",
                "lang.in"                => "اللغة المحدد غير مقبول.",
                "password.required"      => "حقل كلمة المرور مطلوب.",
                "password.min"           => "يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.",
                "password.confirmed"     => "كلمتا المرور غير متطابقتان.",
                "gender.required"        => "حقل الجنس مطلوب.",
                "gender.in"              => "الجنس المحدد غير مقبول.",
                "stage.required"         => "حقل المرحلة مطلوب.",
                "stage.in"               => "المرحلة المحدده غير مقبولة.",
                "certificate.required"   => "حقل الشهادة مطلوب.",
                "certificate.in"         => "الشهادة المحدده غير مقبولة.",
                "birth_date.required"    => "حقل تاريخ الميلاد مطلوب.",
                "birth_date.date_format" => "تنسيق التاريخ غير مقبول.",
                "birth_date.before"      => "العمر يجب ان لايقل عن 15 سنة.",
                "address.required"       => "حقل العنوان مطلوب."
            ];

        return parent::messages();
    }
}
