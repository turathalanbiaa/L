<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Admin\Auth;
use App\Http\Requests\Dashboard\Admin\CreateDocumentRequest;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct(Auth $auth)
    {
        $auth->check();
        $auth->hasRole("Document");
    }

    public function index(Request $request)
    {
        $documents = Document::paginate(20);

        if ($request->ajax()) {
            $view = view('dashboard.admin.document.components.documents',compact('documents'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('dashboard.admin.document.index')->with([
            "documents" => $documents
        ]);
    }

    public function create()
    {
        $user = $this->getUser(request()->input("user"));

        return view('dashboard.admin.document.create')->with([
            "types"  => DocumentType::getTypes(),
            "states" => DocumentState::getStates(),
            "user"   => $user->id
        ]);
    }

    public function store(CreateDocumentRequest $request)
    {
        $user = $this->getUser($request->input("user"));
        $document = $user->documents()->where('type', $request->input('type'))->first();

        if ($document)
            Storage::delete($document->image);

        $oldPath = $request->input('image');
        $newPath = str_replace("/temp/", "/$user->id/", $oldPath);
        Storage::move($oldPath, $newPath);

        $document = Document::updateOrCreate(
            ['user_id' => $request->input("user"), 'type' => $request->input('type')],
            ['image' => $newPath, 'state' => $request->input('state'), 'created_at' => date('Y-m-d')]
        );

        if (!$document)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/document.store.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/document.store.success"),
                    "type" => "success"
                ]);
    }

    private function getUser($id) {
        $user = User::where('id', $id)
            ->where('type', UserType::STUDENT)
            ->where('lang', app()->getLocale())
            ->first();

        if (!$user)
            return abort(404);

        return $user;
    }
}
