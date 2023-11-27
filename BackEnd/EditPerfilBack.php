<?php

session_start();

include 'Connection.php';
header('Content-Type: application/json');

$action = $_POST['action'];
$id = $_SESSION['id_usuario'];

if ($action == 'CallPerfil') {
    if (isset($_SESSION['id_usuario'])) {
        $id = mysqli_real_escape_string($mysqli, $id);
        $query = "CALL sp_usuario($id, '', '', '', '', null, null, '', '', '', '', '', 'SELECT')";
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $avatarBlob = $row['usuario_imagen'];
            $avatarBase64 = base64_encode($avatarBlob);
            $row['usuario_imagen'] = $avatarBase64;
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Error en el procedimiento almacenado']);
        }
    } else {
        echo json_encode(['error' => 'Falta el parámetro "id"']);
    }
}



if ($action == 'UpdatePerfil') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $apellido_P = $_POST['apellido_P'];
    $apellido_M = $_POST['apellido_M'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "CALL sp_usuario($id, '$nombre_usuario', '$nombre', '$apellido_P', '$apellido_M', '$genero', '$fecha_nacimiento', '', '$email', '$pass', 0, 0, 'UPDATE')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Actualización exitosa');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error en la actualización: ' . mysqli_error($mysqli));
        echo json_encode($response);
    }
}


if ($action === 'uploadAvatar') {
    $avatar = $_FILES['avatar'];
    if ($avatar['error'] === UPLOAD_ERR_OK) {
        $tmpName = $avatar['tmp_name'];
        $name = $avatar['name'];

        $fileData = file_get_contents($tmpName);

        $stmt = $mysqli->prepare("CALL sp_usuario(?, '', '', '', '', null, null, ?, '', '', '', '', 'UPDATE_PHOTO');");
        $stmt->bind_param("is", $id, $fileData);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = array('status' => 'success', 'message' => 'Avatar actualizado exitosamente');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error al actualizar el avatar');
            echo json_encode($response);
        }

        $stmt->close();
    } else {
        $response = array('status' => 'error', 'message' => 'Error al subir el archivo del avatar: ' . $avatar['error']);
        echo json_encode($response);
    }
}


mysqli_close($mysqli);
?>