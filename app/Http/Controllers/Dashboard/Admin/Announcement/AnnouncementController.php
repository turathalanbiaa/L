<?php

namespace App\Http\Controllers\Dashboard\Admin\Announcement;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\Models\Announcement  $announcement
     * @return Response
     */
    public function edit(Announcement $announcement)
    {
        //
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
