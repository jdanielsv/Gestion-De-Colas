<!DOCTYPE html>

<html lang="es">

<!-- head -->
<?php require(dirname(__FILE__) . '/view/header.php'); ?>

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

                <div class="row">

                    <!--menuuu izquierda-->
                    

                    <?php require("/view/usuario/usuarioMostrar.php"); ?>        

                    
                <!-- Fin contenido -->
                
            </div>
        </div>
    </div>
</body>

</html>