@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Guest /</span> Edit
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-info" type="button" href="{{ route('guest-list.index') }}"><span><i class="bx bx-arrow-back"></i> <span class="d-none d-sm-inline-block">Back</span></span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Edit Guest</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('guest-list.update', $guestList->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $guestList->id }}">
                    <div class="mb-3">
                        <label class="form-label">Image Caption <i class="required">*</i></label>
                        <input type="text" name="name" class="form-control {{ ($errors->any() && $errors->has('name')) ? 'is-invalid' : '' }}" placeholder="Insert Name" value="{{ old('name', $guestList->name) }}" />
                        @if ($errors->any() && $errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Slug <i class="required">*</i></label>
                        <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" placeholder="Auto generate, if errors please use another name" value="{{ old('slug', $guestList->slug) }}" disabled />
                        @if ($errors->has('slug'))
                            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Is Gift  </div>
                        <label class="switch switch-lg">
                            <input type="checkbox" class="switch-input" name="is_gift" id="is_gift" value="{{ old('is_gift', $guestList->is_gift) }}" {{ old('is_gift', $guestList->is_gift) == true ? 'checked' : '' }}>
                            <span class="switch-toggle-slider">
                                <span class="switch-on">
                                    <i class="bx bx-check"></i>
                                </span>
                                <span class="switch-off">
                                    <i class="bx bx-x"></i>
                                </span>
                            </span>
                        </label>
                        @if ($errors->has('is_gift'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('is_gift') }}</div>
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
        $("#is_gift").on('change', function() {
            if ($(this).is(':checked')) {
                $(this).attr('value', 'true');
            } else {
                $(this).attr('value', 'false');
            }
        });
    </script>
@endsection