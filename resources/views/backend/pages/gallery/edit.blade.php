@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gallery /</span> Edit
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-info" type="button" href="{{ route('gallery.index') }}"><span><i class="bx bx-arrow-back"></i> <span class="d-none d-sm-inline-block">Back</span></span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Edit Gallery</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <img class="image-output" id="image_output" name="image_output" src="{{ asset('storage/'.$gallery->image) }}" alt="Image Output">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image <i class="required">*</i></label>
                        <input type="file" name="image" id="image" class="form-control {{ ($errors->any() && $errors->has('image')) ? 'is-invalid' : '' }}" onchange="loadFile(event, $(this))" accept=".jpg, .jpeg, .png">
                        @if ($errors->any() && $errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image Caption <i class="required">*</i></label>
                        <input type="text" name="image_caption" class="form-control {{ ($errors->any() && $errors->has('image_caption')) ? 'is-invalid' : '' }}" placeholder="Insert Image Caption" value="{{ old('image_caption', $gallery->image_caption) }}" />
                        @if ($errors->any() && $errors->has('image_caption'))
                            <div class="invalid-feedback">{{ $errors->first('image_caption') }}</div>
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