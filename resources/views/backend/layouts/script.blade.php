<script src="{{ asset('assets/backend/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/backend/libs/popper/popper.js')}}"></script>
<script src="{{ asset('assets/backend/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/backend/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/backend/libs/typeahead-js/typeahead.js')}}"></script>

<script src="{{ asset('assets/backend/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Datatable JS -->
<script src="{{ asset('assets/backend/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

<!-- Vendors JS -->
<script src="{{  asset('assets/backend/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/backend/js/main.js')}}"></script>

@if (session('success'))
    <script>
        Swal.fire({
            text: "{{ session('success') }}",
            icon: 'success',
        });
    </script>
@endif