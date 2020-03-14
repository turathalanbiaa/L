<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait{
<<<<<<< HEAD
    public function apiResponse($data=null,$code=200,$error=""){
$array=[
    'data' => $data,
    'status' =>in_array($code,$this->successCode())? true : false,
    'error'=> $error
];
=======
    public function apiResponse($data=null,$code=200,$error=false){
        $array=[
            'data' => $data,
            'status' =>in_array($code,$this->successCode())? true : false,
            'error'=> $error
        ];
>>>>>>> 3a8d522b5fd14282f69b168616689685738a0973
        return response($array,$code);
    }
    public function successCode(){
        return [
            200,201,202
        ];
    }

    public function notFoundResponse(){
        return $this->apiResponse(null,404,'Not found!');
    }
}
