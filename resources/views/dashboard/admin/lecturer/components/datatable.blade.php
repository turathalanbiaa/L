<table class="table table-hover text-center w-100 table-responsive-xl" id="lecturers">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2">
            @lang("dashboard-admin/lecturer.components.datatable.column.number")
        </th>
        <th colspan="3" class="align-middle">
            <a class="text-white text-capitalize mb-1" type="button" data-toggle="collapse" href="#collapse-lecturer-filter" aria-expanded="false" aria-controls="collapse-lecturer-filter">
                <i class="fa fa-filter"></i>
                @lang("dashboard-admin/lecturer.components.datatable.header-$state")
            </a>
            <div class="collapse" id="collapse-lecturer-filter">
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.lecturers.index")}}">
                    <i class="fa fa-star"></i>
                </a>
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.lecturers.index", ["state" => 0])}}">
                    @lang("dashboard-admin/lecturer.components.datatable.header-0")
                </a>
                <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.lecturers.index", ["state" => 1])}}">
                    @lang("dashboard-admin/lecturer.components.datatable.header-1")
                </a>
            </div>
        </th>
        <th colspan="1">
            <a class="btn btn-flat waves-effect waves-light" type="button" href="{{route("dashboard.admin.lecturers.create")}}">
                <i class="fa fa-plus light-green-text mx-1"></i>
                @lang("dashboard-admin/lecturer.components.datatable.btn-add")
            </a>
        </th>
    </tr>
    <tr>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.name")</th>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.last-login")</th>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.state")</th>
        <th class="th-sm"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($lecturers as $lecturer)
        <tr>
            <td>{{$lecturer->id}}</td>
            <td>
                <a href="{{route("dashboard.admin.lecturers.show", ["lecturer" => $lecturer->id])}}" target="_blank">
                    {{$lecturer->name}}
                </a>
            </td>
            <td>{{$lecturer->last_login ?? "---"}}</td>
            <td>{{\App\Enum\LecturerState::getStateName($lecturer->state)}}</td>
            <td>
                <div class="d-flex justify-content-center" data-content="{{$lecturer->id}}">
                    <a class="btn-floating btn-sm secondary-color mx-2" data-action="btn-info">
                        <i class="far fa-address-card"></i>
                    </a>
                    <a class="btn-floating btn-sm info-color mx-2" href="{{route("dashboard.admin.lecturers.show",["lecturer" => $lecturer->id])}}" target="_blank">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn-floating btn-sm primary-color mx-2" href="{{route("dashboard.admin.lecturers.edit",["lecturer" => $lecturer->id])}}" target="_blank">
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
    <div id="modal-info"></div>
@endsection

@section("script")
    @parent
    <script>
        $('#lecturers').DataTable({
            order: [],
            columnDefs: [{targets: [4], orderable: false}],
            @if(app()->getLocale() == App\Enum\Language::ARABIC)
            'language': {'url': 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json'},
            @endif
        });
        $('[data-action="btn-info"]').on('click', function () {
            let lecturer = $(this).parent().data('content');
            $.ajax({
                type: 'get',
                url: '/dashboard/admin/lecturers/'+lecturer+'/info',
                data: null,
                datatype: 'json',
                encode: true,
                success: function(data) {
                    $('#modal-info').html(data.html)
                },
                error: function() {
                    console.log('error');
                } ,
                complete : function() {
                    $('#modal-info .modal').modal('show');
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
