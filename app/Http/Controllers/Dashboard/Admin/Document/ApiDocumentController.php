<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Http\Requests\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiDocumentController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request) {
        $rules = ['file' => 'required|image'];

        switch (app()->getLocale()) {
            case Language::ARABIC:
                $messages = [
                    'file.required' => 'يجب رفع الصورة',
                    'file.image'    => 'الملف المرفوع ليس صورة'
                ]
                ;break;
            case Language::ENGLISH:
                $messages = [
                    'file.required' => 'The field image is required.',
                    'file.image'    => 'The file must be an image.'
                ];
                break;
            default: $messages = [];
        }

        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->passes())
            return $this->apiResponse([
                "message" => $validation->errors()->all()
            ], 200, true);

        Storage::delete($request->input('prev_image'));

        $image = Storage::put("public/user/temp", $request->file('file'));

        return $this->apiResponse([
            "image_url"  => Storage::url($image),
            "image_path" => $image,
        ], 200, false);
    }

    public function buildModal(Request $request){
        $document = Document::find($request->input('document'));
        $action = $request->input('action');

        $view = view('dashboard.admin.document.components.modal')
            ->with(['document'=> $document, 'action'  => $action])
            ->render();

        return $this->apiResponse(['html' => $view], 200, false);
    }

    public function accept() {

    }

    public function reject() {

    }

    public function destroy() {

    }
}
