<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
class AnnouncementController extends Controller
{

    public function show(Request $request)
    {
        $id = $request->get('id');

        $Announcements= Announcement::find($id);
        if ($Announcements){

            return $this->apiResponse($Announcements,200,null);
        }
        return $this->apiResponse(null, 404, true);
    }
    public function lastThreeAnnouncment(Request $request)
    {
        $type = $request->get('type');
        $lang = $request->get('lang');
        $Announcements = Announcement::where('lang', $lang)->where('type', $type)->orderBy('id', 'desc') ->limit(3)->get();
        if ($Announcements){
            return $this->apiResponse($Announcements,200,null);
        }
        return $this->apiResponse(null, 404, true);
    }
    public function getallAnnouncment(Request $request)
    {
        $type = $request->get('type');
        $lang = $request->get('lang');
        $Announcements = Announcement::where('lang', $lang)->where('type', $type)->orderBy('id', 'desc')->paginate(15);
        if ($Announcements){
            return $this->apiResponse($Announcements,200,null);
        }
        return $this->apiResponse(null, 404, true);
    }
}
