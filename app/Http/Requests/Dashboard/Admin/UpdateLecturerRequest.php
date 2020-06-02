<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Language;
use App\Enum\LecturerState;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLecturerRequest extends FormRequest
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
     * @throws Exception
     */
    public function rules()
    {
        $id = request()->input("id");
        return [
            "name"     => ["exclude_if:update,pass", "required"],
            "email"    => ["exclude_if:update,pass", "required", "email", "unique:lecturers,email,$id"],
            "phone"    => ["exclude_if:update,pass", "required", "unique:lecturers,phone,$id"],
            "state"    => ["exclude_if:update,pass", "required", Rule::in(LecturerState::getStates())],
            "password" => ["exclude_if:update,info", "required", "min:6", "confirmed"]
        ];
    }

    /**
     * Get the messages that apply to the validation rules in the request.
     *
     * @return array
     * @throws Exception
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
                "state.required"     => "حقل الحالة مطلوب.",
                "state.in"           => "الحالة المحددة غير مقبولة.",
                "password.required"  => "حقل كلمة المرور مطلوب.",
                "password.min"       => "يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.",
                "password.confirmed" => "كلمتا المرور غير متطابقتان."
            ];

        return parent::messages();
    }
}
