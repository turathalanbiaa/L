<table class="table table-hover text-center w-100 table-responsive-xl" id="lecturers">
    <thead class="blue-gray-darken-4 text-white">
    <tr>
        <th rowspan="2">
            @lang("dashboard-admin/lecturer.components.datatable.column.number")
        </th>
        <th colspan="4" class="align-middle">
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
            <a class="btn-floating btn-sm primary-color" type="button" href="{{route("dashboard.admin.lecturers.create")}}">
                <i class="fa fa-plus"></i>
            </a>
        </th>
    </tr>
    <tr>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.name")</th>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.email")</th>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.phone")</th>
        <th class="th-sm">@lang("dashboard-admin/lecturer.components.datatable.column.last-login")</th>
        <th class="th-sm"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($lecturers as $lecturer)
        <tr>
            <td>{{$lecturer->id}}</td>
            <td>{{$lecturer->name}}</td>
            <td>{{$lecturer->email}}</td>
            <td>{{$lecturer->phone}}</td>
            <td>{{$lecturer->last_login ?? "---"}}</td>
            <td>
                <div class="d-flex justify-content-center" data-content="{{$lecturer->id}}">
                    <a class="btn-floating btn-sm secondary-color mx-2" data-action="btn-modal-show">
                        <i class="far fa-address-card"></i>
                    </a>
                    <a class="btn-floating btn-sm info-color mx-2" href="{{route("dashboard.admin.lecturers.show",["lecturer" => $lecturer->id])}}">
                        <i class="far fa-eye"></i>
                    </a>
                    <a class="btn-floating btn-sm primary-color mx-2" href="{{route("dashboard.admin.lecturers.edit",["lecturer" => $lecturer->id])}}">
                        <i class="far fa-edit"></i>
                    </a>
                    @if($lecturer->state == \App\Enum\LecturerState::INACTIVE)
                        <a class="btn-floating btn-sm danger-color mx-2" data-action="btn-modal-change-state">
                            <i class="fas fa-user-times"></i>
                        </a>
                    @else
                        <a class="btn-floating btn-sm success-color mx-2" data-action="btn-modal-change-state">
                            <i class="fas fa-user-check"></i>
                        </a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section("extra-content")
    @parent
    <div id="modal-show"></div>
    <div id="modal-change-state"></div>
@endsection

@section("script")
    @parent
    <script>
        $('#lecturers').DataTable( {
            order: [],
            columnDefs: [{targets: [5], orderable: false}],
            @if(app()->getLocale() == App\Enum\Language::ARABIC)
            'language': {'url': 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json'},
            @endif
        } );
        $('[data-action="btn-modal-show"]').on('click', function () {
            let lecturer = $(this).parent().data('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '/dashboard/admin/api/lecturers/show',
                data: {lecturer: lecturer},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-show').html(result.data.html)
                },
                error: function() {
                    console.log('error');
                } ,
                complete : function() {
                    $('#modal-show .modal').modal('show');
                }
            });
        });
        $('[data-action="btn-modal-change-state"]').on('click', function () {
            let lecturer = $(this).parent().data('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '/dashboard/admin/api/lecturers/change-state',
                data: {lecturer: lecturer},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-change-state').html(result.data.html)
                },
                error: function() {
                    console.log('error');
                } ,
                complete : function() {
                    $('#modal-change-state .modal').modal('show');
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
