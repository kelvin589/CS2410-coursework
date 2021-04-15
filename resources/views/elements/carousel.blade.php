<div id="imageCarousel" class="carousel slide" data-interval="false">
    <div class="carousel-inner">
        <!-- There must be one active carousel item -->
        <div class="carousel-item active" style="height:360px;">
            <img class="d-block w-100" src="{{ asset('storage/images/noimage.jpg') }}" alt="noimage.jpg">
        </div>
        @foreach(explode("|", $item->image) as $image)
        <div class="carousel-item " style="height:360px;">
            <img class="d-block w-100" src="{{ asset('storage/images/'.$image) }}" alt="{{ $image }}">
        </div>
        @endforeach
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