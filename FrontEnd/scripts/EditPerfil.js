$(document).ready(function () {
    $.ajax({
        url: "../Backend/EditPerfilBack.php",
        method: "POST",
        data: { action: "CallPerfil" },
        dataType: "json",
        success: function (response) {
            $("#username-input").val(response.usuario_username);
            $("#name-input").val(response.usuario_nombre);
            $("#first-surname-input").val(response.usuario_paterno);
            $("#last-surname-input").val(response.usuario_materno);
            $("#gender-input").val(response.usuario_genero);
            $("#birthdate-input").val(response.usuario_fenac);
            $("#email-input").val(response.usuario_email);
            $("#password-input").val(response.usuario_contrasena);
            $("#create-input").val(response.usuario_fereg);

            if (response.usuario_imagen) {
                var avatarImg = document.getElementById("avatar-img");
                avatarImg.src = "data:image/jpeg;base64," + response.usuario_imagen;
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    });
});

document.getElementById('edit-info-button').addEventListener('click', function () {
    event.preventDefault();
    var userInfoForm = document.getElementById('user-info-form');
    var editAvatarButton = document.getElementById('edit-avatar-button');
    var formInputs = document.querySelectorAll('#user-info-form input:not(#user-type-input):not(#create-input):not(#edit-input):not([type="button"]), #user-info-form textarea');
    var gender = document.getElementById('gender-input');
    var editDate = document.getElementById('edit-input');

    if (userInfoForm.classList.contains('edit-mode')) {
        userInfoForm.classList.remove('edit-mode');
        editAvatarButton.disabled = false;
        this.innerText = 'Editar usuario';
        this.style.marginLeft = '380px';
        formInputs.forEach(function (input) {
            input.setAttribute('readonly', 'readonly');
        });
        gender.disabled = true;
        var action = "UpdatePerfil";
        var nombre_usuario = $("#username-input").val();
        var nombre = $("#name-input").val();
        var apellido_P = $("#first-surname-input").val();
        var apellido_M = $("#last-surname-input").val();
        var genero = $("#gender-input").val();
        var fecha_nacimiento = $("#birthdate-input").val();
        var email = $("#email-input").val();
        var pass = $("#password-input").val();
        var data = {
            action: action,
            nombre_usuario: nombre_usuario,
            nombre: nombre,
            apellido_P: apellido_P,
            apellido_M: apellido_M,
            genero: genero,
            fecha_nacimiento: fecha_nacimiento,
            email: email,
            pass: pass
        };

        $.ajax({
            url: "../Backend/EditPerfilBack.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Actualizacion exitosa.',
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    } else {
        userInfoForm.classList.add('edit-mode');
        editAvatarButton.disabled = true;
        this.innerText = 'Guardar cambios';
        this.style.marginLeft = '350px';
        formInputs.forEach(function (input) {
            input.removeAttribute('readonly');
        });

        gender.disabled = false;
    }
});

document.getElementById('toggle-password').addEventListener('click', function () {
    var passwordInput = document.getElementById('password-input');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        this.innerText = 'Ocultar';
    } else {
        passwordInput.type = 'password';
        this.innerText = 'Mostrar';
    }
});


var avatarInput = document.getElementById('avatar-input');
document.getElementById('edit-avatar-button').addEventListener('click', function (event) {
    event.preventDefault();
    avatarInput.click();
});

$("#avatar-input").on("change", function (event) {
    event.preventDefault();


    var editDate = document.getElementById('edit-input');
    var file = event.target.files[0];

    if (!file || !file.type.startsWith('image/')) {
        alert("Selecciona una imagen válida.");
        return;
    }

    var formData = new FormData();
    formData.append("avatar", file);
    formData.append("action", "uploadAvatar");

    $.ajax({
        url: "../Backend/EditPerfilBack.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Actualizacion exitosa.',
                showConfirmButton: false,
                timer: 1500
            });
            var reader = new FileReader();
            var avatarImg = document.getElementById("avatar-img");
            reader.onload = function (e) {
                avatarImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        error: function (xhr, status, error) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error al subir el archivo:',
                text: error,
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
});
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
