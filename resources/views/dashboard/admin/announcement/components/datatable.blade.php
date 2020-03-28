<table class="table table-hover w-100 table-responsive-xl btn-table" id="announcements">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2" class="align-bottom">
            @lang("dashboard-admin/announcement.components.datatable.column.id")
        </th>
        <th colspan="3" class="align-middle text-center text-capitalize">
            <button class="btn btn-sm btn-outline-white" type="button" data-toggle="collapse" data-target="#collapseAnnouncementTypeFilter" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-filter"></i>
            </button>

            @lang("dashboard-admin/announcement.components.datatable.title-$type")

            <div class="collapse" id="collapseAnnouncementTypeFilter">
                <a class="badge badge-pill blue-gray p-2 m-2" href="{{route("dashboard.admin.announcements.index")}}">
                    ---
                </a>
                <a class="badge badge-pill blue-gray p-2 m-2" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::STUDENTS])}}">
                    {{\App\Enum\AnnouncementType::getTypeName(\App\Enum\AnnouncementType::STUDENTS)}}
                </a>
                <a class="badge badge-pill blue-gray p-2 m-2" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::LISTENERS])}}">
                    {{\App\Enum\AnnouncementType::getTypeName(\App\Enum\AnnouncementType::LISTENERS)}}
                </a>
                <a class="badge badge-pill blue-gray p-2 m-2" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::BOTH])}}">
                    {{\App\Enum\AnnouncementType::getTypeName(\App\Enum\AnnouncementType::BOTH)}}
                </a>
            </div>
        </th>
        <th colspan="2" class="text-center">
            <a class="btn btn-link text-decoration-none text-white" type="button" href="{{route("dashboard.admin.announcements.create")}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/announcement.components.datatable.btn-add")
            </a>
        </th>
    </tr>
    <tr>
        <th class="th-sm">@lang("dashboard-admin/announcement.components.datatable.column.title")</th>
        <th class="th-sm">@lang("dashboard-admin/announcement.components.datatable.column.type")</th>
        <th class="th-sm">@lang("dashboard-admin/announcement.components.datatable.column.state")</th>
        <th class="th-sm">@lang("dashboard-admin/announcement.components.datatable.column.created_at")</th>
        <th class="th-sm text-center"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($announcements as $announcement)
        <tr>
            <td>{{$announcement->id}}</td>
            <td>{{$announcement->title}}</td>
            <td>{{\App\Enum\AnnouncementType::getTypeName($announcement->type)}}</td>
            <td>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="custom-switch-{{$announcement->id}}" {{($announcement->state == \App\Enum\AnnouncementState::ACTIVE)?'checked':''}}>
                    <label class="custom-control-label" for="custom-switch-{{$announcement->id}}">
                        {{\App\Enum\AnnouncementState::getStateName($announcement->state)}}
                    </label>
                </div>
            </td>
            <td>{{$announcement->created_at}}</td>
            <td class="align-middle">
                <div class="d-flex justify-content-center" data-content="{{$announcement->id}}">
                    <a class="btn btn-outline-secondary btn-sm m-2" data-action="btn-modal-show">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn btn-outline-primary btn-sm m-2" href="{{route("dashboard.admin.announcements.edit", ["announcement" => $announcement->id])}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger btn-sm m-2" href="">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
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
            $('#announcements').DataTable( {
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

        $("[data-action='btn-modal-show']").on("click", function () {
            let content = $(this).parent().data('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/dashboard/admin/api/announcements/show',
                data: {announcement: content},
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
