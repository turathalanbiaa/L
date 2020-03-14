@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/announcement.create.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="h3-responsive text-center mb-4">
                    @lang("dashboard-admin/announcement.create.title")
                </div>

                <form method="post" action="{{route("dashboard.admin.announcements.store")}}">
                    @csrf()
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="col-form-label" for="title">
                                @lang("dashboard-admin/announcement.label.title")
                            </label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old("title")}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.title')">
                            @error('title') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="description">
                                @lang("dashboard-admin/announcement.label.description")
                            </label>
                            <textarea class="form-control" name="description" rows="10" id="description"
                                      placeholder="@lang('dashboard-admin/announcement.placeholder.description')">{{old("description")}}</textarea>
                            @error('content') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="image">
                                @lang("dashboard-admin/announcement.label.image")
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" value="{{old("image")}}">
                                <span class="custom-file-label">
                                    @lang('dashboard-admin/announcement.placeholder.image')
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="url">
                                @lang("dashboard-admin/announcement.label.url")
                            </label>
                            <input type="text" class="form-control" name="url" id="url" value="{{old("url")}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.url')">
                            @error('url') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="youtube-video-id">
                                @lang("dashboard-admin/announcement.label.youtube_video_id")
                            </label>
                            <input type="text" class="form-control" name="youtube_video_id" id="youtube-video-id" value="{{old("youtube_video_id")}}"
                                   placeholder="@lang('dashboard-admin/announcement.placeholder.youtube_video_id')">
                            @error('youtube_video_id') <div class="text-warning">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="type">
                                @lang("dashboard-admin/announcement.label.type")
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
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="state" value="{{App\Enum\AnnouncementState::getStateName(old('state'))}}"
                                       placeholder="@lang('dashboard-admin/announcement.placeholder.state')"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="state" value="{{old('state')}}">
                                @error('state') <div class="text-warning">{{ $message }}</div> @enderror
                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-state">
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
        @if(session()->has("message"))
        $.toast({
            title: '{{session()->get("message")}}',
            type:  '{{session()->get("type")}}',
            delay: 2500
        });
        @endif
    </script>
@endsection
