<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead text-capitalize">
                    @lang("dashboard-admin/user.components.modal-delete.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center p-4">
                            <div class="h5-responsive">
                                @if($user)
                                    @if($user->state != \App\Enum\UserState::DISABLE)
                                        @lang("dashboard-admin/user.components.modal-delete.archive-message", ["number" => $user->id])
                                    @else
                                        @lang("dashboard-admin/user.components.modal-delete.archived-message")
                                    @endif
                                @else
                                    @lang("dashboard-admin/user.components.modal-delete.error-message")
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($user && $user->state != \App\Enum\UserState::DISABLE)
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-danger" type="button"  onclick="$('#delete').submit();">
                        @lang("dashboard-admin/user.components.modal-delete.btn-yes")
                    </a>
                    <form id="delete" class="d-none" method="post" action="{{route("dashboard.admin.users.destroy", ["user" => $user->id])}}">
                        @csrf
                        @method("delete")
                    </form>
                    <a class="btn btn-outline-danger" type="button" data-dismiss="modal">
                        @lang("dashboard-admin/user.components.modal-delete.btn-no")
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
