<table class="table table-hover w-100 table-responsive-xl btn-table" id="announcements">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2" class="align-bottom">
            @lang("dashboard-admin/announcement.components.datatable.column.id")
        </th>
        <th colspan="3" class="align-middle text-center text-capitalize">
            <a class="text-white" type="button" data-toggle="collapse" href="#collapse-announcement-type-filter" aria-expanded="false" aria-controls="collapse-announcement-type-filter">
                <i class="fa fa-filter"></i>
                @lang("dashboard-admin/announcement.components.datatable.title-$type")
            </a>

            <div class="collapse" id="collapse-announcement-type-filter">
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.announcements.index")}}">
                    <small><i class="fa fa-star"></i></small>
                </a>
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::STUDENTS])}}">
                    {{\App\Enum\AnnouncementType::getTypeName(\App\Enum\AnnouncementType::STUDENTS)}}
                </a>
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::LISTENERS])}}">
                    {{\App\Enum\AnnouncementType::getTypeName(\App\Enum\AnnouncementType::LISTENERS)}}
                </a>
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.announcements.index", ['type' => \App\Enum\AnnouncementType::BOTH])}}">
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
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox-{{$announcement->id}}" {{($announcement->state == \App\Enum\AnnouncementState::ACTIVE)?'checked':''}}>
                    <label class="custom-control-label" for="checkbox-{{$announcement->id}}">
                        {{\App\Enum\AnnouncementState::getStateName($announcement->state)}}
                    </label>
                </div>
            </td>
            <td>{{$announcement->created_at}}</td>
            <td class="align-middle">
                <div class="d-flex justify-content-center" data-content="{{$announcement->id}}">
                    <a class="btn btn-outline-info btn-sm m-2" data-action="btn-modal-show">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn btn-outline-primary btn-sm m-2" href="{{route("dashboard.admin.announcements.edit", ["announcement" => $announcement->id])}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger btn-sm m-2" data-action="btn-modal-delete">
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
    <div id="modal-show"></div>
    <div id="modal-delete"></div>
@endsection

@section('script')
    @parent
    <script>
        $("#announcements").DataTable( {
            order: [],
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
        $("input[type='checkbox']").on("click", function () {
            let input = $(this);
            let announcement = input.attr("id").split('-')[1];
            let state;
            if (input.attr("checked")) {
                input.removeAttr("checked");
                state = 0;
            }
            else {
                input.attr("checked", "");
                state = 1;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/dashboard/admin/api/announcements/change-state',
                data: {announcement: announcement, state:state},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    let toast = result.data.toast;
                    $.toast({
                        title: toast.title,
                        type:  toast.type,
                        delay: 2500
                    });

                    if (toast.type === "success")
                      input.parent().find('label').html(result.data.newState);
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                }
            });
        });
        $("[data-action='btn-modal-show']").on("click", function () {
            let announcement = $(this).parent().data('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/dashboard/admin/api/announcements/show',
                data: {announcement: announcement},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-show').html(result.data.html)
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $("#modal-show .modal").modal('show');
                }
            });
        });
        $("[data-action='btn-modal-delete']").on("click", function () {
            let announcement = $(this).parent().data('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/dashboard/admin/api/announcements/destroy',
                data: {announcement: announcement},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-delete').html(result.data.html)
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $("#modal-delete .modal").modal('show');
                }
            });
        });
        @if(session()->has("message"))
            $.toast({
                title: '{{session()->get("message")}}',
                type:  '{{session()->get("type")}}',
                delay: 2500
            });
        @endif
    </script>
@endsection
