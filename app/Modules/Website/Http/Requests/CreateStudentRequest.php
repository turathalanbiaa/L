<?php

namespace Website\Http\Requests;

use App\Enum\Country;
use App\Enum\Gender;
use App\Enum\ScientificDegree;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateStudentRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "phone" => "required|unique:users,phone",
            "password" => "required|confirmed|min:6",
            "address" => "required",
            "birthdate" => "required|date_format:Y-m-d|before_or_equal:".date('Y-m-d', strtotime('-15 years')),
            "gender" => ["required", Rule::in(Gender::getList())],
            "scientificDegree" => ["required", Rule::in(ScientificDegree::getList())],
            "country" => ["required", Rule::in(Country::getList())],
        ];
    }

    /**
     * Get the messages that apply to the validation rules in the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "name.required" => "الاسم الرباعي واللقب مطلوب",
            "email.required" => "البريد الالكتروني مطلوب",
            "email.email" => "البريد الالكتروني غير مقبول",
            "email.unique" => "البريد الالكتروني محجوز",
            "phone.required" => "الهاتف مطلوب",
            "phone.unique" => "الهاتف محجوز",
            "password.required" => "كلمة المرور مطلوبة",
            "password.confirmed" => "كلمتا المرور غير متطابقتان",
            "password.min" => "كلمة المرور اصغر من 6 حروف",
            "address.required" => "العنوان مطلوب",
            "birthdate.required" => "تاريخ الميلاد مطلوب",
            "birthdate.date_format" => "تنسيق التاريخ غير مقبول",
            "birthdate.before" => "العمر يجب ان لايقل عن 15 سنة",
            "gender.required" => "الجنس مطلوب",
            "scientificDegree.required" => "الشعادة العلمية مطلوبة",
            "country.required" => "البلد مطلوب",
        ];
    }
}
