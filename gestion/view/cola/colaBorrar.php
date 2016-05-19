<?php

    require('../../conf/conexion.php');

    $conn=conexion(); 

    $borrar=$_POST['id'];

    $con=conexion();
    if ($con->connect_error) { 
        die("Fallo en la conexión: ".$con->connect_error); 
    }else{
        $borrar="DELETE FROM cola WHERE idcola = '".$borrar."'";
        $conn->query($borrar);
            mysqli_close($conn);
    }
    
    echo "correcto";

?>