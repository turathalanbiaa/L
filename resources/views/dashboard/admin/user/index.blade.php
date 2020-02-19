@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/user.index.title-$type")
@endsection

@section("style")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include("dashboard.admin.user.components.datatable", ["users" => $users, "type" => $type])
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div id="extra"></div>
@endsection

@section("script")
    <script>
        $("[data-action='btnModalInfo']").click(function () {
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
