<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: Pag_principal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/font-awesome_6.4.0_css_all.min.css">
    <script src="../Libs/jquery/jquery-3.6.3.min.js"></script>
    <script src="scripts/sweetalert.js"></script>
    <title>Login</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Login</h2>
                   <div class="inputbox"> <img src="../photos/Logo InfoSphere Blanco_Mesa de trabajo 1.png" alt=""></div> 
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="correo" id="correo" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="contrasena" id="contrasena" required>
                        <label for="">Password</label>
                    </div>
                    <button type="button" id="LoginButton" onclick="IniciarUser();">Iniciar sesión</button>
                    <div class="register">
                        <p>¿Todavia no tienes cuenta? <a href="Registro.php">Registrarse</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>

        function validarContrasena(password) {
            // Expresión regular para validar la contraseña
            var regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
            return regex.test(password);
        }

        function IniciarUser() {
            var valinput = "";
            var Email = $("#correo").val();
            var password = $("#contrasena").val();

            if (Email == "") {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese su correo electrónico";
            } else if (!/^\S+@\S+\.\S+$/.test(Email)) {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese una dirección de correo electrónico válido";
            }
            if (password == "") {
                if (valinput != "") {
                    valinput += ",\n"
                }
                valinput += "Falta una contraseña";
            } else if (!validarContrasena(password)) {
                if (valinput != "") {
                    valinput += ",\n"
                }
                valinput += "La contraseña no cumple con los requisitos mínimos";
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
                var dataString = 'email=' + Email + '&password=' + password;
                if ($.trim(Email).length > 0 && $.trim(password).length > 0) {
                $.ajax({
                    type: "POST",
                    url: "../BackEnd/validarLogin.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function () { $("#LoginButton").val('Connecting...'); },
                    success: function (data) {
                        if (data == '1') //data == '1'
                        {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '¡Bienvenido!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                window.location.href = "index.php";
                            });
                        }
                        else {
                            //Shake animation effect.
                            $("#LoginButton").val('Login')
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'El nombre de usuario o contraseña son invalidos.',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    },
                    error: function (xhr, status, error) {

                        window.location.href = "logout.php";
                    }
                });
            }
            }
        }

    </script>
</body>
</html>