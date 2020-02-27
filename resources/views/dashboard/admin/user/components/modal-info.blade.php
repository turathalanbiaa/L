<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead text-capitalize">
                    @if($user)
                        @lang("dashboard-admin/user.components.modal-info.header-$user->type")
                    @else
                        @lang("dashboard-admin/user.components.modal-info.header")
                    @endif
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($user)
                        <div class="col-12">
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.name'): </strong>
                                <span>{{$user->name}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.email'): </strong>
                                <span>{{$user->email}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.phone'): </strong>
                                <span>{{$user->phone}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.gender'): </strong>
                                <span>{{\App\Enum\Gender::getGenderName($user->gender)}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.country'): </strong>
                                <span>{{Countries::getValue(app()->getLocale(), $user->country)}}</span>
                            </p>
                            @if($user->type == \App\Enum\UserType::STUDENT)
                                <p class="card-text">
                                    <strong> @lang('dashboard-admin/user.column.stage'): </strong>
                                    <span>{{\App\Enum\Stage::getStageName($user->stage)}}</span>
                                </p>
                                <p class="card-text">
                                    <strong> @lang('dashboard-admin/user.column.certificate'): </strong>
                                    <span>{{\App\Enum\Certificate::getCertificateName($user->certificate)}}</span>
                                </p>
                                <p class="card-text">
                                    <strong> @lang('dashboard-admin/user.column.birth_date'): </strong>
                                    <span>{{$user->birth_date}}</span>
                                </p>
                                <p class="card-text">
                                    <strong> @lang('dashboard-admin/user.column.address'): </strong>
                                    <span>{{$user->address}}</span>
                                </p>
                            @endif
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.created_at'): </strong>
                                <span>{{$user->created_at}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.last_login'): </strong>
                                <span>{{is_null($user->last_login)?__('dashboard-admin/user.column.last_login_null'):$user->last_login}}</span>
                            </p>
                            <p class="card-text">
                                <strong> @lang('dashboard-admin/user.column.state'): </strong>
                                <span>{{\App\Enum\UserState::getStateName($user->state)}}</span>
                            </p>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center p-4">
                                <div class="h5-responsive">
                                    @lang('dashboard-admin/user.components.modal-info.error-message')
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                @if($user)
                    <a type="button" class="btn btn-info" href="{{route("dashboard.admin.users.show", ["user" => $user->id])}}">
                        @lang('dashboard-admin/user.components.modal-info.btn-info')
                    </a>
                @endif
                <a type="button" class="btn btn-outline-info" data-dismiss="modal">
                    @lang('dashboard-admin/user.components.modal-info.btn-dismiss')
                </a>
            </div>
        </div>
    </div>
</div>
