<?php

    $server = "localhost";
    $database = "MaxiTienda";
    $username = "root";
    $password = "root";
    $mysqli = @mysqli_connect($server, $username, $password, $database);

   if(!$mysqli){
    die('Connect Error: ' . mysqli_connect_errno());
   }
?>