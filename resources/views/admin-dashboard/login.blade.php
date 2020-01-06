@extends('admin-dashboard.layout.app')

@section('title') @lang("login.title") @endsection

@section('style')
    <style>
        html, body {
            background-color: #f0f3f9;
            color: #23282c;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-weight: 500;
        }
        @if(app()->getLocale() == "en")
            body {
            direction: ltr;
            text-align: left;
        }
        @else
            body {
            direction: rtl;
            text-align: right;
        }
        @endif
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center full-height position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-4">
                    <h4 class="text-center font-weight-bold mb-4">@lang("login.header")</h4>
                    <div class="card mx-3 shadow-sm">
                        <div class="card-body">
                            @if(session("error"))
                                <div class="alert alert-danger animated fadeIn">
                                    {{ session("error") }}
                                </div>
                            @endif
                            <form role="form" method="POST" action="{{route('adminLogin')}}">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label" for="username">@lang('login.input-username')</label>
                                    <input type="text" class="form-control form-control-sm" name="username" id="username" value="">
                                    @error('username') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="password">@lang('login.input-password')</label>
                                    <input type="password" class="form-control form-control-sm" name="password" id="password" value="">
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="rememberMe">
                                                @lang('login.input-remember-me')
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-block btn-primary">
                                            @lang('login.btn-login')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="links text-center pt-3">
                        <a href="{{route('adminChangeLanguage')}}?locale=ar">العربية</a>
                        <a href="{{route('adminChangeLanguage')}}?locale=en">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
