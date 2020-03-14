<table class="table table-hover table-responsive-xl w-100 btn-table" id="users">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2" class="align-bottom">
            @lang("dashboard-admin/user.column.id")
        </th>
        <th colspan="4" class="align-middle text-center text-capitalize">
            @lang("dashboard-admin/user.components.datatable.title-$type")
        </th>
        <th colspan="1" class="text-center">
            <a class="btn btn-link text-decoration-none text-white" type="button" href="{{route("dashboard.admin.users.create", ["type"=>$type])}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/user.components.datatable.btn-add-$type")
            </a>
        </th>
    </tr>
    <tr>
        <th>@lang("dashboard-admin/user.column.name")</th>
        <th>@lang("dashboard-admin/user.column.email")</th>
        <th>@lang("dashboard-admin/user.column.phone")</th>
        <th>@lang("dashboard-admin/user.column.last_login")</th>
        <th class="text-center"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{is_null($user->last_login)?__('dashboard-admin/user.column.last_login_null'):$user->last_login}}</td>
            <td class="text-center" data-content="{{$user->id}}">
                <a class="btn btn-outline-info btn-sm m-2" data-action="btn-modal-info">
                    <i class="far fa-address-card"></i>
                </a>
                <a class="btn btn-outline-secondary btn-sm m-2" href="{{route("dashboard.admin.users.show",["user" => $user->id])}}">
                    <i class="far fa-eye"></i>
                </a>
                <a class="btn btn-outline-primary btn-sm m-2" href="{{route("dashboard.admin.users.edit",["user" => $user->id])}}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section("extra-content")
    @parent
    <div id="extra"></div>
@endsection

@section('script')
    @parent
    <script>
        $(document).ready( function () {
            $('#users').DataTable( {
                columnDefs: [{
                    targets: [5],
                    orderable: false
                }],
                @if(app()->getLocale() == App\Enum\Language::ARABIC)
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"
                },
                @endif
            } );
        } );

        $("[data-action='btn-modal-info']").on('click', function () {
            let content = $(this).parent().data('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/dashboard/admin/api/users/info',
                data: {user: content},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#extra').html(result.data.html)
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $(".modal").modal('show');
                }
            });
        });
    </script>
@endsection

