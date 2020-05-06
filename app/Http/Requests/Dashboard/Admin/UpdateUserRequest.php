<?php

namespace App\Http\Requests\Dashboard\Admin;

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
        $id = request()->input("id");
        return [
            "name"        => ["exclude_if:update,pass", "required"],
            "email"       => ["exclude_if:update,pass", "required", "email", "unique:users,email,$id"],
            "phone"       => ["exclude_if:update,pass", "required", "unique:users,phone,$id"],
            "gender"      => ["exclude_if:update,pass", "required", Rule::in(Gender::getGenders())],
            "country"     => ["exclude_if:update,pass", "required", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
            "stage"       => ["exclude_if:update,pass", "exclude_if:type,2", "required", Rule::in(Stage::getStages())],
            "certificate" => ["exclude_if:update,pass", "exclude_if:type,2", "required", Rule::in(Certificate::getCertificates())],
            "birth_date"  => ["exclude_if:update,pass", "exclude_if:type,2", "required", "date_format:Y-m-d", "before_or_equal:".date('Y-m-d', strtotime('-15 years'))],
            "address"     => ["exclude_if:update,pass", "exclude_if:type,2", "required"],
            "password"    => ["exclude_if:update,info", "required", "min:6", "confirmed"]
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
                "gender.required"        => "حقل الجنس مطلوب.",
                "gender.in"              => "الجنس المحدد غير مقبول.",
                "country.required"       => "حقل البلد مطلوب.",
                "country.in"             => "البلد المحدد غير مقبول.",
                "stage.required"         => "حقل المرحلة مطلوب.",
                "stage.in"               => "المرحلة المحدده غير مقبولة.",
                "certificate.required"   => "حقل الشهادة مطلوب.",
                "certificate.in"         => "الشهادة المحدده غير مقبولة.",
                "birth_date.required"    => "حقل تاريخ الميلاد مطلوب.",
                "birth_date.date_format" => "تنسيق التاريخ غير مقبول.",
                "birth_date.before"      => "العمر يجب ان لايقل عن 15 سنة.",
                "address.required"       => "حقل العنوان مطلوب.",
                "password.required"      => "حقل كلمة المرور مطلوب.",
                "password.min"           => "يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.",
                "password.confirmed"     => "كلمتا المرور غير متطابقتان."
            ];

        return parent::messages();
    }
}
