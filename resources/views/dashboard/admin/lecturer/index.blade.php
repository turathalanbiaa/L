@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/lecturer.index.title"))

@section("head")
    @include("dashboard.admin.layout.head.datatable")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include("dashboard.admin.lecturer.components.datatable", [
                    "lecturers" => $lecturers,
                    "state" => $state
                ])
            </div>
        </div>
    </div>
@endsection
