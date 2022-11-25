// Initialize Select2 Elements
$('.select2').select2()

// Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})

// Tooltip
$('[data-toggle="tooltip"]').tooltip()

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "data akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// Sweet Alert
$('.swalDeleteSuccess').click(function () {
    Swal.fire(
        'Berhasil!',
        'Data berhasil dihapus',
        'success'
    )
});

$('.swalSaveSuccess').click(function () {
    Swal.fire(
        'Berhasil!',
        'Data berhasil disimpan',
        'success'
    )
});

$('.swalDisetujuiSuccess').click(function () {
    Swal.fire({
        title: 'Apa Anda yakin?',
        text: "Data yang sudah disetujui tidak dapat diubah lagi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, setuju!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Berhasil!',
                'Permintaan penghimpunan tidak disetujui',
                'success'
            )
        }
    })
});

$(document).ready(function () {
    window.setTimeout(function () {
        $("#alert-delete").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
});

$(document).ready(function () {
    window.setTimeout(function () {
        $("#alert-myth").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 8000);
});
