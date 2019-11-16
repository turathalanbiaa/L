<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Website\Mail\ContactMail;

class ContactController extends Controller
{
    public function store()
    {
        $data = array(
            'name' => Input::get("name"),
            'email' => Input::get("email"),
            'subject' => Input::get("subject"),
            'message' => Input::get("message")
        );

        Mail::to("info@turathalanbiaa.com")->send(new ContactMail($data));

        if (Mail::failures())
            return "false";

        return "true";
    }
}
