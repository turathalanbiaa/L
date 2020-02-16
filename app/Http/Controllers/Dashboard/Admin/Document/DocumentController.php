<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Enum\DocumentState;
use App\Enum\DocumentType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Admin\Auth;
use App\Http\Repositories\DocumentRepository;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected $documentRepository;

    public function __construct(DocumentRepository $documentRepository, Auth $auth)
    {
        $auth->check();
        $auth->hasRole("Document");
        $this->documentRepository = $documentRepository;
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
        return view('dashboard.admin.document.create')->with([
            "types"  => DocumentType::getTypes(),
            "states" => DocumentState::getStates()
        ]);
    }

    public function store(Request $request)
    {

    }
}
