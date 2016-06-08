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