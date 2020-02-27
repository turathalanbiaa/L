@extends("dashboard.admin.layout.app")

@section("title")

@endsection

@section("style")

@endsection

@section("content")
    <div id="post-data"></div>
    <div class="row justify-content-center m-4 d-none ajax-load">
        <div class="spinner-border text-blue-gray-darken-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section("extra-content")

@endsection

@section("script")
    <script>
        var page = 1;
        $(document).ready(function() {
            loadMore();
        });
        $(window).scroll(function() {
            loadMore();
        });

        function loadMore() {
            if($(window).scrollTop() === $(window).innerHeight() - $(window).outerHeight()) {
                page++;
                $('.ajax-load').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/dashboard/admin/documents',
                    data: {page: page},
                    datatype: 'json',
                    encode: true,
                    success: function(result) {
                        if (result.html === "")
                            $('.ajax-load').html("No more records found");
                        else
                        {
                            $("#post-data").append(result.html);
                        }
                    },
                    error: function() {
                        alert('server not responding...');
                    } ,
                    complete : function() {
                        $('.ajax-load').hide();
                    }
                });
            }
        }
    </script>
@endsection

