<?php

function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}

$id=$_POST["id"];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{
    $consulta="SELECT idusuarioTemporales,DNI,nombreT,estado,codigo_cliente FROM usuariotemporales,cola_has_usuariotemporales where cola_idcola='".$id."' AND usuarioTemporales_idusuarioTemporales=idusuarioTemporales";
    $result3=$con->query($consulta);
    /*foreach ($result3 as $row3) {
        echo json_encode($row3);
    }*/
    
    
    $variable;
    foreach ($result3 as $row3) {
        $variable.="<tr class='marcadoC'><td align='center'></td><td align='center'>".$row3['idusuarioTemporales']."</td><td align='center'>".$row3['DNI']."</td><td align='center'>".$row3['nombreT']."</td><td align='center'>".$row3['estado']."</td><td align='center'>".$row3['codigo_cliente']."</td></tr>";
    }
    echo $variable;
    
    
}


?>