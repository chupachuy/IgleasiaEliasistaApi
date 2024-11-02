<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "iglesiaeliasista";

$conn = mysqli_connect( $host, $username, $password, $dbname);

if($conn){
    echo "Conexión exitosa";
} else {
    echo "Error de conexión";
}


?>