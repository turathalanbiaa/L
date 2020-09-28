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
        $id = $this->route()->originalParameter("user");
        switch ($this->input("update")) {
            case "info": return [
                "name"        => ["required"],
                "gender"      => ["required", Rule::in(Gender::getGenders())],
                "country"     => ["required", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
                "stage"       => ["exclude_if:type,2", "required", Rule::in(Stage::getStages())],
                "certificate" => ["exclude_if:type,2", "required", Rule::in(Certificate::getCertificates())],
                "birth_date"  => ["exclude_if:type,2", "required", "date_format:Y-m-d", "before_or_equal:".date('Y-m-d', strtotime('-15 years'))],
                "address"     => ["exclude_if:type,2", "required"]
            ];
            case "phone": return ["phone" => ["required", "confirmed", "unique:users,phone,$id"]];
            case "email": return ["email" => ["required", "email", "confirmed", "unique:users,email,$id"]];
            case "pass": return ["password" => ["required", "min:8", "confirmed"]];
        }
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
                "country.required"       => "حقل البلد مطلوب.",
                "country.in"             => "البلد المحدد غير مقبول.",
                "gender.required"        => "حقل الجنس مطلوب.",
                "gender.in"              => "الجنس المحدد غير مقبول.",
                "stage.required"         => "حقل المرحلة مطلوب.",
                "stage.in"               => "المرحلة المحدده غير مقبولة.",
                "certificate.required"   => "حقل الشهادة مطلوب.",
                "certificate.in"         => "الشهادة المحدده غير مقبولة.",
                "birth_date.required"    => "حقل تاريخ الميلاد مطلوب.",
                "birth_date.date_format" => "تنسيق التاريخ غير مقبول.",
                "birth_date.before"      => "العمر يجب ان لايقل عن 15 سنة.",
                "address.required"       => "حقل العنوان مطلوب.",
                "phone.required"         => "حقل الهاتف مطلوب.",
                "phone.confirmed"        => "رقما الهاتف غير متطابقان.",
                "phone.unique"           => "الهاتف محجوز.",
                "email.required"         => "حقل البريد الالكتروني مطلوب.",
                "email.email"            => "البريد الالكتروني غير مقبول.",
                "email.confirmed"        => "البريدان الالكترونيان غير متطابقان.",
                "email.unique"           => "البريد الالكتروني محجوز.",
                "password.required"      => "حقل كلمة المرور مطلوب.",
                "password.min"           => "يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.",
                "password.confirmed"     => "كلمتا المرور غير متطابقتان."
            ];

        return parent::messages();
    }
}
