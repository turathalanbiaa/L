<?php

namespace App\Http\Controllers\Api;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationsCollection;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->middleware("getCurrentUser");
    }

    public function all()
    {
        $user = request()->user;

        $notifications = Notifications::whereIn('receiver', [
            "users",
            ($user->type == UserType::STUDENT)
                ? "students"
                : "listeners",
            "user_".$user->id,
            ($user->enrolledGeneralCourses()->isEmpty())
                ? null
                : $user->enrolledGeneralCourses()->filter(function ($generalCourse) {return "general_course_".$generalCourse->id;})
        ])->paginate(20);
        NotificationsCollection::collection($notifications);

        return $this->paginateResponse($notifications);
    }
}
