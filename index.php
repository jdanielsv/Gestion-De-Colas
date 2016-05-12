<!DOCTYPE html>

<html lang="es">

<!-- head -->
<?php require(dirname(__FILE__) . '/view/header.php'); ?>
    <body cz-shortcut-listen="true">
        <?php require(dirname(__FILE__) . '/view/navegacionSuperior.php'); ?>

            <div class="container-fluid">
                <div class="row">
                    <?php require(dirname(__FILE__).'/view/menu.php'); ?>
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <?php //require(dirname(__FILE__) . '/view/usuario/usuarioMostrar.php'); ?>
                            <?php require(dirname(__FILE__) . '/view/cola/colaMostrar.php'); ?>
                        </div>
                </div>
    </body>

</html>