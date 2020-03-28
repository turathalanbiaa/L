<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead text-capitalize">
                    @lang("dashboard-admin/announcement.components.modal-show.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($announcement)
                        <div class="d-none">
                            <span class="badge badge-pill badge-secondary">{{\App\Enum\AnnouncementType::getTypeName($announcement->type)}}</span>
                            @if($announcement->state == \App\Enum\AnnouncementState::ACTIVE)
                                <span class="badge badge-pill badge-success">{{\App\Enum\AnnouncementState::getStateName($announcement->state)}}</span>
                            @else
                                <span class="badge badge-pill badge-danger">{{\App\Enum\AnnouncementState::getStateName($announcement->state)}}</span>
                            @endif
                        </div>

                        <div class="col-12">
                            <div class="d-block">
                                <strong>{{$announcement->title}}</strong>
                                <div>
                                    <i class="far fa-calendar-alt mx-1"></i>
                                    <small>{{$announcement->created_at}}</small>
                                </div>
                            </div>
                            <div class="d-block">
                                {!! $announcement->description !!}
                            </div>
                            @if($announcement->image)
                                <div class="img-thumbnail">
                                    <img src="{{asset("images/large" . Storage::url($announcement->image))}}" class="img-fluid" alt="Announcement Image">
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center p-4">
                                <div class="h5-responsive">
                                    @lang('dashboard-admin/announcement.components.modal-show.error-message')
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                @if($announcement)
                    <a type="button" class="btn btn-primary" href="{{route("dashboard.admin.announcements.edit", ["announcement" => $announcement->id])}}">
                        @lang('dashboard-admin/announcement.components.modal-show.btn-edit')
                    </a>
                @endif
                <a type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    @lang('dashboard-admin/announcement.components.modal-show.btn-dismiss')
                </a>
            </div>
        </div>
    </div>
</div>
