<?php

namespace App\Http\Controllers\Dashboard\Admin\Document;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiDocumentController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request) {


        $validation = Validator::make($request->all(), [
            'file' => 'required|image'
        ]);

        if ($validation->passes())
        {
            $path = Storage::put("public/user/temp", $request->file('file'));
            return response()->json([
                "message" => $path,
                "image_path" => ""
            ]);
        }
        else
        {
            return response()->json([
                "message" => $validation->errors()->all(),
                "image_path" => ""
            ]);
        }
    }

    public function accept() {

    }

    public function reject() {

    }
}
