<?php


namespace App\Http\Controllers\Dashboard;


trait ResponseTrait
{
    public function response($data) {
        return response()->json([
            'data'   => $data,
            'status' => true,
            'error'  => null
        ]);
    }

    public function responseWithError($error) {
        return response()->json([
            'data'   => null,
            'status' => false,
            'error'  => $error
        ]);
    }
}
