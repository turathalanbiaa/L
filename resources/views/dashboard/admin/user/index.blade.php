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

@endsection

@section("script")

@endsection
