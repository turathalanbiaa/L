@switch ($action)
    @case("accept") <?php $class = "modal-success";?> @break;
    @case("reject") <?php $class = "modal-warning";?> @break;
    @case("delete") <?php $class = "modal-danger";?>  @break;
    @default: <?php $class = "";?>
@endswitch

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-notify {{$class}}" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer justify-content-center">
                Footer
            </div>
        </div>
    </div>
</div>
