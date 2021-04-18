$('.trash-btn').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Move to trash?',
        text: "this may affect other data",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('.trash-form').submit();
        }
    });
});

$('.delete-btn').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Delete permanently?',
        text: "this may affect other data",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('.delete-form').submit();
        }
    });
});
