function notif(pesan)
{
	Swal.fire({
        icon: pesan.toLowerCase().includes('berhasil') ? 'success' : 'error',
        title: "Informasi",
        text: pesan,
        buttonsStyling: false,
        confirmButtonClass: "btn btn-primary",
        timer: 2000,
    });
}

$('.btn-status').on('click', function(e) {
    e.preventDefault();

    var href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: 'Status pesanan akan diubah',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary mr-2',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        buttonsStyling: false
    }).then((result) => { if (result.isConfirmed) { document.location.href = href; } })
});

$('.btn-del').on('click', function(e) {
    e.preventDefault();

    var href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: 'Data akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary mr-2',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        buttonsStyling: false
    }).then((result) => { if (result.isConfirmed) { document.location.href = href; } })
});