<?php
    include 'Connection.php';
    session_start();
    date_default_timezone_set('America/Mexico_City');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $Name = $_POST["Name"];
    $LastNamePattern = $_POST["LastNamePattern"];
    $LastNameMatern = $_POST["LastNameMatern"];
    $Email = $_POST["Email"];
    $SelectGeneroOption = $_POST["SelectGeneroOption"];
    $DateBirthValue = $_POST["DateBirthValue"];

    // Llamar al stored procedure Usuarios_CRUD para agregar un nuevo usuario
    
    $query = "CALL sp_usuario(NULL, '$username', '$Name', '$LastNamePattern', '$LastNameMatern', '$SelectGeneroOption', '$DateBirthValue', '', '$Email', '$password', 0, 0, 'INSERT')";

    if (mysqli_query($mysqli, $query)) {
        echo "1";
    } else {
        echo "0";
    }
?>
