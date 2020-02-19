@if($user->type == \App\Enum\UserType::STUDENT)
    <a class="btn btn-outline-primary" href="{{route("dashboard.admin.documents.create", ["user" => $user->id])}}">
        @lang("dashboard-admin/document.share.documents-tab-content.btn-add")
    </a>
    <div class="clearfix row pt-3">
        @foreach($documents as $document)
            <div class="col-md-4 col-sm-3 text-center mb-5">
                <p>
                    {{\App\Enum\DocumentType::getTypeName($document->type)}}
                    @switch($document->state)
                        @case(\App\Enum\DocumentState::ACCEPT)
                        <span class="badge badge-success">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                        @break
                        @case(\App\Enum\DocumentState::REJECT)
                        <span class="badge badge-danger">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                        @break
                        @case(\App\Enum\DocumentState::REVIEW)
                        <span class="badge badge-info">{{\App\Enum\DocumentState::getStateName($document->state)}}</span>
                        @break
                    @endswitch
                </p>
                <div class="view overlay z-depth-1-half">
                    <img src="{{Storage::url($document->image)}}" class="w-100" height="250" alt="Document Image">
                    <div class="mask flex-center waves-effect waves-light rgba-black-strong" data-action="document-info">
                        <i class="fa fa-eye fa-2x text-blue-gray"></i>
                    </div>
                </div>
                <div class="d-block mt-2" data-content="{{$document->id}}">
                    <button class="btn btn-sm btn-outline-success" data-action="document" data-content="accept">
                        <i class="fa fa-check text-success"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-warning" data-action="document" data-content="reject">
                        <i class="fa fa-times text-warning"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" data-action="document" data-content="delete">
                        <i class="fa fa-trash text-danger"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="d-flex justify-content-center">
        <div class="h3-responsive p-5">
            @lang('dashboard-admin/document.share.documents-tab-content.message')
        </div>
    </div>
@endif

@section("extra-content")
    @parent
    <div class="modal fade" id="modal-document-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="" alt="Document Image">
            </div>
        </div>
    </div>
    <div id="modal-document-build"></div>
@endsection

@section("script")
    @parent
    <script>
        $('[data-action="document-info"]').click(function () {
            let src = $(this).parent().find('img').attr('src');
            let modal = $('#modal-document-info');
            modal.find('img').attr('src', src);
            modal.modal('show')
        });

        $("[data-action='document']").click(function () {
            let document = $(this).parent().data('content');
            let action = $(this).data('content');
            $.ajax({
                type: 'get',
                url: '/dashboard/admin/api/documents/build-modal',
                data: {document: document, action: action},
                datatype: 'json',
                encode: true,
                success: function(result) {
                    $('#modal-document-build').html(result.data.html)
                },
                error: function() {
                    console.log("error");
                } ,
                complete : function() {
                    $("#modal-document-build .modal").modal('show');
                }
            });
        });
    </script>
@endsection
