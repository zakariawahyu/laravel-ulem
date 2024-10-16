@if (!empty($cover) && $cover->is_active == true)
<!-- Envelope Section -->
<section class="cover-section">
    <div class="ornaments-wrapper overflow-hidden">
        <div class="orn-1">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left" />
            </div>
        </div>
        <div class="orn-2">
            <div class="image-element" data-anim="fade-left">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left" />
            </div>
        </div>
        <div class="orn-3">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid animate-loop" data-anim="slide-left" />
            </div>
        </div>
        <div class="orn-4">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid animate-loop" data-anim="slide-right" />
            </div>
        </div>
        <div class="corner-1">
            <div class="image-element" data-anim="zoom-out">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-2">
            <div class="image-element" data-anim="zoom-out">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-3">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-4">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cover-wrapper">
            <div class="cover-content">
                <div class="cover-body">
                    <div class="cover-description">
                        <div class="position-relative" data-anim="zoom-out">
                            @if (!empty($guest))
                                <div class="greeting-wrapper">
                                    <span class="greeting-text">Dear</span>
                                    <h5 class="greeting-name-text" style="font-family: 'Abhaya Libre';font-size: 2rem;">{{ $guest->name }}</h5>
                                </div>
                            @endif
                            <p>{{ $cover->title }}</p>
                        </div>
                        <h1 class="title cover_style notranslate" data-anim="fade-up">{{ $cover->custom_data->subtitle }}</h1>
                        <div class="elements-widget" data-anim="fade-up">
                            <button class="btn btn-custom color-secondary" id="btn-envelope" data-anim="fade-up">
                                <strong>Buka Undangan <i class="fas fa-envelope-open-text"></i></strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Header section -->
<section class="header-section">
    <div class="ornaments-wrapper overflow-hidden">
        <div class="orn-1">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-left" />
            </div>
        </div>
        <div class="orn-2">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-right" />
            </div>
        </div>
        <div class="orn-3">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left" />
            </div>
        </div>
        <div class="orn-4">
            <div class="image-element" data-anim="fade-left">
                <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left" />
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
                <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" data-anim="zoom-out" />
            </div>
            <div class="gunungan">
                <div class="image-element" data-anim="fade-up">
                    <img src="{{ asset('assets/frontend/img/gunungan.webp') }}" alt="gunungan" class="img-fluid" />
                </div>
            </div>
        </div>
        <div class="orn-5">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-right" />
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
                <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left" />
            </div>
        </div>
        <div class="corner-1">
            <div class="image-element" data-anim="zoom-out">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-2">
            <div class="image-element" data-anim="zoom-out">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-3">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-4">
            <div class="image-element" data-anim="fade-right">
                <img src="{{ asset('assets/frontend/img//corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="header-content">
                    <div class="header">
                        <div class="header-title">
                            <div class="header-title-content">
                                <div class="position-relative" data-anim="zoom-out">
                                    {!! $cover->description !!}
                                </div>
                            </h1>
                                <div class="scroll-icon">
                                    <svg data-anim="fade-up" width="28" height="42" viewBox="0 0 28 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.6" x="0.5" y="0.5" width="27" height="41" rx="13.5" stroke="#757346" />
                                        <rect id="scroll-animate" opacity="0.6" x="12" y="6.66699" width="4" height="9.33333" rx="2" fill="#A79E74" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif