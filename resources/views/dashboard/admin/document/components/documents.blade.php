@foreach($documents as $document)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-3 text-center mb-5" id="{{$document->id}}">
        <p>
            {{\App\Enum\DocumentType::getTypeName($document->type)}}
            @switch($document->state)
                @case(\App\Enum\DocumentState::ACCEPT)
                <span class="badge badge-success">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                @break
                @case(\App\Enum\DocumentState::REJECT)
                <span class="badge badge-warning">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                @break
                @case(\App\Enum\DocumentState::REVIEW)
                <span class="badge badge-info">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                @break
            @endswitch
        </p>
        <div class="view overlay z-depth-1 img-thumbnail">
            <img src="{{asset("images/medium".Storage::url($document->image))}}" class="w-100" alt="Document Image">
            <div class="mask flex-center rgba-black-strong" data-action="document-view">
                <button class="btn btn-outline-info btn-sm">
                    <i class="fa fa-eye text-white mx-1"></i>
                    <span class="text-white">
                        @lang("dashboard-admin/document.components.documents.btn-view")
                    </span>
                </button>
            </div>
        </div>
        <div class="d-block mt-2" data-content="{{$document->id}}">
            <button class="btn btn-sm btn-outline-success" data-action="build-modal" data-content="accept">
                <i class="fa fa-check text-success"></i>
            </button>
            <button class="btn btn-sm btn-outline-warning" data-action="build-modal" data-content="reject">
                <i class="fa fa-times text-warning"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger"  data-action="build-modal" data-content="delete">
                <i class="fa fa-trash text-danger"></i>
            </button>
        </div>
    </div>
@endforeach

@section("extra-content")
    @parent
    <div class="modal fade" id="modal-document-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="" alt="Document Image">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-document-action" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-notify" role="document">
            <div class="modal-content">
                <div class="modal-header text-white"></div>
                <div class="modal-body"></div>
                <div class="modal-footer justify-content-center">
                    <button class="btn" data-action="document">
                        <form class="d-none">
                            <input type="hidden" name="document" value="">
                            <input type="hidden" name="action"   value="">
                        </form>
                        @lang("dashboard-admin/document.components.documents.modal-btn-yes")
                    </button>
                    <button class="btn" data-dismiss="modal">
                        @lang("dashboard-admin/document.components.documents.modal-btn-no")
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @parent
    <script>
        $('[data-action="document-view"]').click(function () {
            let src = $(this).parent().find('img').attr('src');
            let modal = $('#modal-document-info');
            src = src.replace("medium", "large");
            modal.find('img').attr('src', src);
            modal.modal('show')
        });

        $('[data-action="build-modal"]').click(function () {
            let document = $(this).parent().data('content');
            let action = $(this).data('content');
            let modal = $('#modal-document-action');

            $.ajax({
                type: 'get',
                url: '/dashboard/admin/api/documents/build-modal',
                data: {document: document, action: action},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    modal.find('.modal-dialog').removeClass().addClass("modal-dialog modal-notify " + result.data.modal.type);
                    modal.find('.modal-header').html(result.data.modal.header);
                    modal.find('.modal-body').html(result.data.modal.body);
                    modal.find('.btn:first-child').removeClass().addClass("btn " + result.data.modal.btn);
                    modal.find('.btn:last-child').removeClass().addClass("btn " + result.data.modal.btnOutline);
                    $("input[name='document']").val(document);
                    $("input[name='action']").val(action);
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    modal.modal('show');
                }
            });
        });

        $('[data-action="document"]').click(function () {
            let document = $(this).find("input[name='document']").val();
            let action = $(this).find("input[name='action']").val();

            $.ajax({
                type: 'get',
                url: '/dashboard/admin/api/documents/action',
                data: {document: document, action: action},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-document-action').modal('hide');
                    setTimeout(function () {
                        $.toast({
                            title: result.data.toast.title,
                            type:  result.data.toast.type,
                            delay: 2000
                        });
                    }, 250);
                    if (result.data.toast.type === "success") {
                        if(action === 'accept')
                            $("#"+document).find('p .badge').removeClass().addClass('badge badge-success').html(result.data.documentState);

                        if(action === 'reject')
                            $("#"+document).find('p .badge').removeClass().addClass('badge badge-warning').html(result.data.documentState);

                        if (action === "delete") {
                            $("#"+document).fadeOut(1000);
                            setTimeout(function () {
                                $("#"+document).remove();
                            }, 1000);
                        }
                    }
                },
                error: function() {

                } ,
                complete: function() {

                }
            });
        });
    </script>
@endsection
