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

    @if (session('loginSuccess'))
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('loginSuccess') }} {{ auth('admin')->user()->name }}",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        });
    @endif

    @if (session('loginError'))
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('loginError') }}",
            icon: "error",
            confirmButtonColor: "#d33",
            confirmButtonText: "Coba Lagi"
        });
    @endif

    document.getElementById('logout-btn').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: "Apakah Anda yakin ingin logout?",
            text: "Anda harus login kembali untuk mengakses sistem.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Logout!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });

    function confirmDelete(id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    function confirmComplete(visitorId) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Status akan diubah menjadi Completed!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, tandai selesai!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('completeForm-' + visitorId).submit();
            }
        });
    }

    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', function() {
            const visitorId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Batalkan Kunjungan?',
                text: "Aksi ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancelForm-' + visitorId).submit();
                }
            });
        });
    });
</script>