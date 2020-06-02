@extends("dashboard.admin.layout.app")

@section("title", __("dashboard-admin/document.index.title"))

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <a class="text-dark text-capitalize mb-1" type="button" data-toggle="collapse" href="#collapse-document-type-filter" aria-expanded="false" aria-controls="collapse-document-type-filter">
                    <i class="fa fa-filter"></i>
                    @lang("dashboard-admin/document.index.filter-header-$type")
                </a>
                <div class="collapse" id="collapse-document-type-filter">
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.documents.index")}}">
                        <i class="fa fa-star"></i>
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.documents.index", ["type" => \App\Enum\DocumentType::PERSONAL_IDENTIFICATION])}}">
                        @lang("dashboard-admin/document.index.filter-header-1")
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.documents.index", ["type" => \App\Enum\DocumentType::RELIGIOUS_RECOMMENDATION])}}">
                        @lang("dashboard-admin/document.index.filter-header-2")
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.documents.index", ["type" => \App\Enum\DocumentType::CERTIFICATE])}}">
                        @lang("dashboard-admin/document.index.filter-header-3")
                    </a>
                    <a class="badge blue-gray p-2 m-1" href="{{route("dashboard.admin.documents.index", ["type" => \App\Enum\DocumentType::PERSONAL_IMAGE])}}">
                        @lang("dashboard-admin/document.index.filter-header-4")
                    </a>
                </div>
            </div>

            @if($documents->isEmpty())
                <div class="col-sm-12 text-center">
                    <div class="h5-responsive p-5">
                        @lang("dashboard-admin/document.index.message")
                    </div>
                </div>
            @else
                @include("dashboard.admin.document.components.documents", ["documents" => $documents])

                @if($documents->hasPages())
                    <div class="col-sm-12 text-center">
                        <a class="btn btn-flat" href="{{route("dashboard.admin.documents.index")}}">
                            @lang("dashboard-admin/document.index.btn-load-more")
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
