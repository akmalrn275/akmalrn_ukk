<script src="{{ asset('sweetalert/sweetalert.js') }}"></script>
    <script>
        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                showConfirmButton: true,
            });
        @endif

        @if (session('swalError'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('swalError') }}",
                showConfirmButton: true,
            });
        @endif

        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Logout',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }

        @if (session('errorBooking'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal Booking',
                text: '{{ session('errorBooking') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('errorBookinCheck'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal Booking',
                text: '{{ session('errorBookingCheck') }}',
                confirmButtonText: 'OK'
            });
        @endif

        @if (session('swalError'))
            Swal.fire({
                icon: 'warning',
                title: 'Akun Belum Diverifikasi',
                text: '{{ $errors->first('email') }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>