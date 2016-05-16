<!DOCTYPE html>

<html lang="es">

<?php require(dirname(__FILE__) . '/view/header.php'); ?>
    <body cz-shortcut-listen="true">
        <?php require(dirname(__FILE__) . '/view/navegacionSuperior.php'); ?>
        <?php require(dirname(__FILE__).'/view/menu.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div style="display:none" id="acerca">
                <?php require(dirname(__FILE__) . '/view/usuario/acerca.php'); ?>
            </div>
            <div style="display:none" id="perfil">
                <?php require(dirname(__FILE__) . '/view/usuario/perfil.php'); ?>
            </div>
            <div style="display:none" id="configuracion">
                <?php require(dirname(__FILE__) . '/view/configuracion/configuracion.php'); ?>
            </div>
            <div style="display:none" id="listaCola">
                <?php require(dirname(__FILE__) . '/view/cola/colaMostrar.php'); ?>
            </div>
            <div id="listausuarios">
                <?php require(dirname(__FILE__) . '/view/usuario/usuarioMostrar.php'); ?>
            </div>
        </div>
    </body>
</html>