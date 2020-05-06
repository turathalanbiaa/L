<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Enum\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAnnouncementRequest extends FormRequest
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
            "title"         => ["required"],
            "description"   => ["required_without_all:image,youtube_video"],
            "image"         => ["required_without_all:description,youtube_video", "mimes:jpeg,jpg,bmp,png"],
            "youtube_video" => ["required_without_all:description,image"],
            "type"          => ["required", Rule::in(AnnouncementType::getTypes())],
            "state"         => ["required", Rule::in(AnnouncementState::getStates())]
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
                "title.required"                     => "حقل العنوان مطلوب.",
                "description.required_without_all"   => "حقل الوصف مطلوب عندما لا يكون أي من الصورة / يوتيوب فيديو موجودة.",
                "image.required_without_all"         => "حقل الصورة مطلوب عندما لا يكون أي من الوصف / يوتيوب فيديو موجودة.",
                "image.mimes"                        => "يجب أن تكون الصورة ملف من نوع: jpeg ، jpg ، bmp ، png.",
                "youtube_video.required_without_all" => "حقل يوتيوب فيديو مطلوب عندما لا يكون أي من الوصف / الصورة موجودة.",
                "type.required"                      => "حقل النوع مطلوب.",
                "type.in"                            => "النوع المحدد غير مقبول.",
                "state.required"                     => "حقل الحالة مطلوب.",
                "state.in"                           => "الحالة المحددة غير مقبولة."
            ];

        return parent::messages();
    }
}
