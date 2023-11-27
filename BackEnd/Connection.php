<?php

    $server = "localhost";
    $database = "BDINFOSPHERE2023";
    $username = "root";
    $password = "root";
    $mysqli = @mysqli_connect($server, $username, $password, $database);

   if(!$mysqli){
    die('Connect Error: ' . mysqli_connect_errno());
   }
?>