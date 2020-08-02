<?php

namespace App\Http\Controllers\Api;

use App\Enum\Certificate;
use App\Enum\Gender;
use App\Enum\Language;
use App\Enum\UserType;
use App\Http\Resources\User\SingleUser;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PeterColes\Countries\CountriesFacade as Countries;

class  UserController extends Controller
{
    use ResponseTrait;

    public function register(Request $request)
    {
        $rules = [
            "name"        => ["required"],
            "type"        => ["required", Rule::in(UserType::getTypes())],
            "lang"        => ["required", Rule::in(Language::getLanguages())],
            "email"       => ["required", "email", "unique:users,email"],
            "phone"       => ["required", "unique:users,phone"],
            "password"    => ["required", "min:8", "confirmed"],
            "gender"      => ["required", Rule::in(Gender::getGenders())],
            "country"     => ["required", Rule::in(array_keys((Countries::lookup(app()->getLocale()))->toArray()))],
            "certificate" => ["exclude_if:type,2", "required", Rule::in(Certificate::getCertificates())],
            "birth_date"  => ["exclude_if:type,2", "required", "date", "before:".date('Y-m-d', strtotime('-15 years +1 day'))],
            "address"     => ["exclude_if:type,2", "required"]
        ];

        if (app()->getLocale() == Language::ARABIC)
            $messages = [
                "name.required"        => "حقل الاسم مطلوب",
                "type.required"        => "حقل النوع مطلوب",
                "type.in"              => "النوع المحدد غير مقبول",
                "lang.required"        => "حقل اللغة مطلوب",
                "lang.in"              => "اللغة المحدد غير مقبولة",
                "email.required"       => "حقل البريد الإلكتروني مطلوب",
                "email.email"          => "البريد الالكتروني غير مقبول",
                "email.unique"         => "البريد الالكتروني محجوز",
                "phone.required"       => "حقل الهاتف مطلوب",
                "phone.unique"         => "الهاتف محجوز",
                "password.required"    => "حقل كلمة المرور مطلوب",
                "password.min"         => "يجب أن تتكون كلمة المرور من 8 أحرف على الأقل",
                "password.confirmed"   => "كلمتا المرور غير متطابقتان",
                "gender.required"      => "حقل الجنس مطلوب",
                "gender.in"            => "الجنس المحدد غير مقبول",
                "country.required"     => "حقل البلد مطلوب",
                "country.in"           => "البلد المحدد غير مقبول",
                "certificate.required" => "حقل الشهادة مطلوب",
                "certificate.in"       => "الشهادة المحدده غير مقبولة",
                "birth_date.required"  => "حقل تاريخ الميلاد مطلوب",
                "birth_date.date"      => "التاريخ غير مقبول",
                "birth_date.before"    => "العمر يجب ان لايقل عن 15 سنة",
                "address.required"     => "حقل العنوان مطلوب"
            ];

        $validation = Validator::make($request->all(), $rules, $messages ?? []);

        if (!$validation->passes())
            return $this->simpleResponseWithMessage(false, implode(",", $validation->errors()->all()) );

        $request->merge([
            "password" => md5($request->input("password")),
            "token"    => self::generateToken()
            ]);

        if (!User::create($request->all()))
            return $this->simpleResponseWithMessage(false, "try again");

        return $this->simpleResponse(new SingleUser(User::where("email", $request->input("email"))->first()));
    }

    public function login(Request $request)
    {
        $username = $request->input("username");
        $password = md5($request->input("password"));

        if (is_null($username))
            $usernameRules = ["required"];
        elseif (is_numeric($username))
            $usernameRules = ["required", "exists:users,phone"];
        else
            $usernameRules = ["required", "email", "exists:users,email"];

        $rules = [
            "username" => $usernameRules,
            "password" => ["required", "min:8"]
        ];

        if (app()->getLocale() == Language::ARABIC)
            $messages = [
                "username.required" => "حقل اسم المستخدم مطلوب",
                "username.email"    => "البريد الإلكتروني غير مقبول",
                "username.exists"   => "اسم المستخدم غير موجود",
                "password.required" => "حقل كلمة المرور مطلوب",
                "password.min"      => "يجب أن تتكون كلمة المرور من 8 أحرف على الأقل"
            ];

        $validation = Validator::make($request->all(), $rules, $messages ?? []);

        if (!$validation->passes())
            return $this->simpleResponseWithMessage(false, implode(",", $validation->errors()->all()));

        $user = User::where(["email" => $username, "password" => $password])
            ->orWhere(["phone" => $username, "password" => $password])
            ->first();

        if (!$user)
            return $this->simpleResponseWithMessage(false, "login failed");

        $user->last_login = date("Y-m-d h:s:m");
        $user->token = self::generateToken();
        $user->save();

        return $user;

        return $this->simpleResponse(New SingleUser($user));
    }

    public static function generateToken()
    {
        return hash_hmac("sha256", microtime(), bcrypt(mt_rand()));
    }
}
