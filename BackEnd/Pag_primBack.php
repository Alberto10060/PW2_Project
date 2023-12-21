<?php

session_start();

include 'Connection.php';
header('Content-Type: application/json');

$action = $_POST['action'];
$id = $_SESSION['id_usuario'];
$user = $_SESSION['nombre_usuario'];

if ($action === 'insertPost') {
    $posttext = $_POST['posttext'];
    $photo = $_FILES['photo'];

    if ($photo !== null && $photo['error'] === UPLOAD_ERR_OK) {
        $tmpName = $photo['tmp_name'];
        $name = $photo['name'];

        $fileData = file_get_contents($tmpName);

        $stmt = $mysqli->prepare("CALL sp_post(0, ?, ?, ?, ?, 'INSERT');");
        $stmt->bind_param("sssi", $user, $posttext, $fileData, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = array('status' => 'success', 'message' => 'Post publicado exitosamente');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error al publicar el post');
            echo json_encode($response);
        }

        $stmt->close();
    } elseif ($photo === null) {
        // No hay imagen seleccionada, establecer $fileData a null
        $fileData = null;

        $stmt = $mysqli->prepare("CALL sp_post(0, ?, ?, ?, ?, 'INSERT');");
        $stmt->bind_param("sssi", $user, $posttext, $fileData, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response = array('status' => 'success', 'message' => 'Post publicado exitosamente (sin imagen)');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error al publicar el post (sin imagen)');
            echo json_encode($response);
        }

        $stmt->close();
    } else {
        $response = array('status' => 'error', 'message' => 'Error al publicar el post: ' . $photo['error']);
        echo json_encode($response);
    }
}



mysqli_close($mysqli);
?>