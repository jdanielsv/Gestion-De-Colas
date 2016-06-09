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
/** Metodo para controlar la fecha de la tabla y saber el estado en el que se encuentra actualmente **/

function controlarFecha($fechainicio,$fechaFin){
    
    $fecha_a_evaluar=date("Y-m-d");
    $fechaFINArray=explode('/', $fechaFin, 3);
    $fechaINICIOrray=explode('/', $fechainicio, 3);
    $dia=$fechaINICIOrray[0];
    $mes=$fechaINICIOrray[1];
    $anio=$fechaINICIOrray[2];
    $fechaINICIO1=$anio."-".$mes."-".$dia;
    $dia=$fechaFINArray[0];
    $mes=$fechaFINArray[1];
    $anio=$fechaFINArray[2];
    $fechaFIN1=$anio."-".$mes."-".$dia;
    
    
    if(dentroRango($fechaINICIO1, $fechaFIN1, $fecha_a_evaluar)) {
        return "<span class='label label-success'>En proceso</span>";
    } else {
        if($fechaINICIO1>$fecha_a_evaluar){
            return "<span class='label label-primary'>No empezado</span>";
        }else{
            return "<span class='label label-danger'>Finalizado</span>";
        }
    }
    
        
}
/* Funcion que devuelve si esta dentro del rango */
function dentroRango($start_date, $end_date, $evaluame) {
    $start_ts = strtotime($start_date);
    $end_ts = strtotime($end_date);
    $user_ts = strtotime($evaluame);
    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

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
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while($row = $result->fetch_assoc()) { ?>
                        <tr class='marcadoC'>
                            <td style="width:20%" align="center">
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
                             <td class="text-center"><?php echo controlarFecha($row['fecha_inicio'],$row['fecha_fin']); ?></td>
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
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' id="fechaInicioA" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>                     
                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha fin</label>
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' id="fechaFinA" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
                        <div class='input-group date' id='datetimepicker3'>
                            <input type='text' id="fechaICo" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Fecha fin</label>
                    <div class='input-group date' id='datetimepicker4'>
                        <input type='text' id="fechaFCo" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
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
    <div class="modal-dialog" style="width:645px" role="document">
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
                            <th class="hidden-xs">ID</th>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>ESTADO</th>
                            <th>CÓDIGO</th>
                            <th>POSICIÓN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoConsulta"></tbody>
                </table>
            </div>
            <div class="modal-footer">  
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>  

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
        $('#datetimepicker3').datetimepicker();
        $('#datetimepicker4').datetimepicker();
    });
</script>


