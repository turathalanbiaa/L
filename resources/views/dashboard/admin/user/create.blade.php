@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/user.create.title-$type"))

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <form method="post" action="{{route("dashboard.admin.users.store")}}">
                    @csrf()
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="col-form-label" for="name" >
                                @lang("dashboard-admin/user.label.name")
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old("name")}}"
                                   placeholder="@lang("dashboard-admin/user.placeholder.name")">
                            @error("name") <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="email" >
                                @lang("dashboard-admin/user.label.email")
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{old("email")}}"
                                   placeholder="@lang("dashboard-admin/user.placeholder.email")">
                            @error("email") <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="phone" >
                                @lang("dashboard-admin/user.label.phone")
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{old("phone")}}"
                                   placeholder="@lang("dashboard-admin/user.placeholder.phone")">
                            @error("phone") <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="country" >
                                @lang("dashboard-admin/user.label.country")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="country" autocomplete="off"
                                       value="{{Countries::getValue(app()->getLocale(), old("country"))}}"
                                       placeholder="@lang("dashboard-admin/user.placeholder.country")"
                                       data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="country" value="{{old("country")}}">
                                @error("country") <div class="text-danger">{{$message}}</div> @enderror
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
                            <label class="col-form-label" for="password" >
                                @lang("dashboard-admin/user.label.password")
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error("password") <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="password-confirmation" >
                                @lang("dashboard-admin/user.label.re-password")
                            </label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="gender" >
                                @lang("dashboard-admin/user.label.gender")
                                <span class="text-danger">*</span>
                            </label>
                            <div class="dropdown">
                                <input type="text" class="form-control" id="gender" autocomplete="off"
                                       value="{{App\Enum\Gender::getGenderName(old("gender"))}}"
                                       placeholder="@lang("dashboard-admin/user.placeholder.gender")"
                                       data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="gender" value="{{old("gender")}}">
                                @error("gender") <div class="text-danger">{{$message}}</div> @enderror
                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="gender">
                                    @foreach(\App\Enum\Gender::getGenders() as $gender)
                                        <div class="dropdown-item" data-value="{{$gender}}">
                                            {{App\Enum\Gender::getGenderName($gender)}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @if($type == App\Enum\UserType::STUDENT)
                            <div class="col-sm-4">
                                <label class="col-form-label" for="stage" >
                                    @lang("dashboard-admin/user.label.stage")
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="dropdown">
                                    <input type="text" class="form-control" id="stage" autocomplete="off"
                                           value="{{App\Enum\Stage::getStageName(old("stage"))}}"
                                           placeholder="@lang("dashboard-admin/user.placeholder.stage")"
                                           data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                    <input type="hidden" name="stage" value="{{old("stage")}}">
                                    @error("stage") <div class="text-danger">{{$message}}</div> @enderror
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
                                           value="{{App\Enum\Certificate::getCertificateName(old("certificate"))}}"
                                           placeholder="@lang("dashboard-admin/user.placeholder.certificate")"
                                           data-toggle="dropdown" data-action="search" aria-haspopup="true" aria-expanded="false">
                                    <input type="hidden" name="certificate" value="{{old("certificate")}}">
                                    @error("certificate") <div class="text-danger">{{ $message }}</div> @enderror
                                    <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage">
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
                                <input type="date" class="form-control" name="birth_date" id="birth-date" value="{{old("birth_date")}}"
                                       placeholder="@lang("dashboard-admin/user.placeholder.birth-date")">
                                @error("birth_date") <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="col-sm-12">
                                <label class="col-form-label" for="address" >
                                    @lang("dashboard-admin/user.label.address")
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" rows="5" name="address" id="address" placeholder="@lang("dashboard-admin/user.placeholder.address")">{{old("address")}}</textarea>
                                @error("address") <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                        @endif
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary" type="submit">
                            @lang("dashboard-admin/user.create.btn-send")
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
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
