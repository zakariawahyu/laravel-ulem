@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Configuration /</span> Wishes
    </h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Configuration Wishes</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('configuration.wishes.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <i class="required">*</i></label>
                        <input type="text" name="title" class="form-control {{ ($errors->any() && $errors->has('title')) ? 'is-invalid' : '' }}" placeholder="Insert Title" value="{{ old('title', isset($wishes->title) ? $wishes->title : '') }}" />
                        @if ($errors->any() && $errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <i class="required">*</i></label>
                        <textarea name="description" class="form-control {{ ($errors->any() && $errors->has('description')) ? 'is-invalid' : '' }}" placeholder="Insert Description" cols="10" rows="5">{{ old('description', isset($wishes->description) ? $wishes->description : '') }}</textarea>
                        @if ($errors->any() && $errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
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