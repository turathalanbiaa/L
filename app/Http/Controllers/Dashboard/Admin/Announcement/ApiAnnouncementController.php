<?php

namespace App\Http\Controllers\Dashboard\Admin\Announcement;

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
     * Display the specified resource.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function show()
    {
        $announcement = Announcement::where('id', request()->input('announcement'))
            ->where('lang', app()->getLocale())
            ->first();

        $view = view('dashboard.admin.announcement.components.modal-show', compact('announcement'))->render();
        return $this->apiResponse(['html' => $view]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return ResponseFactory|Response
     * @throws Throwable
     */
    public function destroy()
    {
        $announcement = Announcement::where('id', request()->input('announcement'))
            ->where('lang', app()->getLocale())
            ->first();

        $view = view('dashboard.admin.announcement.components.modal-delete', compact('announcement'))->render();
        return $this->apiResponse(['html' => $view]);
    }
}
