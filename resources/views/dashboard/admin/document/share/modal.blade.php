@switch ($action)
    @case("accept") @php $class = "modal-success"; $btn = "btn-success"; $btnOutline = "btn-outline-success"; @endphp @break;
    @case("reject") @php $class = "modal-warning"; $btn = "btn-warning"; $btnOutline = "btn-outline-warning"; @endphp @break;
    @case("delete") @php $class = "modal-danger";  $btn = "btn-danger";  $btnOutline = "btn-outline-danger";  @endphp @break;
    @default: @php $class = ""; @endphp
@endswitch

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify {{$class}}" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                {{\App\Enum\DocumentType::getTypeName($document->type)}}
            </div>
            <div class="modal-body">
                @lang("dashboard-admin/document.share.documents-tab-content.modal-$action-body")
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn {{$btn}}" data-target="document" data-action="{{$action}}" data-content="{{$document->id}}">
                    @lang("dashboard-admin/document.share.documents-tab-content.modal-btn-yes")
                </button>
                <button class="btn {{$btnOutline}}" data-dismiss="modal">
                    @lang("dashboard-admin/document.share.documents-tab-content.modal-btn-no")
                </button>
            </div>
        </div>
    </div>
</div>
