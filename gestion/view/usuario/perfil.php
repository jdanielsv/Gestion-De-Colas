<?php   

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
<h1 class="page-header">Perfil de configuracion del usuario</h1>

<div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $nombre.' '.$apellidos ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/default-user.png" class="img-circle img-responsive"> </div>

                    <div class=" col-md-9 col-lg-9 "> 
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Nombre:</td>
                                    <td><?php echo $nombre.' '.$apellidos ?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $email ?></td>
                                </tr>
                                <tr>
                                    <td>Rol:</td>
                                    <td><?php echo $rol; ?></td>                    
                                <tr>
                                    <td>Password:</td>
                                    <td><?php echo $contrasenia ?></td>
                            </tbody>
                        </table>

                        <a class="btn btn-primary" onclick="menuPrincipal('cola')">Mis colas</a>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                <span class="pull-right">
                    <?php echo "<a value=".$id." class='btn btn-default' onclick='capturarDatosActualizar(".$id.")' data-toggle='modal' data-target='#actualizar'><em class='fa fa-pencil'></em></a>&nbsp;&nbsp;&nbsp;";?>
                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                </span>
            </div>

        </div>
    

