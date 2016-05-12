<?php
function conexion(){
    mysql_connect("localhost","root","root");
    mysql_select_db("cola");
}

function cerrarSesion(){
    mysql_close();
}

?>





<?php
function Conectar(){
    $link = mysql_connect("localhost","root","root");
    return $link;
}

function Desconectar($link){
    mysql_close($link);
}
?>