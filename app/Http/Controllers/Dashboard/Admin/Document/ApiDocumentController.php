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
        $rules = ['file' => 'required|image'];

        if (app()->getLocale() == Language::ARABIC)
            $messages = [
                'file.required' => 'يجب رفع الصورة.',
                'file.image'    => 'الملف المرفوع ليس صورة.',
                'uploaded'      => 'فشل في التحميل.'
            ];

        $validation = Validator::make($request->all(), $rules, $messages ?? []);

        if (!$validation->passes())
            return $this->apiResponse([
                "message" => $validation->errors()->all()
            ], 200, true);

        Storage::delete($request->input('prev_image'));

        $image = Storage::put("public/user/temp", $request->file('file'));

        return $this->apiResponse([
            "image" => [
                "url"  => asset("images/large" . Storage::url($image)),
                "path" => $image
            ]
        ], 200, false);
    }

    /**
     * Build a model as per the event.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function buildModal(Request $request){
        $document = Document::find($request->input('document'));
        $action = $request->input('action');

        if ($document)
            switch ($action) {
                case "accept":
                    $modal = array(
                        "type"        => "modal-success",
                        'header'      => DocumentType::getTypeName($document->type),
                        'body'        => __("dashboard-admin/document.components.documents.modal-accept-body"),
                        'button'      => "btn-success",
                        'closeButton' => "btn-outline-success"
                    );
                    break;
                case "reject":
                    $modal = array(
                        "type"        => "modal-warning",
                        'header'      => DocumentType::getTypeName($document->type),
                        'body'        => __("dashboard-admin/document.components.documents.modal-reject-body"),
                        'button'      => "btn-warning",
                        'closeButton' => "btn-outline-warning"
                    );
                    break;
                case "delete":
                    $modal = array(
                        "type"        => "modal-danger",
                        'header'      => DocumentType::getTypeName($document->type),
                        'body'        => __("dashboard-admin/document.components.documents.modal-delete-body"),
                        'button'      => "btn-danger",
                        'closeButton' => "btn-outline-danger"
                    );
                    break;
                default:
                    $modal = array(
                        "type"        => "modal-info",
                        'header'      => __("dashboard-admin/document.components.documents.modal-error-header"),
                        'body'        => __("dashboard-admin/document.components.documents.modal-error-body"),
                        'button'      => "btn-info",
                        'closeButton' => "btn-outline-info"
                    );
                    break;
            }
        else
            $modal = array(
                "type"        => "modal-info",
                'header'      => __("dashboard-admin/document.components.documents.modal-error-header"),
                'body'        => __("dashboard-admin/document.components.documents.modal-error-body"),
                'button'      => "btn-info",
                'closeButton' => "btn-outline-info"
            );

        return $this->apiResponse(['modal' => $modal], 200, false);
    }

    /**
     * Document status update by event.
     *
     * @param Request $request
     * @return ResponseFactory|Response
     */
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
                "title" => __("dashboard-admin/document.components.documents.toast-title-$action") . DocumentType::getTypeName($document->type) . ".",
                'type'  => "success",
            );
        }
        else
            $toast = array(
                "title" => __("dashboard-admin/document.components.documents.toast-title-error"),
                'type'  => "warning"
            );

        return $this->apiResponse([
            "toast" => $toast,
            'documentState' => DocumentState::getStateName($document->state ?? '')
        ], 200, false);
    }
}
