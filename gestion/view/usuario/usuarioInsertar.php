<?php


function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}

function cerrarSesion(){
    mysql_close();
}
    
$conn=conexion(); 

$usuario=$_POST[nombre];
$apellido=$_POST[apellido];
$correo=$_POST[correo];
$pass=$_POST[pass];
$rol=$_POST[rol];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{

    $consulta="INSERT INTO cola.usuario (nombre,apellidos,rol,email,contrasenia) VALUES ('".$usuario."','".$apellido."', '".$rol."','".$correo."','".$pass."')";
    $con->query($consulta);
    cerrarSesion();

}

header("Location: /gestion-De-Colas/gestion/ ");

?>

