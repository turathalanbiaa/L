@extends("dashboard.admin.layout.app")

@section("title", $user->name)

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center" id="change-selector">
            <div class="col-sm-10">
                <div class="alert alert-info" role="alert">
                    <div class="row">
                        <div class="col-sm-8 d-flex flex-column">
                            <h4 class="alert-heading">
                                <i class="fa fa-info-circle"></i>
                                @lang("dashboard-admin/user.edit.note.header")
                            </h4>
                            <ul>
                                <li>@lang("dashboard-admin/user.edit.note.content-line-1")</li>
                                <li>@lang("dashboard-admin/user.edit.note.content-line-2")</li>
                                <li>@lang("dashboard-admin/user.edit.note.content-line-3")</li>
                            </ul>
                            <div class="mt-auto">
                                <hr>
                                <p>
                                    <i class="fa fa-star"></i>
                                    @lang("dashboard-admin/user.edit.note.content-line-4")
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-center d-none d-md-block">
                            @if($user->personalImageDocument())
                                <img src="{{asset("images/square".\Illuminate\Support\Facades\Storage::url($user->personalImageDocument()->image))}}" class="img-fluid z-depth-1 rounded-circle" alt="Responsive image">
                            @else
                                <img src="{{asset("images/square".\Illuminate\Support\Facades\Storage::url("public/user/default.png"))}}" class="img-fluid z-depth-1 rounded-circle" alt="Responsive image">
                            @endif
                            <p class="my-3 font-weight-bold">{{$user->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 py-2">
                        <div class="h5-responsive">
                            <a data-toggle="collapse" href="#collapse-change-info" aria-expanded="false" aria-controls="collapse-change-info">
                                @lang("dashboard-admin/user.edit.change-info")
                            </a>
                        </div>
                        <div class="collapse @if(old("update") == "info") show @endif" id="collapse-change-info" data-parent="#change-selector">
                            <form method="post" action="{{route("dashboard.admin.users.update", ["user" => $user->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="type" value="{{$user->type}}">
                                <input type="hidden" name="update" value="info">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="name" >
                                            @lang("dashboard-admin/user.label.name")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"
                                               placeholder="@lang("dashboard-admin/user.placeholder.name")">
                                        @error("name") <div class="text-warning">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="country" >
                                            @lang("dashboard-admin/user.label.country")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="dropdown">
                                            <input type="text" class="form-control" id="country" autocomplete="off"
                                                   value="{{Countries::getValue(app()->getLocale(), $user->country)}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.country")"
                                                   data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                            <input type="hidden" name="country" value="{{$user->country}}">
                                            @error("country") <div class="text-warning">{{$message}}</div> @enderror
                                            <div class="dropdown-menu dropdown-default w-100" aria-labelledby="country">
                                                @foreach(Countries::lookup(app()->getLocale()) as $key => $country)
                                                    <div class="dropdown-item" data-value="{{$key}}">
                                                        {{$country}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="gender" >
                                            @lang("dashboard-admin/user.label.gender")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="dropdown">
                                            <input type="text" class="form-control" id="gender" autocomplete="off"
                                                   value="{{App\Enum\Gender::getGenderName($user->gender)}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.gender")"
                                                   data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                            <input type="hidden" name="gender" value="{{$user->gender}}">
                                            @error("gender") <div class="text-warning">{{$message}}</div> @enderror
                                            <div class="dropdown-menu dropdown-default w-100" aria-labelledby="gender">
                                                @foreach(\App\Enum\Gender::getGenders() as $gender)
                                                    <div class="dropdown-item" data-value="{{$gender}}">
                                                        {{App\Enum\Gender::getGenderName($gender)}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if($user->type == App\Enum\UserType::STUDENT)
                                        <div class="col-sm-4">
                                            <label class="col-form-label" for="stage" >
                                                @lang("dashboard-admin/user.label.stage")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="dropdown">
                                                <input type="text" class="form-control" id="stage" autocomplete="off"
                                                       value="{{App\Enum\Stage::getStageName($user->stage)}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.stage")"
                                                       data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                                <input type="hidden" name="stage" value="{{$user->stage}}">
                                                @error("stage") <div class="text-warning">{{$message}}</div> @enderror
                                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage">
                                                    @foreach(\App\Enum\Stage::getStages() as $stage)
                                                        <div class="dropdown-item" data-value="{{$stage}}">
                                                            {{App\Enum\Stage::getStageName($stage)}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label" for="certificate" >
                                                @lang("dashboard-admin/user.label.certificate")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="dropdown">
                                                <input type="text" class="form-control" id="certificate" autocomplete="off"
                                                       value="{{App\Enum\Certificate::getCertificateName($user->certificate)}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.certificate")"
                                                       data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                                <input type="hidden" name="certificate" value="{{$user->certificate}}">
                                                @error("certificate") <div class="text-warning">{{$message}}</div> @enderror
                                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="certificate">
                                                    @foreach(\App\Enum\Certificate::getCertificates() as $certificate)
                                                        <div class="dropdown-item" data-value="{{$certificate}}">
                                                            {{App\Enum\Certificate::getCertificateName($certificate)}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label" for="birth-date" >
                                                @lang("dashboard-admin/user.label.birth-date")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="birth_date" id="birth-date" value="{{$user->birth_date}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.birth-date")">
                                            @error("birth_date") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="address" >
                                                @lang("dashboard-admin/user.label.address")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" rows="5" name="address" id="address" placeholder="@lang("dashboard-admin/user.placeholder.address")">{{$user->address}}</textarea>
                                            @error("address") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-outline-primary" type="submit">
                                        @lang("dashboard-admin/user.edit.btn-save")
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="h5-responsive">
                            <a data-toggle="collapse" href="#collapse-change-phone" aria-expanded="false" aria-controls="collapse-change-phone">
                                @lang("dashboard-admin/user.edit.change-phone")
                            </a>
                        </div>
                        <div class="collapse @if(old("update") == "phone") show @endif" id="collapse-change-phone" data-parent="#change-selector">
                            <form method="post" action="{{route("dashboard.admin.users.update", ["user" => $user->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="phone">
                                <div class="row flex-column align-items-center">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="phone" >
                                            @lang("dashboard-admin/user.label.phone")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}"
                                               placeholder="@lang("dashboard-admin/user.placeholder.phone")">
                                        @error("phone") <div class="text-warning">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="phone-confirmation" >
                                            @lang("dashboard-admin/user.label.re-phone")
                                        </label>
                                        <input type="text" class="form-control" name="phone_confirmation" id="phone-confirmation">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-outline-primary" type="submit">
                                        @lang("dashboard-admin/user.edit.btn-save")
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="h5-responsive">
                            <a data-toggle="collapse" href="#collapse-change-email" aria-expanded="false" aria-controls="collapse-change-email">
                                @lang("dashboard-admin/user.edit.change-email")
                            </a>
                        </div>
                        <div class="collapse @if(old("update") == "email") show @endif" id="collapse-change-email" data-parent="#change-selector">
                            <form method="post" action="{{route("dashboard.admin.users.update", ["user" => $user->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="email">
                                <div class="row flex-column align-items-center">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="email" >
                                            @lang("dashboard-admin/user.label.email")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}"
                                               placeholder="@lang("dashboard-admin/user.placeholder.email")">
                                        @error("email") <div class="text-warning">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="email-confirmation" >
                                            @lang("dashboard-admin/user.label.re-email")
                                        </label>
                                        <input type="email" class="form-control" name="email_confirmation" id="email-confirmation">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-outline-primary" type="submit">
                                        @lang("dashboard-admin/user.edit.btn-save")
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="h5-responsive">
                            <a data-toggle="collapse" href="#collapse-change-pass" aria-expanded="false" aria-controls="#collapse-change-pass">
                                @lang("dashboard-admin/user.edit.change-pass")
                            </a>
                        </div>
                        <div class="collapse @if(old("update") == "pass") show @endif" id="collapse-change-pass" data-parent="#change-selector">
                            <form method="post" action="{{route("dashboard.admin.users.update",["user" => $user->id])}}">
                                @csrf()
                                @method("PUT")
                                <input type="hidden" name="update" value="pass">
                                <div class="row flex-column align-items-center">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="password" >
                                            @lang("dashboard-admin/user.label.password")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        @error("password") <div class="text-warning">{{$message}}</div> @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="password-confirmation" >
                                            @lang("dashboard-admin/user.label.re-password")
                                        </label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-outline-primary" type="submit">
                                        @lang("dashboard-admin/user.edit.btn-save")
                                    </button>
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
    @parent
    <script>
        $('.dropdown-menu .dropdown-item').on('click', function () {
            $(this).parent().parent().find('input[type="text"]').val($(this).html().trim());
            $(this).parent().parent().find('input[type="hidden"]').val($(this).data('value'));
        });
        $('input[data-action="search"]').on('keyup', function () {
            let value = $(this).val();
            let items = $(this).parent().find('.dropdown-menu .dropdown-item');
            $.each(items, function(index, item) {
                item.classList.add('d-none');
                item.classList.remove('d-block');
                str = item.textContent.trim();
                if(str.includes(value))
                    item.classList.add('d-block');
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
