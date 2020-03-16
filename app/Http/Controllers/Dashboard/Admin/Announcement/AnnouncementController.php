<?php

namespace App\Http\Controllers\Dashboard\Admin\Announcement;

use App\Enum\AnnouncementState;
use App\Enum\AnnouncementType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateAnnouncementRequest;
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
            "url"           => $request->input('url'),
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
     * @param  \App\Models\Announcement  $announcement
     * @return Response
     */
    public function show(Announcement $announcement)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
