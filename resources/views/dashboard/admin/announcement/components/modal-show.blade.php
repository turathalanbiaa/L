<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading text-capitalize">
                    @lang("dashboard-admin/announcement.components.modal-show.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($announcement)
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
                                <div class="img-thumbnail my-2">
                                    <img src="{{asset("images/large" . Storage::url($announcement->image))}}" class="img-fluid" alt="Announcement Image">
                                </div>
                            @endif
                            @if($announcement->youtube_video)
                                <div class="embed-responsive embed-responsive-16by9 my-2">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$announcement->youtube_video}}" allowfullscreen="false"></iframe>
                                </div>
                            @endif
                            <div class="d-flex justify-content-center">
                                <div class="px-3">
                                    @lang("dashboard-admin/announcement.label.type") :
                                    <span class="badge badge-default p-1">
                                        {{\App\Enum\AnnouncementType::getTypeName($announcement->type)}}
                                    </span>
                                </div>
                                <div class="px-3">
                                    @lang("dashboard-admin/announcement.label.state") :
                                    @if($announcement->state == \App\Enum\AnnouncementState::ACTIVE)
                                        <span class="badge badge-success p-1">{{\App\Enum\AnnouncementState::getStateName($announcement->state)}}</span>
                                    @else
                                        <span class="badge badge-danger p-1">{{\App\Enum\AnnouncementState::getStateName($announcement->state)}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center p-4">
                                <div class="h5-responsive">
                                    @lang("dashboard-admin/announcement.components.modal-show.error-message")
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($announcement)
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-info" type="button" href="{{route("dashboard.admin.announcements.edit", ["announcement" => $announcement->id])}}">
                        @lang("dashboard-admin/announcement.components.modal-show.btn-edit")
                    </a>
                    <a class="btn btn-outline-info" type="button" data-dismiss="modal">
                        @lang("dashboard-admin/announcement.components.modal-show.btn-dismiss")
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
