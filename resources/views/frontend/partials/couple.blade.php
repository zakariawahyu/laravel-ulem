@if (!empty($event) && $event->is_active == true)
<!-- Start Couple section -->
<section class="couple-section color-primary" style="color: var(--color-dark);">
    <div class="image-wrapper">
        <div class="image-element">
            <img data-src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->image_caption }}" class="lazyload" />
        </div>
    </div>
    <div class="couple-wrapper">
        <div class="ornaments-wrapper overflow-hidden">
            <div class="bg-1">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                </div>
            </div>
            <div class="orn-8">
                <div class="image-element" data-anim="fade-up">
                    <img src="{{ asset('assets/frontend/img/bush.webp') }}" alt="bush" class="img-fluid" />
                </div>
            </div>
            <div class="orn-9">
                <div class="image-element" data-anim="fade-up">
                    <img src="{{ asset('assets/frontend/img/bush.webp') }}" alt="bush" class="img-fluid" />
                </div>
            </div>
            <div class="orn-3">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left" />
                </div>
            </div>
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
            <div class="orn-1">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left" />
                </div>
                <div class="orn-2">
                    <div class="image-element">
                        <img src="{{ asset('assets/frontend/img/leaf.webp') }}" alt="leaf" class="img-fluid animate-loop" data-anim="rotate-right" />
                    </div>
                </div>
            </div>
        </div>
        <div class="container position-relative">
            <div class="couple-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12 position-relative">
                        <div class="couple-content">
                            <div class="row justify-content-start">
                                <div class="col-md-8 col-lg-7">
                                    <div class="title-section" data-anim="zoom-out">
                                        <h2>{{ $event->title }}</h2>
                                    </div>
                                    <div class="position-relative" data-anim="fade-up">
                                        {!! $event->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="reminder-wrap">
                                <div class="reminder-content">
                                    <div class="countdown" date="{{ $event->custom_data->date }}" data-anim="zoom-out">
                                        <div class="days">
                                            <p class="angka">00</p>
                                            <p class="huruf">
                                                Hari
                                            </p>
                                        </div>
                                        <div class="hours">
                                            <p class="angka">00</p>
                                            <p class="huruf">
                                                Jam
                                            </p>
                                        </div>
                                        <div class="minutes">
                                            <p class="angka">00</p>
                                            <p class="huruf">
                                                Menit
                                            </p>
                                        </div>
                                        <div class="seconds">
                                            <p class="angka">00</p>
                                            <p class="huruf">
                                                Detik
                                            </p>
                                        </div>
                                    </div>
                                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&amp;text=The+Wedding+of+Yogie+%26+Riana&amp;details=Visit+the+invitation+here+<a%20href='https%3A%2F%2Flocalhost'>https%3A%2F%2Flocalhost</a>&amp;dates=20240915T110000%2F20240915T130000&amp;ctz=Asia%2FJakarta"
                                    target="_blank" class="btn btn-custom color-secondary btn-reminder" data-anim="fade-up">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2411_134)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 0.625C5 0.45924 4.93415 0.300269 4.81694 0.183058C4.69973 0.065848 4.54076 0 4.375 0C4.20924 0 4.05027 0.065848 3.93306 0.183058C3.81585 0.300269 3.75 0.45924 3.75 0.625V1.25H2.5C1.83696 1.25 1.20107 1.51339 0.732233 1.98223C0.263392 2.45107 0 3.08696 0 3.75L0 17.5C0 18.163 0.263392 18.7989 0.732233 19.2678C1.20107 19.7366 1.83696 20 2.5 20H17.5C18.163 20 18.7989 19.7366 19.2678 19.2678C19.7366 18.7989 20 18.163 20 17.5V3.75C20 3.08696 19.7366 2.45107 19.2678 1.98223C18.7989 1.51339 18.163 1.25 17.5 1.25H16.25V0.625C16.25 0.45924 16.1842 0.300269 16.0669 0.183058C15.9497 0.065848 15.7908 0 15.625 0C15.4592 0 15.3003 0.065848 15.1831 0.183058C15.0658 0.300269 15 0.45924 15 0.625V1.25H5V0.625ZM1.25 17.5V5H18.75V17.5C18.75 17.8315 18.6183 18.1495 18.3839 18.3839C18.1495 18.6183 17.8315 18.75 17.5 18.75H2.5C2.16848 18.75 1.85054 18.6183 1.61612 18.3839C1.3817 18.1495 1.25 17.8315 1.25 17.5ZM10 9.36625C12.08 7.2275 17.2812 10.97 10 15.7812C2.71875 10.9688 7.92 7.2275 10 9.36625Z"
                                                fill="#F9FDF9" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2411_134">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Simpan Tanggal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-evenly position-relative">
                    <div class="ornaments-wrapper">
                        <div class="orn-4">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left" />
                            </div>
                        </div>
                        <div class="orn-5">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-right" />
                            </div>
                        </div>
                        <div class="orn-6">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-right" />
                            </div>
                        </div>
                        <div class="orn-7">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left" />
                            </div>
                        </div>
                    </div>
                    @if (!empty($couples))
                    @foreach ($couples as $key => $couple)
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div class="couple">
                            <div class="image-wrap man">
                                <div class="ornaments-wrapper">
                                    <div class="orn-10">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="orn-11">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="orn-11">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/sky.webp') }}" alt="sky" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="orn-12">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/leaf.webp') }}" alt="leaf" class="img-fluid animate-loop" data-anim="rotate-left" />
                                        </div>
                                    </div>
                                    <div class="orn-13">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-right" />
                                        </div>
                                    </div>
                                    <div class="orn-14">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/flower.webp') }}" alt="flower" class="img-fluid animate-loop" data-anim="rotate-left" />
                                        </div>
                                    </div>
                                </div>
                                <div class="image-element">
                                    <img data-src="{{ asset('storage/'.$couple->image) }}" alt="{{ $couple->image_caption }}" class="couple-image man lazyload"
                                    />
                                </div>
                                <div class="ornaments-wrapper overflow-hidden">
                                    <div class="corner-1">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="corner-2">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="corner-3">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="corner-4">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/corner.webp') }}" alt="frame-corner" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-description">
                                <h3 class="bride_style notranslate" data-anim="zoom-out">
                                    {{ $couple->name }}
                                </h3>
                                <div class="couple-parent" data-anim="fade-up">
                                    <div class="couple-parent-description">
                                        <p>{{ $couple->parent_description }}</p>
                                    </div>

                                    <div class="couple-parent-name">
                                        <p class="notranslate">
                                            {{ $couple->father_name }}
                                        </p>
                                        <p>&</p>
                                        <p class="notranslate">
                                            {{ $couple->mother_name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sosmed-wrap" data-anim="fade-up">
                                    <a href="{{ $couple->instagram_url }}" class="sosmed color-secondary notranslate" target="_blank">
                                        <small><i class="fab fa-instagram"></i></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @if ($key == 0)
                            <div class="and" data-anim="fade-up"><span>&</span></div>
                        @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Couple section -->
@endif