const flashData = $('.flash-data').data('flash');

if ( flashData ) {
    Swal.fire({
        title: "Data Buku",
        text: "Berhasil " + flashData,
        icon: "success"
    });
}


// Tombol delete
$('.btn-delete').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "kamu tidak akan bisa mengembalikan data ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    });

});