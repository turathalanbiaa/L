<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ApiUserController extends Controller
{
    public function info()
    {
        $user = User::where('id', request()->input('user'))
            ->where('lang', app()->getLocale())
            ->first();

        $view = view('dashboard.admin.user.components.modal-info',compact('user'))->render();
        return response()->json(['html' => $view]);
    }
}
