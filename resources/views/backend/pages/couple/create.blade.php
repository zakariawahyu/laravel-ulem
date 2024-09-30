@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Couple /</span> Create
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-info" type="button" href="{{ route('couple.index') }}"><span><i class="bx bx-arrow-back"></i> <span class="d-none d-sm-inline-block">Back</span></span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Create Couple</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('couple.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Couple Type <i class="required">*</i></label>
                        <select name="couple_type" class="form-control {{ ($errors->any() && $errors->has('couple_type')) ? 'is-invalid' : '' }}">
                            <option value="" selected disabled>Select Couple Type</option>
                            @foreach ($coupleTypes as $key => $item)
                                <option value="{{ $key }}" {{ old('couple_type') == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->any() && $errors->has('couple_type'))
                            <div class="invalid-feedback">{{ $errors->first('couple_type') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name <i class="required">*</i></label>
                        <input type="text" name="name" class="form-control {{ ($errors->any() && $errors->has('name')) ? 'is-invalid' : '' }}" placeholder="Insert Name" value="{{ old('name') }}" />
                        @if ($errors->any() && $errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Parent Description <i class="required">*</i></label>
                        <input type="text" name="parent_description" class="form-control {{ ($errors->any() && $errors->has('parent_description')) ? 'is-invalid' : '' }}" placeholder="Insert Parent Description" value="{{ old('parent_description') }}" />
                        @if ($errors->any() && $errors->has('parent_description'))
                            <div class="invalid-feedback">{{ $errors->first('parent_description') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Father Name <i class="required">*</i></label>
                        <input type="text" name="father_name" class="form-control {{ ($errors->any() && $errors->has('father_name')) ? 'is-invalid' : '' }}" placeholder="Insert Father Name" value="{{ old('father_name') }}" />
                        @if ($errors->any() && $errors->has('father_name'))
                            <div class="invalid-feedback">{{ $errors->first('father_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mother Name <i class="required">*</i></label>
                        <input type="text" name="mother_name" class="form-control {{ ($errors->any() && $errors->has('mother_name')) ? 'is-invalid' : '' }}" placeholder="Insert Mother Name" value="{{ old('mother_name') }}" />
                        @if ($errors->any() && $errors->has('mother_name'))
                            <div class="invalid-feedback">{{ $errors->first('mother_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instagram URL <i class="required">*</i></label>
                        <input type="url" name="instagram_url" class="form-control {{ ($errors->any() && $errors->has('instagram_url')) ? 'is-invalid' : '' }}" placeholder="Insert Instagram URL" value="{{ old('instagram_url') }}" />
                        @if ($errors->any() && $errors->has('instagram_url'))
                            <div class="invalid-feedback">{{ $errors->first('instagram_url') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <img class="hidden image-output" id="image_output" name="image_output" src="" alt="Image Output">
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