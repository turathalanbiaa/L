<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify {{$type}}" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">{{$header}}</p>
            </div>

            <!--Body-->
            <div class="modal-body">
                {{$body}}
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                {{$footer}}
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
