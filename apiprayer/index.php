<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "iglesiaeliasista";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);



// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqleventos = mysqli_query($conexionBD,"SELECT * FROM oraciones WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqleventos) > 0){
        $eventos = mysqli_fetch_all($sqleventos,MYSQLI_ASSOC);
        echo json_encode($eventos);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


// Consulta todos los registros de la tabla eventos
$sqleventos = mysqli_query($conexionBD,"SELECT * FROM oraciones ");
if(mysqli_num_rows($sqleventos) > 0){
    $eventos = mysqli_fetch_all($sqleventos,MYSQLI_ASSOC);
    echo json_encode($eventos);
}
else{ echo json_encode([["success"=>0]]); }


?>