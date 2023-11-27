<?php
include "Librerias.php";
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/EditPerfil.css">
    <script src="../Libs/moment.js"></script>
    <link rel="stylesheet" href="styles/font-awesome_6.4.0_css_all.min.css">
    <script src="../Libs/jquery/jquery-3.6.3.min.js"></script>
    <script src="scripts/sweetalert.js"></script>
</head>

<body>
    <section>
        <header>
            <a href="index.php" class="logo">InfoSphere</a>
            <?php
            if (isset($_SESSION['id_usuario'])) {
                ?>
                <ul>
                    <li><a href="Perfil.php">
                            <?php echo $_SESSION['nombre_usuario'] ?>
                        </a></li>
                    <li><a href="#" onclick="CerrarSesion();">Cerrar sesión</a></li>
                </ul>
                <?php
            } else {
                if (!isset($_SESSION['id_usuario'])) {
                    header("Location: index.php");
                    exit();
                }
            }
            ?>
        </header>
        <div class="profile-container">
            <form id="avatar-form" enctype="multipart/form-data">
                <div class="avatar-container">
                    <img src="../photos/user-default.jpg" alt="Avatar" id="avatar-img" class="avatar-image">
                    <input type="file" name="avatar" id="avatar-input" accept="image/*" style="display: none;">
                    <button id="edit-avatar-button" class="edit-button btn btn-dark">Cambiar avatar</button>
                </div>

            </form>
            <form id="user-info-form" enctype="multipart/form-data">
                <div class="user-info">
                    <div class="info-row">
                        <label for="user-id-input">Id de usuario:</label>
                        <input type="text" id="user-id-input" value="<?php echo $_SESSION['id_usuario'] ?>"readonly disabled>
                    </div>
                    <div class="info-row">
                        <label for="username-input">Nombre de usuario:</label>
                        <input type="text" id="username-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="name-input">Nombre:</label>
                        <input type="text" id="name-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="last-surname-input">Apellido Paterno:</label>
                        <input type="text" id="last-surname-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="first-surname-input">Apellido Materno:</label>
                        <input type="text" id="first-surname-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="birthdate-input">Fecha de nacimiento:</label>
                        <input type="date" id="birthdate-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="gender-input">Género:</label>
                        <select id="gender-input" name="genero" disabled>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                    <div class="info-row">
                        <label for="email-input">Email:</label>
                        <input type="email" id="email-input" readonly>
                    </div>
                    <div class="info-row">
                        <label for="password-input">Contraseña:</label>
                        <div class="password-container">
                            <input type="password" id="password-input" placeholder="Contraseña" readonly>
                            <button type="button" id="toggle-password" class="password-toggle">Mostrar</button>
                        </div>
                    </div>

                </div>
                <button id="edit-info-button" class="btn btn-dark"
                    style="margin-left: 380px; margin-bottom: 30px;">Editar
                    usuario</button>
            </form>

            <div class="date-info">
                <p>Fecha de registro: <input id="create-input" type="text" style="margin-right: 20px; width: 170px;"
                        readonly>
                </p>
            </div>
        </div>

    </section>

    <script src="scripts/EditPerfil.js"></script>
</body>

</html>