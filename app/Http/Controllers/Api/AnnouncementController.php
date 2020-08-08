<?php

namespace App\Http\Controllers\Api;

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Announcement\AnnouncementsCollection;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser");
    }

    public function all()
    {
        $user = request()->user;
        $types = array(($user->type == UserType::STUDENT) ? AnnouncementType::STUDENTS : AnnouncementType::LISTENERS, AnnouncementType::BOTH);
        $announcements = Announcement::where(["lang" => $user->lang, "state" => AnnouncementState::ACTIVE])
            ->whereIn("type", $types)
            ->paginate(request()->input("numberOfAnnouncements", 10));
        AnnouncementsCollection::collection($announcements);

        return $this->paginateResponse($announcements);
    }
}
