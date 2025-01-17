@if (!empty($rsvp) && $rsvp->is_active == true)
<!-- Start rsvp section -->
<section class="rsvp-section">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-md-12 position-relative">
                <div class="rsvp-wrapper color-primary">
                    <div class="ornaments-wrapper">
                        <div class="orn-1">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-left" />
                            </div>
                        </div>
                        <div class="orn-2">
                            <div class="image-element">
                                <img src="{{ asset('assets/frontend/img/mendung-2.webp') }}" alt="mendung-2" class="img-fluid animate-loop" data-anim="slide-right" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="rsvp-form color__button__trans">
                                <div class="ornaments-wrapper">
                                    <div class="bg-1">
                                        <div class="image-element">
                                            <img src="{{ asset('assets/frontend/img/joglo.webp') }}" alt="joglo" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                                <div class="title-section" data-anim="zoom-out">
                                    <h2>{{ $rsvp->title }}</h2>
                                </div>
                                <div class="position-relative" data-anim="fade-up">
                                    {!! $rsvp->description !!}
                                </div>
                                <div class="position-relative color__button__trans" id="cardRSVP">
                                    <div id="cardRSVP">
                                        <form action="#" method="post" data-anim="fade" id="tambahdata">
                                            @csrf
                                            <input required type="text" name="name" class="form-control mb-3" placeholder="Nama" value="" data-anim="zoom-in-up" data-anim-delay="500" />
                                            <input required type="text" name="phone_number" class="form-control mb-3" placeholder="Nomor Handphone" value="" data-anim="zoom-in-up" data-anim-delay="500" />
                                            <select name="guest_amount" class="form-control mb-3" required data-anim="zoom-in-up" data-anim-delay="500">
                                                <option hidden selected disabled>
                                                    Jumlah Tamu
                                                </option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <select required name="is_attend" class="form-select mb-3" data-anim="zoom-in-up" data-anim-delay="500">
                                                <option disabled selected>Konfirmasi Kehadiran</option>
                                                <option value="1">Hadir</option>
                                                <option value="0">Tidak Hadir</option>
                                            </select>
                                            <button class="btn btn-custom color-secondary w-100" type="submit" id="tombolsimpan" data-anim="zoom-in-up" data-anim-delay="500">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="image-wrapper">
                                <div class="image-element">
                                    <img data-src="{{ asset('storage/'.$rsvp->image) }}" alt="{{ $rsvp->image_caption }}" class="lazyload" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ornaments-wrapper">
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End rsvp section -->
@endif