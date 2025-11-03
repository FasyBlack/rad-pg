// public/js/alert.js

document.addEventListener('DOMContentLoaded', function () {
    const success = document.body.dataset.success;
    const error = document.body.dataset.error;

    if (success) {
        Swal.fire({
            title: 'Berhasil!',
            text: success,
            icon: 'success',
            showConfirmButton: false,
            timer: 2000,
            background: '#fff',
            backdrop: 'rgba(0,0,0,0.6)'
        });
    }

    if (error) {
        Swal.fire({
            title: 'Terjadi Kesalahan!',
            text: error,
            icon: 'error',
            showConfirmButton: true,
            confirmButtonColor: '#d33',
            background: '#fff',
            backdrop: 'rgba(0,0,0,0.6)'
        });
    }
});
