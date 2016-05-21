<?php
$result2;

if($rol==='Admin'){
    $sql="SELECT * FROM cola"; 
    $sql2="SELECT idusuario,nombre,apellidos FROM usuario WHERE rol='Moderador'";
    $result2 = $conn->query($sql2);
}else
{
    $sql="SELECT * FROM cola where usuario_idusuario='".$id."'  "; 
}

$result = $conn->query($sql); 

?>
<h1 class="page-header">Listado de colas</h1>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                    </div>

                    <div class="col col-xs-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#nuevaCAdmin"><span class="fa fa-clock-o"></span> Nueva cola</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            <th><em class="fa fa-cog" ></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>Nombre</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Usuario</th>
                            <th>Codigo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while($row = $result->fetch_assoc()) { ?>
                        <tr class='marcadoC'>
                            <td align="center">
                                <?php 

                            echo "<a value=".$row["idcola"]." class='btn btn-success' onclick='capturarIdColaTemporal(".$row["idcola"].")' data-toggle='modal' data-target='#temporalesCola'><em class='fa fa-eye'></em></a>&nbsp;&nbsp;&nbsp;";
                            echo "<a value=".$row["idcola"]." class='btn btn-default' onclick='capturarDatosActualizarC(".$row["idcola"].")' data-toggle='modal' data-target='#actualizarCola'><em class='fa fa-pencil'></em></a>&nbsp;&nbsp;&nbsp;";
                            echo "<a value=".$row["idcola"]." class='btn btn-danger' data-toggle='modal' data-target='#borrarCola' onclick='capturarIdBorrarC(".$row["idcola"].")'><em class='fa fa-trash'></em></a>";
                                ?>
                            </td>
                            <td class="hidden-xs"><?php echo $row['idcola']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['fecha_fin']; ?></td>
                            <td><?php echo $row['fecha_inicio']; ?></td>
                            <td><?php echo $row['usuario_idusuario']; ?></td>
                            <td><?php echo $row['codigo_alta']; ?></td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>


<!-- Ventana emergente nueva cola -->

<div class="modal fade" id="nuevaCAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title " id="myModalLabel"><span class="fa fa-clock-o"></span> Nueva cola</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreA">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha inicio</label>
                        <div style="cursor:pointer" class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="fechaInicioA">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha fin</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="fechaFinA">
                            <div style="cursor:pointer" class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>

                    <?php if ($rol==='Admin') { ?>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Profesional:</label>
                        <select class="form-control" id="profesional">

                            <?php while($row2 = $result2->fetch_assoc()) { ?>
                            <option value="<?php echo $row2['idusuario'] ?>"><?php echo $row2['nombre']." ".$row2['apellidos'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="insertarCola()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Ventana emergente borrar -->

<div class="modal fade" id="borrarCola" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <em class="fa fa-exclamation-triangle"></em>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">

                        <div style="display:none" id="valorBorrarC"></div>
                        <h5>¿Está seguro de que desea eliminar la cola seleccionada?</h5>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="borrarCola()">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  

<!-- Actualizar -->

<div class="modal fade" id="actualizarCola" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-pencil"></span> Editar Cola</h4>
            </div>
            <div class="modal-body">
                <div style="display:none" id="idActualizarC"></div>
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreCo">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha inicio</label>
                        <div style="cursor:pointer" class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" id="fechaICo">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="datetimepicker1" class="input-append date">
                            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            </i>
                        </span>
                    </div>
                    </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Fecha fin</label>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" id="fechaFCo">
                        <div style="cursor:pointer" class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Código:</label>
                    <input type="text" class="form-control" id="codigoC">
                </div>
                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="actualizarCola()">Guardar</button>
        </div>
    </div>
</div>
</div>  
<!-- Ventana emergente mostarTemporales -->

<div class="modal fade" id="temporalesCola" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <em class="fa fa-exclamation-triangle"></em>
            </div>
            <div class="modal-body">
                <div style="display:none" id="valorTemporal"></div>
                <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            <th><em class="fa fa-cog" ></em></th>
                            <th class="hidden-xs">ID</th>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>ESTADO</th>
                            <th>CÓDIGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql3="SELECT idusuarioTemporales,DNI,nombreT,estado,codigo_cliente FROM usuariotemporales,cola_has_usuariotemporales where cola_idcola=10 AND usuarioTemporales_idusuarioTemporales=idusuarioTemporales"; 

                        $result3 = $conn->query($sql3); 
                        while($row3 = $result3->fetch_assoc()) { ?>
                        <tr class='marcadoC'>
                            <td></td>
                            <td class="hidden-xs"><?php echo $row3['idusuarioTemporales']; ?></td>
                            <td><?php echo $row3['DNI']; ?></td>
                            <td><?php echo $row3['nombreT']; ?></td>
                            <td><?php echo $row3['estado']; ?></td>
                            <td><?php echo $row3['codigo_cliente']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  
