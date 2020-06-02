<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Enum\Language;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnnouncementRequest extends FormRequest
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
        return [
            "title"         => ["exclude_if:update,image", "required"],
            "description"   => ["exclude_if:update,image", "exclude_if:checkImage,on", "required_without:youtube_video"],
            "youtube_video" => ["exclude_if:update,image", "exclude_if:checkImage,on", "required_without:description"],
            "type"          => ["exclude_if:update,image", "required", Rule::in(AnnouncementType::getTypes())],
            "state"         => ["exclude_if:update,image", "required", Rule::in(AnnouncementState::getStates())],
            "created_at"    => ["exclude_if:update,image", "required"],
            "image"         => ["exclude_if:update,info", "exclude_if:checkContent,on", "required", "mimes:jpeg,jpg,bmp,png"]
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
                "title.required"                 => "حقل العنوان مطلوب.",
                "description.required_without"   => "حقل الوصف مطلوب عندما لا يكون يوتيوب فيديو موجودة.",
                "youtube_video.required_without" => "حقل يوتيوب فيديو مطلوب عندما لا يكون الوصف موجودة.",
                "type.required"                  => "حقل النوع مطلوب.",
                "type.in"                        => "النوع المحدد غير مقبول.",
                "state.required"                 => "حقل الحالة مطلوب.",
                "state.in"                       => "الحالة المحددة غير مقبولة.",
                "created_at.required"            => "حقل تاريخ الإنشاء مطلوب.",
                "image.required"                 => "حقل الصورة مطلوب.",
                "image.mimes"                    => "يجب أن تكون الصورة ملفًا من النوع: jpeg ، jpg ، bmp ، png."
            ];

        return parent::messages();
    }
}
