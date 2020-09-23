@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/user.index.title-$type"))

@section("head")
    @include("dashboard.admin.layout.head.datatable")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4">
                <a class="text-dark text-capitalize mb-1" type="button" data-toggle="collapse" href="#collapse-filter" aria-expanded="false" aria-controls="collapse-filter">
                    <i class="fa fa-filter"></i>
                    @lang("dashboard-admin/user.index.filter-$type.header")
                </a>
                <div class="collapse" id="collapse-filter">
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.users.index", ["type" => $type])}}">
                        <i class="fa fa-star"></i>
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.users.index", ["type" => $type, "state" => \App\Enum\UserState::UNTRUSTED])}}">
                        @lang("dashboard-admin/user.index.filter-$type.untrusted")
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.users.index", ["type" => $type, "state" => \App\Enum\UserState::TRUSTED])}}">
                        @lang("dashboard-admin/user.index.filter-$type.trusted")
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.users.index", ["type" => $type, "state" => \App\Enum\UserState::DISABLE])}}">
                        @lang("dashboard-admin/user.index.filter-$type.disable")
                    </a>
                </div>
            </div>

            <div class="col-12">
                <table class="table table-hover table-responsive-xl w-100 text-center" id="users">
                    <thead class="blue-gray-darken-4 text-white">
                    <tr>
                        <th rowspan="2">
                            @lang("dashboard-admin/user.index.datatable.column.number")
                        </th>
                        <th colspan="4" class="align-middle text-white">
                            @lang("dashboard-admin/user.index.datatable.header-$type")
                        </th>
                        <th colspan="1">
                            <a class="btn btn-flat btn-block waves-effect waves-light" type="button" href="{{route("dashboard.admin.users.create", ["type"=>$type])}}">
                                <i class="fa fa-plus light-green-text mx-1"></i>
                                @lang("dashboard-admin/user.index.datatable.btn-add")
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th class="th-sm">@lang("dashboard-admin/user.index.datatable.column.name")</th>
                        <th class="th-sm">@lang("dashboard-admin/user.index.datatable.column.email")</th>
                        <th class="th-sm">@lang("dashboard-admin/user.index.datatable.column.phone")</th>
                        <th class="th-sm">@lang("dashboard-admin/user.index.datatable.column.last-login")</th>
                        <th class="th-sm"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->last_login ?? "---"}}</td>
                            <td>
                                <div class="d-flex justify-content-center" data-content="{{$user->id}}">
                                    <a class="btn-floating btn-sm secondary-color mx-2" data-action="btn-show">
                                        <i class="far fa-address-card"></i>
                                    </a>
                                    <a class="btn-floating btn-sm info-color mx-2" href="{{route("dashboard.admin.users.show",["user" => $user->id])}}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="btn-floating btn-sm primary-color mx-2" href="{{route("dashboard.admin.users.edit",["user" => $user->id])}}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @if($user->state == \App\Enum\UserState::UNTRUSTED)
                                        <a class="btn-floating Warning-color btn-sm mx-2" data-action="btn-change-state">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    @elseif($user->state == \App\Enum\UserState::TRUSTED)
                                        <a class="btn-floating btn-sm success-color mx-2" data-action="btn-change-state">
                                            <i class="fas fa-user-check"></i>
                                        </a>
                                    @else
                                        <a class="btn-floating btn-sm danger-color mx-2" data-action="btn-change-state">
                                            <i class="fas fa-user-times"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @parent
    <script>
        $('#users').DataTable({
            order: [],
            columnDefs: [{targets: [5], orderable: false}],
            @if(app()->getLocale() == App\Enum\Language::ARABIC)
                language: {url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json'},
            @endif
        });
    </script>
@endsection
