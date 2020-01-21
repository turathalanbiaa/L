<table class="table table-hover table-responsive-xl w-100 btn-table" id="users">
    <thead class="blue-gray-darken-1 text-white">
    <tr>
        <th rowspan="2" class="align-middle text-center sorting_asc_disabled sorting_desc_disabled">رقم</th>
        <th colspan="4" class="text-center">الطلاب المسجلين في المعهد</th>
        <th colspan="1" class="text-center">اضافة طالب</th>
    </tr>
    <tr>
        <th>الاسم</th>
        <th>البريد الالكتروني</th>
        <th>الهاتف</th>
        <th>الحالة</th>
        <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->state}}</td>
            <td class="text-center" data-content="{{base64_encode($user->id)}}">
                <button type="button" class="btn btn-info btn-sm mx-1" data-action="{{$actionBtnSimpleShow}}">
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
                targets: [0,5],
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
