@if (!empty($wishes) && $wishes->is_active == true)
<!-- Start Wishes section -->
<section class="wishes-section">
    <div class="wishes-form-wrapper color-primary">
        <div class="ornaments-wrapper">
            <div class="orn-1">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left"
                    />
                </div>
            </div>
            <div class="orn-2">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left"
                    />
                </div>
            </div>
            <div class="bg-1">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
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
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center align-items-center flex-column">
                <div class="col-md-8 col-lg-6 position-relative">
                    <div class="card card-form color__button__trans">
                        <div class="card-body">
                            <div class="title-section" data-anim="zoom-out">
                                <h2>{{ $wishes->title }}</h2>
                            </div>
                            <div class="position-relative" data-anim="fade-up">
                                {!! $wishes->description !!}
                            </div>
                            <div class="guestbook_form_wrapper">
                                <form class="text-center color__button__trans" action="http://localhost/bookstore" method="post" id="guestbook_form">
                                    <input type="hidden" name="_token" value="jnuhp9a2cIdzvpte9TMTHFvZ41JBQdM64PeoBDax" />
                                    <input type="hidden" name="domain" value="localhost" />
                                    <div class="mb-3">
                                        <input type="text" name="name" placeholder="Nama" value="" class="form-control" required />
                                    </div>

                                    <div class="mb-3">
                                        <textarea required name="comment" cols="30" rows="5" placeholder="Tulis harapan kamu" class="form-control" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-custom color-secondary m-auto w-100" id="guestbook_submit_btn">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wishes-preview color__button__trans">
        <div class="ornaments-wrapper overflow-hidden">
            <div class="orn-3">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-right"
                    />
                </div>
            </div>
            <div class="orn-4">
                <div class="image-element">
                    <img src="{{ asset('assets/frontend/img/mendung.webp') }}" alt="mendung" class="img-fluid animate-loop" data-anim="slide-left"
                    />
                </div>
            </div>
            <div class="orn-5">
                <div class="image-element" data-anim="fade-right">
                    <img src="{{ asset('assets/frontend/img/tree.webp') }}" alt="tree" class="img-fluid animate-loop" data-anim="rotate-left"
                    />
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
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body text-left">
                            <div id="wishes_wrapper" data-url="http://localhost.co/booksfour/localhost">
                                <p class="mb-4">
                                    <b>Sedang Memuat Komentar..</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Wishes section -->
@endif