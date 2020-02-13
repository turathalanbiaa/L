<?php


namespace App\Http\Repositories;


use App\Http\Interfaces\DocumentRepositoryInterface;
use App\Models\Document;

class DocumentRepository implements DocumentRepositoryInterface
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }


    public function getDocuments()
    {
        // TODO: Implement getDocuments() method.
    }

    public function getDocumentsByState($state, $itemsPerPage)
    {
        // TODO: Implement getDocumentsByState() method.
        $documents = $this->document
            ->where('state', $state)
            ->paginate($itemsPerPage);

        return $documents;
    }
}
