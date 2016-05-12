<?php
function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}

function cerrarSesion(){
    mysql_close();
}

?>