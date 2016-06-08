
/* Función que cambia el tema del backend */

function cambiarTema(){
    var valor=$("#tema-backend option:selected").text();
    console.log(valor);
    if(valor=="Azul"){
        $("#tema").attr("href","css/backend-azul.css");
    }
    if(valor=="Negro"){
        $("#tema").attr("href","css/backend-negro.css");
    }
    if(valor=="Rojo"){
        $("#tema").attr("href","css/backend-rojo.css");
    }
    if(valor=="Rosa"){
        $("#tema").attr("href","css/backend-rosa.css");
    }
}

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
var colaT;
function capturarIdColaTemporal(valor){
    $("#valorTemporal").empty();
    $("#valorTemporal").append(valor);
    colaT=parseInt($('#valorTemporal').html());
    console.log(valor);
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/cola/colaActual.php",
        data: {
            'id': valor
        },
        success: function (msg) {
            $("#cuerpoConsulta").empty();
            $("#cuerpoConsulta").append(msg);
        },
        error: function (msg) {
            console.log(msg.statusText);
        }
    });
}
function colaTReturn()
{
    return colaT;
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
                window.location.href = "/gestion-De-Colas/gestion/";
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

/** Actualiza la cola **/

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

/* Crea una nueva cola en el backend */

function insertarCola(){
    var nombre=$("#nombreA").val();
    var fechaI=$("#fechaInicioA").val();
    var fechaF=$("#fechaFinA").val();    
    var date = new Date();
    var year = date.getFullYear();
    var profesional=$("#profesional").val();
    if(profesional==null)
        profesional="";
    var claveRand=nombre+year;
    jQuery.ajax({
        type: "POST",
        url: "/gestion-De-Colas/gestion/view/cola/colaInsertar.php",
        data: {
            'nombre':nombre,
            'fechaI': fechaI,
            'fechaF':fechaF,
            'claveRand':claveRand,
            'profesional':profesional
        },
        success: function (msg) {
            console.log(msg);
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
function quitarVentana(){
    $("#perfil").hide();
    $("#listausuarios").show();
    $("#usuariosMenu").addClass("active");
}

/* Cerrar input configuracion */

function cerrarInput(){
    if($("#tituloWebBackend").val()!=null){
        $("#tituloWebBackendSwitch").attr( 'checked', 'checked' );
        $('#tituloWebBackend').attr('disabled', 'disabled');
    }
    if($("#logoInput").val()!=null){
        $("#logoInputSwitch").attr( 'checked', 'checked' );
        $('#logoInput').attr('disabled', 'disabled');
    }
    if($("#textoFooter").val()!=null){
        $("#textoFooterSwitch").attr( 'checked', 'checked' );
        $('#textoFooter').attr('disabled', 'disabled');
    }
    if($("#descripcion").val()!=null){
        $("#descripcionSwitch").attr( 'checked', 'checked' );
        $('#descripcion').attr('disabled', 'disabled');
    }
    if($("#tituloVentanaPrincipal").val()!=null){
        $("#tituloVentanaPrincipalSwitch").attr( 'checked', 'checked' );
        $('#tituloVentanaPrincipal').attr('disabled', 'disabled');
    }
}

/* Desactivar la opcion de editar de los switch */

function cambiarTituloWeb(){
    $('#tituloWebBackend').removeAttr('disabled', 'disabled');
}
function cambiarLogo(){
    $('#logoInput').removeAttr('disabled', 'disabled');
}
function cambiarTextoFooter(){
    $('#textoFooter').removeAttr('disabled', 'disabled');
}
function cambiarDecripcion(){
    $('#descripcion').removeAttr('disabled', 'disabled');
}
function cambiarTituloBackend(){
    $('#tituloVentanaPrincipal').removeAttr('disabled', 'disabled');
}
