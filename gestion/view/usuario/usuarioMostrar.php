<?php 
    
    require('./conf/conexion.php'); 
    $conn=conexion(); 
    if ($conn->connect_error) { 
        die("Fallo en la conexión: " . $conn->connect_error); 
    } else{ 
        $sql="SELECT * FROM usuario"; 
        $result = $conn->query($sql); 
    }
    
?>
    <h1 class="page-header">Listado de usuarios</h1>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6"></div>
                        <div class="col col-xs-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#insertarUsuario"><span class="fa fa-user-plus"></span> Nuevo usuario</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                            <tr>
                                <th><em class="fa fa-cog"></em></th>
                                <th class="hidden-xs">ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = $result->fetch_assoc()) {
                                echo "<tr class='marcado'><td align='center'>";
                                echo "<a value=".$row["idusuario"]." class='btn btn-default' onclick='capturarDatosActualizar(".$row["idusuario"].")' data-toggle='modal' data-target='#actualizar'><em class='fa fa-pencil'></em></a>&nbsp;&nbsp;&nbsp;";
                                echo "<a value=".$row["idusuario"]." class='btn btn-danger' data-toggle='modal' data-target='#borrar' onclick='capturarIdBorrar(".$row["idusuario"].")'><em class='fa fa-trash'></em></a>";
                                echo "<td>".$row["idusuario"]."</td>";
                                echo "<td>".$row["nombre"]."</td>";
                                echo "<td>".$row["apellidos"]."</td>";
                                echo "<td>".$row["contrasenia"]."</td>";
                                echo "<td>".$row["rol"]."</td>";
                                echo "<td>".$row["email"]."</td></tr>";
                            }
                            
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        </tbody>
        </table>

    </div>
    </div>

    <!-- Ventana emergente nuevo -->

    <div class="modal fade" id="insertarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title " id="myModalLabel"><span class="fa fa-user"></span> Nuevo Usuario</h4>
                </div>
                <div class="modal-body">
                    <form action="./view/usuario/usuarioInsertar.php" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Rol</label>
                            <select class="form-control" id="rol" name="rol">
                                <option value="admin">Admin</option>
                                <option value="moderador">Moderador</option>
                            </select>

                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" onclick="insertarUsuario()">Guardar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
       
<!-- Ventana emergente borrar -->

    <div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <em class="fa fa-exclamation-triangle"></em>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <div style="display:none" id="valorBorrar"></div>
                            <h5>¿Está seguro de que desea eliminar al usuario seleccionado?</h5>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="borrarUsuario()" class="btn btn-primary">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>  
 
<!-- Actualizar -->

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