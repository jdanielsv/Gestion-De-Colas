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