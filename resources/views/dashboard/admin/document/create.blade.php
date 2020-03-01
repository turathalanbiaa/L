@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.create.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 mb-3">
                <a class="btn btn-outline-primary" href="{{route('dashboard.admin.users.show', ['user' => $user])}}">
                    @lang("dashboard-admin/document.create.btn-back")
                </a>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" id="upload" enctype="multipart/form-data">
                            @csrf
                            <div class="file-field d-flex justify-content-center">
                                <div class="btn btn-mdb-color btn-block">
                                    <span>@lang('dashboard-admin/document.placeholder.image')</span>
                                    <input type="file" name="file" id="image">
                                </div>
                            </div>
                            <input type="hidden" name="prev_image" value="{{old('image')}}" id="prev-image">
                            @error('image') <div class="text-center text-warning mt-1" id="error">{{ $message }}</div> @enderror
                            <input class="d-none" type="submit" id="submit">
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <form method="post" action="{{route("dashboard.admin.documents.store")}}">
                            @csrf
                            <input type="hidden" name="user" value="{{old('user', $user)}}">
                            @error('user') <div class="text-warning">{{ $message }}</div> @enderror
                            <input type="hidden" name="image" value="{{old('image')}}" id="image-path">
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="type" >
                                    @lang("dashboard-admin/document.column.type")
                                </label>
                                <div class="col-sm-10">
                                    <div class="md-form mt-0">
                                        <input type="text" class="form-control" id="type" value="{{App\Enum\DocumentType::getTypeName(old('type'))}}"
                                               placeholder="@lang('dashboard-admin/document.placeholder.type')"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <input type="hidden" name="type" value="{{old('type')}}">
                                        @error('type') <div class="text-warning">{{ $message }}</div> @enderror
                                        <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-type">
                                            @foreach($types as $type)
                                                <div class="dropdown-item" data-value="{{$type}}">
                                                    {{App\Enum\DocumentType::getTypeName($type)}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="state" >
                                    @lang("dashboard-admin/document.column.state")
                                </label>
                                <div class="col-sm-10">
                                    <div class="md-form mt-0">
                                        <input type="text" class="form-control" id="state" value="{{App\Enum\DocumentState::getStateName(old('state'))}}"
                                               placeholder="@lang('dashboard-admin/document.placeholder.state')"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <input type="hidden" name="state" value="{{old('state')}}">
                                        @error('state') <div class="text-warning">{{ $message }}</div> @enderror
                                        <div class="dropdown-menu dropdown-default w-100" aria-labelledby="type" id="dropdown-state">
                                            @foreach($states as $state)
                                                <div class="dropdown-item" data-value="{{$state}}">
                                                    {{App\Enum\DocumentState::getStateName($state)}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-primary" type="submit">
                                    @lang('dashboard-admin/document.create.btn-send')
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="alert alert-warning">
                            <i class="fa fa-star text-danger"></i>
                            @lang('dashboard-admin/document.create.note-after-upload-image')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-12 text-center">
                <img src="{{is_null(old('image'))?asset("images/large/img/dashboard/admin/image-placeholder.jpg"):asset("images/large/".Storage::url(old('image')))}}" id="image-url" class="w-100 img-thumbnail z-depth-1" alt="Document Image">
                <div class="mt-2 alert alert-warning">
                    <i class="fa fa-star text-danger"></i>
                    @lang('dashboard-admin/document.create.note-image-type')
                </div>
                <div class="mt-2 text-warning d-none" id="message"></div>
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
    $('#image').change(function () {
        $('#error').addClass('d-none');
        $('#submit').click();
    });
    $('#upload').on('submit', function () {
        event.preventDefault();
        $.ajax({
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
                if(result.error === true)
                {
                    message.html(result.data.message);
                    message.removeClass('d-none').addClass('d-block');
                }

                $('img#image-url').attr('src', result.data.image_url);
                $('input#image-path').val(result.data.image_path);
                $('input#prev-image').val(result.data.image_path);
            },
            error: function() {
            } ,
            complete : function() {
            }
        });
    });
    @if(session()->has("message"))
        $.toast({
            title: '{{session()->get("message")}}',
            type:  '{{session()->get("type")}}',
            delay: 5000
        });
    @endif
</script>
@endsection

