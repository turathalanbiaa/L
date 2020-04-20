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
            <img src="{{asset("images/large".Storage::url($document->image))}}" class="w-100" alt="Document Image">
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
    <div class="modal fade" id="modal-document-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="" class="img-fluid" alt="Document Image">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-document-action" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-notify" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead text-capitalize"></p>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="d-flex justify-content-center p-4">
                            <div class="h5-responsive"></div>
                        </div>
                    </div>
                </div>
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
        $("[data-action='document-view']").on('click', function () {
            let src = $(this).parent().find('img').attr('src');
            let modalDocumentView = $('#modal-document-view');
            modalDocumentView.find('img').attr('src', src);
            modalDocumentView.modal('show');
        });

        $("[data-action='build-modal']").on('click', function () {
            let document = $(this).parent().data('content');
            let action = $(this).data('content');
            let modalDocumentAction = $('#modal-document-action');

            $.ajax({
                type: 'get',
                url: '/dashboard/admin/api/documents/build-modal',
                data: {document: document, action: action},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    let modal = result.data.modal;
                    modalDocumentAction.find('.modal-dialog').removeClass().addClass('modal-dialog modal-notify ' + modal.type);
                    modalDocumentAction.find('.modal-header p').html(modal.header);
                    modalDocumentAction.find('.modal-body div.h5-responsive').html(modal.body);
                    modalDocumentAction.find('.btn:first-child').removeClass().addClass('btn ' + modal.button);
                    modalDocumentAction.find('.btn:last-child').removeClass().addClass('btn ' + modal.closeButton);
                    $("input[name='document']").val(document);
                    $("input[name='action']").val(action);

                    if(modal.footer === false)
                        modalDocumentAction.find('.modal-footer').addClass('d-none');
                    else
                        modalDocumentAction.find('.modal-footer').removeClass('d-none');
                },
                error: function() {
                    console.log('error');
                } ,
                complete : function() {
                    modalDocumentAction.modal('show');
                }
            });
        });

        $('[data-action="document"]').on('click', function () {
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
                    let toast = result.data.toast;
                    $.toast({
                        title: toast.title,
                        type:  toast.type,
                        delay: 2500
                    });

                    if (toast.type === 'success') {
                        if(action === 'accept')
                            $("#"+document).find('p .badge').removeClass().addClass('badge badge-success').html(result.data.documentState);

                        if(action === 'reject')
                            $("#"+document).find('p .badge').removeClass().addClass('badge badge-warning').html(result.data.documentState);

                        if (action === "delete")
                            $("#"+document).fadeOut(1000, function () {
                                setTimeout(function () {
                                    $("#"+document).remove();
                                }, 1000);
                            });
                    }
                },
                error: function() {
                    console.log('error');
                } ,
                complete: function() {

                }
            });
        });
    </script>
@endsection
