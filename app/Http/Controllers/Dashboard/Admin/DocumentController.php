<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\DocumentState;
use App\Http\Controllers\Controller;
use App\Http\Repositories\DocumentRepository;
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
     * @return Factory|View
     */
    public function index()
    {
        return view("dashboard.admin.document.index")->with([
           "documents"   =>  $this->documentRepository->getDocumentsByState(DocumentState::REVIEW)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
