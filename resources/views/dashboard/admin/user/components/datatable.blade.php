<table class="table table-hover text-center w-100 table-responsive-xl" id="users">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2">
            @lang("dashboard-admin/user.components.datatable.column.number")
        </th>
        <th colspan="4" class="align-middle text-capitalize">
            @lang("dashboard-admin/user.components.datatable.header-$type")
        </th>
        <th colspan="1">
            <a class="btn btn-flat waves-effect waves-light" type="button" href="{{route("dashboard.admin.users.create", ["type"=>$type])}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/user.components.datatable.btn-add-$type")
            </a>
        </th>
    </tr>
    <tr>
        <th class="th-sm">@lang("dashboard-admin/user.components.datatable.column.name")</th>
        <th class="th-sm">@lang("dashboard-admin/user.components.datatable.column.email")</th>
        <th class="th-sm">@lang("dashboard-admin/user.components.datatable.column.phone")</th>
        <th class="th-sm">@lang("dashboard-admin/user.components.datatable.column.last-login")</th>
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
                    <a class="btn-floating btn-sm secondary-color mx-2" data-action="btn-modal-show">
                        <i class="far fa-address-card"></i>
                    </a>
                    <a class="btn-floating btn-sm info-color mx-2" href="{{route("dashboard.admin.users.show",["user" => $user->id])}}">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn-floating btn-sm primary-color mx-2" href="{{route("dashboard.admin.users.edit",["user" => $user->id])}}">
                        <i class="far fa-edit"></i>
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section("extra-content")
    @parent
    <div id="modal-show"></div>
@endsection

@section("script")
    @parent
    <script>
        $("#users").DataTable( {
            order: [],
            columnDefs: [{
                targets: [5],
                orderable: false
            }],
            @if(app()->getLocale() == App\Enum\Language::ARABIC)
            'language': {
                'url': 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json'
            },
            @endif
        } );
        $("[data-action='btn-modal-show']").on('click', function () {
            let user = $(this).parent().data('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                },
                type: 'post',
                url: '/dashboard/admin/api/users/show',
                data: {user: user},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $("#modal-show").html(result.data.html)
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $("#modal-show .modal").modal('show');
                }
            });
        });
    </script>
@endsection
