
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
function capturarIdBorrarC(valor){
    $("#valorBorrarC").empty();
    $("#valorBorrarC").append(valor);
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
function capturarDatosActualizarC(valor){
    valores=new Array();
    $(".marcadoC td").each(function(index){
        valores.push($(this).text());
    });
    $("#idActualizarC").empty();
    for(var i=0;i<valores.length;i++){
        if(valores[i]==valor){
            $("#idActualizarC").append(valores[i]);
            $("#nombreCo").val(valores[i+1]);
            $("#fechaICo").val(valores[i+2]);
            $("#fechaFCo").val(valores[i+3]);
            $("#codigoC").val(valores[i+5]);
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
function actualizarCola(){
   var id=$('#idActualizarC').html();
    
    var nombre=$("#nombreCo").val();
    var fechaI=$("#fechaICo").val();
    var fechaF=$("#fechaFCo").val();  
    
    var claveRand=$("#codigoC").val();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/cola/colaActualizar.php",
        data: {
            'idcola':id,
            'nombre': nombre,
            'fechaI':fechaI,
            'fechaF':fechaF,
            'claveRand':claveRand
        },
        success: function (msg) {
            window.location.href = "/gestion-De-Colas/gestion/";
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}
function insertarCola(){
    var nombre=$("#nombre").val();
    var fechaI=$("#fechaInicio").val();
    var fechaF=$("#fechaFin").val();    
    var date = new Date();
    var year = date.getFullYear();
    
    var claveRand=nombre+year;
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/cola/colaInsertar.php",
        data: {
            'nombre':nombre,
            'fechaI': fechaI,
            'fechaF':fechaF,
            'claveRand':claveRand
        },
        success: function (msg) {
            window.location.href = "/gestion-De-Colas/gestion/";
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}
function borrarCola(){
    var borrar=$('#valorBorrarC').html();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/cola/colaBorrar.php",
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
function login(){
    var email=$('#email').val();
    var password=$('#password').val();
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/usuario/login.php",
        data: {
            'email':email,
            'password':password
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

