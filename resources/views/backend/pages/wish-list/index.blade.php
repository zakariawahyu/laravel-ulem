@extends('backend.layouts.homepage')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Wish List</span>
    </h4>
    <div class="dt-action-buttons text-end mb-2">
        <div class="dt-buttons">
            <a class="btn btn-warning" type="button" href="{{ route('wish-list.publish') }}"><span><i class="bx bx-paper-plane me-sm-2"></i> <span class="d-none d-sm-inline-block">Publish</span></span></a>
        </div>
    </div>
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="table table-bordered" id="datatableWish">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
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
        $("#datatableWish").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            serverSide: true,
            pageLength: 10,
            ajax: "{{ route('datatable.wish-list') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'name', name: 'name'},
                { data: 'wish_description', name: 'wish_description'},
                { data: 'action', name: 'action'},
            ]
        })
    });
</script>
@endsection
