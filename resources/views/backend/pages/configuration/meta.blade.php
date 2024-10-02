@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Configuration /</span> Meta
    </h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Configuration Meta</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('configuration.meta.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title <i class="required">*</i></label>
                        <input type="text" name="title" class="form-control {{ ($errors->any() && $errors->has('title')) ? 'is-invalid' : '' }}" placeholder="Insert Title" value="{{ old('title', isset($meta->title) ? $meta->title : '') }}" />
                        @if ($errors->any() && $errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description <i class="required">*</i></label>
                        <textarea name="description" class="form-control {{ ($errors->any() && $errors->has('description')) ? 'is-invalid' : '' }}" placeholder="Insert Description" cols="10" rows="5">{{ old('description', isset($meta->description) ? $meta->description : '') }}</textarea>
                        @if ($errors->any() && $errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keywords <i class="required">*</i></label>
                        <input type="text" name="keywords" class="form-control {{ ($errors->any() && $errors->has('keywords')) ? 'is-invalid' : '' }}" placeholder="Insert Keywords" value="{{ old('keywords', isset($meta->custom_data['keywords']) ? $meta->custom_data['keywords'] : '') }}" />
                        @if ($errors->any() && $errors->has('keywords'))
                            <div class="invalid-feedback">{{ $errors->first('keywords') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author <i class="required">*</i></label>
                        <input type="text" name="author" class="form-control {{ ($errors->any() && $errors->has('author')) ? 'is-invalid' : '' }}" placeholder="Insert Author" value="{{ old('author', isset($meta->custom_data['author']) ? $meta->custom_data['author'] : '') }}" />
                        @if ($errors->any() && $errors->has('author'))
                            <div class="invalid-feedback">{{ $errors->first('author') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <img class="image-output" id="image_output" name="image_output" src="{{ asset('images/'.(isset($meta->image) ? $meta->image : '')) }}" alt="Image Output">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image <i class="required">*</i></label>
                        <input type="file" name="image" id="image" class="form-control {{ ($errors->any() && $errors->has('image')) ? 'is-invalid' : '' }}" onchange="loadFile(event, $(this))" accept=".jpg, .jpeg, .png">
                        @if ($errors->any() && $errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <img class="image-output" id="icon_output" name="icon_output" src="{{ asset('images/'.(isset($meta->custom_data['icon']) ? $meta->custom_data['icon'] : '')) }}" alt="Image Output">
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Icon <i class="required">*</i></label>
                        <input type="file" name="icon" id="icon" class="form-control {{ ($errors->any() && $errors->has('icon')) ? 'is-invalid' : '' }}" onchange="loadFile(event, $(this))" accept=".jpg, .jpeg, .png">
                        @if ($errors->any() && $errors->has('icon'))
                            <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
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