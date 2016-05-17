<?php   

require('./conf/conexion.php'); 
$email= $_SESSION['email'];
$id=$_SESSION['id'];
$nombre="";
$apellidos="";
$rol="";
$contrasenia="";

$conn=conexion(); 

if ($conn->connect_error) { 
    die("Fallo en la conexión: " . $conn->connect_error); 
} else{ 
    $sql="SELECT * FROM usuario WHERE idusuario='".$id."'"; 
    $result = $conn->query($sql); 
    $row = $result->fetch_assoc();

    $nombre=$row['nombre'];
    $apellidos=$row['apellidos'];
    $rol=$row['rol'];
    $contrasenia=$row['contrasenia'];

}
?>


<div class="col-sm-3 col-md-2 sidebar">

    <?php

    if($rol=='Admin')
    {
        echo "<ul class='nav nav-sidebar'>";
        echo "<li class='active' id='usuariosMenu'><a style='cursor: pointer' onclick='menuPrincipal('usuarios')' ><span class='fa fa-users'></span>";
        echo "Listado usuarios</a></li>";
        echo "</ul>";

        echo "<ul class='nav nav-sidebar'>";
        echo "<li id='colaMenu'><a style='cursor: pointer' onclick='menuPrincipal('cola')'><span class='fa fa-clock-o'></span> Listado colas</a></li>";
        echo "</ul>";


        echo "<ul class='nav nav-sidebar'>";
        echo "<li id='configurarMenu'><a style='cursor: pointer' onclick='menuPrincipal('configuracion')'><span class='fa fa-cogs'></span>"; echo "Configurar página</a></li>";
        echo "</ul>";
    }else
    {
        echo "<ul class='nav nav-sidebar'>";
        echo "<li id='colaMenu'><a style='cursor: pointer' onclick='menuPrincipal('cola')'><span class='fa fa-clock-o'></span> Listado colas</a></li>";
        echo "</ul>";
    }

    ?>
</div>