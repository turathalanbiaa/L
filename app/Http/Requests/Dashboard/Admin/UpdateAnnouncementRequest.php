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
           case "info":
               return [
                   "title"         => "required",
                   "description"   => "exclude_if:checkImage,on|required_without:youtube_video",
                   "youtube_video" => "exclude_if:checkImage,on|required_without:description",
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
               case "info":
                   return [
                       "title.required"                 => "حقل العنوان مطلوب.",
                       "description.required_without"   => "حقل الوصف مطلوب عندما لا يكون يوتيوب فيديو موجودة.",
                       "youtube_video.required_without" => "حقل يوتيوب فيديو مطلوب عندما لا يكون الوصف موجودة.",
                       "type.required"                  => "حقل النوع مطلوب.",
                       "state.required"                 => "حقل الحالة مطلوب.",
                       "created_at.required"            => "حقل تاريخ الإنشاء مطلوب.",
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
