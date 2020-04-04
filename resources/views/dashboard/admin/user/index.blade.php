@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/user.index.title-$type"))

@section("head")
    @include("dashboard.admin.layout.head.data-tables")
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
