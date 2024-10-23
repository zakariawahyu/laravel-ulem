@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gift /</span> Edit
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-info" type="button" href="{{ route('gift.index') }}"><span><i class="bx bx-arrow-back"></i> <span class="d-none d-sm-inline-block">Back</span></span></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Edit Gift</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('gift.update', $gift->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Bank <i class="required">*</i></label>
                        <select name="bank" class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}">
                            <option value="" selected disabled>Select Bank</option>
                            @foreach ($banks as $key => $item)
                                <option value="{{ $key }}" {{ old('bank', $gift->bank) == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('bank'))
                            <div class="invalid-feedback">{{ $errors->first('bank') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Account Name <i class="required">*</i></label>
                        <input type="text" name="account_name" class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" placeholder="Insert Account Name" value="{{ old('account_name', $gift->account_name) }}" />
                        @if ($errors->has('account_name'))
                            <div class="invalid-feedback">{{ $errors->first('account_name') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Account Number <i class="required">*</i></label>
                        <input type="text" name="account_number" class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" placeholder="Insert Account NUmber" value="{{ old('account_number', $gift->account_number) }}" />
                        @if ($errors->has('account_number'))
                            <div class="invalid-feedback">{{ $errors->first('account_number') }}</div>
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