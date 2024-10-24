@if ((!empty($guest) && $guest->is_gift == true) || !empty($guestBook))
    @if (!empty($gift) && $gift->is_active == true)
    <section class="apology-section color-primary">
        <div class="ornaments-wrapper overflow-hidden">
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
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center position-relative">
                    <div class="appology-wrap">
                    <div class="title-section" data-anim="zoom-out">
                        <h2>{{ $gift->title }}</h2>
                    </div>
                    <div class="position-relative" data-anim="fade-up">
                        {!! $gift->description !!}
                    </div>
                    <div class="col-md-10 m-auto col-11" data-anim="fade-up">
                        <div class="mb-0">
                            @foreach ($gifts as $item)
                                <p>{{ $item->bank }}</p>
                                <p>{{ $item->account_name }}</p>
                                <p>{{ $item->account_number }}</p>
                                <p><span><button class="btn btn-custom btn-copy-bank-acc rounded-pill color-secondary" type="button" data-clipboard-text="{{ $item->account_number }}" style="--text-button: #ffffff;"><strong><span style="font-size: 14pt;"> </span></strong>Copy No. Rekening</button></span></p>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endif