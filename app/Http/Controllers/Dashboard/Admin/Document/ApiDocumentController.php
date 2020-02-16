<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;

class ApiDocumentController extends Controller
{
    use ApiResponseTrait;

    public function store() {
        return $this->apiResponse(null, 200, false);
    }

    public function accept() {

    }

    public function reject() {

    }
}
