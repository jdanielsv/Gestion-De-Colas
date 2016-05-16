<?php
    function conexion(){
        return new mysqli("localhost", "root", "root", "cola");
    }
    function cerrarSesion(){
        mysql_close();
    }

    $conn=conexion(); 

    $borrar=$_POST[id];

    $con=conexion();
    if ($con->connect_error) { 
        die("Fallo en la conexión: ".$con->connect_error); 
    }else{
        $borrar="DELETE FROM usuario WHERE idusuario = '".$borrar."'";
        $conn->query($borrar);
        cerrarSesion();
    }
    
    echo "correcto";

?>