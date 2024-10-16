@if (!empty($wishes))
<div class="wishes" data-anim="zoom-in-up" id="wishes-container">
    @foreach ($wishes as $value)
    <div class="wish">
        <div class="wish-badge">
            <h6>{{ mb_substr($value->name, 0, 1); }}</h6>
        </div>
        <div class="wish-description">
            <h6 style="font-size:1.17rem;">{{ $value->name }}</h6>
            <p>
                {{ $value->wish_description }}
            </p>
            <small class="text-muted">{{ Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</small>
        </div>
    </div>
    @endforeach
</div>
@else
<p class="text-center">Empty wish data</p>
@endif
