$('.approveCar').click(function (e) {
    e.preventDefault();
    let carId = $(this).attr('id');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/admin/car/approve', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({id: carId, _token: csrfToken})
    }).then(response => {
        if (response.status === 200) {
            Swal.fire({
                title: "Successfully approved!",
                text: "Car is published now!",
                icon: "success"
            });
            $('#car-' + carId).remove();
            setInterval(function () {
                location.reload();
            },1500)
        }
        else {
            Swal.fire({
                title: "Error!",
                text: "Something went wrong!",
                icon: "error"
            })
        }

    })

})
