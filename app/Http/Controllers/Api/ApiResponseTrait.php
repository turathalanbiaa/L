<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait{

    function apiResponse($data=null,$code=200,$error=""){
$array=[
    'data' => $data,
    'status' =>in_array($code,$this->successCode())? true : false,
    'error'=> $error
];

    function apiResponse($data=null,$code=200,$error=false){
        $array=[
            'data' => $data,
            'status' =>in_array($code,$this->successCode())? true : false,
            'error'=> $error
        ];

        return response($array,$code);
    }
    function successCode(){
        return [
            200,201,202
        ];
    }

    function notFoundResponse(){
        return $this->apiResponse(null,404,'Not found!');
    }
}
