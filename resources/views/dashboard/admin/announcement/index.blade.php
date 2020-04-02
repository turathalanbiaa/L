@extends("dashboard.admin.layout.app")

@section("title", __('dashboard-admin/announcement.index.title'))

@section("head")
    @include('dashboard.admin.layout.head.data-tables')
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
