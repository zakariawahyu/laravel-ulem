<!DOCTYPE html>
<html lang="en">

@include('frontend/layouts/header')

<body>
    <div class="main-app color-main">
        <!-- Loader -->
        <div class="loader-wrapper">
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
                <i id="playPause" class="fa-solid fa-pause text-white mx-auto my-auto"></i>
            </button>
        </div>

        @include('frontend.partials.cover')

        <div class="moveable_section_wrapper position-relative">
            @include('frontend.partials.couple')

            @include('frontend.partials.venue')

            @include('frontend.partials.gallery')

            @include('frontend.partials.wishes')

            @include('frontend.partials.story')

            @include('frontend.partials.rsvp')

            @include('frontend.partials.gift')

            @include('frontend.partials.thanks')
        </div>
        @include('frontend/layouts/footer')
    </div>

    @if (!empty($venueDetails))
        @foreach ($venueDetails as $key => $venueDetail)
        <!-- Start Modal Location-->
        <div class="modal show-maps" id="event{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <svg style="position: absolute;pointer-events: none;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <clipPath id="wishes-polygon" clipPathUnits="objectBoundingBox">
                <polygon points="0 0, 1 1, 1 0" />
            </clipPath>
        </defs>
    </svg>
</body>

@include('frontend/layouts/js')
@include('frontend/layouts/script')

</html>