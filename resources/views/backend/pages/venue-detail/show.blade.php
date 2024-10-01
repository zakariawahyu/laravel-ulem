@extends('backend.layouts.homepage') 

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Venue Detail /</span> Show
</h4>
<div class="dt-action-buttons text-end mb-2">
  <div class="dt-buttons">
    <a class="btn btn-info" type="button" href="{{ route('venue-detail.index') }}">
      <span>
        <i class="bx bx-arrow-back"></i>
        <span class="d-none d-sm-inline-block">Back</span>
      </span>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class="d-flex align-items-center flex-column">
            <div class="user-info text-center mb-5">
              {!! $venueDetail->map !!}
              <h4>{{ $venueDetail->location }}</h4>
            </div>
          </div>
        </div>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <span class="fw-bold me-2">Name:</span>
              <span>{{ $venueDetail->name }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Location:</span>
              <span>{{ $venueDetail->location }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Address:</span>
              <span>{{ $venueDetail->address }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Date:</span>
              <span>{{ $venueDetail->date }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection