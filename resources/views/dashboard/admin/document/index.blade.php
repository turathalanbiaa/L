@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.index.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            @if($documents->isEmpty())
                <div class="col-sm-12 text-center">
                    <div class="h3-responsive p-5">
                        @lang("dashboard-admin/document.index.message")
                    </div>
                </div>
            @else
                @include('dashboard.admin.document.component.documents', ["documents" => $documents])
            @endif
        </div>
    </div>
@endsection

@section("extra-content")

@endsection

@section("script")

@endsection

