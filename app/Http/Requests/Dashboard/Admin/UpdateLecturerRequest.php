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
        switch ($this->input("update")) {
            case "info":
                $id = request()->input("id");
                return [
                    "name"  => "required",
                    "email" => "required|email|unique:lecturers,email,$id",
                    "phone" => "required|unique:lecturers,phone,$id",
                    "state" => ["required", Rule::in(LecturerState::getStates())]
                ];
                break;
            case "pass":
                return [
                    "password" => "required|min:6|confirmed"
                ];
                break;
            default:
                throw new Exception('Unexpected value');
        }
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
            switch ($this->input("update")) {
                case "info":
                    return [
                        "name.required"  => "حقل الاسم مطلوب.",
                        "email.required" => "حقل البريد الإلكتروني مطلوب.",
                        "email.email"    => "البريد الالكتروني غير مقبول.",
                        "email.unique"   => "البريد الالكتروني محجوز.",
                        "phone.required" => "حقل الهاتف مطلوب.",
                        "phone.unique"   => "الهاتف محجوز.",
                        "state.required" => "حقل الحالة مطلوب.",
                        "state.in"       => "الحالة المحددة غير مقبولة."
                    ];
                    break;
                case "pass":
                    return [
                        "password.required"  => "حقل كلمة المرور مطلوب.",
                        "password.min"       => "يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.",
                        "password.confirmed" => "كلمتا المرور غير متطابقتان."
                    ];
                    break;
                default:
                    throw new Exception('Unexpected value');
            }

        return parent::messages();
    }
}
