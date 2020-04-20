@if($user->type == \App\Enum\UserType::STUDENT)
    <a class="btn btn-outline-primary" href="{{route("dashboard.admin.documents.create", ["user" => $user->id])}}">
        @lang("dashboard-admin/document.share.user-documents.btn-add")
    </a>
    <div class="clearfix row pt-3">
        @include("dashboard.admin.document.components.documents", ["documents" => $documents])
    </div>
@else
    <div class="d-flex justify-content-center">
        <div class="h5-responsive p-5">
            @lang("dashboard-admin/document.share.user-documents.message")
        </div>
    </div>
@endif
