@extends("dashboard.admin.layout.app")

@section("title")
    {{$announcement->title}}
@endsection

@section("head")
    @include('dashboard.admin.layout.head.summer-note')
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center" id="change-selector">
            <div class="col-sm-8">
                <div class="alert alert-info">
                    <i class="far fa-star text-danger"></i>
                    @lang("dashboard-admin/announcement.edit.note")
                </div>

                <div class="col-12">
                    <div class="h5-responsive py-2">
                        <a data-toggle="collapse" data-target="#collapse-change-content" aria-expanded="false" aria-controls="#collapse-change-content">
                            @lang("dashboard-admin/announcement.edit.change-content")
                        </a>
                    </div>

                    <div class="collapse @if(old('update') == "info") show @endif border-top border-info" id="collapse-change-content" data-parent="#change-selector">
                        <form class="pt-3 pb-5" method="post" action="{{route("dashboard.admin.announcements.update", ["announcement" => $announcement->id])}}">
                            @csrf()
                            @method("PUT")
                            <input type="hidden" name="update" value="info">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="col-form-label" for="title">
                                        @lang("dashboard-admin/announcement.label.title")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{$announcement->title}}"
                                           placeholder="@lang('dashboard-admin/announcement.placeholder.title')">
                                    @error('title') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label" for="description">
                                        @lang("dashboard-admin/announcement.label.description")
                                    </label>
                                    <textarea class="form-control" name="description" id="description">{{$announcement->description}}</textarea>
                                    @error('description') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label" for="youtube-video">
                                        @lang("dashboard-admin/announcement.label.youtube_video")
                                    </label>
                                    <input type="text" class="form-control" name="youtube_video" id="youtube-video" value="{{$announcement->youtube_video}}"
                                           placeholder="@lang('dashboard-admin/announcement.placeholder.youtube_video')">
                                    @error('youtube_video') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label" for="type">
                                        @lang("dashboard-admin/announcement.label.type")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="dropdown">
                                        <input type="text" class="form-control" id="type" value="{{App\Enum\AnnouncementType::getTypeName($announcement->type)}}"
                                               placeholder="@lang('dashboard-admin/announcement.placeholder.type')"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <input type="hidden" name="type" value="{{$announcement->type}}">
                                        @error('type') <div class="text-warning">{{ $message }}</div> @enderror
                                        <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-type">
                                            @foreach($types as $type)
                                                <div class="dropdown-item" data-value="{{$type}}">
                                                    {{App\Enum\AnnouncementType::getTypeName($type)}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label" for="state">
                                        @lang("dashboard-admin/announcement.label.state")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="dropdown">
                                        <input type="text" class="form-control" id="state" value="{{App\Enum\AnnouncementState::getStateName($announcement->state)}}"
                                               placeholder="@lang('dashboard-admin/announcement.placeholder.state')"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <input type="hidden" name="state" value="{{$announcement->state}}">
                                        @error('state') <div class="text-warning">{{ $message }}</div> @enderror
                                        <div class="dropdown-menu dropdown-default w-100" aria-labelledby="state" id="dropdown-state">
                                            @foreach($states as $state)
                                                <div class="dropdown-item" data-value="{{$state}}">
                                                    {{App\Enum\AnnouncementState::getStateName($state)}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label" for="created-at">
                                        @lang("dashboard-admin/announcement.label.created_at")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="created_at" id="created-at" value="{{$announcement->created_at}}">
                                    @error('created_at') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input type="checkbox" class="custom-control-input" name="checkImage" id="check-image">
                                        <label class="custom-control-label" for="check-image">
                                            @lang("dashboard-admin/announcement.label.check-image")
                                        </label>
                                        <small class="form-text text-muted">
                                            @lang("dashboard-admin/announcement.placeholder.check-image")
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    @lang("dashboard-admin/announcement.edit.btn-save")
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="h5-responsive py-2">
                        <a data-toggle="collapse" data-target="#collapse-change-image" aria-expanded="false" aria-controls="#collapse-change-image">
                            @lang("dashboard-admin/announcement.edit.change-image")
                        </a>
                    </div>

                    <div class="collapse @if(old('update') == "image") show @endif border-top border-info" id="collapse-change-image" data-parent="#change-selector">
                        <form class="pt-3 pb-5" method="post" action="{{route("dashboard.admin.announcements.update", ["announcement" => $announcement->id])}}" enctype="multipart/form-data">
                            @csrf()
                            @method("PUT")
                            <input type="hidden" name="update" value="image">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="col-form-label" for="image">
                                        @lang("dashboard-admin/announcement.label.image")
                                    </label>
                                    <div class="row align-items-center">
                                        <div class="{{(is_null($announcement->image)?"col-sm-12":"col-sm-6")}}">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image" value="">
                                                <input type="hidden" name="deleted" value="0">
                                                <div class="custom-file-label">
                                                    @lang('dashboard-admin/announcement.placeholder.image')
                                                </div>
                                            </div>
                                            @error('image') <div class="text-warning">{{ $message }}</div> @enderror
                                        </div>
                                        @if($announcement->image)
                                            <div class="col-sm-6">
                                                <div class="view overlay z-depth-1 img-thumbnail">
                                                    <img src="{{asset("images/large".Storage::url($announcement->image))}}" class="w-100" alt="Announcement Image">
                                                    <div class="mask flex-center rgba-black-strong">
                                                        <div class="btn btn-outline-info btn-sm" id="view">
                                                            <i class="fa fa-eye"></i>
                                                        </div>
                                                        <div class="btn btn-outline-danger btn-sm" id="delete">
                                                            <i class="fa fa-trash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input type="checkbox" class="custom-control-input" name="checkContent" id="check-content">
                                        <label class="custom-control-label" for="check-content">
                                            @lang("dashboard-admin/announcement.label.check-content")
                                        </label>
                                        <small class="form-text text-muted">
                                            @lang("dashboard-admin/announcement.placeholder.check-content")
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    @lang("dashboard-admin/announcement.edit.btn-save")
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="modal fade" id="modal-announcement-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="d-flex justify-content-center w-100">
                <div class="modal-content w-auto">
                    <img src="" class="img-fluid" alt="Announcement Image">
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $("#description").summernote({
            placeholder: "@lang('dashboard-admin/announcement.placeholder.description')",
            tabsize: 4,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $("#dropdown-type .dropdown-item").on("click", function () {
            $("input#type").val($(this).html().trim());
            $("input[name='type']").val($(this).data('value'));
        });
        $("#dropdown-state .dropdown-item").on("click", function () {
            $("input#state").val($(this).html().trim());
            $("input[name='state']").val($(this).data('value'));
        });
        $("#view").on("click", function () {
            let src = $(this).parent().parent().find('img').attr('src');
            let modal = $('#modal-announcement-view');
            // src = src.replace("large", "original");
            modal.find('img').attr('src', src);
            modal.modal('show');
        });
        $("#delete").on("click", function () {
            $(this).parent().parent().parent().addClass("d-none");
            $("input[name='deleted']").val(1);
        });
        @if(session()->has("message"))
            $.toast({
                title: '{{session()->get("message")}}',
                type:  '{{session()->get("type")}}',
                delay: 2500
            });
        @endif
    </script>
@endsection
