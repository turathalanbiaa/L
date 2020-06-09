<?php

namespace App\Http\Controllers\Dashboard\Admin\Lecturer;

use App\Enum\LecturerState;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\CreateLecturerRequest;
use App\Http\Requests\Dashboard\Admin\UpdateLecturerRequest;
use App\Models\Lecturer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware("dashboard.auth");
        $this->middleware("dashboard.role:Lecturer");
        $this->middleware("filter:lecturer-state")->only(["index", "changeState"]);
        $this->middleware("filter:lecturer-update")->only(["update"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $state = request()->input("state");
        $lecturers = is_null($state)
            ? Lecturer::select(["id", "name", "email", "phone", "last_login", "state"])
                ->latest()
                ->get()
            : Lecturer::select(["id", "name", "email", "phone", "last_login", "state"])
                ->where("state", $state)
                ->latest()
                ->get();

        return view("dashboard.admin.lecturer.index")->with([
            "state"     => $state,
            "lecturers" => $lecturers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("dashboard.admin.lecturer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLecturerRequest $request
     * @return RedirectResponse
     */
    public function store(CreateLecturerRequest $request)
    {
        $lecturer = Lecturer::create([
            "name"           => $request->input("name"),
            "email"          => $request->input("email"),
            "phone"          => $request->input("phone"),
            "password"       => md5($request->input("password")),
            "description"    => $request->input("description"),
            "image"          => null,
            "created_at"     => date("Y-m-d"),
            "last_login"     => null,
            "state"          => $request->input("state"),
            "remember_token" => null
        ]);

        if (!$lecturer)
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/lecturer.store.failed"),
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/lecturer.store.success"),
                "type"    => "success"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Lecturer $lecturer
     * @return Factory|View
     */
    public function show(Lecturer $lecturer)
    {
        self::checkView($lecturer);
        return view("dashboard.admin.lecturer.show")->with([
            "lecturer"       => $lecturer,
            "studyCourses"   => $lecturer->studyCourses,
            "generalCourses" => $lecturer->generalCourses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lecturer $lecturer
     * @return Factory|View
     */
    public function edit(Lecturer $lecturer)
    {
        self::checkView($lecturer);
        return view("dashboard.admin.lecturer.edit")->with([
            "lecturer" => $lecturer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLecturerRequest $request
     * @param Lecturer $lecturer
     * @return RedirectResponse
     */
    public function update(UpdateLecturerRequest $request, Lecturer $lecturer)
    {
        self::checkView($lecturer);
        switch ($request->input("update")) {
            case "info":
                $data = [
                    "name"        => $request->input("name"),
                    "email"       => $request->input("email"),
                    "phone"       => $request->input("phone"),
                    "description" => $request->input("description"),
                    "state"       => $request->input("state")
                ];
                break;
            case "pass":
                $data = [
                    "password" => md5($request->input("password"))
                ];
                break;
            default: $data = array();
        }
        Lecturer::where("id", $lecturer->id)->update($data);

        if (!$lecturer)
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    "message" => __("dashboard-admin/lecturer.update.failed"),
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/lecturer.update.success"),
                "type"    => "success"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Lecturer $lecturer
     */
    public function destroy(Lecturer $lecturer)
    {
        abort(404);
    }

    /**
     * Change state for the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function changeState() {
        $lecturer = Lecturer::findorFail(request()->input("id"));
        self::checkView($lecturer);
        $lecturer->state = ((integer)request()->input("state") == LecturerState::INACTIVE)
            ? LecturerState::INACTIVE
            : LecturerState::ACTIVE;
        $lecturer->save();

        if (!$lecturer)
            return redirect()
                ->back()
                ->with([
                    "message" => __("dashboard-admin/lecturer.change-state.failed-$lecturer->state"),
                    "type"    => "warning"
                ]);

        return redirect()
            ->back()
            ->with([
                "message" => __("dashboard-admin/lecturer.change-state.success-$lecturer->state"),
                "type"    => "success"
            ]);
    }

    /**
     * Check permission to view the specified resource.
     *
     * @param Lecturer $lecturer
     */
    public static function checkView(Lecturer $lecturer) {
//        if ($lecturer->lang != app()->getLocale())
//            abort(404);
    }
}
