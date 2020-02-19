@extends("dashboard.admin.layout.app")

@section("title")
    {{$user->name}}
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs p-0" id="myTab" role="tablist">
                    <!-- Profile Tab -->
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                           aria-selected="true">
                            @lang("dashboard-admin/user.show.tab.profile")
                        </a>
                    </li>

                    <!-- Documents Tab -->
                    <li class="nav-item">
                        <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents"
                           aria-selected="false">
                            @lang("dashboard-admin/user.show.tab.documents")
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- Profile Tab Content -->
                    <div class="tab-pane fade show active pt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>
                            <strong>@lang("dashboard-admin/user.column.type"): </strong>
                            <span>{{\App\Enum\UserType::getTypeName($user->type)}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.name"): </strong>
                            <span>{{$user->name}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.email"): </strong>
                            <span>{{$user->email}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.phone"): </strong>
                            <span>{{$user->phone}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.gender"): </strong>
                            <span>{{\App\Enum\Gender::getGenderName($user->gender)}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.country"): </strong>
                            <span>{{Countries::getValue(app()->getLocale(), $user->country)}}</span>
                        </p>
                        @if($user->type == \App\Enum\UserType::STUDENT)
                            <p>
                                <strong>@lang("dashboard-admin/user.column.stage"): </strong>
                                <span>{{\App\Enum\Stage::getStageName($user->stage)}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.column.birth_date"): </strong>
                                <span>{{$user->birth_date}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.column.address"): </strong>
                                <span>{{$user->address}}</span>
                            </p>
                            <p>
                                <strong>@lang("dashboard-admin/user.column.certificate"): </strong>
                                <span>{{\App\Enum\Certificate::getCertificateName($user->certificate)}}</span>
                            </p>
                        @endif
                        <p>
                            <strong>@lang("dashboard-admin/user.column.last_login"): </strong>
                            <span>{{is_null($user->last_login)?__("dashboard-admin/user.column.last_login_null"):$user->last_login}}</span>
                        </p>
                        <p>
                            <strong>@lang("dashboard-admin/user.column.state"): </strong>
                            <span>{{\App\Enum\UserState::getStateName($user->state)}}</span>
                        </p>
                        <a class="btn btn-outline-primary" href="{{route('dashboard.admin.users.edit', ["user" => $user->id])}}">
                            @lang("dashboard-admin/user.show.profile-tab.btn-edit")
                        </a>
                    </div>

                    <!-- Documents Tab Content -->
                    <div class="tab-pane fade pt-4" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                        @if($user->type == \App\Enum\UserType::STUDENT)
                            <a class="btn btn-outline-primary" href="{{route("dashboard.admin.documents.create", ["user" => $user->id])}}">
                                @lang("dashboard-admin/user.show.documents-tab.btn-add")
                            </a>
                            <div class="clearfix row pt-3">
                                @foreach($documents as $document)
                                    <div class="col-sm-3 text-center">
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
                                        <img src="{{Storage::url($document->image)}}" class="w-100 z-depth-1" height="250" alt="document image">
                                        <div class="d-block mt-2">
                                            <a class="btn btn-sm btn-outline-info" id="document-info">
                                                <i class="fa fa-eye text-info"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-success">
                                                <i class="fa fa-check text-success"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-warning">
                                                <i class="fa fa-times text-warning"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                <div class="h3-responsive p-5">
                                    @lang('dashboard-admin/user.show.documents-tab.message')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="modal fade" id="modal-document-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="{{\Illuminate\Support\Facades\Storage::url($document->image)}}">
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $('#document-info').click(function () {
            let src = $(this).parent().parent().find('img').attr('src');
            console.log(src)
        });
    </script>
@endsection

