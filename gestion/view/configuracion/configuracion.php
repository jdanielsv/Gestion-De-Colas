<?php   

$email= $_SESSION['email'];
$id=$_SESSION['id'];

$conn=conexion(); 
if ($conn->connect_error) { 
    die("Fallo en la conexión: " . $conn->connect_error); 
} else{ 
    $sql="SELECT * FROM indexpersonalizado"; 
    $result = $conn->query($sql); 
}

?>
  <script>
    window.onload = function() {
      cerrarInput();
    };   
  </script>
  <style>
      label{ 
          margin-bottom: 0px;
      }
  </style>
   <br>
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6" style="padding:5px 10px;">
                    <h3 class="panel-title">Configuración</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove" onclick="quitarVentana()"></i></a>
                </div>
            </div>
        </div>
        <h3 style="padding: 20px">Página principal</h3>
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="panel-body">
                <div class="form-group">
                   <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Título de la ventana Principal</label>
                       </div>
                       <div class="col-md-5">
                           <input type="email" class="form-control" id="tituloWebBackend" placeholder="Introduce el título de la web" value="<?php echo $row["titulo"]; ?>">
                       </div>
                       <div class="col-md-3" style="margin-bottom: -3%;">   
                            <label style="margin-top: -2%"><input type="checkbox" id="tituloWebBackendSwitch" onclick="cambiarTituloWeb()" class="ios-switch"  /><div><div></div></div></label>
                       </div>
                    </div>
                    <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Logotipo de la web</label>
                       </div>
                       <div class="col-md-5">
                           <input type="file" id="logoInput" class="form-control" value="<?php echo $row["logo"]; ?>">
                       </div>
                       <div class="col-md-3" style="margin-bottom: -3%;">   
                            <label style="margin-top: -2%"><input onclick="cambiarLogo()" id="logoInputSwitch" type="checkbox" class="ios-switch"  /><div><div></div></div></label>
                       </div>
                    </div>
                    <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Texto Footer</label>
                       </div>
                       <div class="col-md-5">
                           <input type="text" id="textoFooter" class="form-control" placeholder="Introduce el texto del footer" value="<?php echo $row["footer"];?>">
                       </div>
                       <div class="col-md-3" style="margin-bottom: -3%;">   
                            <label style="margin-top: -2%"><input id="textoFooterSwitch" onclick="cambiarTextoFooter()" type="checkbox" class="ios-switch"  /><div><div></div></div></label>
                       </div>
                     </div>
                     <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Cambiar Tema</label>
                       </div>
                       <div class="col-md-5">
                           <select value="<?php echo $row["temaBackend"]; ?>" class="form-control" name="" id="">
                              <option value="1">Azul</option>
                              <option value="1">Negro</option>
                              <option value="1">Rojo</option>
                              <option value="1">Rosa</option>
                           </select>
                       </div>
                     </div>
                     <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Descripción</label>
                       </div>
                       <div class="col-md-5">
                           <textarea class="form-control" id="descripcion" style="width: 100%" rows="5" placeholder="Introduce la descripción"><?php echo $row["descripcion"]; ?></textarea>
                       </div>
                       <div class="col-md-3" style="margin-bottom: -3%;">   
                            <label style="margin-top: -2%"><input id="descripcionSwitch" onclick="cambiarDecripcion()" type="checkbox" class="ios-switch"  /><div><div></div></div></label>
                       </div>
                     </div>
                </div>
        </div>               
        <div class="divider"></div>
        <h3 style="padding: 20px">Panel de administración</h3>
        <div class="panel-body">        
            <div class="form-group">
                   <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Título de la ventana Principal</label>
                       </div>
                       <div class="col-md-5">
                           <input id="tituloVentanaPrincipal" value="<?php echo $row["tituloBackend"]; ?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Introduce el título de la web">
                       </div>
                       <div class="col-md-3" style="margin-bottom: -3%;">   
                            <label style="margin-top: -2%"><input id="tituloVentanaPrincipalSwitch" onclick="cambiarTituloBackend()" type="checkbox" class="ios-switch"  /><div><div></div></div></label>
                       </div>
                    </div>
                     <div class="row margin-bottom-configuracion">
                       <div class="col-md-4">
                           <label class="alineacion-configuracion">Cambiar Tema</label>
                       </div>
                       <div class="col-md-5">
                           <select value="<?php echo $row["temaPrincipal"]; ?>" onchange="cambiarTema()" class="form-control" name="" id="tema-backend">
                              <option value="1">Azul</option>
                              <option value="2">Negro</option>
                              <option value="3">Rojo</option>
                              <option value="4">Rosa</option>
                           </select>
                       </div>
                     </div>
                </div>    
        </div>
        <?php } ?>
        <div class="panel-footer">
            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary text-right">Guardar</a>
        </div>
</div>
