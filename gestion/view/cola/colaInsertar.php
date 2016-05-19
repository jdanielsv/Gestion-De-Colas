<?php
session_start();
require('../../conf/conexion.php');
$nombre=$_POST['nombre'];
$fechaI=$_POST['fechaI'];
$fechaF=$_POST['fechaF'];
$idProfesional=$_SESSION['id'];
$claveRand=$_POST['claveRand'];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{

    $consulta="INSERT INTO cola.cola (nombre,fecha_fin,fecha_inicio,usuario_idusuario,codigo_alta) VALUES ('".$nombre."','".$fechaI."', '".$fechaF."','".$idProfesional."','".$claveRand."')";
    $con->query($consulta);
    cerrarSesion();

}

header("Location: /gestion-De-Colas/gestion/ ");

?>