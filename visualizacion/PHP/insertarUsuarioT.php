<?php

require('./../conf/conexion.php');
$con=conexion(); 

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellidos'];
$dni=$_POST['dni'];
$clave=$_POST['clave'];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{
    $consulta="Select * from cola where codigo_alta='$clave' AND idcola='$id'";
    $resultado=$con->query($consulta);
    if($resultado->num_rows >0)
    {
        //Resultado que guarda id cola
        $cola = $resultado->fetch_row();
        //Inserta en base de datos usuario temporal
        $claveU=$nombre.$dni;
        $consulta="INSERT INTO usuariotemporales (DNI,nombreT,estado,codigo_cliente) VALUES ('".$dni."', '".$nombre.$apellido."','EN COLA','".$claveU."')";
        $con->query($consulta);
        //Selecciona al usuario anteriormente añadido
        $consulta="Select * from usuariotemporales where codigo_cliente='$claveU'";
        $resultado=$con->query($consulta);
        $usuario = $resultado->fetch_row();
        //Consulta para añadir la posición que se quiere
        $consulta="Select posicion FROM cola_has_usuariotemporales WHERE cola_idcola='$id' ORDER BY posicion DESC LIMIT 1";
        $resultado=$con->query($consulta);
        $posicion=$resultado->fetch_row();
        $posiconF=$posicion[0]+1;
        //Introduce en la cola_usuasriotemporales
         $consulta="INSERT INTO cola_has_usuariotemporales (cola_idcola,cola_usuario_idusuario,usuarioTemporales_idusuarioTemporales,posicion) VALUES ('".$id."', '".$cola[4]."','$usuario[0]','$posiconF')";
        $con->query($consulta); 
        echo "correcto";

    }else{
        echo "incorrecto";
    }
}

?>

