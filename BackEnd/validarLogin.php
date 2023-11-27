<?php
include 'Connection.php';
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $mysqli->prepare("CALL spInicioSesion(?, ?, @id_usuario, @nombre_usuario, @mensaje)");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $stmt->close();

  $result = $mysqli->query("SELECT @id_usuario, @nombre_usuario, @mensaje");
  $row = $result->fetch_assoc();
  $id_usuario = $row['@id_usuario'];
  $nombre_usuario = $row['@nombre_usuario'];
  $mensaje = $row['@mensaje'];

  if ($id_usuario !== null) {
		  // Almacenar los datos del usuario en variables de sesión
		  $_SESSION['id_usuario'] = $id_usuario;
		  $_SESSION['nombre_usuario'] = $nombre_usuario;
		  echo 1;
  } else {
    echo 0;
  }
}
?>