<table class="table table-hover table-responsive-xl w-100 btn-table" id="announcements">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2" class="align-bottom">
            @lang("dashboard-admin/announcement.column.id")
        </th>
        <th colspan="3" class="align-middle text-center text-capitalize">
            @lang("dashboard-admin/announcement.components.datatable.title")
        </th>
        <th colspan="1" class="text-center">
            <a class="btn btn-link text-decoration-none text-white" type="button" href="{{route("dashboard.admin.announcements.create")}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/announcement.components.datatable.btn-add")
            </a>
        </th>
    </tr>
    <tr>
        <th>@lang("dashboard-admin/announcement.column.title")</th>
        <th>@lang("dashboard-admin/announcement.column.type")</th>
        <th>@lang("dashboard-admin/announcement.column.state")</th>
        <th class="text-center"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($announcements as $announcement)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$announcement->title}}</td>
            <td>{{$announcement->type}}</td>
            <td>{{$announcement->state}}</td>
            <td class="text-center" data-content="{{$announcement->id}}">
                <a class="btn btn-outline-info btn-sm m-2" data-action="btnModalInfo">
                    <i class="far fa-address-card"></i>
                </a>
                <a class="btn btn-outline-secondary btn-sm m-2" href="">
                    <i class="far fa-eye"></i>
                </a>
                <a class="btn btn-outline-primary btn-sm m-2" href="">
                    <i class="far fa-edit"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready( function () {
        $('#announcements').DataTable( {
            columnDefs: [{
                targets: [4],
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
