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
     * @return Factory|View
     */
    public function index(Messaging $messaging)
    {
        if (!Cookie::has("ETA-Admin"))
            return view("dashboard.admin.login");

//        $topic = 'all';
//        $data = [
//            "Id" => "9079",
//            "From" => "الفصول الفرع الرئيسي",
//            "Vendor" => "1"
//        ];
//        $notification = [
//            "title" =>"NewsMagazine.com",
//            "body" => "This is tez."
//        ];
//
//        $message = CloudMessage::withTarget('topic', $topic)
//            ->withNotification($notification) // optional
//            ->withData($data) // optional
//            ->withAndroidConfig([
//                "notification"=> [
//                    "click_action"=> "SHOW_ITEM_INFO",
//                    "channel_id"=> "3000"
//                ],
//                "priority"=> "high"
//            ]);
//
//        $messaging->send($message);

        return view("dashboard.admin.main");
    }
}
