@if (!empty($venue) && $venue->is_active == true)
<!-- Start Venue section -->
<section class="venue-section">
    <div class="ornaments-wrapper">
        <div class="orn-1">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid" />
            </div>
        </div>
        <div class="orn-2">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid" />
            </div>
        </div>
        <div class="corner-left">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="corner-right">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
            </div>
        </div>
        <div class="orn-3">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left" />
            </div>
        </div>
        <div class="orn-4">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-left" />
            </div>
        </div>
        <div class="orn-5">
            <div class="image-element">
                <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-right" />
            </div>
        </div>
    </div>
    <div class="venue-wrapper">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6 position-relative">
                    <div class="venue-description">
                        <div class="title-section" data-anim="zoom-out">
                            <h2>{{ $venue->title }}</h2>
                        </div>
                        <div class="position-relative" data-anim="fade-up">
                            {!! $venue->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="venue-content">
            <div class="container">
                <div class="row justify-content-center row-venue">
                    @if (!empty($venueDetails))
                        @foreach ($venueDetails as $key => $venueDetail)
                        <div class="col-md-6 col-xl-5 position-relative">
                            <div class="card">
                                <div class="card-body">
                                    <div class="event-name">
                                        <div class="ornaments-wrapper">
                                            <div class="joglo">
                                                <div class="image-element" data-anim="fade-up">
                                                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="corner-1">
                                                <div class="image-element" data-anim="fade-right">
                                                    <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner-2" class="img-fluid" />
                                                </div>
                                            </div>
                                            <div class="corner-2">
                                                <div class="image-element" data-anim="fade-right">
                                                    <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner-2" class="img-fluid" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-name-body" data-anim="zoom-out">
                                            <h4 style="font-family: ; font-size: px;">{{ $venueDetail->name }}</h4>
                                            <p>{{ Carbon\Carbon::parse($venueDetail->date)->translatedFormat('l') }}</p>
                                            <div class="date">
                                                <h5>{{ Carbon\Carbon::parse($venueDetail->date)->translatedFormat('d F Y') }}</h5>
                                            </div>
                                            <p>{{ Carbon\Carbon::parse($venueDetail->date)->translatedFormat('h:i') }} WIB - Selesai</p>
                                        </div>
                                    </div>
                                    <div class="event-place color-primary">
                                        <div class="ornaments-wrapper overflow-hidden">
                                            <div class="orn-6">
                                                <div class="image-element" data-anim="fade-right">
                                                    <img src="{{ asset('assets/frontend/img/leaf.webp') }}" alt="leaf" class="img-fluid animate-loop" data-anim="rotate-left" />
                                                </div>
                                            </div>
                                            <div class="orn-7">
                                                <div class="image-element" data-anim="fade-left">
                                                    <img src="{{ asset('assets/frontend/img/leaf.webp') }}" alt="leaf" class="img-fluid animate-loop" data-anim="rotate-left" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="event-place-body">
                                            <div class="ribbon-venue" data-animationloop="keyframe">
                                                <div data-anim="fade-up">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 560 560" style="enable-background: new 0 0 560 560; overflow: visible;" xml:space="preserve">
                                                        <g id="Layer_1"></g>
                                                        <g id="Layer_3">
                                                            <g>
                                                                <g>
                                                                    <path class="st0" d="M273.3,48.3c34.1,0,66.1,13.3,90.3,37.4c24.1,24.1,37.4,56.2,37.4,90.3c0,93.4-63.7,165.3-105.8,212.8c-4.4,4.9-8.5,9.6-12.3,14c-2.9,3.4-6.3,5.2-9.5,5.2c-4.1,0-7.4-2.8-9.4-5.2c-4.6-5.3-9.4-10.7-14.5-16.5c-20.4-23-43.5-49.1-63-80c-22.1-35-34.9-69.1-39.2-104.3c-4.8-39.7,6.8-79.6,31.9-109.4c22.5-26.7,53.5-42.4,87.3-44.2C268.7,48.4,271.1,48.3,273.3,48.3 M273.3,29.3c-2.6,0-5.2,0.1-7.8,0.2c-87.5,4.6-147.7,87.9-137.1,174.9c11.7,96.3,80.1,163.3,121.1,210.8c6.8,7.8,15.3,11.8,23.8,11.8c8.6,0,17.1-3.9,23.9-11.8C338.4,367.6,420,286.7,420,176C420,95,354.3,29.3,273.3,29.3L273.3,29.3z"
                                                                    />
                                                                </g>
                                                                <g>
                                                                    <path class="st0" d="M275.1,118c30.6,0,55.5,24.9,55.5,55.5S305.7,229,275.1,229s-55.5-24.9-55.5-55.5S244.5,118,275.1,118 M275.1,99c-41.1,0-74.5,33.3-74.5,74.5S234,248,275.1,248s74.5-33.3,74.5-74.5S316.2,99,275.1,99L275.1,99z" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Layer_2">
                                                            <ellipse class="st1" cx="272.8" cy="437.9" rx="146.4" ry="40.9" />
                                                            <ellipse class="st0 dot" cx="273.6" cy="437.9" rx="63.1" ry="17" />
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="position-relative" data-anim="fade-up">
                                                <h4 class="notranslate" style="font-family: !important; font-size: px;">
                                                {{ $venueDetail->location }}
                                            </h4>
                                                <span class="notranslate">{{ $venueDetail->address }}</span>
                                            </div>
                                            <div class="widget-elements">
                                                <a class="btn btn-custom color-secondary" data-anim="fade-up" aria-label="button maps" href="#" data-bs-toggle="modal" data-bs-target="#event{{ $key }}">Lihat Maps</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Venue section -->
@endif