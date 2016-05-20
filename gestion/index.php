<!DOCTYPE html>

<html lang="es">
<?php 
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location: login.php');
    }
    
    ?>
<?php require(dirname(__FILE__) . '/view/header.php'); ?>
    <body cz-shortcut-listen="true">
        
        <?php require(dirname(__FILE__).'/view/menu.php'); ?>
        <?php require(dirname(__FILE__) . '/view/navegacionSuperior.php'); ?>
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
            <?php 
            if($rol=="Admin")
            {
                
            echo "<div style='display:none' id='listaCola''>";
            require(dirname(__FILE__) . '/view/cola/colaMostrar.php');
            echo "</div>";
            
                
            echo "<div id='listausuarios'>";
            require(dirname(__FILE__) . '/view/usuario/usuarioMostrar.php');
            echo "</div>";
                
            }
            else{
                
            echo "<div id='listaCola''>";
            require(dirname(__FILE__) . '/view/cola/colaMostrar.php');
            echo "</div>";
            
                
            echo "<div style='display:none' id='listausuarios'>";
            require(dirname(__FILE__) . '/view/usuario/usuarioMostrar.php');
            echo "</div>";
                
            }
            
            ?>
        </div>
    </body>
</html>