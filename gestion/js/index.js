
/* Menú principal */

function menuPrincipal(valor) {
    if (valor == "usuarios") {
        $("#listaCola").hide();
        $("#configuracion").hide();
        $("#perfil").hide();
        $("#acerca").hide();
        $("#colaMenu").removeClass("active");
        $("#configurarMenu").removeClass("active");
        $("#usuariosMenu").addClass("active");
        $("#listausuarios").show();
    }
    if (valor == "cola") {
        $("#listausuarios").hide();
        $("#configuracion").hide();
        $("#perfil").hide();
        $("#acerca").hide();
        $("#colaMenu").addClass("active");
        $("#configurarMenu").removeClass("active");
        $("#usuariosMenu").removeClass("active");
        $("#listaCola").show();
    }
    if (valor == "configuracion") {
        $("#listausuarios").hide();
        $("#listaCola").hide();
        $("#acerca").hide();
        $("#perfil").hide();
        $("#colaMenu").removeClass("active");
        $("#usuariosMenu").removeClass("active");
        $("#configurarMenu").addClass("active");
        $("#configuracion").show();
    }
    if(valor=="perfil"){
        $("#listausuarios").hide();
        $("#listaCola").hide();
        $("#configuracion").hide();
        $("#acerca").hide();
        $("#perfil").show();
    }
    if(valor=="acerca"){
        $("#listausuarios").hide();
        $("#listaCola").hide();
        $("#configuracion").hide();
        $("#perfil").hide();
        $("#acerca").show();
    }
}

function capturarIdBorrar(valor){
    $("#valorBorrar").empty();
    $("#valorBorrar").append(valor);
}

function borrarUsuario(){
    var borrar=$('#valorBorrar').html();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/usuario/usuarioBorrar.php",
        data: {
            'id': borrar
        },
        success: function (msg) {
            if(msg=="correcto"){
                window.location.href = "/gestion-De-Colas/gestion/";
            }
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}

function capturarDatosActualizar(valor){
    valores=new Array();
    $(".marcado td").each(function(index){
        valores.push($(this).text());
    });
    $("#idActualizar").empty();
    for(var i=0;i<valores.length;i++){
        if(valores[i]==valor){
            $("#idActualizar").append(valores[i]);
            $("#nombreActualizar").val(valores[i+1]);
            $("#apellidoActualizar").val(valores[i+2]);
            $("#passActualizar").val(valores[i+3]);
            //$("#rolActualizar").val(valores[i+4]);
            $("#correoActualizar").val(valores[i+5]);
        }
    }
}
function actualizarUsuario(){
    var id=$('#idActualizar').html();
    var nombre=$("#nombreActualizar").val();
    var apellido=$("#apellidoActualizar").val();
    var pass=$("#passActualizar").val();
    var rol=$("#rolActualizar").val();
    var correo=$("#correoActualizar").val();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/usuario/usuarioActualizar.php",
        data: {
            'id':id,
            'nombre': nombre,
            'apellido':apellido,
            'pass':pass,
            'rol':rol,
            'correo':correo
        },
        success: function (msg) {
            window.location.href = "/gestion-De-Colas/gestion/";
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}
