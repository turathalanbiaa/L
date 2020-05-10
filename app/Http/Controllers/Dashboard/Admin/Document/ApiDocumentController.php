<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\Language;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Http\Requests\Request;
use App\Models\Document;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiDocumentController extends Controller
{
    use ApiResponseTrait;

    /**
     * Store the document image in the storage disk.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function store(Request $request) {
        $rules = [
            "image" => ["required|mimes:jpeg,jpg,bmp,png"]
        ];
        if (app()->getLocale() == Language::ARABIC)
            $messages = [
                "image.required" => "حقل الصورة مطلوب.",
                "image.mimes"    => "يجب أن تكون الصورة ملف من نوع: jpeg ، jpg ، bmp ، png."
            ];

        $validation = Validator::make($request->all(), $rules, $messages ?? []);

        if (!$validation->passes())
            return $this->apiResponse(["message" => $validation->errors()->all()]);

        Storage::delete($request->input("prev_image"));
        $image = Storage::put("public/user/temp", $request->file("image"));

        return $this->apiResponse([
            "image" => [
                "url"  => asset("images/large" . Storage::url($image)),
                "path" => $image
            ]
        ]);
    }

    /**
     * Build a model as per the event.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function buildModal(Request $request){
        $document = Document::find($request->input("document"));
        $action = $request->input("action");
        $modal = array();

        if (!$document || !in_array($action, array("accept", "reject", "delete"))) {
            $modal = array(
                "type"   => "modal-danger",
                "header" => __("dashboard-admin/document.components.documents.modal-error-header"),
                "body"   => __("dashboard-admin/document.components.documents.modal-error-body"),
                "footer" => false
            );

            return $this->apiResponse(["modal" => $modal]);
        }

        switch ($action) {
            case "accept":
                $modal = array(
                    "type"        => "modal-success",
                    "header"      => DocumentType::getTypeName($document->type),
                    "body"        => __("dashboard-admin/document.components.documents.modal-accept-body"),
                    "button"      => "btn-success",
                    "closeButton" => "btn-outline-success"
                );
                break;
            case "reject":
                $modal = array(
                    "type"        => "modal-warning",
                    "header"      => DocumentType::getTypeName($document->type),
                    "body"        => __("dashboard-admin/document.components.documents.modal-reject-body"),
                    "button"      => "btn-warning",
                    "closeButton" => "btn-outline-warning"
                );
                break;
            case "delete":
                $modal = array(
                    "type"        => "modal-danger",
                    "header"      => DocumentType::getTypeName($document->type),
                    "body"        => __("dashboard-admin/document.components.documents.modal-delete-body"),
                    "button"      => "btn-danger",
                    "closeButton" => "btn-outline-danger"
                );
                break;
        }

        return $this->apiResponse(["modal" => $modal]);
    }

    /**
     * Document status update by event.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function action(Request $request) {
        $document = Document::find($request->input("document"));
        $action = $request->input("action");

        if (!$document || !in_array($action, array("accept", "reject", "delete"))) {
            $toast = array(
                "title" => __("dashboard-admin/document.components.documents.toast-title-error"),
                "type"  => "danger"
            );

            return $this->apiResponse(["toast" => $toast]);
        }

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
            "title" => __("dashboard-admin/document.components.documents.toast-title-$action", ["string" => DocumentType::getTypeName($document->type)]),
            "type"  => "success",
        );

        return $this->apiResponse([
            "toast" => $toast,
            "documentState" => DocumentState::getStateName($document->state)
        ]);
    }
}
