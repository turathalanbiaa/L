<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Language;
use Illuminate\Foundation\Http\FormRequest;

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
            "title"         => "required",
            "description"   => "required_without_all:image,url,youtube_video",
            "image"         => "required_without_all:description,url,youtube_video|mimes:jpeg,jpg,bmp,png",
            "url"           => "required_without_all:description,image,youtube_video",
            "youtube_video" => "required_without_all:description,image,url",
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
                "description.required_without_all"   => "حقل الوصف مطلوب عندما لا يكون أي من الصورة / الرابط الخارجي / يوتيوب فيديو موجودة.",
                "image.required_without_all"         => "حقل الصورة مطلوب عندما لا يكون أي من الوصف / الرابط الخارجي / يوتيوب فيديو موجودة.",
                "image.mimes"                        => "يجب أن تكون الصورة ملفًا من النوع: jpeg ، jpg ، bmp ، png.",
                "url.required_without_all"           => "حقل الرابط الخارجي مطلوب عندما لا يكون أي من الوصف / الصورة / يوتيوب فيديو موجودة.",
                "youtube_video.required_without_all" => "حقل يوتيوب فيديو مطلوب عندما لا يكون أي من الوصف / الصورة / الرابط الخارجي موجودة.",
                "type.required"                      => "حقل النوع مطلوب.",
                "state.required"                     => "حقل الحالة مطلوب.",
            ];

        return parent::messages();
    }
}
