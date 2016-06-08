<?php 
function conexion(){
   return new mysqli("localhost", "root", "root", "cola");
}
    $conn=conexion(); 
    if ($conn->connect_error) { 
        die("Fallo en la conexión: " . $conn->connect_error); 
    } else{ 
        $sql="SELECT * FROM cola"; 
        $result = $conn->query($sql); 
    }
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
    }
    
?>


<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php require(dirname(__FILE__) . '/header.php'); ?>
    <body cz-shortcut-listen="true">
        <nav id="color-nav" class="navbar navbar-fixed-top navbar-dark bg-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"><?php echo $titulo; ?></a>
                    <a class="navbar-brand" href="/gestion-De-Colas/gestion/login.php">Iniciar sesión</a>
                </div>
            </div>
        </nav>
        <div class="row" style="padding: 3%;padding-left: 5%;padding-bottom: 8%;">
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6" style="padding:5px 10px;">
                                    <h3 id="idCola" name="" class="panel-title"></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                   <a href="/Gestion-De-Colas/visualizacion/detalleCola.php/" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="titulo-contenido text-center">
                            <div class="col-md-6">
                                <label for="">Código</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">Posición</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">03</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">02</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">01</label>
                            </div>
                            </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6" style="padding:5px 10px;">
                                    <h3 id="idCola" name="" class="panel-title"></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                   <a href="/Gestion-De-Colas/visualizacion/detalleCola.php/" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="titulo-contenido text-center">
                            <div class="col-md-6">
                                <label for="">Código</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">Posición</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">03</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">02</label>
                            </div>
                        </div>
                        <div class="contenido text-center">
                            <div class="col-md-6">
                                <label for="">#87PQ</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">01</label>
                            </div>
                        </div>
                        <div class="panel-footer"></div>
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
    </body>
</html>