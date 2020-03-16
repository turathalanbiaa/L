@extends("dashboard.admin.layout.app")

@section("title")
    {{$announcement->title}}
@endsection

@section("style")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="h3-responsive text-center mb-4">
                    @lang("dashboard-admin/announcement.edit.header")
                </div>

                <div class="alert alert-info">
                    <i class="far fa-star text-danger"></i>
                    @lang("dashboard-admin/announcement.edit.note")
                </div>

                <form method="post" action="{{route("dashboard.admin.announcements.update", ["announcement" => $announcement->id])}}" enctype="multipart/form-data">
                    @csrf()
                    @method("PUT")
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
                            <textarea class="form-control" name="description" rows="10" id="description"
                                      placeholder="@lang('dashboard-admin/announcement.placeholder.description')">{{$announcement->description}}</textarea>
                            @error('description') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="image">
                                @lang("dashboard-admin/announcement.label.image")
                            </label>
                            @if(!$announcement->image)
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image" value="">
                                    <div class="custom-file-label">
                                        @lang('dashboard-admin/announcement.placeholder.image')
                                    </div>
                                </div>
                            @else
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image" value="">
                                            <div class="custom-file-label">
                                                @lang('dashboard-admin/announcement.placeholder.image')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="view overlay z-depth-1 img-thumbnail">
                                            <img src="{{asset("images/large".Storage::url($announcement->image))}}" class="w-100" alt="Announcement Image">
                                            <div class="mask flex-center rgba-black-strong" data-action="document-view">
                                                <div class="btn btn-outline-info btn-sm">
                                                    <div class="text-white">
                                                        <i class="fa fa-eye mx-1"></i>
                                                        @lang("dashboard-admin/document.components.documents.btn-view")
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @error('image') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="url">
                                @lang("dashboard-admin/announcement.label.url")
                            </label>
                            <input type="text" class="form-control" name="url" id="url" value="{{$announcement->url}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.url')">
                            @error('url') <div class="text-warning">{{ $message }}</div> @enderror
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
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary">
                            @lang("dashboard-admin/announcement.create.btn-send")
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="modal fade" id="modal-document-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="d-flex justify-content-center w-100">
                <div class="modal-content w-auto">
                    <img src="" class="img-fluid" alt="Document Image">
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $("#dropdown-type .dropdown-item").click(function () {
            $("input#type").val($(this).html().trim());
            $("input[name='type']").val($(this).data('value'));
        });
        $("#dropdown-state .dropdown-item").click(function () {
            $("input#state").val($(this).html().trim());
            $("input[name='state']").val($(this).data('value'));
        });

        $('[data-action="document-view"]').on('click', function () {
            let src = $(this).parent().find('img').attr('src');
            let modal = $('#modal-document-view');
            // src = src.replace("large", "original");
            modal.find('img').attr('src', src);
            modal.modal('show');
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
