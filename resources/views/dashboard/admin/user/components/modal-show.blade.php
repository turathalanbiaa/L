<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify" role="document">
        <div class="modal-content">
            <div class="modal-header secondary-color text-white">
                <p class="heading lead text-capitalize">
                    @lang("dashboard-admin/user.components.modal-show.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($user)
                        <div class="col-12">
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.name"): </strong>
                                <span>{{$user->name}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.email"): </strong>
                                <span>{{$user->email}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.phone"): </strong>
                                <span>{{$user->phone}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.gender"): </strong>
                                <span>{{\App\Enum\Gender::getGenderName($user->gender)}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.country"): </strong>
                                <span>{{Countries::getValue(app()->getLocale(), $user->country)}}</span>
                            </p>
                            @if($user->type == \App\Enum\UserType::STUDENT)
                                <p class="card-text">
                                    <strong>@lang("dashboard-admin/user.label.stage"): </strong>
                                    <span>{{\App\Enum\Stage::getStageName($user->stage)}}</span>
                                </p>
                                <p class="card-text">
                                    <strong>@lang("dashboard-admin/user.label.certificate"): </strong>
                                    <span>{{\App\Enum\Certificate::getCertificateName($user->certificate)}}</span>
                                </p>
                                <p class="card-text">
                                    <strong>@lang("dashboard-admin/user.label.birth-date"): </strong>
                                    <span>{{$user->birth_date}}</span>
                                </p>
                                <p class="card-text">
                                    <strong>@lang("dashboard-admin/user.label.address"): </strong>
                                    <span>{{$user->address}}</span>
                                </p>
                            @endif
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.created-at"): </strong>
                                <span>{{$user->created_at}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.last-login"): </strong>
                                <span>{{$user->last_login ?? "---"}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/user.label.state"): </strong>
                                <span>{{\App\Enum\UserState::getStateName($user->state)}}</span>
                            </p>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center p-4">
                                <div class="h5-responsive">
                                    @lang("dashboard-admin/user.components.modal-show.error-message")
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($user)
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-secondary" type="button" href="{{route("dashboard.admin.users.show", ["user" => $user->id])}}">
                        @lang('dashboard-admin/user.components.modal-show.btn-info')
                    </a>
                    <a class="btn btn-outline-secondary" type="button" data-dismiss="modal">
                        @lang('dashboard-admin/user.components.modal-show.btn-dismiss')
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
