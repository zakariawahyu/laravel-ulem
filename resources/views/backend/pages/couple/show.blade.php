@extends('backend.layouts.homepage') @section('content') <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Couple /</span> Show
</h4>
<div class="dt-action-buttons text-end mb-2">
  <div class="dt-buttons">
    <a class="btn btn-info" type="button" href="{{ route('couple.index') }}">
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
            <img class="img-fluid rounded" src="{{ asset('images/'.$couple->image) }}" height="180" width="180" />
            <span>{{ $couple->image_caption }}</span>
            <div class="user-info text-center">
              <h4 class="mt-3">{{ $couple->name }}</h4>
            </div>
          </div>
        </div>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <span class="fw-bold me-2">Couple Type:</span>
              <span>{{ $coupleTypes[$couple->couple_type] }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Parent Description:</span>
              <span>{{ $couple->parent_description }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Father Name:</span>
              <span>{{ $couple->father_name }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Mother Name:</span>
              <span>{{ $couple->mother_name }}</span>
            </li>
            <li class="mb-3">
              <span class="fw-bold me-2">Instagram URL:</span>
              <span>
                <a href="{{ $couple->instagram_url }}" target="_blank">{{ $couple->instagram_url }}</a>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div> @endsection