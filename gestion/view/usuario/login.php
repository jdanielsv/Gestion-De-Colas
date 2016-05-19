<?php

require('../../conf/conexion.php');

$email=$_POST['email'];
$password=$_POST['password'];
$con=conexion();


$sql="SELECT * FROM usuario WHERE email='".$email."' AND contrasenia='".$password."'";

$salida= mysqli_query($con,$sql);
$rows=mysqli_fetch_array($salida);
if($rows)
{
    session_start();
    $_SESSION['id']=$rows['idusuario'];
    $_SESSION['email']=$email;
    mysqli_close($con);
    echo 'correcto';
}




?>