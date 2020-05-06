@extends("dashboard.admin.layout.app")

@section("title", $user->name)

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs p-0" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-capitalize" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            @lang("dashboard-admin/user.show.tab.profile")
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents" aria-selected="false">
                            @lang("dashboard-admin/user.show.tab.documents")
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active pt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>
                            <strong>@lang("dashboard-admin/user.label.name"): </strong>
                            <span>{{$user->name}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.type"): </strong>
                            <span>{{\App\Enum\UserType::getTypeName($user->type)}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.email"): </strong>
                            <span>{{$user->email}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.phone"): </strong>
                            <span>{{$user->phone}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.gender"): </strong>
                            <span>{{\App\Enum\Gender::getGenderName($user->gender)}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.country"): </strong>
                            <span>{{Countries::getValue(app()->getLocale(), $user->country)}}</span>
                        </p>
                        @if($user->type == \App\Enum\UserType::STUDENT)
                            <p>
                                <strong>@lang("dashboard-admin/user.label.stage"): </strong>
                                <span>{{\App\Enum\Stage::getStageName($user->stage)}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.label.birth-date"): </strong>
                                <span>{{$user->birth_date}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.label.address"): </strong>
                                <span>{{$user->address}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.label.certificate"): </strong>
                                <span>{{\App\Enum\Certificate::getCertificateName($user->certificate)}}</span>
                            </p>
                        @endif
                        <p>
                            <strong>@lang("dashboard-admin/user.label.last-login"): </strong>
                            <span>{{$user->last_login ?? "---"}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.label.state"): </strong>
                            <span>{{\App\Enum\UserState::getStateName($user->state)}}</span>
                        </p>
                        <a class="btn btn-outline-primary" href="{{route("dashboard.admin.users.edit", ["user" => $user->id])}}">
                            @lang("dashboard-admin/user.show.profile-tab.btn-edit")
                        </a>
                    </div>
                    <div class="tab-pane fade pt-4" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                        @include("dashboard.admin.document.share.user-documents", ["user" => $user])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
