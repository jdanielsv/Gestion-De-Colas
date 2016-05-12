<?php require "/conf/conexion.php";

function insertarUsuario($usuario,$apellido,$rol,$correo,$pass){
    conexion();
    mysql_query("INSERT INTO cola.usuario (nombre,apellidos,rol,email,contrasenia) VALUES ('".$usuario."','".$apellido."', '".$rol."','".$correo."','".$pass."')");
    cerrarSesion();
}

function obtenerUsuarios(){
    $link = Conectar();
    $q = "SELECT * FROM usuario";
    $consulta = mysql_query($q);
    return $consulta;
    Desconectar($link);
}

?>