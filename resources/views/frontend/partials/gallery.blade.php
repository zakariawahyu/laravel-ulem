@if (!empty($galleries))
<!-- Start Gallery Section -->
<section class="gallery-section moveable-section" data-id="3">
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-11 col-md-12">
                <div class="gallery-default">
                    <div id="gallery-default" class="splide mb-1">
                        <div class="splide__track overflow-visible">
                            <ul class="splide__list" id="zoom-gallery-default">
                                @foreach ($galleries as $gallery)
                                <li class="splide__slide position-relative">
                                    <a href="{{ asset('storage/'.$gallery->image) }}">
                                        <img src="{{ asset('storage/'.$gallery->image) }}" title="{{ $gallery->image_caption }}" alt="{{ $gallery->image_caption }}" class="img-gallery" />
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Gallery Section -->
@endif