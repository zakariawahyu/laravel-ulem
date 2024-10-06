<!DOCTYPE html>
<html lang="en">

@include('frontend/layouts/header')

<body>
    <div class="main-app color-main">
        <!-- Loader -->
        <div class="loader-wrapper">
            <script type="text/javascript" src="{{ asset('assets/frontend/js/cf-mirage2.min.js')}}"></script>
            <img alt="loading" class="spinner" data-cfsrc="{{ asset('assets/frontend/img/spinner.gif') }}" style="display: none; visibility: hidden;" />
            <noscript><img src="{{ asset('assets/frontend/img/spinner.gif') }}" alt="loading" class="spinner" /></noscript>
            <span>Please wait</span>
        </div>
        <script>
            document.onreadystatechange = () => {
                if (document.readyState !== "complete") {
                    document.querySelector(".loader-wrapper").style.visibility = "visible";
                } else {
                    document.querySelector(".loader-wrapper").style.visibility = "hidden";
                    runAnimationOrnamentCover();
                    fontFix();
                }
            };
        </script>

        <!-- progress -->
        <div class="progress"></div>

        <div class="position-fixed d-flex m-4 p-0" style="bottom: 0; right: 0px; z-index: 20;">
            <button id="musicControl" class="btn btn-pink m-auto c-pointer d-flex flex-column btn-control">
                <i id="playPause" class="icofont icofont-ui-pause text-white mx-auto my-auto"></i>
            </button>
        </div>

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
                                    <p>We Invite You To the Wedding of</p>
                                </div>
                                <h1 class="title cover_style notranslate" data-anim="fade-up">Riana & Yogie</h1>
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
                                            <p>We are getting married!</p>
                                        </div>
                                        <h1 class="title mb-3 main_style notranslate" data-anim="fade-up">
                                        Riana & <br />
                                        Yogie
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

        <div class="moveable_section_wrapper position-relative">
            @include('frontend.partials.couple')

            <!-- Story section -->
            <section class="story-section moveable-section" data-id="2">
                <div class="image-wrapper">
                    <div class="image-element">
                        <img data-src="https://www.shutterstock.com/shutterstock/photos/2303702779/display_1500/stock-photo-photo-of-young-asian-man-on-background-2303702779.jpg" alt="story-background"
                        class="story-background lazyload" />
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
                                            <h2>Our Story</h2>
                                        </div>
                                        <div class="position-relative" data-anim="fade-up">
                                            <p>
                                                <br /> 2013 &ndash; Awal Pertemuan&nbsp;
                                            </p>
                                            <p>Pertama kali kami bertemu pada saat SMA, saat itu kami teman satu kelas. Belum ada benih cinta pada waktu itu, kami fokus menikmati masa sekolah masing-masing.</p>
                                            <p>2019 &ndash; Relationship&nbsp;</p>
                                            <p>Long story short memasuki kuliah kita lost contact, di tahun ini pertama kalinya kami dekat kembali dan menjalin hubungan.</p>
                                            <p>2024 &ndash; Engagement</p>
                                            <p>Lika-liku hubungan kami lalui bersama hingga kami memutuskan untuk bertunangan pada 14 Juli 2024.</p>
                                            <p>2024 &ndash; Wedding</p>
                                            <p>Hingga diputuskan akad nikah pada hari Minggu, 15 September 2024. Momen spesial kami akan dimulai titik ini. Semoga Allah SWT meridhoi pernikahan kami. Aamiin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="moveable-section" data-id="4">
                @include('frontend.partials.venue')
                @include('frontend.partials.rsvp')
            </section>

            @include('frontend.partials.wishes')

            <!-- Apology section -->

            <!-- Egift section -->

            <!-- Stream Section -->
            
            @include('frontend.partials.gallery')

            @include('frontend.partials.thanks')
        </div>
        @include('frontend/layouts/footer')
    </div>

    @if (!empty($venueDetails))
        @foreach ($venueDetails as $venueDetail)
        <!-- Start Modal Location-->
        <div class="modal show-maps" id="event{{ $venueDetail->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <button type="button" class="btn-modal" data-bs-dismiss="modal" aria-label="Close" style="background-color: antiquewhite;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <div class="modal-actions">
                            <h2>{{ $venueDetail->name }}</h2>
                            <span>{{ $venueDetail->location }}</span>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="maps-element">
                                {!! $venueDetail->map !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Location-->
        @endforeach
    @endif
    <div id="google_translate_element"></div>

    <audio id="audio_file" class="d-none">
        <source src="{{ asset('assets/frontend/sound.mp3')}}" type="audio/mpeg" /> Your browser does not support the audio element.
    </audio>
</body>

@include('frontend/layouts/js')
@include('frontend/layouts/script')

</html>