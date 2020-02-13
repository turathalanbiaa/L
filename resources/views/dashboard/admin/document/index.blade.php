@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.index.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row" id="post-data">
            @forelse($documents as $document)
                <div class="col-4">
                    <div class="view overlay zoom">
                        <img src="" class="img-fluid " alt="smaple image">
                        <div class="mask flex-center">
                            <p class="white-text">Zoom effect</p>
                        </div>
                        <h2>{{$document->id}}</h2>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    no think
                </div>
            @endforelse
        </div>

        <div class="row justify-content-center m-4 d-none ajax-load">
            <div class="spinner-border text-blue-gray-darken-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")

@endsection

@section("script")
    <script>
        var page = 1;
        $(window).scroll(function() {
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
        });
    </script>
@endsection

