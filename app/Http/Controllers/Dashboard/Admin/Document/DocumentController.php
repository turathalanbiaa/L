<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateDocumentRequest;
use App\Models\Document;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->middleware('dashboard.auth');
        $this->middleware('dashboard.role:Document');
        $this->middleware('filter:document-type')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::where('type', UserType::STUDENT)
            ->where('lang', app()->getLocale())
            ->get(['id']);

        $documents = is_null(\request()->input('type'))?
            Document::whereIn('user_id', $users->pluck('id')->toArray())
                ->where('state', DocumentState::REVIEW)
                ->simplePaginate(20) :
            Document::whereIn('user_id', $users->pluck('id')->toArray())
                ->where('type', \request()->input('type'))
                ->where('state', DocumentState::REVIEW)
                ->simplePaginate(20);

        return view('dashboard.admin.document.index')->with([
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
        $user = $this->getUser(request()->input("user"));

        return view('dashboard.admin.document.create')->with([
            "types"  => DocumentType::getTypes(),
            "states" => DocumentState::getStates(),
            "user"   => $user->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDocumentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Get the user.
     *
     * @param $id
     */
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
