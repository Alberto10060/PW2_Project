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

function RegistrarPost() {
    var file = $("#photo-input")[0].files[0];
    var valinput = "";
    var posttext = $("#posttext").val();

    if (posttext == "") {
        valinput += "Ingrese contenido a su post";
    }
    if (valinput != "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            text: valinput,
            showConfirmButton: true
        });
        return;
    } else {
        var formData = new FormData();
        formData.append("posttext", posttext);
        formData.append("photo", file);
        formData.append("action", "insertPost");

        $.ajax({
            url: "../Backend/Pag_primBack.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '¡Post publicado!',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error al subir el post',
                    text: error,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    }
}
var photoInput = document.getElementById('photo-input');
document.getElementById('addimage').addEventListener('click', function (event) {
    event.preventDefault();
    photoInput.click();
});
$("#photo-input").on("change", function (event) {
    event.preventDefault();
    var file = event.target.files[0];

    if (!file || !file.type.startsWith('image/')) {
        alert("Selecciona una imagen válida.");
        return;
    }
    var reader = new FileReader();
    var photoImg = document.getElementById("photo-img");
    reader.onload = function (e) {
        photoImg.src = e.target.result;
    };
    reader.readAsDataURL(file);

});