<div class="side-nav" id="mySidenav">
    <div class="side-nav-skin">
        <div class="side-nav-content blue-gray-darken-3">
            <div class="d-flex justify-content-center pt-2">
                <img src="{{asset('img/dashboard/admin/logo-white.png')}}" alt="Brand Logo">
            </div>
            <hr class="hr-light"/>
            <div class="accordion main-list" id="accordionSideNav">
                <div class="list-item">
                    <div class="list-item-header collapsed" id="heading-admins" data-toggle="collapse" data-target="#collapse-admins" aria-expanded="false" aria-controls="collapse-admins">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-users-cog"></i>
                            <div class="px-2">
                                @lang("/dashboard-admin/layout.side-nav.block-admins.header")
                            </div>
                        </div>
                    </div>
                    <div class="list-item-body collapse" id="collapse-admins" aria-labelledby="heading-admins" data-parent="#accordionSideNav">
                        <div class="sup-list">

                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="list-item-header collapsed" id="heading-users" data-toggle="collapse" data-target="#collapse-users" aria-expanded="false" aria-controls="collapse-users">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-users"></i>
                            <div class="px-2">
                                @lang("/dashboard-admin/layout.side-nav.block-users.header")
                            </div>
                        </div>
                    </div>
                    <div class="list-item-body collapse" id="collapse-users" aria-labelledby="heading-users" data-parent="#accordionSideNav">
                        <div class="sup-list">
                            <a class="list-item" href="{{route("dashboard.admin.users.index",["type"=>App\Enum\UserType::STUDENT])}}">
                                @lang("/dashboard-admin/layout.side-nav.block-users.students")
                            </a>
                            <a class="list-item" href="{{route("dashboard.admin.users.index",["type"=>App\Enum\UserType::LISTENER])}}">
                                @lang("/dashboard-admin/layout.side-nav.block-users.listeners")
                            </a>
                            <a class="list-item" href="{{route("dashboard.admin.documents.index")}}">
                                @lang("/dashboard-admin/layout.side-nav.block-users.documents")
                            </a>
                            <a class="list-item">
                                @lang("/dashboard-admin/layout.side-nav.block-users.change-account")
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="list-item-header collapsed" id="heading-other" data-toggle="collapse" data-target="#collapse-other" aria-expanded="false" aria-controls="collapse-other">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-ellipsis-h"></i>
                            <div class="px-2">
                                @lang("/dashboard-admin/layout.side-nav.block-other.header")
                            </div>
                        </div>
                    </div>
                    <div class="list-item-body collapse" id="collapse-other" aria-labelledby="heading-other" data-parent="#accordionSideNav">
                        <div class="sup-list">
                            <a class="list-item" href="{{route("dashboard.admin.announcements.index")}}">
                                @lang("/dashboard-admin/layout.side-nav.block-other.announcements")
                            </a>
                            <a class="list-item" href="{{route("dashboard.admin.lecturers.index")}}">
                                @lang("/dashboard-admin/layout.side-nav.block-other.lecturers")
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
