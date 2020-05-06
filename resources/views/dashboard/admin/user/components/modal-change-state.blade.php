@if(!$user)
    @php $color = "danger" @endphp
    @php $message =  __("dashboard-admin/user.components.modal-change-state.error-message") @endphp
@elseif($user->state == \App\Enum\UserState::UNTRUSTED)
    @php $color = "warning" @endphp
    @php $message =  __("dashboard-admin/user.components.modal-change-state.disable-message", ["number" => $user->id]) @endphp
    @php $state = \App\Enum\UserState::DISABLE @endphp
@elseif($user->state == \App\Enum\UserState::TRUSTED)
    @php $color = "success" @endphp
    @php $message =  __("dashboard-admin/user.components.modal-change-state.disable-message", ["number" => $user->id]) @endphp
    @php $state = \App\Enum\UserState::DISABLE @endphp
@else
    @php $color = "danger" @endphp
    @php $message =  __("dashboard-admin/user.components.modal-change-state.active-message", ["number" => $user->id]) @endphp
    @php $state = \App\Enum\UserState::UNTRUSTED @endphp
@endif
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-{{$color}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading text-capitalize">
                    @lang("dashboard-admin/user.components.modal-change-state.header")
                </p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center p-4">
                            <div class="h5-responsive">
                                {{$message}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($user)
                <div class="modal-footer justify-content-center">
                    <a class="btn btn-{{$color}}" type="button"  onclick="$('#change-state').submit();">
                        @lang("dashboard-admin/user.components.modal-change-state.btn-yes")
                    </a>
                    <form id="change-state" class="d-none" method="post" action="/dashboard/admin/users/change-state">
                        @csrf()
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="state" value="{{$state}}">
                    </form>
                    <a class="btn btn-outline-{{$color}}" type="button" data-dismiss="modal">
                        @lang("dashboard-admin/user.components.modal-change-state.btn-no")
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
