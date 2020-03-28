@extends("dashboard.admin.layout.app")

@section("title")
    {{$announcement->title}}
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div>
                    {!! $announcement->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")

@endsection

@section("script")
    <script>

    </script>
@endsection

