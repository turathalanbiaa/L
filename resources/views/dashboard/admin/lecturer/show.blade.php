@extends("dashboard.admin.layout.app")

@section("title", $lecturer->name)

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs p-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-capitalize" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            @lang("dashboard-admin/lecturer.show.tab.profile")
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-capitalize" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">
                            @lang("dashboard-admin/lecturer.show.tab.courses")
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active pt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-sm-4">
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.name"): </strong>
                                    <span>{{$lecturer->name}}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.email"): </strong>
                                    <span>{{$lecturer->email}}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.phone"): </strong>
                                    <span>{{$lecturer->phone}}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.description"): </strong>
                                    <span>{!! $lecturer->description !!}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.last-login"): </strong>
                                    <span>{{$lecturer->last_login ?? "---"}}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.state"): </strong>
                                    <span>{{\App\Enum\LecturerState::getStateName($lecturer->state)}}</span>
                                </p>
                                <p>
                                    <strong>@lang("dashboard-admin/lecturer.label.created-at"): </strong>
                                    <span>{{$lecturer->created_at}}</span>
                                </p>
                                <a class="btn btn-outline-primary" href="{{route("dashboard.admin.lecturers.edit", ["lecturer" => $lecturer->id])}}">
                                    @lang("dashboard-admin/lecturer.show.profile-tab.btn-edit")
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <img class="img-fluid" src="{{asset("images/large".Storage::url($lecturer->image))}}" alt="Lecturer Image">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade pt-4" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <p class="heading">
                                    @lang("dashboard-admin/lecturer.show.courses-tab.header-study-courses")
                                </p>

                                @if($studyCourses->count() > 0)
                                    <div class="list-group col-sm-10 m-auto">
                                        @foreach($studyCourses as $course)
                                            <a class="list-group-item list-group-item-action" href="{{route("dashboard.admin.study-courses.show", ["study_course" => $course->id])}}">
                                                {{$course->name}}
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-info col-sm-10 m-auto">
                                        @lang("dashboard-admin/lecturer.show.courses-tab.message")
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm-6 text-center">
                                <p class="heading">
                                    @lang("dashboard-admin/lecturer.show.courses-tab.header-general-courses")
                                </p>

                                @if($generalCourses->count() > 0)
                                    <div class="list-group col-sm-10 m-auto">
                                        @foreach($generalCourses as $course)
                                            <a class="list-group-item list-group-item-action" href="{{route("dashboard.admin.general-courses.show", ["general_course" => $course->id])}}">
                                                {{$course->name}}
                                            </a>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-info col-sm-10 m-auto">
                                        @lang("dashboard-admin/lecturer.show.courses-tab.message")
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
