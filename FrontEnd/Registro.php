<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Registro.css">
    <title>Registro</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>¡Registrate!</h2>
                    <h5>Ingresa tus datos para tener una cuenta</h5>
                    <div class="inputbox"> <img src="../photos/Logo InfoSphere Blanco_Mesa de trabajo 1.png" alt="">
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="" id="correo" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        <input type="user" name="" id="nombreUsuario" required>
                        <label for="">Nombre de Usuario</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="nombre" name="" id="nombre" required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="people-outline"></ion-icon><input type="apellidoP" name="" id="apellidoP" required>
                        <label for="">Apellido paterno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="people-outline"></ion-icon><input type="apellidoM" name="" id="apellidoM" required>
                        <label for="">Apellido materno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="" id="contrasena" required>
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="male-female-outline"></ion-icon>
                        <label for="" style="top: -5px;">Genero</label>
                        <select id="sexo" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="calendar-outline"></ion-icon> -->
                        <input type="date" style="padding:0 10px 0 5px;" id="fechaNacimiento" required
                            placeholder="Fecha de Nacimiento" class="no-effect">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                    </div>

                    <button>Registrar Cuenta</button>
                    <div class="register">
                        <p>¿Ya tienes una cuenta? <a href="Index.php">Login</a></p>
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

        function RegistrarUser() {
            var valinput = "";
            var username = $("#nombreUsuario").val();
            var password = $("#contrasena").val();
            var Name = $("#nombre").val();
            var LastNamePattern = $("#apellidoP").val();
            var LastNameMatern = $("#apellidoM").val();
            var Email = $("#correo").val();
            var SelectGenero = document.getElementById('sexo');
            var SelectGeneroOption = SelectGenero.options[SelectGenero.selectedIndex].textContent;
            var DateBirth = document.getElementById('fechaNacimiento');
            var DateBirthValue = DateBirth.value;
            var SelectRol = document.getElementById('rol');
            var SelectRolOption = SelectRol.options[SelectRol.selectedIndex].textContent;

            if (username == "") {
                valinput += "Ingrese su nombre de usuario";
            }
            if (password == "") {
                if (valinput != "") {
                    valinput += ",\n"
                }
                valinput += "Falta una contraseña";
            }
            if (Name == "") {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese su nombre";
            } else if (!/^[\p{L}]+(?: [\p{L}]+)?$/u.test(Name)) {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "El nombre solo debe contener letras";
            }
            if (LastNamePattern == "") {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese su apellido paterno";
            } else if (!/^[\p{L}]+$/u.test(LastNamePattern)) {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "El apellido paterno solo debe contener letras";
            }

            if (LastNameMatern == "") {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese su apellido materno";
            } else if (!/^[\p{L}]+$/u.test(LastNameMatern)) {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "El apellido materno solo debe contener letras";
            }
            if (DateBirthValue == "") {
                if (valinput != "") {
                    valinput += ",\n";
                }
                valinput += "Ingrese su fecha de nacimiento";
            } else {
                // Obtén la fecha actual
                var fechaActual = new Date();
                var fechaComp = new Date(DateBirthValue);
                // Calcula la diferencia en años
                var edad = fechaActual.getFullYear() - fechaComp.getFullYear();

                // Verifica si la persona ya cumplió años este año
                if (
                    fechaComp.getMonth() > fechaActual.getMonth() ||
                    (fechaComp.getMonth() === fechaActual.getMonth() &&
                        fechaComp.getDate() > fechaActual.getDate())
                ) {
                    edad--;
                }

                // Verifica si la persona tiene al menos 18 años
                if (edad < 18) {
                    if (valinput != "") {
                        valinput += ",\n";
                    }
                    valinput += "Debes ser mayor de 18 años";
                }
            }
            if (Email == "") {
                if (valinput != "") {
                    valinput += ",\n"
                }
                valinput += "Ingrese su correo electronico";
            }
            if (!validarContrasena(password)) {
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
                $.ajax({
                    type: "POST",
                    url: "../Backend/RegistrarUsuario.php",
                    data: {
                        username: username,
                        password: password,
                        Name: Name,
                        LastNamePattern: LastNamePattern,
                        LastNameMatern: LastNameMatern,
                        Email: Email,
                        SelectGeneroOption: SelectGeneroOption,
                        DateBirthValue: DateBirthValue,
                        SelectRolOption: SelectRolOption
                    },
                    cache: false,
                    success: function (data) {
                        alert(data);
                        if (data == '1') //data == '1'
                        {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Usuario agregado Correctamente',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                window.location.href = "Login.php";
                            });
                        }
                        else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                text: "No se pudo agregar Usuario",
                                showConfirmButton: true
                            });
                        }
                    },
                    error: function (xhr, status, error) {

                        window.location.href = "logout.php";
                    }
                });
            }
        }

    </script>
    </div>
    </div>
</body>

</html>