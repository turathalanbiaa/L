

@section("extra-content")
    @parent
    <div id="modal-show"></div>
    <div id="modal-change-state"></div>
@endsection

@section("script")
    @parent
    <script>
        $('[data-action="btn-show"]').on('click', function () {
            let user = $(this).parent().data('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '/dashboard/admin/api/users/show',
                data: {user: user},
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
        $('[data-action="btn-change-state"]').on('click', function () {
            let user = $(this).parent().data('content');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '/dashboard/admin/api/users/change-state',
                data: {user: user},
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
