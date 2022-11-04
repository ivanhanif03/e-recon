// Initialize Select2 Elements
$('.select2').select2()

// Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})

// Tooltip
$('[data-toggle="tooltip"]').tooltip()

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