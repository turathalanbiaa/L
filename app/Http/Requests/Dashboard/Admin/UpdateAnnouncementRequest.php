<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Enum\Language;
use Illuminate\Foundation\Http\FormRequest;

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
     */
    public function rules()
    {
       switch ($this->input('update')) {
           case "content":
               return [
                   "title"         => "required",
                   "description"   => "exclude_if:checkImage,on|required_without_all:url,youtube_video",
                   "url"           => "exclude_if:checkImage,on|required_without_all:description,youtube_video,checkImage",
                   "youtube_video" => "exclude_if:checkImage,on|required_without_all:description,url,checkImage",
                   "type"          => "required",
                   "state"         => "required",
                   "created_at"    => "required",
               ];
               break;

           case "image":
               return [
                   "image" => "exclude_if:checkContent,on|required|mimes:jpeg,jpg,bmp,png",
               ];
               break;
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
           switch ($this->input('update')) {
               case "content":
                   return [
                       "title.required"                     => "حقل العنوان مطلوب.",
                       "description.required_without_all"   => "حقل الوصف مطلوب عندما لا يكون أي من الرابط الخارجي / يوتيوب فيديو موجودة.",
                       "url.required_without_all"           => "حقل الرابط الخارجي مطلوب عندما لا يكون أي من الوصف / يوتيوب فيديو موجودة.",
                       "youtube_video.required_without_all" => "حقل يوتيوب فيديو مطلوب عندما لا يكون أي من الوصف / الرابط الخارجي موجودة.",
                       "type.required"                      => "حقل النوع مطلوب.",
                       "state.required"                     => "حقل الحالة مطلوب.",
                       "created_at.required"                => "حقل تاريخ الإنشاء مطلوب.",
                   ];
                   break;

               case "image":
                   return [
                       "image.required" => "حقل الصورة مطلوب.",
                       "image.mimes"    => "يجب أن تكون الصورة ملفًا من النوع: jpeg ، jpg ، bmp ، png.",
                   ];
                   break;
           }

        return parent::messages();
    }
}
