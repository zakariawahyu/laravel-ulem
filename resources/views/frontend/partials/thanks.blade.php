@if (!empty($thanks) && $thanks->is_active == true)
<!-- Tanks Section -->
<section class="thank-section">
    <div class="ornaments-wrapper overflow-hidden">
        <div class="orn-1">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-left"
                />
            </div>
        </div>
        <div class="orn-2">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-right"
                />
            </div>
        </div>
        <div class="orn-3">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left"
                />
            </div>
        </div>
        <div class="orn-4">
            <div class="image-element" data-anim="fade-left">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left"
                />
            </div>
        </div>
        <div class="joglo-1">
            <div class="joglo-2">
                <div class="image-element" data-anim="fade-up" data-anim-delay="1000">
                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                </div>
            </div>
            <div class="joglo-3">
                <div class="image-element" data-anim="fade-up" data-anim-delay="1500">
                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                </div>
            </div>
            <div class="image-element" data-anim="fade-up">
                <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
            </div>
        </div>
        <div class="orn-5">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left"
                />
            </div>
        </div>
        <div class="orn-6">
            <div class="image-element" data-anim="fade-up">
                <img src="{{ asset('assets/frontend/img/bush.webp') }}" alt="bush" class="img-fluid" />
            </div>
        </div>
        <div class="orn-8">
            <div class="image-element" data-anim="fade-up">
                <img src="{{ asset('assets/frontend/img/bush.webp') }}" alt="bush" class="img-fluid" />
            </div>
        </div>
        <div class="orn-7">
            <div class="image-element" data-anim="fade-left">
                <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left"
                />
            </div>
        </div>
        <div class="corner-1">
            <div class="image-element" data-anim="fade-down">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-2">
            <div class="image-element" data-anim="fade-down">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-3">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-4">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="thank-wrapper">
        <div class="gunungan">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/gunungan.webp') }}" alt="gunungan" class="img-fluid" />
            </div>
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-6 position-relative">
                    <div class="thank color-primary">
                        <div class="thank-body">
                            <div class="title-section" data-anim="zoom-out">
                                <h2>{{ $thanks->title }}</h2>
                            </div>
                            <div class="position-relative" data-anim="fade-up">
                                {!! $thanks->description !!}
                            </div>
                        </div>
                        <div class="image-wrapper" style="aspect-ratio: 4 / 5;">
                            <div class="image-element">
                                <img data-src="{{ asset('storage/'.$thanks->image) }}" alt="{{ $thanks->image_caption }}" class="thank-background lazyload" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif