<?php
  $hostname = "localhost";
  $username = "root";
  $password = "mypass123";
  $dbname = "BDINFOSPHERE2023";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Error de conexión a la base de datos".mysqli_connect_error();
  die();
} else{ echo"conexion establecida";
}
?>