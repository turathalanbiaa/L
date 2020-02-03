@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/user.create.title-$type")
@endsection

@section("style")
<style>
    #dropdown-country {
        max-height: 250px;
        overflow: hidden auto;
    }
</style>
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-sm-12">
                <div class="h3-responsive text-center mb-4">
                    @lang("dashboard-admin/user.create.title-$type")
                </div>

                <form method="post" action="{{route("dashboard.admin.users.store")}}">
                    @csrf()
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="col-form-label" for="name" >
                                @lang("dashboard-admin/user.column.name")
                            </label>
                            <div class="md-form mt-0">
                                <input type="text" class="form-control" name="name" id="name" value="{{old("name")}}"
                                       placeholder="@lang('dashboard-admin/user.placeholder.name')">
                                @error('name') <div class="text-warning">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="email" >
                                @lang("dashboard-admin/user.column.email")
                            </label>
                            <div class="md-form mt-0">
                                <input type="email" class="form-control" name="email" id="email" value="{{old("email")}}"
                                       placeholder="@lang('dashboard-admin/user.placeholder.email')">
                                @error('email') <div class="text-warning">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="phone" >
                                @lang("dashboard-admin/user.column.phone")
                            </label>
                            <div class="md-form mt-0">
                                <input type="text" class="form-control" name="phone" id="phone" value="{{old("phone")}}"
                                       placeholder="@lang('dashboard-admin/user.placeholder.phone')">
                                @error('phone') <div class="text-warning">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label" for="password" >
                                @lang("dashboard-admin/user.column.password")
                            </label>
                            <div class="md-form mt-0">
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password') <div class="text-warning">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label" for="password-confirmation" >
                                @lang("dashboard-admin/user.column.re_password")
                            </label>
                            <div class="md-form mt-0">
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label" for="gender" >
                                @lang("dashboard-admin/user.column.gender")
                            </label>
                            <div class="md-form mt-0">
                                <input type="text" class="form-control" id="gender" value="{{App\Enum\Gender::getGenderName(old('gender'))}}"
                                       placeholder="@lang('dashboard-admin/user.placeholder.gender')"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="gender" value="{{old('gender')}}">
                                @error('gender') <div class="text-warning">{{ $message }}</div> @enderror
                                <div class="dropdown-menu dropdown-default w-100" aria-labelledby="gender" id="dropdown-gender">
                                    @foreach($genders as $gender)
                                        <div class="dropdown-item" data-value="{{$gender}}">
                                            {{App\Enum\Gender::getGenderName($gender)}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label" for="country" >
                                @lang("dashboard-admin/user.column.country")
                            </label>
                            <div class="md-form mt-0">
                                <input type="text" class="form-control" id="country"
                                       value="{{Countries::getValue(app()->getLocale(), old('country'))}}"
                                       placeholder="@lang('dashboard-admin/user.placeholder.country')"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="hidden" name="country" value="{{old('country')}}">
                                @error('country') <div class="text-warning">{{ $message }}</div> @enderror
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
                        @if($type == App\Enum\UserType::STUDENT)
                            <div class="col-sm-3">
                                <label class="col-form-label" for="stage" >
                                    @lang("dashboard-admin/user.column.stage")
                                </label>
                                <div class="md-form mt-0">
                                    <input type="text" class="form-control" id="stage" value="{{App\Enum\Stage::getStageName(old('stage'))}}"
                                           placeholder="@lang('dashboard-admin/user.placeholder.stage')"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="hidden" name="stage" value="{{old('stage')}}">
                                    @error('stage') <div class="text-warning">{{ $message }}</div> @enderror
                                    <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage" id="dropdown-stage">
                                        @foreach($stages as $stage)
                                            <div class="dropdown-item" data-value="{{$stage}}">
                                                {{App\Enum\Stage::getStageName($stage)}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-form-label" for="certificate" >
                                    @lang("dashboard-admin/user.column.certificate")
                                </label>
                                <div class="md-form mt-0">
                                    <input type="text" class="form-control" id="certificate"
                                           value="{{App\Enum\Certificate::getCertificateName(old('certificate'))}}"
                                           placeholder="@lang('dashboard-admin/user.placeholder.certificate')"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="hidden" name="certificate" value="{{old('certificate')}}">
                                    @error('certificate') <div class="text-warning">{{ $message }}</div> @enderror
                                    <div class="dropdown-menu dropdown-default w-100" aria-labelledby="stage" id="dropdown-certificate">
                                        @foreach($certificates as $certificate)
                                            <div class="dropdown-item" data-value="{{$certificate}}">
                                                {{App\Enum\Certificate::getCertificateName($certificate)}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-form-label" for="birth-date" >
                                    @lang("dashboard-admin/user.column.birth_date")
                                </label>
                                <div class="md-form mt-0">
                                    <input type="date" class="form-control" name="birth_date" id="birth-date" value="{{old("birth_date")}}">
                                    @error('birth_date') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-form-label" for="address" >
                                    @lang("dashboard-admin/user.column.address")
                                </label>
                                <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="address" id="address" value="{{old("address")}}">
                                    @error('address') <div class="text-warning">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary">
                            @lang("dashboard-admin/user.create.btn")
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")

{{--        <div style="position: absolute; top: 0; left:0; z-index:2000; background-color: #0c5460; padding: 20px;">--}}
{{--            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true">--}}
{{--                <div class="toast-body text-white bg-success px-3">--}}
{{--                    {{session()->get("message")}}--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    @endif--}}



@endsection

@section("script")
    <script>
        $("#dropdown-gender .dropdown-item").click(function () {
            $("input#gender").val($(this).html().trim());
            $("input[name='gender']").val($(this).data('value'));
        });
        $("#dropdown-country .dropdown-item").click(function () {
            $("input#country").val($(this).html().trim());
            $("input[name='country']").val($(this).data('value'));
        });
        $("#dropdown-stage .dropdown-item").click(function () {
            $("input#stage").val($(this).html().trim());
            $("input[name='stage']").val($(this).data('value'));
        });
        $("#dropdown-certificate .dropdown-item").click(function () {
            $("input#certificate").val($(this).html().trim());
            $("input[name='certificate']").val($(this).data('value'));
        });
        $("input#country").keyup(function () {
            let value = $(this).val();
            let items = $("#dropdown-country .dropdown-item");

            $.each(items, function(index, item) {
                item.classList.add("d-none");
                item.classList.remove('d-block');
                str = item.textContent.trim();
               if(str.includes(value))
               {
                   item.classList.add("d-block");
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
