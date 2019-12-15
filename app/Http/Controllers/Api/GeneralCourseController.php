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
    public function index()
    {
        $generalCourse=GeneralCourse::paginate(10);
        if ($generalCourse){
            return $this->apiResponse(GeneralCourseResource::collection($generalCourse));
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
    public function show($id)
    {
        $generalCourse=GeneralCourse::find($id);
        if ($generalCourse){
            return $this->apiResponse(new GeneralCourseResource($generalCourse),200);
        }
        return $this->notFoundResponse();
    }
    public function getCoursesByLang($lang)
    {
        $courses = GeneralCourse::where('lang', $lang)->paginate(10);
        if ($courses){
            return $this->apiResponse(GeneralCourseResource::collection($courses),200);
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
