@extends("dashboard.admin.layout.app")

@section("title", $lecturer->name)

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs nav-fill p-0" id="myTab" role="tablist">
                    {{-- Profile Tab --}}
                    <li class="nav-item">
                        <a class="nav-link active text-capitalize" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            @lang("dashboard-admin/lecturer.show.tab.profile")
                        </a>
                    </li>
                    {{-- Course Tab --}}
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">
                            @lang("dashboard-admin/lecturer.show.tab.courses")
                        </a>
                    </li>
                    {{-- State Account Tab --}}
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" id="state-account-tab" data-toggle="tab" href="#state-account" role="tab" aria-controls="state-account" aria-selected="false">
                            @lang("dashboard-admin/lecturer.show.tab.state-account")
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    {{-- Profile Tab Content --}}
                    <div class="tab-pane fade show active pt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row justify-content-center">
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
                    {{-- Course Tab Content --}}
                    <div class="tab-pane fade pt-4" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 text-center">
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
                            <div class="col-sm-4 text-center">
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
                    {{-- State Account Tab Content --}}
                    <div class="tab-pane fade pt-4" id="state-account" role="tabpanel" aria-labelledby="state-account-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center p-4">
                                    <div class="h5-responsive">
                                        {{$message}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
