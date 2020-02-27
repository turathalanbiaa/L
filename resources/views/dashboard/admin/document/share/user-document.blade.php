@if($user->type == \App\Enum\UserType::STUDENT)
    <a class="btn btn-outline-primary" href="{{route("dashboard.admin.documents.create", ["user" => $user->id])}}">
        @lang("dashboard-admin/document.share.user-document.btn-add")
    </a>
    <div class="clearfix row pt-3">
        @include('dashboard.admin.document.components.documents', ["documents" => $documents])
    </div>
@else
    <div class="d-flex justify-content-center">
        <div class="h3-responsive p-5">
            @lang('dashboard-admin/document.share.user-document.message')
        </div>
    </div>
@endif
