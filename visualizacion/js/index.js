function insertarUsuarioTemporal(){
    var id=$("#valorCola").html();
    var nombre=$("#nombreT").val();
    var apellidos=$("#apellidoT").val();
    var dni=$("#DNIT").val();    
    var clave=$("#clave").val();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/visualizacion/PHP/insertarUsuarioT.php",
        data: {
            'id':id,
            'nombre':nombre,
            'apellidos': apellidos,
            'dni':dni,
            'clave':clave
        },  
        success: function (msg) {
            console.log(msg);
            if(msg=="correcto"){
                window.alert("USUARIO AÑADIDO CON ÉXITO");
            }
           else{
                window.alert("CLAVE INCORRECTA");
            }
            
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}
function capturarIdCola(valor){
    
    $("#valorCola").empty();
    $("#valorCola").append(valor);
}

function cargarDepartamentos(){
    console.log("entro");
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/visualizacion/PHP/mostrarUsuarioCola.php",  
        success: function (msg) {
            $("#contenedorColas").empty();
            $("#contenedorColas").append(msg);
            //setInterval(cargarDepartamentos, 10000);
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}

/* Expandir las colas en el index */

function expandirColasIndex(){
    console.log("entrasasa");
    if($("#panelTodasColas").hasClass("col-md-8")){
        $("#panelTodasColas").removeClass("col-md-8");
        $("#panelTodasColas").addClass("col-md-12");
        $("#panelDepartamentos").removeClass("col-md-4");
        $("#panelDepartamentos").hide();
    }else{
        $("#panelTodasColas").removeClass("col-md-12");
        $("#panelTodasColas").addClass("col-md-8");
        $("#panelDepartamentos").addClass("col-md-4");
        $("#panelDepartamentos").show();
    }   
}

function enviarID(valor){
    var id=valor;
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/visualizacion/detalleCola.php",
        data: {
            'id':id
        },  
        success: function (msg) {
            document.write(msg);
            
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}