<?php
require('../../conf/conexion.php');
$idCola=$_POST['idcola'];
$nombre=$_POST['nombre'];
$fechaI=$_POST['fechaI'];
$fechaF=$_POST['fechaF'];
$claveRand=$_POST['claveRand'];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{

    $consulta="UPDATE cola.cola SET nombre='".$nombre."',fecha_fin='".$fechaF."',fecha_inicio='".$fechaI."',codigo_alta='".$claveRand."' WHERE idcola='".$idCola."';";
    $con->query($consulta);
    mysqli_close($con);

}

header("Location: /gestion-De-Colas/gestion/ ");

?>