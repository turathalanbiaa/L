@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.create.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <form method="post" action="{{route("dashboard.admin.documents.store")}}">
                    @csrf
                    <div class="form-group row">
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
                    <div class="form-group row">
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
                    <div class="form-group d-flex text-center">
                        <button class="btn btn-outline-primary" type="submit">
                            @lang('dashboard-admin/document.create.btn-send')
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="z-depth-1-half mb-4">
                    <img src="{{asset("img/dashboard/admin/image-placeholder.jpg")}}" id="image" class="img-fluid" alt="Document Image">
                </div>
                <form method="post" id="upload" enctype="multipart/form-data">
                    @csrf
                    <div class="file-field">
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-block">
                                <span>@lang('dashboard-admin/document.placeholder.image')</span>
                                <input type="file" name="file" id="file">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary" type="submit">send</button>
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

    $('form#upload').on('submit', function () {
        event.preventDefault();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            url: '/dashboard/admin/api/documents/store',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                console.log(result)
            },
            error: function() {

            } ,
            complete : function() {

            }
        });
    });
</script>
@endsection

