@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Configuration /</span> Cover
    </h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Configuration Cover</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('configuration.cover.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <i class="required">*</i></label>
                        <input type="text" name="title" class="form-control {{ ($errors->any() && $errors->has('title')) ? 'is-invalid' : '' }}" placeholder="Insert Title" value="{{ old('title', isset($cover->title) ? $cover->title : '') }}" />
                        @if ($errors->any() && $errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <i class="required">*</i></label>
                        <textarea name="description" class="form-control {{ ($errors->any() && $errors->has('description')) ? 'is-invalid' : '' }}" placeholder="Insert Description" cols="10" rows="5">{{ old('description', isset($cover->description) ? $cover->description : '') }}</textarea>
                        @if ($errors->any() && $errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <img class="image-output" id="image_output" name="image_output" src="{{ asset('images/'.(isset($cover->image) ? $cover->image : '')) }}" alt="Image Output">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image <i class="required">*</i></label>
                        <input type="file" name="image" id="image" class="form-control {{ ($errors->any() && $errors->has('image')) ? 'is-invalid' : '' }}" onchange="loadFile(event, $(this))" accept=".jpg, .jpeg, .png">
                        @if ($errors->any() && $errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
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
<script>
    var loadFile = function(event, el) {
        var output = document.getElementById(el.attr('id') + '_output');

        output.src = URL.createObjectURL(event.target.files[0]);

        if (output.classList.contains('hidden')) {
        output.classList.remove('hidden');
        }

        output.onload = function() {
        URL.revokeObjectURL(output.src)
        }
    };
</script>
@endsection