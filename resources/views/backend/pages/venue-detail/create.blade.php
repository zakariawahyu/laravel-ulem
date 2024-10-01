@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Venue Detail /</span> Create
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-info" type="button" href="{{ route('venue-detail.index') }}"><span><i class="bx bx-arrow-back"></i> <span class="d-none d-sm-inline-block">Back</span></span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Create Venue Detail</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('venue-detail.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name <i class="required">*</i></label>
                        <input type="text" name="name" class="form-control {{ ($errors->any() && $errors->has('name')) ? 'is-invalid' : '' }}" placeholder="Insert Name" value="{{ old('name') }}" />
                        @if ($errors->any() && $errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location <i class="required">*</i></label>
                        <input type="text" name="location" class="form-control {{ ($errors->any() && $errors->has('location')) ? 'is-invalid' : '' }}" placeholder="Insert Location" value="{{ old('location') }}" />
                        @if ($errors->any() && $errors->has('location'))
                            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address <i class="required">*</i></label>
                        <textarea name="address" class="form-control {{ ($errors->any() && $errors->has('address')) ? 'is-invalid' : '' }}" cols="20" rows="5" placeholder="Insert Address">{{ old('address') }}</textarea>
                        @if ($errors->any() && $errors->has('address'))
                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date and Time <i class="required">*</i></label>
                        <input type="text" name="date" class="form-control {{ ($errors->any() && $errors->has('date')) ? 'is-invalid' : '' }}" placeholder="Choose date and time" id="flatpickr-datetime" value="{{ old('date') }}" readonly="readonly">
                        @if ($errors->any() && $errors->has('date'))
                            <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maps <i class="required">*</i></label>
                        <textarea name="map" class="form-control {{ ($errors->any() && $errors->has('map')) ? 'is-invalid' : '' }}" cols="20" rows="5" placeholder="Insert Embed from Google Maps">{{ old('map') }}</textarea>
                        @if ($errors->any() && $errors->has('map'))
                            <div class="invalid-feedback">{{ $errors->first('map') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('viewJs')
    <script>$("#flatpickr-datetime").flatpickr({
        enableTime: !0,
        dateFormat: "Y-m-d H:i"
    });</script>
@endsection