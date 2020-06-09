<?php

namespace App\Http\Controllers\Api;

use App\Enum\AnnouncementState;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    use SimpleResponseTrait;
    public function show(Request $request)
    {
        $id = $request->get('id');

        $Announcements= Announcement::find($id);
        if ($Announcements){

            return $this->apiResponse($Announcements,200,null);
        }
        return $this->apiResponse(null, 404, true);
    }
    public function lastAnnouncments(Request $request)
    {

        $type = $request->get('type');
        $lang = $request->get('lang');
        $limit = $request->get('limit');
        $Announcements = Announcement::where('state', AnnouncementState::ACTIVE)->where('lang', $lang)->where('type', $type)->orderBy('id', 'desc')->limit($limit)->get();
        if ($Announcements){
            return $this->apiResponse($Announcements,200,null);
        }
        else
        {
            return $this->apiResponse(null, 404, true);
        }

    }
    public function getallAnnouncment(Request $request)
    {
        $type = $request->get('type');
        $lang = $request->get('lang');
        $Announcements = Announcement::where('state', AnnouncementState::ACTIVE)->where('lang', $lang)->where('type', $type)->orderBy('id', 'desc')->paginate(15);

        if ($Announcements){
            return $this->apiResponse($Announcements,200,null);
        }
        return $this->apiResponse(null, 404, true);
    }
}
