<!-- Include SweetAlert script (e.g., in your main layout before closing </body> tag) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif

<!-- DataTables CSS & JS (menggunakan CDN) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('admin/js/main.js') }}"></script>
