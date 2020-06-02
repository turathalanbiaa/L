<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateDocumentRequest;
use App\Models\Document;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->middleware("dashboard.auth");
        $this->middleware("dashboard.role:Document");
        $this->middleware("filter:document-type")->only(["index"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::select("id")
            ->where("type", UserType::STUDENT)
            ->where("lang", app()->getLocale())
            ->pluck("id")
            ->toArray();
        $type = request()->input("type");
        $documents = is_null($type)
            ? Document::whereIn("user_id", $users)
                ->where("state", DocumentState::REVIEW)
                ->simplePaginate(20)
            : Document::whereIn("user_id", $users)
                ->where("type", $type)
                ->where("state", DocumentState::REVIEW)
                ->simplePaginate(20);

        return view("dashboard.admin.document.index")->with([
            "type"      => $type,
            "documents" => $documents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("dashboard.admin.document.create")->with([
            "user" => request()->input("user")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDocumentRequest $request
     * @return RedirectResponse|void
     */
    public function store(CreateDocumentRequest $request)
    {
        $user = User::where("id", $request->input("user"))
            ->where("type", UserType::STUDENT)
            ->where("lang", app()->getLocale())
            ->first();
        if (!$user)
            return abort(404);

        $document = $user->documents()
            ->where("type", $request->input("type"))
            ->first();
        if ($document)
            Storage::delete($document->image);

        $oldPath = $request->input("image");
        $newPath = str_replace("/temp/", "/$user->id/", $oldPath);
        Storage::move($oldPath, $newPath);

        $document = Document::updateOrCreate(
            ["user_id" => $request->input("user"), "type" => $request->input("type")],
            ["image" => $newPath, "state" => $request->input("state"), "created_at" => date("Y-m-d")]);

        if (!$document)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/document.store.failed"),
                    "type" => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/document.store.success"),
                "type" => "success"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return void
     */
    public function show(Document $document)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return void
     */
    public function edit(Document $document)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return void
     */
    public function update(Request $request, Document $document)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return void
     */
    public function destroy(Document $document)
    {
        abort(404);
    }
}
