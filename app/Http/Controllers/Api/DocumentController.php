<?php

namespace App\Http\Controllers\Api;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Resources\Document\DocumentsCollection;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DocumentController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser");
    }

    public function createOrUpdate(Request $request)
    {
        $rules = [
            "image" => ["required", "mimes:jpeg,jpg,bmp,png"],
            "type"  => ["required",  Rule::in(DocumentType::getTypes())]
        ];

        if (app()->getLocale() == Language::ARABIC)
            $messages = [
                "image.required" => "حقل الصورة مطلوب.",
                "image.mimes"    => "يجب أن تكون الصورة ملف من نوع: jpeg ، jpg ، bmp ، png.",
                "type.required"  => "حقل النوع مطلوب",
                "type.in"        => "النوع غير مقبول"
            ];

        $validation = Validator::make($request->all(), $rules, $messages ?? []);

        if (!$validation->passes())
            return $this->simpleResponseWithMessage(false, implode(",", $validation->errors()->all()) );

        $user = $request->user;

        $document = $user->documents()
            ->where("type", $request->input("type"))
            ->first();

        if ($document) {
            Storage::delete($document->image);
            if ($document->state == DocumentState::ACCEPT)
                return $this->simpleResponseWithMessage(false, "can not update document because is accepted");
        }

        $document = Document::updateOrCreate([
            "user_id" => $user->id,
            "type"    => $request->input("type")
        ], [
            "image"   => Storage::put("public/user/$user->id", $request->file("image")),
            "state"   => DocumentState::REVIEW
        ]);

        if (!$document)
            return $this->simpleResponseWithMessage(false, "try again");

        return $this->simpleResponseWithMessage(true, "success");
    }

    public function myDocuments() {
        $user = \request()->user;

        return $this->simpleResponse([
            ($user->personalIdentificationDocument()) ? new DocumentsCollection($user->personalIdentificationDocument()) : null,
            ($user->religiousRecommendationDocument()) ? new DocumentsCollection($user->religiousRecommendationDocument()) : null,
            ($user->certificateDocument()) ? new DocumentsCollection($user->certificateDocument()) : null,
            ($user->personalImageDocument()) ? new DocumentsCollection($user->personalImageDocument()) : null
        ]);
    }
}
