const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const baseUrl = window.location.origin;
$('.approveCar').click(function (e) {
    e.preventDefault();
    let carId = $(this).attr('id');
    //const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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


$('.deleteCar').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            deleteCar(id);
        }
    });
});

function deleteCar(id){
    let baseUrl = window.location.origin;
    let deleteUrl = baseUrl+ '/admin/car/delete';

    fetch(deleteUrl, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
    }).then(response => {
        if(response.status === 200){
            $('#car-'+id).remove();
            Swal.fire({
                title: "Deleted!",
                text: "Car has been deleted.",
                icon: "success"
            });
        }
        else {
            Swal.fire({
                title: "Error!",
                text: "Something went wrong.",
                icon: "error"
            });
        }
    });
}

$('.deleteModel').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/model';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {

            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#model-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Model has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Model is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });

});

$('.deleteBrand').click(function (e){
   e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/brand';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#brand-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Brand has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Brand is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteColor').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/color';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#color-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Color has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Color is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteSeats').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/seats';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#seats-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Seats has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Seats is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteDoors').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/doors';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#doors-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Doors has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Doors is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteBody').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/body';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#body-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Body has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Body is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteDriveType').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/drive-type';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#driveType-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Drive type has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Drive type is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteTransmission').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/transmission';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#transmission-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Transmission has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Transmission is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});


$('.deleteFuel').click(function (e){
    e.preventDefault();
    let id = $(this).attr('id');
    let deleteUrl = baseUrl+ '/admin/car/delete/fuel';
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#009900",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            }).then(response => {
                if(response.status === 200){
                    $('#fuel-'+id).remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Fuel has been deleted.",
                        icon: "success"
                    });
                }
                else if(response.status === 400){
                    Swal.fire({
                        title: "Error!",
                        text: "Fuel is in use!",
                        icon: "error"
                    });
                }
                else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });


});
