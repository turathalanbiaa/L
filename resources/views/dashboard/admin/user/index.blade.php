@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/user.index.title")
@endsection

@section("style")
<style>
    [lang="ar"] table.dataTable thead>tr>th.sorting_asc,
    [lang="ar"] table.dataTable thead>tr>th.sorting_desc,
    [lang="ar"] table.dataTable thead>tr>th.sorting,
    [lang="ar"] table.dataTable thead>tr>td.sorting_asc,
    [lang="ar"] table.dataTable thead>tr>td.sorting_desc,
    [lang="ar"] table.dataTable thead>tr>td.sorting {
        padding-right: 12px;
        padding-left: 30px;
    }

    [lang="ar"] table.dataTable thead .sorting:before,
    [lang="ar"] table.dataTable thead .sorting_asc:before,
    [lang="ar"] table.dataTable thead .sorting_desc:before,
    [lang="ar"] table.dataTable thead .sorting_asc_disabled:before,
    [lang="ar"] table.dataTable thead .sorting_desc_disabled:before {
        left: 1em;
        right: auto;
        content: "\2191";
    }

    [lang="ar"] table.dataTable thead .sorting:after,
    [lang="ar"] table.dataTable thead .sorting_asc:after,
    [lang="ar"] table.dataTable thead .sorting_desc:after,
    [lang="ar"] table.dataTable thead .sorting_asc_disabled:after,
    [lang="ar"] table.dataTable thead .sorting_desc_disabled:after {
        left: 0.5em;
        right: auto;
        content: "\2193";
    }
</style>
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
{{--                @if($type)--}}
               @include("dashboard.admin.user.components.student-datatable")
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection

@section("extra-content")
    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Modal Success</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
                            ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
                            ab officiis totam.</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1 text-white"></i></a>
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->
@endsection
