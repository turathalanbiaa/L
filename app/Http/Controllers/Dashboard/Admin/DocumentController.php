<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\DocumentState;
use App\Http\Controllers\Controller;
use App\Http\Repositories\DocumentRepository;
use App\Models\Document;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentController extends Controller
{
    protected $documentRepository;
    public function __construct(DocumentRepository $documentRepository, Auth $auth)
    {
        $auth->check();
        $auth->hasRole("Document");
        $this->documentRepository = $documentRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|\Illuminate\Http\JsonResponse|View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
//        dd(Document::where('state', DocumentState::REVIEW)->count());
        $documents = Document::paginate(20);

        if ($request->ajax()) {
            $view = view('dashboard.admin.document.components.documents',compact('documents'))->render();
            return response()->json(['html'=>$view]);
        }

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
        return view('dashboard.admin.document.create')->with([

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function accept() {

    }

    public function reject() {

    }
}
