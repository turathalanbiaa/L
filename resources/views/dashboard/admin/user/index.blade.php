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
    @component("dashboard.admin.user.components.modal")
        @slot('id') modalSimpleShow @endslot
        @slot('type') modal-info @endslot
        @slot('header') @lang('dashboard-admin/user.index.modal.simple-show.header') @endslot
        @slot('body')
            <div class="row" id="modal-simple-show-body"></div>
        @endslot
        @slot('footer')
            <a type="button" class="btn btn-info" id="modal-simple-show-btn-show">
                @lang('dashboard-admin/user.index.modal.simple-show.btn-show')
            </a>
            <a type="button" class="btn btn-outline-info" data-dismiss="modal">
                @lang('dashboard-admin/user.index.modal.simple-show.btn-dismiss')
            </a>
        @endslot
    @endcomponent
@endsection

@section("script")
    <script>
        $("button[data-action='btnSimpleShow']").click(function () {
            let content = $(this).parent().data('content');
            let body = $('#modal-simple-show-body');
            body.html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/dashboard/admin/users/ajax/simple-show',
                data: {content: content},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    let user = result.user;
                    let block = "";
                    if (result.state === false)
                        block =
                            '<div class="col-12">' +
                            '   <div class="d-flex justify-content-center p-4">' +
                            '       <div class="h5-responsive">' +
                                        result.message +
                            '       </div>' +
                            '   </div>' +
                            '</div>';
                    else
                    {
                        let column = "";
                        Object.entries(user).forEach(([key , value]) => {
                            column +=
                                '<p class="card-text">' +
                                '   <strong> '+ value.text +': </strong>' +
                                '   <span>'+    value.value +'</span>' +
                                '</p>';
                        });
                        block =
                            '<div class="col-12">' +
                                column +
                            '</div>';
                        $("#modal-simple-show-btn-show").attr("href","/dashboard/admin/users/"+atob(content));
                    }
                    body.html(block);
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $("#modalSimpleShow").modal('show');
                }
            });
        });
    </script>
@endsection
