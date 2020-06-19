@extends("dashboard.admin.layout.app")

@section("title", $lecturer->name)

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center" id="selector">
            <div class="col-sm-6">
                <div class="alert alert-info text-center">
                    <i class="far fa-user mx-1"></i>
                    {{$lecturer->name}}
                </div>

                <div class="row">
                    {{-- Change Info --}}
                    <div class="col-12">
                        <div class="h5-responsive py-2">
                            <a data-toggle="collapse" href="#collapse-change-info" aria-expanded="false" aria-controls="collapse-change-info">
                                @lang("dashboard-admin/lecturer.edit.change-info")
                            </a>
                        </div>

                        <div class="collapse @if(old("update") == "info") show @endif border-top border-info" id="collapse-change-info" data-parent="#selector">
                            <form method="post" action="{{route("dashboard.admin.lecturers.update", ["lecturer" => $lecturer->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="info">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">
                                        @lang("dashboard-admin/lecturer.label.name")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$lecturer->name}}"
                                           placeholder="@lang("dashboard-admin/lecturer.placeholder.name")">
                                    @error("name") <div class="text-warning">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">
                                        @lang("dashboard-admin/lecturer.label.email")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$lecturer->email}}"
                                           placeholder="@lang("dashboard-admin/lecturer.placeholder.email")">
                                    @error("email") <div class="text-warning">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="phone">
                                        @lang("dashboard-admin/lecturer.label.phone")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$lecturer->phone}}"
                                           placeholder="@lang("dashboard-admin/lecturer.placeholder.phone")">
                                    @error("phone") <div class="text-warning">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="description">
                                        @lang("dashboard-admin/lecturer.label.description")
                                    </label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{$lecturer->description}}</textarea>
                                    @error("description") <div class="text-warning">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="state">
                                        @lang("dashboard-admin/lecturer.label.state")
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="dropdown">
                                        <input type="text" class="form-control" id="state" value="{{App\Enum\LecturerState::getStateName($lecturer->state)}}"
                                               placeholder="@lang("dashboard-admin/lecturer.placeholder.state")"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <input type="hidden" name="state" value="{{$lecturer->state}}">
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
                                        @lang("dashboard-admin/lecturer.edit.btn-save")
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Change Password --}}
                    <div class="col-12">
                        <div class="h5-responsive py-2">
                            <a data-toggle="collapse" href="#collapse-change-pass" aria-expanded="false" aria-controls="collapse-change-pass">
                                @lang("dashboard-admin/lecturer.edit.change-pass")
                            </a>
                        </div>

                        <div class="collapse @if(old("update") == "pass") show @endif border-top border-info" id="collapse-change-pass" data-parent="#selector">
                            <form method="post" action="{{route("dashboard.admin.lecturers.update", ["lecturer" => $lecturer->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="pass">
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
                                <div class="form-group text-center">
                                    <button class="btn btn-outline-primary" type="submit">
                                        @lang("dashboard-admin/lecturer.edit.btn-save")
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- Change Image --}}
                    <div class="col-12">
                        <div class="h5-responsive py-2">
                            <a data-toggle="collapse" href="#collapse-change-image" aria-expanded="false" aria-controls="collapse-change-image">
                                @lang("dashboard-admin/lecturer.edit.change-image")
                            </a>
                        </div>

                        <div class="collapse @if(old("update") == "image") show @endif border-top border-info" id="collapse-change-image" data-parent="#selector">
                            <form method="post" action="{{route("dashboard.admin.lecturers.update", ["lecturer" => $lecturer->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="image">
                                <div class="row align-items-center mt-3">
                                    <div class="col-sm-6">
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
                                        <div class="form-group text-center">
                                            <button class="btn btn-outline-primary" type="submit">
                                                @lang("dashboard-admin/lecturer.edit.btn-save")
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="{{asset("images/large".Storage::url($lecturer->image))}}" alt="Lecturer Image">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
