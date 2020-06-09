<?php

namespace App\Http\Controllers\Api;

trait ResponseTrait{
    public function simpleResponse($data = null) {
        return response()->json([
            'data'   => $data,
            'status' => true,
            'error'  => null
        ]);
    }

    public function simpleResponseWithError($error) {
        return response()->json([
            'data'   => null,
            'status' => false,
            'error'  => $error
        ]);
    }

    public function paginateResponse($collection, $status = true, $error = null) {
        $array = $collection->toArray();
        $data = empty($array["data"]) ? null : $array["data"];
        $currentPage = $array["current_page"];
        $maxPage = ceil($array["total"]/$array["per_page"]);
        $status =  ($currentPage > $maxPage && $maxPage > 1) ? false : true;
        $error = ($status) ? null : "out of range";
        return response()->json([
            'data'         => $data,
            "current_page" => $currentPage,
            "max_page"     => $maxPage,
            'status'       => $status,
            'error'        => $error
        ]);
    }
}
