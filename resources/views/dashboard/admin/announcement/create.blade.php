@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/announcement.create.title")
@endsection

@section("head")
    @include('dashboard.admin.layout.head.summer-note')
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="h3-responsive text-center mb-4">
                    @lang("dashboard-admin/announcement.create.title")
                </div>

                <div class="alert alert-info">
                    <i class="far fa-star text-danger"></i>
                    @lang("dashboard-admin/announcement.create.note")
                </div>

                <form method="post" action="{{route("dashboard.admin.announcements.store")}}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="col-form-label" for="title">
                                @lang("dashboard-admin/announcement.label.title")
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old("title")}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.title')">
                            @error('title') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="description">
                                @lang("dashboard-admin/announcement.label.description")
                            </label>
                            <textarea class="form-control" name="description" id="description">{{old("description")}}</textarea>
                            @error('description') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="image">
                                @lang("dashboard-admin/announcement.label.image")
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" value="">
                                <div class="custom-file-label">
                                    @lang('dashboard-admin/announcement.placeholder.image')
                                </div>
                            </div>
                            @error('image') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="youtube-video">
                                @lang("dashboard-admin/announcement.label.youtube_video")
                            </label>
                            <input type="text" class="form-control" name="youtube_video" id="youtube-video" value="{{old("youtube_video")}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.youtube_video')">
                            @error('youtube_video') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="type">
                                @lang("dashboard-admin/announcement.label.type")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="type" value="{{App\Enum\AnnouncementType::getTypeName(old('type'))}}"
                                       placeholder="@lang('dashboard-admin/announcement.placeholder.type')"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="type" value="{{old('type')}}">
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
                                <input type="text" class="form-control" id="state" value="{{App\Enum\AnnouncementState::getStateName(old('state', \App\Enum\AnnouncementState::ACTIVE))}}"
                                       placeholder="@lang('dashboard-admin/announcement.placeholder.state')"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="state" value="{{old('state', \App\Enum\AnnouncementState::ACTIVE)}}">
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
        @if(session()->has("message"))
            $.toast({
                title: '{{session()->get("message")}}',
                type:  '{{session()->get("type")}}',
                delay: 2500
            });
        @endif
    </script>
@endsection
