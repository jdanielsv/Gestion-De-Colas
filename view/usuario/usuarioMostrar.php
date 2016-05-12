<?php

require ('/conf/conexion.php');

$conn=conexion();

if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
} else{
    $sql="SELECT * FROM usuario";
    $result = $conn->query($sql);
}
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title">Listado usuario</h3>
                    </div>
                    <div class="col col-xs-6 text-right">
                        <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#myModal">Nuevo usuario</button>
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
    
                            echo "<tr><td align='center'>";
                            echo "<a class='btn btn-default'><em class='fa fa-pencil'></em></a>";
                            echo "<a class='btn btn-danger'><em class='fa fa-trash'></em></a>";
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
    <div class="panel-footer">
        <div class="row">
            <div class="col col-xs-4">Página 1 de 1
            </div>
            <div class="col col-xs-8">
                <ul class="pagination hidden-xs pull-right">
                    <li><a href="#">1</a></li>
                </ul>
                <ul class="pagination visible-xs pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</div>







<!-- Ventana emergente -->

<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Modal title</h4>
</div>
<div class="modal-body">
...
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>-->