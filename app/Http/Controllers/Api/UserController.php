<?php

namespace App\Http\Controllers\Api;

use App\Enum\Certificate;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PeterColes\Countries\CountriesFacade as Countries;

class  UserController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);
        if ($users) {


            return $this->apiResponse(UserResource::collection($users), 200, null);
        } else {
            return $this->notFoundResponse();
        }
    }


    public function countries(Request $request)
    {
        $lang = $request->get('lang');
        $countries = Countries::keyValue($lang);
        return $this->apiResponse($countries, 200, null);

    }

    public function all_certificate($lang)
    {

        if ($lang == "ar") {
            $certificate = [
                ['key' => '1', 'value' => 'حوزوي'],
                ['key' => '2', 'value' => 'متوسطة'],
                ['key' => '3', 'value' => 'أعدادية'],
                ['key' => '4', 'value' => 'دبلوم'],
                ['key' => '5', 'value' => 'بكالوريوس'],
                ['key' => '6', 'value' => 'دراسات علي'],
                ['key' => '7', 'value' => 'دكتوراه'],
                ['key' => '8', 'value' => 'أخرى']
            ];

        } else {
            $certificate = [
                ['key' => '1', 'value' => 'Religion'],
                ['key' => '2', 'value' => 'Intermediate School'],
                ['key' => '3', 'value' => 'High School'],
                ['key' => '4', 'value' => 'Diploma'],
                ['key' => '5', 'value' => 'Bachelors'],
                ['key' => '6', 'value' => 'Master'],
                ['key' => '7', 'value' => 'PHD'],
                ['key' => '8', 'value' => 'Other']];

        }
        return $certificate;


    }

    public function certificate(Request $request)
    {
        $lang = $request->get('lang');
        $certificate = $this->all_certificate($lang);
        return $this->apiResponse($certificate, 200, null);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required',
            'type' => 'required'
        ]);
        if ($validatedData->fails()) {
            return $this->apiResponse(null, 402, $validatedData->errors());
        }
        $user = new User();
        $user->name = $request->get('name');
        $user->type = $request->get('type');
        $user->lang = $request->get('lang');
        $user->level = $request->get('level');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = md5($request->get('password'));
        $user->gender = $request->get('gender');
        $user->country = $request->get('country');
        $user->image = $request->get('image');
        $user->birthdate = $request->get('birthdate');
        $user->address = $request->get('address');
        $user->scientific_degree = $request->get('scientific_degree');
        $user->register_date = Date::now()->format('yyyy-MM-dd H:i:s');
        $user->last_login_date = $request->get('last_login_date');
        $user->verify_state = $request->get('verify_state');
        $user->remember_token = $request->get('remember_token');
        $user->save();
        return $this->apiResponse(new UserResource($user), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return $this->apiResponse(new UserResource($user), 200);
        }
        return $this->notFoundResponse();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        if ($user) {
            $user->name = $request->get('name');
            $user->country = $request->get('country');
            $user->birthdate = $request->get('birthdate');
            $user->address = $request->get('address');
            $user->scientific_degree = $request->get('scientific_degree');
            //  $user->type = $request->get('type');
            //  $user->lang =$request->get('lang');
            //  $user->level = $request->get('level');
            //  $user->email = $request->get('email');
            //  $user->phone = $request->get('phone');
            //  $user->password = md5($request->get('password'));
            //  $user->gender = $request->get('gender');
            //  $user->image = $request->get('image');
            //  $user->register_date = "";
            //  $user->last_login_date = $request->get('last_login_date');
            //  $user->verify_state =$request->get('verify_state');
            //  $user->remember_token = $request->get('remember_token');
            $user->save();
            return $this->apiResponse(new UserResource($user), 200);
        }
        return $this->notFoundResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return $this->apiResponse(new UserResource($user), 200);
        }
        return $this->notFoundResponse();
    }

    public function credentials(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

        if ($validatedData->fails()) {
            return $this->apiResponse(null, 402, $validatedData->errors());
        }

        if (is_numeric($request->get('login'))) {
            $user = User::where('phone', $request->get('login'))->first();
            if ($user) {
                if (md5($request->get('password') == $user->password)) {
                    $session = new SessionController();
                    $user->remember_token = $session->generateSessionId($user->id);

                    return $this->apiResponse(new UserResource($user), 200, null);
                }
            }
        }

        if (filter_var($request->get('login'), FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->get('login'))->first();

            if ($user) {

                if (md5($request->get('password')) == $user->password) {
                    $session = new SessionController();
                    $user->remember_token = $session->generateSessionId($user->id);
                    return $this->apiResponse(new UserResource($user), 200, null);
                }
            }
        }
        return $this->notFoundResponse();
    }
}
