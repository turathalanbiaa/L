@extends("dashboard.admin.layout.app")

@section("title")
    @lang("dashboard-admin/document.index.title")
@endsection

@section("style")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            @forelse($documents as $document)
                <div class="view overlay zoom">
                    <img src="{{$document->image}}" class="img-fluid " alt="smaple image">
                    <div class="mask flex-center">
                        <p class="white-text">Zoom effect</p>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="col-12">

            </div>
        </div>
    </div>
@endsection

@section("extra-content")

@endsection

@section("script")

@endsection

