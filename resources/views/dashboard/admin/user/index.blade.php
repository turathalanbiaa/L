@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/user.index.title")
@endsection

@section("style")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 align-items-center">
                @component("dashboard.admin.user.components.datatable", ["users" => $users])
                    @slot('btnInfoTargetModal') userModalInfo @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    @component("dashboard.admin.user.components.modal")
        @slot('id') userModalInfo @endslot
        @slot('type') modal-info @endslot
        @slot('header') @lang('dashboard-admin/user.index.modal.delete.header') @endslot
        @slot('body')
            <div class="row">
                <div class="col-3 text-center">
                    <img class="img-fluid z-depth-1-half rounded-circle" src="{{Storage::url($users[1]->image)}}" alt="user image" >
                    <p class="mt-3">{{$users[1]->name}}</p>
                </div>

                <div class="col-9">
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.stage') : </strong>
                        <span>{{App\Enum\Stage::getStageName($users[1]->stage)}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.email') : </strong>
                        <span>{{$users[1]->email}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.phone') : </strong>
                        <span>{{$users[1]->phone}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.certificate') : </strong>
                        <span>{{App\Enum\Certificate::getCertificateName($users[1]->certificate)}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.gender') : </strong>
                        <span>{{App\Enum\Gender::getGenderName($users[1]->gender)}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.country') : </strong>
                        <span>{{App\Enum\Country::getCountryName($users[1]->country)}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.birth-date') : </strong>
                        <span>{{$users[1]->birth_date}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.created-at') : </strong>
                        <span>{{$users[1]->created_at}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.last-login') : </strong>
                        <span>{{$users[1]->last_login}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.state') : </strong>
                        <span>{{App\Enum\UserState::getStateName($users[1]->state)}}</span>
                    </p>
                    <p class="card-text">
                        <strong>@lang('dashboard-admin/user.column.address') : </strong>
                        <span>{{$users[1]->address}}</span>
                    </p>
                </div>
            </div>
        @endslot
        @slot('footer')
            <a type="button" class="btn btn-info">
                @lang('dashboard-admin/user.index.modal.delete.btn-more-info')
            </a>
            <a type="button" class="btn btn-outline-info" data-dismiss="modal">
                @lang('dashboard-admin/user.index.modal.delete.btn-dismiss')
            </a>
        @endslot
    @endcomponent
@endsection

@section("script")
    <script>
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: '{{route("dashboard.admin.users.show",["user" => 1])}}',
            data: {simple:true},
            datatype: 'json',
            success: function(data) {
                let state = data['state'];
                let user = data['user'];
            },
            error: function() {} ,
            complete : function() {}
        });
    </script>
@endsection
