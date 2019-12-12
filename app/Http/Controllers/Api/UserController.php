<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::paginate(10);
        if ($users){
       return $this->apiResponse(UserResource::collection($users));
        }
        else{
            return $this->notFoundResponse();
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
            'name' => 'required|min:2|max:50',
            'email' => 'required',
            'type' => 'required'
        ]);
        if($validatedData->fails()){
            return $this->apiResponse(null,402,$validatedData->errors());
        }
        $user = new User();
        $user->name = $request->get('name');
        $user->type = $request->get('type');
        $user->level = $request->get('level');
        $user->email = $request->get('email');
        $user->phone =$request->get('phone');
        $user->password = Hash::make($request->get('password'));
        $user->gender = $request->get('gender');
        $user->country = $request->get('country');
        $user->image = $request->get('image');
        $user->birthdate = $request->get('birthdate');
        $user->address = $request->get('address');
        $user->scientific_degree =$request->get('scientific_degree');
        $user->register_date = $request->get('register_date');
        $user->last_login_date = $request->get('last_login_date');
        $user->verify_state = $request->get('verify_state');
        $user->remember_token = $request->get('remember_token');
        $user->save();
        return $this->apiResponse(new UserResource($user),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        if ($user){
            return $this->apiResponse(new UserResource($user),200);
        }
            return $this->notFoundResponse();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $user=User::find($id);
        if ($user){
            $user->name = $request->get('name');
            $user->type = $request->get('type');
            $user->level = $request->get('level');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->password = $request->get('password');
            $user->gender = $request->get('gender');
            $user->country =$request->get('country');
            $user->image = $request->get('image');
            $user->birthdate = $request->get('birthdate');
            $user->address = $request->get('address');
            $user->scientific_degree = $request->get('scientific_degree');
            $user->register_date = $request->get('register_date');
            $user->last_login_date = $request->get('last_login_date');
            $user->verify_state =$request->get('verify_state');
            $user->remember_token = $request->get('remember_token');
            $user->save();
            return $this->apiResponse(new UserResource($user),200);
        }
        return $this->notFoundResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user){
            $user->delete();
            return $this->apiResponse(new UserResource($user),200);
        }
        return $this->notFoundResponse();
   }
   public function credentials(Request $request)
    {
        $validatedData=Validator::make($request->all(),[
            'login' => 'required',
            'password' => 'required',
        ]);
        if($validatedData->fails()){
            return $this->apiResponse(null,402,$validatedData->errors());
        }
        if (is_numeric($request->get('login')))
        {
            $user = User::where('phone', $request->get('login'))->first();
            if($user){
            if (Hash::check($request->get('password'), $user->password))
            {
                return $this->apiResponse(new UserResource($user),200);
            }}
        }
        if (filter_var($request->get('login'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->get('login'))->first();
            if($user){
            if (MD5::check($request->get('password'), $user->password))
            {
                return $this->apiResponse(new UserResource($user),200);
            }
            }
        }
        return $this->notFoundResponse();
   }
}
