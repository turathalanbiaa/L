<table class="table table-hover table-responsive-xl w-100 btn-table" id="users">
    <thead class="blue-gray-darken-1 text-white">
    <tr>
        <th rowspan="2" class="align-bottom">
            @lang("dashboard-admin/user.column.id")
        </th>
        <th colspan="4" class="align-middle text-center">
            @lang("dashboard-admin/user.index.datatable.title")
        </th>
        <th colspan="1" class="text-center">
            <a class="btn btn-link text-decoration-none text-white" type="button" href="{{route("dashboard.admin.users.create")}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/user.index.datatable.btn-create")
            </a>
        </th>
    </tr>
    <tr>
        <th>@lang("dashboard-admin/user.column.name")</th>
        <th>@lang("dashboard-admin/user.column.email")</th>
        <th>@lang("dashboard-admin/user.column.phone")</th>
        <th>@lang("dashboard-admin/user.column.state")</th>
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
            <td>{{$user->state}}</td>
            <td class="text-center" data-content="{{base64_encode($user->id)}}">
                <button type="button" class="btn btn-info btn-sm mx-1" data-action="btnSimpleShow">
                    <i class="far fa-address-card"></i>
                </button>
                <a class="btn btn-secondary btn-sm mx-1" href="{{route("dashboard.admin.users.show",["user" => $user->id])}}">
                    <i class="far fa-eye"></i>
                </a>
                <button type="button" class="btn btn-primary btn-sm mx-1"><i class="far fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm mx-1"><i class="far fa-trash-alt"></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
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
</script>
