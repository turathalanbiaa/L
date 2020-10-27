<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class MainController extends Controller
{
    /**
     * Show the admin page or go to the login page.
     *
     * @param Messaging $messaging
     * @return Factory|View
     */
    public function index(Messaging $messaging)
    {
//        if (!Cookie::has("ETA-Admin"))
//            return view("dashboard.admin.login");
//
//        $topic = 'users';
//        $data = [
//            "Id" => "12",
//            "From" => "12"
//        ];
//        $notification = [
//            "title" =>"معهد تراث النبياء (ع)",
//            "body" => "تم افتتاح دورة التل الزينبي"
//        ];
//
//        $message = CloudMessage::withTarget('topic', $topic)
//            ->withNotification($notification) // optional
//            ->withData($data) // optional
//            ->withAndroidConfig([
//                "notification"=> [
//                    "click_action"=> "SHOW_INFO",
//                    "channel_id"=> "3000"
//                ],
//                "priority"=> "high"
//            ]);
//
//        $x = $messaging->send($message);
//
//        dd($x);

        return view("dashboard.admin.main");
    }
}
