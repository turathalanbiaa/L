<?php


namespace App\Http\Interfaces;


interface DocumentRepositoryInterface
{
    public function getDocuments();

    public function getDocumentsByState($state, $itemsPerPage);
}
