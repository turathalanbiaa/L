@extends("dashboard.admin.layout.app")

@section("title")
    @lang('dashboard-admin/announcement.index.title')
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include("dashboard.admin.announcement.components.datatable", ["announcements" => $announcements])
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

