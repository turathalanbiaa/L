<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Language;
use App\Enum\LecturerState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class CreateLecturerRequest extends FormRequest
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
            "name"     => ["required"],
            "email"    => ["required", "email", "unique:lecturers,email"],
            "phone"    => ["required", "unique:lecturers,phone"],
            "password" => ["required", "min:6", "confirmed"],
            "state"    => ["required", Rule::in(LecturerState::getStates())]
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
                "name.required"      => "حقل الاسم مطلوب.",
                "email.required"     => "حقل البريد الإلكتروني مطلوب.",
                "email.email"        => "البريد الالكتروني غير مقبول.",
                "email.unique"       => "البريد الالكتروني محجوز.",
                "phone.required"     => "حقل الهاتف مطلوب.",
                "phone.unique"       => "الهاتف محجوز.",
                "password.required"  => "حقل كلمة المرور مطلوب.",
                "password.min"       => "يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.",
                "password.confirmed" => "كلمتا المرور غير متطابقتان.",
                "state.required"     => "حقل الحالة مطلوب.",
                "state.in"           => "الحالة المحددة غير مقبولة."
            ];

        return parent::messages();
    }
}
