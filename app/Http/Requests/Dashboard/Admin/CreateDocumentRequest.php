<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDocumentRequest extends FormRequest
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
            'user'  => 'required',
            'image' => 'required',
            'type'  => ["required", Rule::in(DocumentType::getTypes())],
            'state' => ["required", Rule::in(DocumentState::getStates())]
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
                "user.required"  => "المستخدم غير موجود",
                "image.required" => "اختيار الصورة مطلوب",
                "email.email"    => "البريد الالكتروني غير مقبول",
                "type.required"  => "اختيار النوع مطلوب",
                "type.in"        => "النوع غير مقبول",
                "state.required" => "اختيار الحالة مطلوب",
                "state.in"       => "الحالة غير مقبولة",
            ];

        return parent::messages();
    }
}
