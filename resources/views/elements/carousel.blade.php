<div id="imageCarousel" class="carousel slide" data-interval="false">
    <div class="carousel-inner">
        <!-- There must be one active carousel item -->
        @if($item->image == "noimage.jpg")
            <div class="carousel-item active" style="height:360px;">
                <img class="d-block w-100" style="height:360px" src="{{ asset('assets/noimage.jpg') }}" alt="noimage.jpg" />
            </div>
        @else
            <div class="carousel-item active" style="height:360px;">
                <img class="d-block w-100" style="height:360px" src="{{ asset('assets/imageavailable.jpg') }}" alt="imageavailable.jpg" />
            </div>
            @foreach(explode("|", $item->image) as $image)
            <div class="carousel-item " style="height:360px;">
                <img class="d-block w-100" style="height:360px" src="{{ asset('storage/images/'.$image) }}" alt="{{ $image }}" />
            </div>
        @endforeach
        @endif
    </div>
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>