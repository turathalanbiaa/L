@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.index.title")
@endsection

@section("style")
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseDocumentTypeFilter" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-filter"></i>
                </button>

                <div class="collapse" id="collapseDocumentTypeFilter">
                    <a class="badge badge-pill badge-light p-2 m-2" href="{{route("dashboard.admin.documents.index")}}">
                        ---
                    </a>
                    <a class="badge badge-pill badge-light p-2 m-2" href="{{route("dashboard.admin.documents.index", ['type' => \App\Enum\DocumentType::PERSONAL_IDENTIFICATION])}}">
                        {{\App\Enum\DocumentType::getTypeName(\App\Enum\DocumentType::PERSONAL_IDENTIFICATION)}}
                    </a>
                    <a class="badge badge-pill badge-light p-2 m-2" href="{{route("dashboard.admin.documents.index", ['type' => \App\Enum\DocumentType::RELIGIOUS_RECOMMENDATION])}}">
                        {{\App\Enum\DocumentType::getTypeName(\App\Enum\DocumentType::RELIGIOUS_RECOMMENDATION)}}
                    </a>
                    <a class="badge badge-pill badge-light p-2 m-2" href="{{route("dashboard.admin.documents.index", ['type' => \App\Enum\DocumentType::CERTIFICATE])}}">
                        {{\App\Enum\DocumentType::getTypeName(\App\Enum\DocumentType::CERTIFICATE)}}
                    </a>
                    <a class="badge badge-pill badge-light p-2 m-2" href="{{route("dashboard.admin.documents.index", ['type' => \App\Enum\DocumentType::PERSONAL_IMAGE])}}">
                        {{\App\Enum\DocumentType::getTypeName(\App\Enum\DocumentType::PERSONAL_IMAGE)}}
                    </a>
                </div>
            </div>

            @if($documents->isEmpty())
                <div class="col-sm-12 text-center">
                    <div class="h3-responsive p-5">
                        @lang("dashboard-admin/document.index.message")
                    </div>
                </div>
            @else
                @include('dashboard.admin.document.components.documents', ["documents" => $documents])

                @if($documents->hasPages())
                    <div class="col-sm-12 text-center">
                        <a class="btn btn-flat shadow-none text-lowercase" href="{{route("dashboard.admin.documents.index")}}">
                            @lang("dashboard-admin/document.index.btn-loadMore")
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection

@section("extra-content")
@endsection

@section("script")
@endsection
