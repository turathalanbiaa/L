<div class="side-nav" id="mySidenav">
    <div class="side-nav-skin">
        <div class="side-nav-content blue-gray-darken-3">
            <div class="d-flex justify-content-center pt-2">
                <img src="{{asset('img/dashboard/admin/logo-white.png')}}" alt="logo for brand">
            </div>
            <hr class="hr-light"/>
            <div class="accordion main-list" id="accordion">
                <div class="list-item">
                    <div class="list-item-header collapsed" id="heading-1" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-user"></i>
                            <div class="px-2">@lang("/dashboard-admin/side-navigation.item-1")</div>
                        </div>
                    </div>
                    <div class="list-item-body collapse" id="collapse-1" aria-labelledby="heading-1" data-parent="#accordion">
                        <div class="sup-list">

                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="list-item-header collapsed" id="heading-2" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                        <div class="d-flex align-items-baseline">
                            <i class="fa fa-user"></i>
                            <div class="px-2">@lang("/dashboard-admin/side-navigation.item-2")</div>
                        </div>
                    </div>
                    <div class="list-item-body collapse" id="collapse-2" aria-labelledby="heading-2" data-parent="#accordion">
                        <div class="sup-list">
                            <a class="list-item" href="{{route("dashboard.admin.users.index",["type"=>App\Enum\UserType::STUDENT])}}">
                                @lang("dashboard-admin/side-navigation.item-2-1")
                            </a>
                            <a class="list-item" href="{{route("dashboard.admin.users.index",["type"=>App\Enum\UserType::LISTENER])}}">
                                @lang("dashboard-admin/side-navigation.item-2-2")
                            </a>
                            <a class="list-item" href="{{route("dashboard.admin.documents.index")}}">
                                @lang("dashboard-admin/side-navigation.item-2-3")
                            </a>
                            <a class="list-item">
                                @lang("dashboard-admin/side-navigation.item-2-4")
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
