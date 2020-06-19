@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/lecturer.create.title"))

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form method="post" action="{{route("dashboard.admin.lecturers.store")}}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label class="col-form-label" for="name">
                            @lang("dashboard-admin/lecturer.label.name")
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old("name")}}"
                               placeholder="@lang("dashboard-admin/lecturer.placeholder.name")">
                        @error("name") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">
                            @lang("dashboard-admin/lecturer.label.email")
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old("email")}}"
                               placeholder="@lang("dashboard-admin/lecturer.placeholder.email")">
                        @error("email") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="phone">
                            @lang("dashboard-admin/lecturer.label.phone")
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{old("phone")}}"
                               placeholder="@lang("dashboard-admin/lecturer.placeholder.phone")">
                        @error("phone") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="password" >
                            @lang("dashboard-admin/lecturer.label.password")
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error("password") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="password-confirmation" >
                            @lang("dashboard-admin/lecturer.label.re-password")
                        </label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="description">
                            @lang("dashboard-admin/lecturer.label.description")
                        </label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{old("description")}}</textarea>
                        @error("description") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="image">
                            @lang("dashboard-admin/lecturer.label.image")
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image" value="">
                            <div class="custom-file-label">
                                @lang("dashboard-admin/lecturer.placeholder.image")
                            </div>
                        </div>
                        @error("image") <div class="text-warning">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="state">
                            @lang("dashboard-admin/lecturer.label.state")
                            <span class="text-danger">*</span>
                        </label>
                        <div class="dropdown">
                            <input type="text" class="form-control" id="state" value="{{App\Enum\LecturerState::getStateName(old("state", \App\Enum\LecturerState::ACTIVE))}}"
                                   placeholder="@lang("dashboard-admin/lecturer.placeholder.state")"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="hidden" name="state" value="{{old("state", \App\Enum\LecturerState::ACTIVE)}}">
                            @error("state") <div class="text-warning">{{$message}}</div> @enderror
                            <div class="dropdown-menu dropdown-default w-100" aria-labelledby="state" id="dropdown-state">
                                @foreach(\App\Enum\LecturerState::getStates() as $state)
                                    <div class="dropdown-item" data-value="{{$state}}">
                                        {{App\Enum\LecturerState::getStateName($state)}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-outline-primary" type="submit">
                            @lang("dashboard-admin/lecturer.create.btn-send")
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $('#dropdown-state .dropdown-item').on('click', function () {
            $("input#state").val($(this).html().trim());
            $('input[name="state"]').val($(this).data('value'));
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
