@extends('backend.layouts.homepage')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Configuration /</span> Rsvp
</h4>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Wedding Configuration</h5>
            </div>
            <div class="card-body">
                @foreach ($configs as $key => $value)
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="{{ $key }}" value="{{ $key }}" onclick="publishConfig(this)" {{  array_key_exists($key, $configData) ? $configData[$key] == 1 ? 'checked': '' : 0}}>
                        <label class="form-check-label">{{ $value }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('viewJs')
    <script>
        function publishConfig(data) {
            let field = data.value;
            let checked = data.checked;
            $.ajax({
                url: "{{ route('configuration.publish') }}",
                type: "POST",
                data: {
                    "field": field,
                    "checked": checked,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                    sweetAlert('success', response)
                },
                error:function(xhr, status, error){
                    sweetAlert('error', JSON.parse(xhr.responseText))
                }
            });
        }

        function sweetAlert(icon, response){
            Swal.fire({
                text: response,
                icon: icon,
                timer: 4500
            }).then(() => {
                location.reload();
            });
        }
    </script>
@endsection