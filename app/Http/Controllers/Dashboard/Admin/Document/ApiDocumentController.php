<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
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
            "image_url"  => asset("images/large/" . Storage::url($image)),
            "image_path" => $image,
        ], 200, false);
    }

    public function buildModal(Request $request){
        $document = Document::find($request->input('document'));
        $action = $request->input('action');

        if ($document && in_array($action, array("accept", "reject", "delete")))
            switch ($action) {
                case "accept":
                    $modal = array(
                        "type"       => "modal-success",
                        'header'     => DocumentType::getTypeName($document->type),
                        'body'       => __("dashboard-admin/document.component.documents.modal-accept-body"),
                        'btn'        => "btn-success",
                        'btnOutline' => "btn-outline-success"
                    );
                    break;
                case "reject":
                    $modal = array(
                        "type"       => "modal-warning",
                        'header'     => DocumentType::getTypeName($document->type),
                        'body'       => __("dashboard-admin/document.component.documents.modal-reject-body"),
                        'btn'        => "btn-warning",
                        'btnOutline' => "btn-outline-warning"
                    );
                    break;
                case "delete":
                    $modal = array(
                        "type"       => "modal-danger",
                        'header'     => DocumentType::getTypeName($document->type),
                        'body'       => __("dashboard-admin/document.component.documents.modal-delete-body"),
                        'btn'        => "btn-danger",
                        'btnOutline' => "btn-outline-danger"
                    );
                    break;
            }
        else
            $modal = array(
                "type"       => "modal-info",
                'header'     => __("dashboard-admin/document.component.documents.modal-error-header"),
                'body'       => __("dashboard-admin/document.component.documents.modal-error-body"),
                'btn'        => "btn-info",
                'btnOutline' => "btn-outline-info"
            );

        return $this->apiResponse(['modal' => $modal], 200, false);
    }

    public function action(Request $request) {
        $document = Document::find($request->input('document'));
        $action = $request->input('action');

        if ($document && in_array($action, array("accept", "reject", "delete"))) {
            switch ($action) {
                case "accept":
                    $document->state = DocumentState::ACCEPT;
                    $document->save();
                    break;
                case "reject":
                    $document->state = DocumentState::REJECT;
                    $document->save();
                    break;
                case "delete":
                    Storage::delete($document->image);
                    $document->delete();
                    break;
            }

            $toast = array(
                "title" => __("dashboard-admin/document.component.documents.toast-title-$action") . DocumentType::getTypeName($document->type) . ".",
                'type'  => "success",
            );
        }
        else
            $toast = array(
                "title" => __("dashboard-admin/document.component.documents.toast-title-error"),
                'type'  => "warning"
            );

        return $this->apiResponse([
            "toast" => $toast,
            'documentState' => DocumentState::getStateName($document->state ?? '')
        ], 200, false);
    }
}
