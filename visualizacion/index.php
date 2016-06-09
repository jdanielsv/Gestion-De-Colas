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
    if ($conn2->connect_error) { 
        die("Fallo en la conexión: " . $conn2->connect_error); 
    } else{ 
        $sql2="SELECT * FROM cola.cola;"; 
        $result2 = $conn2->query($sql2); 
    }
    
?>

<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php require(dirname(__FILE__) . '/header.php'); ?>
    <script>
        cargarDepartamentos();
    </script>
    <body cz-shortcut-listen="true">
        <nav id="color-nav" class="navbar navbar-fixed-top navbar-dark bg-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"></a>
                    <a class="navbar-brand" href="/gestion-De-Colas/gestion/login.php">Iniciar sesión</a>
                </div>
            </div>
        </nav>
        <div class="row" style="padding: 3%;padding-left: 5%;padding-bottom: 8%;">
                <div class="col-md-8" id="panelTodasColas">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6" style="padding:5px 10px;">
                                    <h3 id="idCola" name="" class="panel-title"></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                   <a onclick="expandirColasIndex()" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="titulo-contenido text-center" style="padding: 1%;">
                            <div class="col-md-6">
                                <label for="">Código</label>
                            </div>
                            <div class="col-md-6">
                                <label for="">Departamento</label>
                            </div>
                        </div>
                        <div id="contenedorColas"></div>
                        <div class="panel-footer"></div>
                    </div>  
                </div>
                <div class="col-md-4" id="panelDepartamentos">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6" style="padding:5px 10px;">
                                    <h3 id="idCola" name="" class="panel-title"></h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="titulo-contenido text-center">
                            <div class="col-md-12">
                                <label for="">Departamentos</label>
                            </div>
                        </div>
                        <?php while($row = $result2->fetch_assoc()) { ?>
                        <div class="contenido text-center">
                            <div class="col-md-4">
                                <label for=""><a value="<?php echo $row["idcola"]; ?>" href="/Gestion-De-Colas/visualizacion/detalleCola.php/" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></label>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $row["nombre"]; ?></label>
                            </div>
                        </div>
                        
                        <?php } ?>
                        
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