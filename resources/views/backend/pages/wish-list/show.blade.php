@extends('backend.layouts.homepage')

@section('content') 
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Wish List/</span> Show
</h4>
<div class="dt-action-buttons text-end mb-2">
  <div class="dt-buttons">
    <a class="btn btn-info" type="button" href="{{ route('wish-list.index') }}">
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
              <h4 class="mb-2">{{ $wishList->name }}</h4>
            </div>
            <div class="user-info text-center">
              <h6 class="mb-2">{{ $wishList->wish_description }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> @endsection