@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Couple</span>
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-warning" type="button" href="{{ route('couple.publish') }}"><span><i class="bx bx-paper-plane me-sm-2"></i> <span class="d-none d-sm-inline-block">Publish</span></span></a>
            <a class="btn btn-info" type="button" href="{{ route('couple.create') }}"><span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></a>
        </div>
    </div>
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="table table-bordered" id="datatableCouple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Couple Type</th>
                        <th>Name</th>
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
        $("#datatableCouple").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pageLength: 10,
            ajax: "{{ route('datatable.couple') }}",
            buttons: false,
            searching: true,
            scrollY: 500,
            scrollX: true,
            scrollCollapse: true,
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'couple_type', name: 'couple_type'},
                { data: 'name', name: 'name'},
                { data: 'action', name: 'action'},
            ]
        })
    });
</script>
@endsection
