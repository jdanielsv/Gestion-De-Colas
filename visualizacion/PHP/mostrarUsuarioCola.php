<?php
require('./../conf/conexion.php');
$con=conexion(); 

$con=conexion();
if ($con->connect_error) { 
    die("Fallo en la conexión: ".$con->connect_error);
    echo "fallo";
}else{
    $consulta="SELECT (select codigo_cliente from usuariotemporales where        idusuarioTemporales=consultaPrincipal.usuarioTemporales_idusuarioTemporales)as codigo,(select nombre from cola where consultaPrincipal.cola_idcola=idcola)as departamento,posicion FROM cola.cola_has_usuariotemporales consultaPrincipal where posicion is not null;";
    $resultado=$con->query($consulta);
    
    $variable;
    foreach ($resultado as $row3) {
        $variable.="<div class='contenido text-center'><div class='col-md-6'><label for=''>".$row3['codigo']."</label></div><div class='col-md-6'><label for=''>".$row3['departamento']."</label></div></div>";
    }
    echo $variable;
}
    
?>