<?php

namespace Website\Http\Controllers;

use App\Enum\Country;
use App\Enum\Gender;
use App\Enum\ScientificDegree;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Website\Http\Interfaces\UserRepositoryInterface;
use Website\Http\Requests\CreateListenerRequest;
use Website\Http\Requests\CreateStudentRequest;

class MainController extends Controller
{
    public function index()
   {
       // Visitor
       if (!Cookie::has("ETA") && !session()->has("eta"))
           return view('Website::visitor.index');

       // User
       Auth::check();
       return view('Website::user.index');
   }

    public function createStudentAccount()
    {
        if (!Cookie::has("ETA") && !session()->has("eta"))
            return view("Website::visitor.create-student-account")->with([
            "genderList" => Gender::getList(),
            "scientificDegreeList" => ScientificDegree::getList(),
            "countries" => Country::getList()
        ]);
    }

    public function storeStudentAccount(CreateStudentRequest $request, UserRepositoryInterface $userRepository)
    {
        $student = $userRepository->storeStudent($request);

        if (!$student)
            return redirect("/create-student-account")
                ->withInput()
                ->withErrors(["password" => "هذا الحقل مطلوب"])
                ->with(["error" => "اضغط ارسال لاعادة المحاولة"]);

        $userRepository->generateSession($student);
        $userRepository->generateCookie($student);

        return redirect("/");
    }

    public function createListenerAccount()
    {
        return view("Website::visitor.create-listener-account")->with([
            "genderList" => Gender::getList(),
            "countries" => Country::getList()
        ]);
    }

    public function storeListenerAccount(CreateListenerRequest $request, UserRepositoryInterface $userRepository)
    {
        $listener = $userRepository->storeListener($request);

        if (!$listener)
            return redirect("/create-listener-account")
                ->withInput()
                ->withErrors(["password" => "هذا الحقل مطلوب"])
                ->with(["error" => "اضغط ارسال لاعادة المحاولة"]);

        $userRepository->generateSession($listener);
        $userRepository->generateCookie($listener);

        return redirect("/");
    }
}
