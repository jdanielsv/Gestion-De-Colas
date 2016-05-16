<?php

function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}

function cerrarSesion(){
    mysql_close();
}

$id=$_POST[id];
$usuario=$_POST[nombre];
$apellido=$_POST[apellido];
$correo=$_POST[correo];
$pass=$_POST[pass];
$rol=$_POST[rol];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{

    $consulta="UPDATE cola.usuario SET nombre='".$usuario."',apellidos='".$apellido."',rol='".$rol."',email='".$correo."',contrasenia='".$pass."' WHERE idusuario='".$id."';";
    $con->query($consulta);
    
    cerrarSesion();
    
}


?>

