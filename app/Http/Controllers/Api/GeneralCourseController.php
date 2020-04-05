<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\GeneralCourse;
use Illuminate\Http\Request;
use App\Http\Resources\GeneralCourse as GeneralCourseResource;

class GeneralCourseController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $generalCourse=GeneralCourse::paginate(5);
        if ($generalCourse){


            return $this->apiResponse($generalCourse,200,null);
        }
        else{
            return $this->notFoundResponse();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $generalCourse=GeneralCourse::find($id);
        if ($generalCourse){
            $remember_token = $request->get('remember_token');
            $session = new SessionController();
            $logged = $session->getToken($remember_token);

            return $this->apiResponse(new GeneralCourseResource($generalCourse),200,null,$logged);
        }
        return $this->notFoundResponse();
    }
    public function getCoursesByLang($lang,$id)
    {
        $session = new SessionController($id);
        $remember_token = $session->getSessionId();

        $courses = GeneralCourse::where('lang', $lang)->paginate(10);
        if ($courses){
            return $this->apiResponse(GeneralCourseResource::collection($courses),200,null,$remember_token);
        }
        return $this->notFoundResponse();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
