@if (!empty($story) && $story->is_active == true)
<!-- Start Story section -->
<section class="story-section moveable-section" data-id="2">
    <div class="image-wrapper">
        <div class="image-element">
            <img data-src="{{ asset('images/'.$story->image) }}" title="image {{ $story->title }}" alt="image {{ $story->title }}" class="story-background lazyload" />
        </div>
        <div class="ornaments-wrapper overflow-hidden">
            <div class="corner-1">
                <div class="image-element" data-anim="fade-right">
                    <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                </div>
            </div>
            <div class="corner-2">
                <div class="image-element" data-anim="fade-right">
                    <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <div class="story">
        <div class="ornaments-wrapper">
            <div class="bg-1">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                </div>
            </div>
        </div>
        <div class="container position-relative">
            <div class="story-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="story-description">
                            <div class="title-section" data-anim="zoom-out">
                                <h2>{{ $story->title }}</h2>
                            </div>
                            <div class="position-relative" data-anim="fade-up">
                               {!! $story->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Story section -->
@endif