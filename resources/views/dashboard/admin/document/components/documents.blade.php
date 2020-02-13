@foreach($documents as $document)
    <div class="col-4">
        <div class="view overlay zoom">
            <img src="{{$document->image}}" class="img-fluid " alt="smaple image">
            <div class="mask flex-center">
                <p class="white-text">Zoom effect</p>
            </div>
            <h2>{{"loop-" . $document->id}}</h2>
        </div>
    </div>
@endforeach
