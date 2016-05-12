<!DOCTYPE html>

<html lang="es">

<!-- head -->
<?php require("./view/header.php"); ?>

<body cz-shortcut-listen="true">

    <!-- menu navegacion superior -->
    <?php require("./view/navegacionSuperior.php"); ?>
    
    <div class="container-fluid">
        <div class="row">
            
            <!--menuuu izquierda-->
            <?php require("./view/menu.php"); ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Panel principal</h1>

                <!-- Aqui se muestra contenido que cambia -->

                <div class="row">

                    <!--menuuu izquierda-->
                    

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
                                                    <tr>
                                                        <td align="center">
                                                            <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                                            <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                                        </td>
                                                        <td class="hidden-xs">1</td>
                                                        <td>David</td>
                                                        <td>Salas castro</td>
                                                        <td>pass</td>
                                                        <td>Admin</td>
                                                        <td>davidsalascastro@gmail.com</td>
                                                    </tr>
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

                        

                <!-- Fin contenido -->
                
            </div>
        </div>
    </div>
</body>

</html>