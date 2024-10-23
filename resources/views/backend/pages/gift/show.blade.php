@extends('backend.layouts.homepage')

@section('content') 
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Gift /</span> Show
</h4>
<div class="dt-action-buttons text-end mb-2">
  <div class="dt-buttons">
    <a class="btn btn-info" type="button" href="{{ route('gift.index') }}">
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
            <div class="user-info text-center">
              <h4 class="mb-2">{{ $banks[$gift->bank] }}</h4>
              <h6 class="mb-2">{{ $gift->account_name }}</h6>
              <h6 class="mb-2">{{ $gift->account_number }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection