<?php 

require('./conf/conexion.php');

//Parte para recoger los datos del post del index.php
$id=$_POST['id'];


//fin
$conn2=conexion(); 
$titulo=null; 
$logo=null;
$descripcion=null;
$footer=null;
if ($conn2->connect_error) { 
    die("Fallo en la conexión: " . $conn2->connect_error); 
} else{ 
    $sql2="SELECT * FROM indexpersonalizado"; 
    $result2 = $conn2->query($sql2); 
    while($row = $result2->fetch_assoc()) {
        $titulo=$row["titulo"]; 
        $logo=$row["logo"];
        $descripcion=$row["descripcion"];
        $footer=$row["footer"];
    }
    $sql2="SELECT * FROM cola WHERE idcola=$id";
    $resultado=$conn2->query($sql2);
    $cola = $resultado->fetch_row();
    $sql2="SELECT * FROM usuario WHERE idusuario=$cola[4]";
    $resultado=$conn2->query($sql2);
    $usuario = $resultado->fetch_row();
}

?>
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
        <meta content="text/html; charset=UTF-8">
        <title>Gestión de colas</title>
        <link rel="stylesheet" href="/gestion-De-Colas/visualizacion/css/bootstrap.min.css">
        <script src="/gestion-De-Colas/visualizacion/js/jquery.min.js"></script>
        <script src="/gestion-De-Colas/visualizacion/js/index.js"></script>
        <script src="/gestion-De-Colas/visualizacion/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/gestion-De-Colas/visualizacion/css/starter-template.css">
        <link href="/gestion-De-Colas/visualizacion/css/switch.css" rel="stylesheet">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/gestion-De-Colas/visualizacion/css/style.css">
        <link id="tema" rel="stylesheet" href="/gestion-De-Colas/visualizacion/css/view-azul.css">
    </head>
    <body cz-shortcut-listen="true">
        <nav id="color-nav" class="navbar navbar-fixed-top navbar-dark bg-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="/gestion-De-Colas/visualizacion/index.php" class="navbar-brand"><?php echo $titulo?></a>
                    <a class="navbar-brand" href="/gestion-De-Colas/gestion/login.php">Iniciar sesión</a>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6" style="padding:2%">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6" style="padding:5px 10px;">
                                <h3 class="panel-title">Detalles cola</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row padding-detalle-cola">
                        <div class="col-md-12">
                            <h2><?php echo $cola[1];?></h2>
                        </div>
                    </div>
                    <div class="row padding-detalle-cola">
                        <div class="col-md-6">
                            <h5>Estado</h5>
                        </div>
                        <div class="col-md-6">
                            <h5><span class='label label-success'>En proceso</span></h5>
                        </div>
                    </div>
                    <div class="row padding-detalle-cola">
                        <div class="col-md-6">
                            <h5>Fecha Inicio</h5>
                        </div>
                        <div class="col-md-6">
                            <h5><?php echo $cola[3];?></h5>
                        </div>
                    </div>
                    <div class="row padding-detalle-cola">
                        <div class="col-md-6">
                            <h5>Fecha Fin</h5>
                        </div>
                        <div class="col-md-6">
                            <h5><?php echo $cola[2];?></h5>
                        </div>
                    </div>
                    <div class="row padding-detalle-cola-sin-borde">
                        <div class="col-md-6">
                            <h5>Moderador</h5>
                        </div>
                        <div class="col-md-6">
                            <h5><?php echo $usuario[1]." ".$usuario[2];?></h5>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <!--CAMBIAR AQUÍ PARA CAPTURAR VALOR ID COLA -->
                        <button type="button" onclick="capturarIdCola(<?php $id?>)" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#insertarUsuarioTemporal"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding:2%">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6" style="padding:5px 10px;">
                                <h3 class="panel-title">Usuarios en la cola</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="titulo-contenido-detalle-cola text-center">
                        <div class="col-md-6">
                            <label>Código</label>
                        </div>
                        <div class="col-md-6">
                            <label>Posición</label>
                        </div>
                    </div>
                    <div class="contenido-detalle-cola text-center">
                        <div class="col-md-6">
                            <label for="">#87PQ</label>
                        </div>
                        <div class="col-md-6">
                            <label>03</label>
                        </div>
                    </div>
                    <div class="contenido-detalle-cola text-center">
                        <div class="col-md-6">
                            <label>#87PQ</label>
                        </div>
                        <div class="col-md-6">
                            <label>02</label>
                        </div>
                    </div>
                    <div class="contenido-detalle-cola text-center">
                        <div class="col-md-6">
                            <label>#87PQ</label>
                        </div>
                        <div class="col-md-6">
                            <label>01</label>
                        </div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="col-md-12 text-center" style="padding-top:1%">
                    <p><?php echo $footer; ?></p>
                    <p><?php echo $descripcion; ?></p>
                </div>
            </div>
        </div>
        <!-- Ventana emergente nuevo -->

    <div class="modal fade" id="insertarUsuarioTemporal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel"><span class="fa fa-user"></span>Añadirse a la cola</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="display:none" id="valorCola"></div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreT" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidoT" name="apellidoT" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">DNI</label>
                            <input type="text" class="form-control" id="DNIT" name="DNIT" placeholder="DNI">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Clave</label>
                            <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave">
                        </div>
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" onclick="insertarUsuarioTemporal()">Guardar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>