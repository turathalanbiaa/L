@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/document.create.title"))

@section("content")
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 mb-3">
                <a class="btn btn-outline-primary" href="{{route("dashboard.admin.users.show", ["user" => $user])}}">
                    @lang("dashboard-admin/document.create.btn-back")
                </a>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                <form method="post" id="upload" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="col-form-label" for="image" >
                                @lang("dashboard-admin/document.label.image")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" value="">
                                <div class="custom-file-label">
                                    @lang("dashboard-admin/document.placeholder.image")
                                </div>
                            </div>
                            @error("image") <div class="text-warning" id="error">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <input type="hidden" name="prev_image" value="{{old("image")}}" id="prev-image">
                    <input class="d-none" type="submit" id="submit">
                </form>
                <form method="post" action="{{route("dashboard.admin.documents.store")}}">
                    @csrf()
                    <input type="hidden" name="user" value="{{old("user", $user)}}">
                    @error("user") <div class="text-warning">{{$message}}</div> @enderror
                    <input type="hidden" name="image" value="{{old("image")}}" id="image-path">

                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label class="col-form-label" for="type" >
                                @lang("dashboard-admin/document.label.type")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="type" value="{{App\Enum\DocumentType::getTypeName(old("type"))}}"
                                       placeholder="@lang("dashboard-admin/document.placeholder.type")"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="type" value="{{old("type")}}">
                                @error("type") <div class="text-warning">{{$message}}</div> @enderror
                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-type">
                                    @foreach(\App\Enum\DocumentType::getTypes() as $type)
                                        <div class="dropdown-item" data-value="{{$type}}">
                                            {{App\Enum\DocumentType::getTypeName($type)}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="col-form-label" for="state" >
                                @lang("dashboard-admin/document.label.state")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="state" value="{{App\Enum\DocumentState::getStateName(old("state"))}}"
                                       placeholder="@lang("dashboard-admin/document.placeholder.state")"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="state" value="{{old("state")}}">
                                @error("state") <div class="text-warning">{{$message}}</div> @enderror
                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-state">
                                    @foreach(\App\Enum\DocumentState::getStates() as $state)
                                        <div class="dropdown-item" data-value="{{$state}}">
                                            {{App\Enum\DocumentState::getStateName($state)}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary" type="submit">
                            @lang("dashboard-admin/document.create.btn-send")
                        </button>
                    </div>
                </form>

                <div class="alert alert-info">
                    <i class="far fa-star text-danger"></i>
                    @lang("dashboard-admin/document.create.note-1")
                </div>
            </div>
            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-12 text-center">
                <img src="{{is_null(old("image"))?asset("images/large/img/dashboard/admin/image-placeholder.jpg"):asset("images/large/".Storage::url(old('image')))}}" id="image-url" class="w-100 img-thumbnail z-depth-1" alt="Document Image">
                <div class="alert alert-info mt-2">
                    <i class="far fa-star text-danger"></i>
                    @lang("dashboard-admin/document.create.note-2")
                </div>
                <div class="mt-2 text-warning d-none" id="message"></div>
            </div>
        </div>
    </div>
@endsection

@section("script")
<script>
    $('#dropdown-type .dropdown-item').on('click', function () {
        $('input#type').val($(this).html().trim());
        $('input[name="type"]').val($(this).data('value'));
    });
    $('#dropdown-state .dropdown-item').on('click', function () {
        $('input#state').val($(this).html().trim());
        $('input[name="state"]').val($(this).data('value'));
    });
    $('#image').change(function () {
        $('#error').addClass('d-none');
        $('#submit').click();
    });
    $('#upload').on('submit', function () {
        event.preventDefault();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'post',
            url: '/dashboard/admin/api/documents/store',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                let message = $('#message');
                message.removeClass('d-block').addClass('d-none');
                if(result.error === true) {
                    message.html(result.data.message);
                    message.removeClass('d-none').addClass('d-block');
                    return '';
                }

                let image = result.data.image;
                $('img#image-url').attr('src', image.url);
                $('input#image-path').val(image.path);
                $('input#prev-image').val(image.path);
            },
            error: function() {
                console.log('error');
            }
        });
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
