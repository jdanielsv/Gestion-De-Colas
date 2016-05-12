<!DOCTYPE html>

<html lang="es">

<!-- head -->
<?php require(dirname(__FILE__) . '/view/header.php'); ?>
<<<<<<< HEAD

<body cz-shortcut-listen="true">

    <!-- menu navegacion superior -->
    <?php require("/view/navegacionSuperior.php"); ?>
    
    <div class="container-fluid">
        <div class="row">
            
            <!--menuuu izquierda-->
            <?php require("/view/menu.php"); ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">Panel principal</h1>

                <!-- Aqui se muestra contenido que cambia -->
=======
    <body cz-shortcut-listen="true">
        <?php require(dirname(__FILE__) . '/view/navegacionSuperior.php'); ?>
>>>>>>> origin/master

            <div class="container-fluid">
                <div class="row">
                    <?php require(dirname(__FILE__).'/view/menu.php'); ?>
                        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                            <?php require(dirname(__FILE__) . '/view/usuario/usuarioMostrar.php'); ?>
                            <?php //require(dirname(__FILE__) . '/view/cola/colaMostrar.php'); ?>
                        </div>
                </div>
    </body>

</html>