<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Language;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContentAnnouncementRequest extends FormRequest
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
            "title"         => "required",
            "description"   => "exclude_if:checkImage,on|required_without_all:url,youtube_video",
            "url"           => "exclude_if:checkImage,on|required_without_all:description,youtube_video,checkImage",
            "youtube_video" => "exclude_if:checkImage,on|required_without_all:description,url,checkImage",
            "type"          => "required",
            "state"         => "required",
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
                "description.required_without_all"   => "حقل الوصف مطلوب عندما لا يكون أي من الرابط الخارجي / يوتيوب فيديو موجودة.",
                "url.required_without_all"           => "حقل الرابط الخارجي مطلوب عندما لا يكون أي من الوصف / يوتيوب فيديو موجودة.",
                "youtube_video.required_without_all" => "حقل يوتيوب فيديو مطلوب عندما لا يكون أي من الوصف / الرابط الخارجي موجودة.",
                "type.required"                      => "حقل النوع مطلوب.",
                "state.required"                     => "حقل الحالة مطلوب.",
            ];

        return parent::messages();
    }
}
