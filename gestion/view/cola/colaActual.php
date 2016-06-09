<?php

function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}

$id=$_POST["id"];

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error); 
}else{
    $consulta="SELECT idusuarioTemporales,DNI,nombreT,estado,codigo_cliente,posicion FROM usuariotemporales,cola_has_usuariotemporales where cola_idcola='".$id."' AND usuarioTemporales_idusuarioTemporales=idusuarioTemporales order by posicion asc";
    $result3=$con->query($consulta);
    $variable;
    foreach ($result3 as $row3) {
        $variable.="<tr class='marcadoC'><td align='center'>".$row3['idusuarioTemporales']."</td><td align='center'>".$row3['DNI']."</td><td align='center'>".$row3['nombreT']."</td><td align='center'>".$row3['estado']."</td><td align='center'>".$row3['codigo_cliente']."</td><td align='center'>".$row3['posicion']."</td><td><a onclick='aceptarUsuarioCola(".$row3['idusuarioTemporales'].")' value='".$row3['idusuarioTemporales']."' class='btn btn-success'><em class='fa fa-check'></em></a> <a onclick='borrarUsuarioCola(".$row3['idusuarioTemporales'].")' value='".$row3['idusuarioTemporales']."' class='btn btn-danger'><em class='fa fa-close'></em></a></td></tr>";
    }
    echo $variable;
    
    
}


?>