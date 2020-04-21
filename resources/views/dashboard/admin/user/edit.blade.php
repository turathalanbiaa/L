@extends("dashboard.admin.layout.app")

@section("title", $user->name)

@section("content")
    <div class="container-fluid">
        <div class="row" id="change-selector">
            <div class="col-12">
                <div class="h5-responsive py-2">
                    <a data-toggle="collapse" data-target="#collapse-change-info" aria-expanded="false" aria-controls="#collapse-change-info">
                        @lang("dashboard-admin/user.edit.change-info")
                    </a>
                </div>

                <div class="collapse @if(old("update")=="info") show @endif border-top border-info" id="collapse-change-info" data-parent="#change-selector">
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <form method="post" action="{{route("dashboard.admin.users.update",["user" => $user->id])}}">
                                @csrf()
                                @method("put")
                                <input type="hidden" name="type" value="{{$user->type}}">
                                <input type="hidden" name="update" value="info">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="name" >
                                            @lang("dashboard-admin/user.label.name")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.name")">
                                            @error("name") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="email" >
                                            @lang("dashboard-admin/user.label.email")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.email")">
                                            @error("email") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="phone" >
                                            @lang("dashboard-admin/user.label.phone")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.phone")">
                                            @error("phone") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="gender" >
                                            @lang("dashboard-admin/user.label.gender")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" id="gender" value="{{App\Enum\Gender::getGenderName($user->gender)}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.gender")"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <input type="hidden" name="gender" value="{{$user->gender}}">
                                            @error("gender") <div class="text-warning">{{$message}}</div> @enderror
                                            <div class="dropdown-menu dropdown-default w-100" aria-labelledby="gender" id="dropdown-gender">
                                                @foreach($genders as $gender)
                                                    <div class="dropdown-item" data-value="{{$gender}}">
                                                        {{App\Enum\Gender::getGenderName($gender)}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="country" >
                                            @lang("dashboard-admin/user.label.country")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="text" class="form-control" id="country"
                                                   value="{{Countries::getValue(app()->getLocale(), $user->country)}}"
                                                   placeholder="@lang("dashboard-admin/user.placeholder.country")"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <input type="hidden" name="country" value="{{$user->country}}">
                                            @error("country") <div class="text-warning">{{$message}}</div> @enderror
                                            <div class="dropdown-menu dropdown-default w-100" aria-labelledby="country" id="dropdown-country">
                                                @foreach($countries as $key => $country)
                                                    <div class="dropdown-item" data-value="{{$key}}">
                                                        {{$country}}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Just for student -->
                                    @if($user->type == App\Enum\UserType::STUDENT)
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="stage" >
                                                @lang("dashboard-admin/user.label.stage")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="stage" value="{{App\Enum\Stage::getStageName($user->stage)}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.stage")"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <input type="hidden" name="stage" value="{{$user->stage}}">
                                                @error("stage") <div class="text-warning">{{$message}}</div> @enderror
                                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage" id="dropdown-stage">
                                                    @foreach($stages as $stage)
                                                        <div class="dropdown-item" data-value="{{$stage}}">
                                                            {{App\Enum\Stage::getStageName($stage)}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="certificate" >
                                                @lang("dashboard-admin/user.label.certificate")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" id="certificate"
                                                       value="{{App\Enum\Certificate::getCertificateName($user->certificate)}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.certificate")"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <input type="hidden" name="certificate" value="{{$user->certificate}}">
                                                @error("certificate") <div class="text-warning">{{$message}}</div> @enderror
                                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage" id="dropdown-certificate">
                                                    @foreach($certificates as $certificate)
                                                        <div class="dropdown-item" data-value="{{$certificate}}">
                                                            {{App\Enum\Certificate::getCertificateName($certificate)}}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="birth-date" >
                                                @lang("dashboard-admin/user.label.birth-date")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="md-form mt-0">
                                                <input type="date" class="form-control" name="birth_date" id="birth-date" value="{{$user->birth_date}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.birth-date")">
                                                @error("birth_date") <div class="text-warning">{{$message}}</div> @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label" for="address" >
                                                @lang("dashboard-admin/user.label.address")
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}"
                                                       placeholder="@lang("dashboard-admin/user.placeholder.address")">
                                                @error("address") <div class="text-warning">{{$message}}</div> @enderror
                                            </div>
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
                </div>
            </div>
            <div class="col-12">
                <div class="h5-responsive py-2">
                    <a data-toggle="collapse" data-target="#collapse-change-pass" aria-expanded="false" aria-controls="#collapse-change-pass">
                        @lang("dashboard-admin/user.edit.change-password")
                    </a>
                </div>

                <div class="collapse @if(old("update")=="pass") show @endif border-top border-info" id="collapse-change-pass" data-parent="#change-selector">
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <form method="post" action="{{route("dashboard.admin.users.update",["user" => $user->id])}}">
                                @csrf()
                                @method("put")
                                <input type="hidden" name="update" value="pass">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="password" >
                                            @lang("dashboard-admin/user.label.password")
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="password" class="form-control" name="password" id="password">
                                            @error("password") <div class="text-warning">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label" for="password-confirmation" >
                                            @lang("dashboard-admin/user.label.re-password")
                                        </label>
                                        <div class="md-form mt-0">
                                            <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                                        </div>
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
    <script>
        $('#dropdown-gender .dropdown-item').on('click', function () {
            $('input#gender').val($(this).html().trim());
            $('input[name="gender"]').val($(this).data('value'));
        });
        $('#dropdown-country .dropdown-item').on('click', function () {
            $('input#country').val($(this).html().trim());
            $('input[name="country"]').val($(this).data('value'));
        });
        $('#dropdown-stage .dropdown-item').on('click', function () {
            $('input#stage').val($(this).html().trim());
            $('input[name="stage"]').val($(this).data('value'));
        });
        $('#dropdown-certificate .dropdown-item').on('click', function () {
            $('input#certificate').val($(this).html().trim());
            $('input[name="certificate"]').val($(this).data('value'));
        });
        $('input#country').on('keyup', function () {
            let value = $(this).val();
            let items = $('#dropdown-country .dropdown-item');

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
