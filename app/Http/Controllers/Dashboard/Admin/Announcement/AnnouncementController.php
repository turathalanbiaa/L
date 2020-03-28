<?php

namespace App\Http\Controllers\Dashboard\Admin\Announcement;

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateAnnouncementRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard.auth');
        $this->middleware('dashboard.role:Announcement');
        $this->middleware('filter:announcement-type')->only(['index']);
        $this->middleware('filter:announcement-update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = request()->input('type');
        $announcements = is_null($type)?
            Announcement::where('lang', app()->getLocale())
                ->latest()
                ->get():
            Announcement::where('lang', app()->getLocale())
                ->where('type', request()->input('type'))
                ->latest()
                ->get();

        return view("dashboard.admin.announcement.index")->with([
            "type" => $type,
            "announcements" => $announcements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("dashboard.admin.announcement.create")->with([
            "types" => AnnouncementType::getTypes(),
            "states" => AnnouncementState::getStates()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAnnouncementRequest $request
     * @return RedirectResponse
     */
    public function store(CreateAnnouncementRequest $request)
    {
        $announcement = Announcement::create([
            "lang"          => app()->getLocale(),
            "title"         => $request->input('title'),
            "description"   => $request->input('description'),
            "image"         => is_null($request->file('image'))?null:Storage::put("public/announcement", $request->file('image')),
            "youtube_video" => $request->input('youtube_video'),
            "type"          => $request->input('type'),
            "state"         => $request->input('state'),
            "created_at"    => date("Y-m-d"),
        ]);

        if (!$announcement)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/announcement.store.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/announcement.store.success"),
                    "type" => "success"
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Announcement $announcement
     */
    public function show(Announcement $announcement)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Announcement $announcement
     * @return Factory|View
     */
    public function edit(Announcement $announcement)
    {
        return view("dashboard.admin.announcement.edit")->with([
            "announcement" => $announcement,
            "types" => AnnouncementType::getTypes(),
            "states" => AnnouncementState::getStates()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAnnouncementRequest $request
     * @param Announcement $announcement
     * @return RedirectResponse
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        switch ($request->input('update')) {
            case "content":
                $data = [
                    "title"         => $request->input("title"),
                    "description"   => $request->input("description"),
                    "youtube_video" => $request->input("youtube_video"),
                    "type"          => $request->input("type"),
                    "state"         => $request->input("state"),
                    "created_at"    => $request->input("created_at"),
                ];
                break;
            case "image":
                $image = $announcement->image;
                if($request->input('deleted') || $request->file('image')) {
                    Storage::delete($image);
                    $image  = null;
                }
                $data = [
                    "image" => is_null($request->file('image'))?$image:Storage::put("public/announcement", $request->file('image')),
                ];
                break;
            default: $data = array();
        }

        Announcement::where("id", $announcement->id)->update($data);

        if (!$announcement)
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/announcement.update.failed"),
                    "type" => "warning"
                ]);
        else
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/announcement.update.success"),
                    "type" => "success"
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Announcement $announcement
     */
    public function destroy(Announcement $announcement)
    {
        abort(404);
    }
}
