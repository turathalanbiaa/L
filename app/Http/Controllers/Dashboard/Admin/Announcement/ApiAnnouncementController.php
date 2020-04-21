<?php

namespace App\Http\Controllers\Dashboard\Admin\Announcement;

use App\Enum\AnnouncementState;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\ApiResponseTrait;
use App\Models\Announcement;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Throwable;

class ApiAnnouncementController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display the specified announcement.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function show()
    {
        $announcement = self::getAnnouncement();
        $view = view("dashboard.admin.announcement.components.modal-show", compact("announcement"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Display Modal Remove.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function destroy()
    {
        $announcement = self::getAnnouncement();
        $view = view("dashboard.admin.announcement.components.modal-delete", compact("announcement"))->render();
        return $this->apiResponse(["html" => $view]);
    }

    /**
     * Update the specified announcement in storage.
     *
     * @return ResponseFactory|Response
     */
    public function changeState() {
        $announcement = self::getAnnouncement();
        if ($announcement) {
            $state = (integer)request()->input("state");
            $announcement->state = ($state == 0)
                ? AnnouncementState::INACTIVE
                : AnnouncementState::ACTIVE;
            $announcement->save();

            $toast = array(
                "title" => __("dashboard-admin/announcement.change-state.title-$announcement->state", ["number" => $announcement->id]),
                "type"  => "success",
            );
        }
        else
            $toast = array(
                "title" => __("dashboard-admin/announcement.change-state.title-error"),
                "type"  => "warning",
            );

        return $this->apiResponse([
            "toast" => $toast,
            "newState" => AnnouncementState::getStateName($announcement->state ?? "")
        ]);
    }

    /**
     * Get the specified announcement from storage.
     *
     * @return mixed
     */
    public static function getAnnouncement() {
        return Announcement::where("id", request()->input("announcement"))
            ->where("lang", app()->getLocale())
            ->first();
    }
}
