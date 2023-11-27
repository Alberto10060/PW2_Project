function CerrarSesion() {
    Swal.fire({
        title: '¿Seguro que deseas cerrar sesión?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cerrar sesión',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../Backend/cerrar_sesion.php',
                type: 'POST',
                success: function (response) {
                    window.location.href = 'index.php';
                }
            });
        }
    })
}