<?php 
session_start();

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
<h1 class="page-header">Perfil de configuracion del usuario</h1>
<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

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

                        <a href="#" class="btn btn-primary">Mis colas</a>
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
    </div>
</div>
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-pencil"></span> Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <div style="display:none" id="idActualizar"></div>
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreActualizar">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidoActualizar">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" id="passActualizar">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Correo</label>
                        <input type="email" class="form-control" id="correoActualizar">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Rol</label>
                        <select class="form-control" id="rolActualizar">
                            <option>Admin</option>
                            <option>Moderador</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button onclick="actualizarUsuario()" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>  
