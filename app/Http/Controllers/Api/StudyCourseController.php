<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudyCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyCourseController extends Controller
{
    use ApiResponseTrait;

    public function show(Request $request)
    {
        $id = $request->get('id');

        $StudyCourse=StudyCourse::find($id);
        if ($StudyCourse){
//            $remember_token = $request->get('remember_token');
//            $session = new SessionController();
//            $logged = $session->getToken($remember_token);

            return $this->apiResponse($StudyCourse,200,null);
        }
        return $this->notFoundResponse();
    }
    public function MyCourse(Request $request)
    {
        $id = $request->get('id');
        $StudyCourse = DB::table('study_courses')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();


        if ($StudyCourse){
//            $remember_token = $request->get('remember_token');
//            $session = new SessionController();
//            $logged = $session->getToken($remember_token);

            return $this->apiResponse($StudyCourse,200,null);
        }
        return $this->notFoundResponse();
    }
}
