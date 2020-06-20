<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify" role="document">
        <div class="modal-content">
            <div class="modal-header secondary-color text-white">
                <p class="heading text-capitalize">
                    @lang("dashboard-admin/lecturer.components.modal-show.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($lecturer)
                        <div class="col-12">
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.name"): </strong>
                                <span>{{$lecturer->name}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.email"): </strong>
                                <span>{{$lecturer->email}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.phone"): </strong>
                                <span>{{$lecturer->phone}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.description"): </strong>
                                <span>{!! $lecturer->description !!}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.created-at"): </strong>
                                <span>{{$lecturer->created_at}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.last-login"): </strong>
                                <span>{{$lecturer->last_login ?? "---"}}</span>
                            </p>
                            <p class="card-text">
                                <strong>@lang("dashboard-admin/lecturer.label.state"): </strong>
                                <span>{{\App\Enum\LecturerState::getStateName($lecturer->state)}}</span>
                            </p>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center p-4">
                                <div class="h5-responsive">
                                    @lang("dashboard-admin/lecturer.components.modal-show.error-message")
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($lecturer)
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-secondary" type="button" href="{{route("dashboard.admin.lecturers.show", ["lecturer" => $lecturer->id])}}">
                        @lang("dashboard-admin/lecturer.components.modal-show.btn-info")
                    </a>
                    <a class="btn btn-outline-secondary" type="button" data-dismiss="modal">
                        @lang("dashboard-admin/lecturer.components.modal-show.btn-dismiss")
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
