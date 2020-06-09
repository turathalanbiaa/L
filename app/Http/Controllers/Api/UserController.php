<?php

namespace App\Http\Controllers\Api;

use App\Enum\Certificate;
use App\Enum\Stage;
use App\Enum\UserState;
use App\Enum\UserType;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PeterColes\Countries\CountriesFacade as Countries;

class  UserController extends Controller
{
    use SimpleResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(10);
        if ($users) {
//            $element = $users->count("selector");
//          $element =   array_filter([
//                $users['first'],
//                is_array($users['slider']) ? '...' : null,
//                $users['slider'],
//                is_array($users['last']) ? '...' : null,
//                $users['last'],
//            ]);
//        dd($element);
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


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function listener_store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required'
        ]);
        if ($validatedData->fails()) {
            {if($request->get('lang') == "ar"){
                return $this->apiResponse(null, 402,"تأكد من القيم المدخلة");
            }else{
                return $this->apiResponse(null, 402, "Check the entered values");
            }}

        }

        $user = User::where('email', $request->get('email'))->first();
        if($user)
        {if($request->get('lang') == "ar"){
                return $this->apiResponse(null, 402,"لا يمكن التسجيل بهذا الايميل");
            }else{
                return $this->apiResponse(null, 402,"cannot register by this email");
            }}
        $user = User::where('phone', $request->get('phone'))->first();
        if($user)
        {if($request->get('lang') == "ar"){
                return $this->apiResponse(null, 402,"لا يمكن التسجيل بهذا الرقم");
            }else{
                return $this->apiResponse(null, 402,"cannot register by this phone");
            }}

        $user = new User();
        $user->name = $request->get('name');
        $user->lang = $request->get('lang');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = md5($request->get('password'));
        $user->gender = $request->get('gender');
        $user->country = $request->get('country');

        $user->type = UserType::LISTENER;
        $user->created_at = Carbon::now()->toDateString();
        $user->state = UserState::UNTRUSTED;

        //    $user->stage = Stage::BEGINNER_STAGE;
        //  $user->image = $request->get('image');
        // $user->birthdate = $request->get('birthdate');
        //  $user->address = $request->get('address');
        // $user->scientific_degree = $request->get('scientific_degree');

        //  $user->last_login_date = $request->get('last_login_date');

        //  $user->remember_token = $request->get('remember_token');
        $user->save();
        return $this->apiResponse(new UserResource($user), 201);
    }

    public function student_store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required'
        ]);
        if ($validatedData->fails()) {
            {if($request->get('lang') == "ar"){
                return $this->apiResponse(null, 200,"تأكد من القيم المدخلة");
            }else{
                return $this->apiResponse(null, 200, "Check the entered values");
            }}
        }

//        if ($validatedData->fails()) {
//            return $this->apiResponse(null, 402, $validatedData->errors());
//        }

        $user = User::where('email', $request->get('email'))->first();
        if($user)
        {if($request->get('lang') == "ar"){
            return $this->apiResponse(null, 200,"لا يمكن التسجيل بهذا الايميل");
        }else{
            return $this->apiResponse(null, 200,"cannot register by this email");
        }}
        $user = User::where('phone', $request->get('phone'))->first();
        if($user)
        {if($request->get('lang') == "ar"){
            return $this->apiResponse(null, 200,"لا يمكن التسجيل بهذا الرقم");
        }else{
            return $this->apiResponse(null, 200,"cannot register by this phone");
        }}


        $user = new User();
        $user->name = $request->get('name');
        $user->lang = $request->get('lang');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = md5($request->get('password'));
        $user->gender = (int)$request->get('gender');
        $user->country = $request->get('country');
        $user->birth_date = $request->get('birthdate');
        $user->address = $request->get('address');
        $user->certificate = $request->get('certificate');

        $user->stage = Stage::BEGINNER_STAGE;
        $user->type = UserType::STUDENT;
        $user->created_at = Carbon::now()->toDateString();
        $user->state = UserState::UNTRUSTED;
        //  $user->last_login_date = $request->get('last_login_date');
        //  $user->image = $request->get('image');
        //  $user->remember_token = $request->get('remember_token');
        $user->save();
        return $this->apiResponse(new UserResource($user), 200);
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

                return $this->apiResponse(null, 402,"تأكد من القيم المدخلة");


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
                }else
                {
                    if($user->lang == "ar")
                    {
                        return $this->apiResponse(null, 402,"خطأ في رمز الدخول");
                    }else{
                        return $this->apiResponse(null, 402,"Wrong Password");
                    }
                }
            }
        }
        return $this->notFoundResponse();
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
                ['key' => '8', 'value' => 'Other']
            ];

        }
        return $certificate;


    }

    public function certificate(Request $request)
    {
        $lang = $request->get('lang');
        $certificate = $this->all_certificate($lang);
        return $this->apiResponse($certificate, 200, null);

    }
}
