@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Guest List</span>
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-warning" type="button" href="{{ route('guest-list.publish') }}"><span><i class="bx bx-paper-plane me-sm-2"></i> <span class="d-none d-sm-inline-block">Publish</span></span></a>
            <a class="btn btn-info" type="button" href="{{ route('guest-list.create') }}"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></a>
        </div>
    </div>
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="table table-bordered" id="datatableGuest">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Is Gift</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('viewJs')
<script>
    $(document).ready(function(){
        $("#datatableGuest").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('datatable.guest-list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'is_gift', name: 'is_gift'},
                { data: 'action', name: 'action'},
            ]
        })
    });
</script>
@endsection
