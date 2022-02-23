var prodNew = "";
var countProd = 0;

var valEnv = false;
var valProd = false;
var valProv = false;

var reader = new FileReader();

function nextTab(id) {
    tab = parseFloat(id) + 1;
    $("#txtStepNow").val(tab);

    $("#step" + tab + "").addClass("active");
    $("#step" + id + "").removeClass("active");
    $("#headStep" + tab + "").addClass("active");
    $("#headStep" + id + "").removeClass("active");

    if (tab == 5) {
        $("#colTabs").removeClass("tabsEspacio");
    } else {
        $("#colTabs").addClass("tabsEspacio");
    }
}
function prevTab(id) {
    tab = parseFloat(id) - 1;
    $("#txtStepNow").val(tab);

    $("#step" + tab + "").addClass("active");
    $("#step" + id + "").removeClass("active");
    $("#headStep" + tab + "").addClass("active");
    $("#headStep" + id + "").removeClass("active");

    if (tab == 5) {
        $("#colTabs").removeClass("tabsEspacio");
    } else {
        $("#colTabs").addClass("tabsEspacio");
    }
}
function asignacion() {
    $("#txtCantidad").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });

    var mask = $("#selLada").val();
    if (mask == "(+ 66)" || mask == "(+ 84)" || mask == "(+ 1)" || mask == "(+ 52)" || mask == "(+ 91)") {
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
    } else if (mask == "(+ 81)" || mask == "(+ 82)" || mask == "(+ 86)") {
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
    }
}
function popValidacion() {
    $("#popProducto").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });

    $("#popCantidad").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });

    $("#popProducto").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popCantidad").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popProvCheck").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popProveedor").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popContacto").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popCorreo").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popDestino").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popEnvio").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
    $("#popIncoterm").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Este campo es obligatorio para seguir con el formulario.",
    });
}
function editProvedor() {

    if (dataLada == "(+ 66)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 84)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 1)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 52)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 82)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 81)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 91)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    } else if (dataLada == "(+ 86)") {
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        $("#txtTelefono").removeAttr("disabled");
        $("#txtTelefono").val(dataTelefono);
    }
}
function cardProd(id) {
    prodNew =
        '<div class="card" style="margin: 0px; box-shadow: none" id="dataCountProd' + id + '">' +
        '<div class="card-header py-1 px-2" data-card-widget="collapse" style="border-top: 1px solid rgba(0, 0, 0, 0.125)">' +
        '<label class="lbl-form p-0" id="dataProducto' +
        id +
        '"></label>' +
        '<div class="card-tools mt-0">' +
        '<a type="button" class="btn btn-tool" data-card-widget="collapse">' +
        '<i class="fas fa-minus"></i>' +
        "</a>" +
        '<a type="button" class="btn btn-tool" data-id="' + id + '" id="btnDelProd">' +
        '<i class="fas fa-times"></i>' +
        "</a>" +
        "</div>" +
        "</div>" +
        '<div class="card-body py-1 px-4" id="bodyProducto' +
        id +
        '" style="display: block;">' +
        '<div class="text-muted">' +
        '<p class="text-xs m-0">' +
        "<strong>Producto: </strong>" +
        '<span id="dataProdName' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0">' +
        "<strong>Cantidad: </strong>" +
        '<span id="dataCantidad' +
        id +
        '"></span>' +
        '<small id="dataUnidad' +
        id +
        '"></small>' +
        "</p>" +
        '<p class="text-xs m-0 hidden" id="dataRazon' +
        id +
        '">' +
        "<strong>Razon social:</strong>" +
        '<span id="dataRzSocial' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0 hidden" id="dataFiles' +
        id +
        '">' +
        "<strong>Media: </strong>" +
        '<a class="btn-imgen" id="dataImgProd' +
        id +
        '">' +
        '<i class="far fa-fw fa-image"></i>' +
        '<span id="dataProdImg' +
        id +
        '"></span>' +
        "</a>" +
        "</p>" +
        "</div>" +
        "</div>" +
        '<div class="card-body p-0 hidden" id="cardProveedor' +
        id +
        '">' +
        '<div class="card m-0 shadow-none" id="dataCardProv' +
        id +
        '">' +
        '<div class="card-header py-1 px-3 border-0 hidden" id="dataNoProv' +
        id +
        '">' +
        '<label class="lbl-form p-0 ">No exite proveedor agregado</label>' +
        "</div>" +
        '<div class="card-header py-1 px-3 border-0 hidden" data-card-widget="collapse" id="dataProveedor' +
        id +
        '">' +
        '<label class="lbl-form p-0">Proveedor</label>' +
        "</div>" +
        '<div class="card-body py-1 px-4" id="bodyProveedor' +
        id +
        '" style="display: block;">' +
        '<div class="text-muted">' +
        '<p class="text-xs m-0">' +
        "<strong>Proveedor: </strong>" +
        '<span id="dataProvName' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0">' +
        "<strong>Contacto: </strong>" +
        '<span id="dataContacto' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0">' +
        "<strong>Correo: </strong>" +
        '<span id="dataCorreo' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0 hidden" id="dataPhone' + id + '">' +
        "<strong>Teléfono:</strong>" +
        '<span id="dataLada' +
        id +
        '"></span>' +
        '<span id="datTelefono' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0 hidden" id="dataPage' + id + '">' +
        "<strong>Página: </strong>" +
        '<span id="dataPagin' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0 hidden" id="dataFactura' + id + '">' +
        "<strong>No.Factura </strong>" +
        '<span id="dataFolio' +
        id +
        '"></span><a href="" class="btn-imgen hidden" id="dataFolioFile' +
        id +
        '">' +
        '<i class="far fa-fw fa-image"></i>' +
        '<span id="dataFolioName' +
        id +
        '"></span>' +
        "</a>" +
        "</p>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="card-body p-0 hidden" id="cardEnvio' +
        id +
        '">' +
        '<div class="card m-0 shadow-none" id="dataCardEnv' +
        id +
        '">' +
        '<div class="card-header py-1 px-3 border-0" data-card-widget="collapse">' +
        '<label class="lbl-form p-0" id="dataEnvio' +
        id +
        '">Envio</label>' +
        "</div>" +
        '<div class="card-body py-1 px-4" id="bodyEnvio' +
        id +
        '"  style="display: block;">' +
        '<div class="text-muted">' +
        '<p class="text-xs m-0">' +
        "<strong>Destino: </strong>" +
        '<span id="dataDestino' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0">' +
        "<strong>Tipo envio:</strong>" +
        '<span id="dataTipoEnv' +
        id +
        '"></span>' +
        "</p>" +
        '<p class="text-xs m-0">' +
        "<strong>Intercom: </strong>" +
        '<span id="dataIntercom' +
        id +
        '"></span>' +
        "</p>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="card-body p-0 hidden" id="cardComentario' +
        id +
        '">' +
        '<div class="card m-0 shadow-none" id="dataCardComents' +
        id +
        '">' +
        '<div class="card-header py-1 px-3 border-0" data-card-widget="collapse">' +
        '<label class="lbl-form p-0" id="dataComentario' +
        id +
        '">Comentario</label>' +
        "</div>" +
        '<div class="card-body py-2 px-4" id="bodyComents' +
        id +
        '"  style="display: block;">' +
        '<div class="text-muted">' +
        '<p class="text-xs m-0">' +
        "<strong>Comentario: </strong>" +
        '<span id="dataComent' +
        id +
        '"></span>' +
        "</p>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>";

    $("#cardProductos").append(prodNew);
}
function validarProducto() {
    selUnidad = $("#selUnidad").val();
    txtProducto = $("#txtProducto").val();
    txtCantidad = $("#txtCantidad").val();

    if (txtProducto != "" && txtCantidad != "" && selUnidad != null) {
        valProd = true;
        $("#btnContinuar1").removeClass("visible");
    } else {
        valProd = false;
        $("#btnContinuar1").addClass("visible");
    }
}
function llenadoProducto(id) {
    cardProd(id);

    spFiles = $("#spFiles").html();
    selUnidad = $("#selUnidad").val();
    txtProducto = $("#txtProducto").val();
    txtCantidad = $("#txtCantidad").val();
    txtRazonSocial = $("#txtRazonSocial").val();

    $("#dataUnidad" + id + "").html(selUnidad);
    $("#dataProducto" + id + "").html(txtProducto);
    $("#dataProdName" + id + "").html(txtProducto);
    $("#dataCantidad" + id + "").html(txtCantidad);

    if (spFiles != "") {
        file = "Prod Img 1." + spFiles;
        $("#dataProdImg" + id + "").html(file);
        $("#dataFiles" + id + "").removeClass("hidden");
    }
    if (txtRazonSocial != "") {
        $("#dataRazon" + id + "").removeClass("hidden");
        $("#dataRzSocial" + id + "").html(txtRazonSocial);
    }
}
function editarProducto(id) {
    spFiles = $("#spFiles").html();
    selUnidad = $("#selUnidad").val();
    txtProducto = $("#txtProducto").val();
    txtCantidad = $("#txtCantidad").val();
    txtRazonSocial = $("#txtRazonSocial").val();

    $("#dataUnidad" + id + "").html(selUnidad);
    $("#dataProducto" + id + "").html(txtProducto);
    $("#dataProdName" + id + "").html(txtProducto);
    $("#dataCantidad" + id + "").html(txtCantidad);

    if (spFiles != "") {
        file = "Prod Img 1." + spFiles;
        $("#dataProdImg" + id + "").html(file);
        $("#dataFiles" + id + "").removeClass("hidden");
    }
    if (txtRazonSocial != "") {
        $("#dataRazon" + id + "").removeClass("hidden");
        $("#dataRzSocial" + id + "").html(txtRazonSocial);
    }
}
function validarProveedor() {;
    txtCorreo = $("#txtCorreo").val();
    txtContacto = $("#txtContacto").val();
    selProv = $("#selProv option:selected").text();

    if (selProv != "" && txtCorreo != "" && txtContacto != "") {
        valProv = true;
        $("#btnContinuar2").removeClass("visible");
    } else {
        valProv = false;
        $("#btnContinuar2").addClass("visible");
    }
}
function llenadoProveedor(id) {
    selLada = $("#selLada").val();
    spFolio = $("#spFolio").html();
    txtFolio = $("#txtFolio").val();
    txtPagina = $("#txtPagina").val();
    txtCorreo = $("#txtCorreo").val();
    txtContacto = $("#txtContacto").val();
    txtTelefono = $("#txtTelefono").val();
    selProv = $("#selProv option:selected").text();

    $("#dataCorreo"+ id +"").html(txtCorreo);
    $("#dataProvName"+ id +"").html(selProv);
    $("#dataNoProv" + id + "").addClass("hidden");
    $("#dataContacto" + id + "").html(txtContacto);
    $("#cardProveedor" + id + "").removeClass("hidden");
    $("#dataProveedor" + id + "").removeClass("hidden");
    $("#bodyProveedor" + id + "").css("display", "block");
    $("#dataCardProv" + id + "").removeClass("collapsed-card");

    if (txtTelefono != "") {
        $("#dataLada"+ id +"").html(selLada);
        $("#datTelefono"+ id +"").html(txtTelefono);
        $("#dataPhone" + id + "").removeClass("hidden");
    }
    if (txtPagina != "") {
        $("#dataPagin"+ id +"").html(txtPagina);
        $("#dataPage" + id + "").removeClass("hidden");
    }
    if (spFolio != "" || txtFolio != "") {
        $("#dataFolio"+ id +"").html(txtFolio);
        $("#dataFactura" + id + "").removeClass("hidden");
        if (spFolio != "") {
            $("#dataFolioName"+ id +"").html(spFolio);
            $("#dataFolioFile" + id + "").removeClass("hidden");
        }
    }
}
function validarEnvio() {;
    txtEnvio = $("#txtEnvio").val();
    txtDestino = $("#txtDestino").val();
    txtIcoterm = $("#txtIcoterm").val();

    if (txtEnvio != "" && txtDestino != "" && txtIcoterm != "") {
        valEnv = true;
        $("#btnContinuar3").removeClass("visible");
    } else {
        valEnv = false;
        $("#btnContinuar3").addClass("visible");
    }
}
function llenadoEnvio(id) {
    txtEnvio = $("#txtEnvio").val();
    txtDestino = $("#txtDestino").val();
    txtIcoterm = $("#txtIcoterm").val();

    $("#dataTipoEnv"+ id +"").html(txtEnvio);
    $("#dataDestino"+ id +"").html(txtDestino);
    $("#dataIntercom"+ id +"").html(txtIcoterm);
    $("#cardEnvio"+ id +"").removeClass("hidden");
}

$(document).ready(function () {
    jQuery.noConflict();
    asignacion();
    popValidacion();

    $("#selProv").select2({
            tags: true,
            allowClear: true,
            placeholder: "Proveedor",
    }).on("select2:select", function () {
        validarProveedor();
    }).on("select2:unselecting", function () {
        $(this).data("unselecting", true);
    }).on("select2:open", function (e) {
        $("input.select2-search__field").prop("placeholder", "Filtrar o agregar proveedor");
    }).on("select2:opening", function (e) {
        if ($(this).data("unselecting")) {
            $(this).removeData("unselecting");
            e.preventDefault();
            
            $("#selLada").val("");
            $("#spFolio").html("");
            $("#txtFolio").val("");
            $("#txtPagina").val("");
            $("#txtCorreo").val("");
            $("#txtContacto").val("");
            $("#txtTelefono").val("");
            $("#folioUp").addClass("hidden");
            $("#cancelFl").addClass("hidden");
            $("#fileFolio").removeClass("hidden");
            $("#txtTelefono").attr("disabled", true);
        }
    });

    $(document).on("click", "#btnMas", function (event) {
        event.preventDefault();
        $("#txtStepNow").val("1");

        $("#bodyProducto"+ countProd +"").css("display", "none");
        $("#dataCountProd"+ countProd +"").addClass("collapsed-card");
        
        $("#step1New").addClass("hidden");
        $("#step1More").removeClass("hidden");
        $("#step1ProgNew").addClass("hidden");
        $("#step1ProgMore").removeClass("hidden");

        $("#step1").addClass("active");
        $("#step5").removeClass("active");
        $("#headStep1").addClass("active");
        $("#headStep5").removeClass("active");

        $(".next.btnProd").addClass("visible");
        $(".back.btnProv").addClass("visible");
        $(".next.btnProv").addClass("visible");
        $(".next.btnComent").addClass("visible");
        $(".back.btnVerificar").addClass("visible");


        $("#btnContinuar1").html("Agregar");
        $("#btnContinuar2").html("Agregar");
        $("#btnContinuar3").html("Siguiente");

        if ($("#txtComentario").val() != "") {
            $("#btnContinuar4").html("Siguiente");
        }

        $("#btnContinuar1").addClass("btn-save-block addOrder visible");
        $("#btnContinuar2").addClass("btn-save-block visible");
        $("#btnContinuar1").removeClass("btn-update-block saveProd");
        $("#btnContinuar2").removeClass("btn-update-block");

        $("#spFiles").html("");
        $("#selUnidad").val(" ");
        $("#txtProducto").val("");
        $("#txtCantidad").val("");
        $("#txtRazonSocial").val("");
        $("#filesUp").addClass("hidden");
        $("#cancelEx").addClass("hidden");
        $("#fileClip").removeClass("hidden");

        $("#selLada").val("");
        $("#spFolio").html("");
        $("#txtFolio").val("");
        $("#txtPagina").val("");
        $("#txtCorreo").val("");
        $("#txtContacto").val("");
        $("#txtTelefono").val("");
        $("#folioUp").addClass("hidden");
        $("#cancelFl").addClass("hidden");
        $("#chkNoProv").prop("checked", false);
        $("#chkSiProv").prop("checked", false);
        $("#fileFolio").removeClass("hidden");
        $("#selProv").val("").trigger('change');
        $("#selProv").attr("disabled", true);
        $("#selLada").attr("disabled", true);
        $("#txtFolio").attr("disabled", true);
        $("#txtPagina").attr("disabled", true);
        $("#txtCorreo").attr("disabled", true);
        $("#txtContacto").attr("disabled", true);
        $("#txtTelefono").attr("disabled", true);
    });
    
    $(document).on("click", ".next-step", function (event) {
        event.preventDefault();
        id = $(this).data("id");
        nextTab(id);
    });

    $(document).on("click", ".prev-step", function (event) {
        event.preventDefault();
        id = $(this).data("id");
        prevTab(id);
    });

    $(document).on("click", "#btnEnviar", function (event) {
        event.preventDefault();
        $("#cardSendOrder").removeClass("hidden");
        $("#cardOrderItems").addClass("hidden");

        // Aqui va correo
        $.ajax({  
             type:"POST",  
             url:'Enviar.php',  
             data:null,    
        }); 
    });      


    $(document).on("click", "#btnDelProd", function (event) {
        event.preventDefault();
        countProd--;
        id = $(this).data("id");
        $("#dataCountProd"+ id +"").remove();

        if (countProd == 0) {
            $("#cardOrder").addClass("hidden");
            $("#cardInicio").removeClass("hidden");

            $("#txtEnvio").val("");
            $("#txtDestino").val("");
            $("#txtIcoterm").val("");
            $("#txtComentario").val("");

            $("#spFiles").html("");
            $("#selUnidad").val(" ");
            $("#txtProducto").val("");
            $("#txtCantidad").val("");
            $("#txtRazonSocial").val("");
            $("#filesUp").addClass("hidden");
            $("#cancelEx").addClass("hidden");
            $("#fileClip").removeClass("hidden");

            $("#selLada").val("");
            $("#spFolio").html("");
            $("#txtFolio").val("");
            $("#txtPagina").val("");
            $("#txtCorreo").val("");
            $("#txtContacto").val("");
            $("#txtTelefono").val("");
            $("#folioUp").addClass("hidden");
            $("#cancelFl").addClass("hidden");
            $("#chkNoProv").prop("checked", false);
            $("#chkSiProv").prop("checked", false);
            $("#fileFolio").removeClass("hidden");
            $("#selProv").val("").trigger('change');
            $("#selProv").attr("disabled", true);
            $("#selLada").attr("disabled", true);
            $("#txtFolio").attr("disabled", true);
            $("#txtPagina").attr("disabled", true);
            $("#txtCorreo").attr("disabled", true);
            $("#txtContacto").attr("disabled", true);
            $("#txtTelefono").attr("disabled", true);
        }
    });

    $(document).on("click", ".addOrder", function (event) {
        event.preventDefault();
        id = $(this).data("id");
        step = $("#txtStepNow").val();
        nextStep = parseFloat(step) + 1;

        if (id == 1) {
            validarProducto();
            if (valProd == true) {
                countProd++;
                nextTab(step);
                $("#txtStepNow").val(nextStep);

                llenadoProducto(countProd);
                $("#txtOrder").val(countProd);
                $("#step1").removeClass("active");
                $("#cardInicio").addClass("hidden");
                $("#btnContinuar1").html("Guardar");
                $("#cardOrder").removeClass("hidden");
                $("#headStep1").removeClass("active");
                $(".back.btnProv").removeClass("visible");
                $(".next.btnProd").removeClass("visible");
                $("#btnContinuar1").addClass("btn-update-block saveProd");
                $("#btnContinuar1").removeClass("btn-save-block addOrder");
            } else if (valProd == false) {
                Toast.fire({
                    icon: "warning",
                    title: "Llenar campos con * para continuar.",
                });
            }
        } else if (id == 2) {
            validarProveedor();
            if (valProv == true) {
                nextTab(step);
                $("#txtStepNow").val(nextStep);

                llenadoProveedor(countProd);
                $("#step2").removeClass("active");
                $("#btnContinuar2").html("Guardar");
                $("#headStep2").removeClass("active");
                $(".next.btnProv").removeClass("visible");
                $(".back.btnEnvio").removeClass("visible");
                $("#btnContinuar2").addClass("btn-update-block");
                $("#btnContinuar2").removeClass("btn-save-block");
            } else if (valProv == false) {
                Toast.fire({
                    icon: "warning",
                    title: "Llenar campos con * para continuar.",
                });
            }
        } else if (id == 3) {
            validarEnvio();
            if (valEnv == true) {
                nextTab(step);
                $("#txtStepNow").val(nextStep);


                llenadoEnvio(countProd);
                $("#step3").removeClass("active");
                $("#btnContinuar3").html("Guardar");
                $("#headStep3").removeClass("active");
                $(".next.btnEnvio").removeClass("visible");
                $(".back.btnComent").removeClass("visible");
                $("#btnContinuar3").addClass("btn-update-block");
                $("#btnContinuar3").removeClass("btn-save-block");
            } else {
                Toast.fire({
                    icon: "warning",
                    title: "Llenar campos con * para continuar.",
                });
            }
        } else if (id == 4) {
            nextTab(step);
            $("#txtStepNow").val(nextStep);
            txtComentario = $("#txtComentario").val();

            if (txtComentario != "") {
                $("#dataComent"+ countProd +"").html(txtComentario);
                $("#btnContinuar4").html("Guardar");
                $("#cardComentario"+ countProd +"").removeClass("hidden");
                $("#btnContinuar4").addClass("btn-update-block");
                $("#btnContinuar4").removeClass("btn-save-block");
            }

            $("#step4").removeClass("active");
            $("#headStep4").removeClass("active");
            $(".next.btnComent").removeClass("visible");
            $(".back.btnVerificar").removeClass("visible");
        }
    });

    $(document).on("click", "#cancelFl", function (event) {
        event.preventDefault();
        $("#spFolio").html("");
        $("#folioUp").addClass("hidden");
        $("#cancelFl").addClass("hidden");
        $("#fileFolio").removeClass("hidden");
    });

    $(document).on("click", "#cancelEx", function (event) {
        event.preventDefault();
        $("#spFiles").html("");
        $("#filesUp").addClass("hidden");
        $("#cancelEx").addClass("hidden");
        $("#fileClip").removeClass("hidden");
    });

    $(document).on("click", ".saveProd", function (event) {
        event.preventDefault();
        id = $(this).data("id");
        validarProducto();
        if (id == 1) {
            if (valProd == true) {
                idProd = countProd;
                stepNow = parseFloat($("#txtStepNow").val());
                step = stepNow - 1;
                nextTab(step);
                editarProducto(idProd);

                $(".next.btnProd").removeClass("visible");
                $(".back.btnProv").removeClass("visible");
            } else if (valProd == false) {
                Toast.fire({
                    icon: "warning",
                    title: "Llenar campos con * para continuar.",
                });
            }
        }
    });

    $(document).on("click", "#fileClip", function (event) {
        event.preventDefault();
        $("#inpFiles").trigger("click");
    });

    $(document).on("click", "#skipProv", function (event) {
        event.preventDefault();
        step = 2;
        nextStep = step + 1;
        idP = $("#txtOrder").val();

        $("#chkNoProv").attr("checked", true);
        $("#chkSiProv").prop("checked", false);

        $("#selLada").val("");
        $("#spFolio").html("");
        $("#txtFolio").val("");
        $("#txtPagina").val("");
        $("#txtCorreo").val("");
        $("#txtContacto").val("");
        $("#txtTelefono").val("");
        $("#dataFolio"+idP+"").html();
        $("#dataPagin"+idP+"").html();
        $("#dataCorreo"+idP+"").html();
        $("#datTelefono"+idP+"").html();
        $("#dataContacto"+idP+"").html();
        $("#dataProvName"+idP+"").html();

        $("#folioUp").addClass("hidden");
        $("#cancelFl").addClass("hidden");
        $("#fileFolio").removeClass("hidden");
        $("#selProv").val("").trigger('change');
        $("#dataPage"+idP+"").addClass("hidden");
        $("#dataPhone"+idP+"").addClass("hidden");
        $("#dataFactura"+idP+"").addClass("hidden");
        $("#dataProveedor"+idP+"").addClass("hidden");
        $("#dataNoProv"+idP+"").removeClass("hidden");
        $("#cardProveedor"+idP+"").removeClass("hidden");
        $("#bodyProveedor"+idP+"").css("display", "none");
        $("#dataCardProv"+idP+"").addClass("collapsed-card");

        $("#selProv").attr("disabled", true);
        $("#selLada").attr("disabled", true);
        $("#txtFolio").attr("disabled", true);
        $("#txtPagina").attr("disabled", true);
        $("#txtCorreo").attr("disabled", true);
        $("#txtContacto").attr("disabled", true);
        $("#txtTelefono").attr("disabled", true);
        $(".next.btnProv").removeClass("visible");
        $(".back.btnProv").removeClass("visible");
        $(".back.btnEnvio").removeClass("visible");

        nextTab(step);
        $("#txtStepNow").val(nextStep);
        $(".next.btnProv").removeClass("visible");
        $(".back.btnProv").removeClass("visible");
        $(".back.btnEnvio").removeClass("visible");
    });

    $(document).on("click", "#skipComent", function (event) {
        event.preventDefault();
        step = 4;
        nextStep = step + 1;
        idP = $("#txtOrder").val();

        nextTab(step);
        $("#txtStepNow").val(nextStep);
        $(".next.btnComent").removeClass("visible");
        $(".back.btnVerificar").removeClass("visible");
    });

    $(document).on("change", ".chkEnvio", function (event) {
        event.preventDefault();
        id = $(this).attr("id");

        if (id == "chkMaritimo") {
            $("#txtEnvio").val("Marítimo");
            $("#chkMaritimo").attr("checked", true);
            $("#chkAereo").prop("checked", false);
            
            validarEnvio();
        } else if (id == "chkAereo") {
            $("#txtEnvio").val("Áereo");
            $("#chkAereo").attr("checked", true);
            $("#chkMaritimo").prop("checked", false);
            
            validarEnvio();
        }
    });

    $(document).on("change", ".chkIncoterm", function (event) {
        event.preventDefault();
        id = $(this).attr("id");

        if (id == "chkFOB") {
            $("#txtIcoterm").val("FOB");
            $("#chkFOB").attr("checked", true);
            $("#chkCIF").prop("checked", false);
            $("#chkDDP").prop("checked", false);
            $("#chkExworks").prop("checked", false);
            
            validarEnvio();
        } else if (id == "chkCIF") {
            $("#txtIcoterm").val("CIF");
            $("#chkCIF").attr("checked", true);
            $("#chkFOB").prop("checked", false);
            $("#chkDDP").prop("checked", false);
            $("#chkExworks").prop("checked", false);
            
            validarEnvio();
        } else if (id == "chkDDP") {
            $("#txtIcoterm").val("DDP");
            $("#chkDDP").attr("checked", true);
            $("#chkFOB").prop("checked", false);
            $("#chkCIF").prop("checked", false);
            $("#chkExworks").prop("checked", false);
            
            validarEnvio();
        } else if (id == "chkExworks") {
            $("#txtIcoterm").val("Exworks");
            $("#chkFOB").prop("checked", false);
            $("#chkCIF").prop("checked", false);
            $("#chkDDP").prop("checked", false);
            $("#chkExworks").attr("checked", true);
            
            validarEnvio();
        }
    });

    $(document).on("change", "#inpFiles", function (event) {
        event.preventDefault();
        files = event.target.files;
        file = event.target.files[0];
        fExt = file.name.split(".").pop();
        fName = file.name.split(".").shift();

        $("#spFiles").html(fExt);
        $("#fileClip").addClass("hidden");
        $("#filesUp").removeClass("hidden");
        $("#cancelEx").removeClass("hidden");
    });

    $(document).on("change", "#selUnidad", function (event) {
        event.preventDefault();
        validarProducto();

        var selUdSel = $(this).children("option:selected").val();
        if (selUdSel == "0") {
            $("#selUnidad :selected").addClass("sel-disabled");
            $("#selUnidad").addClass("sel-disabled");
        } else if (selUdSel != "0") {
            $("#selUnidad :selected").removeClass("sel-disabled");
            $("#selUnidad").removeClass("sel-disabled");
        }
    });

    $(document).on("change", ".chkProv", function (event) {
        event.preventDefault();
        step = 2;
        nextStep = step + 1;
        id = $(this).attr("id");
        idP = $("#txtOrder").val();

        if (id == "chkSiProv") {
            $("#chkSiProv").attr("checked", true);
            $("#chkNoProv").prop("checked", false);

            $("#selProv").removeAttr("disabled");
            $("#selLada").removeAttr("disabled");
            $("#txtFolio").removeAttr("disabled");
            $("#txtPagina").removeAttr("disabled");
            $("#txtCorreo").removeAttr("disabled");
            $("#fileFolio").removeClass("disabled");
            $("#txtContacto").removeAttr("disabled");

            $("#dataNoProv" + idP + "").addClass("hidden");
        } else if (id == "chkNoProv") {
            $("#chkNoProv").attr("checked", true);
            $("#chkSiProv").prop("checked", false);

            $("#selLada").val("");
            $("#spFolio").html("");
            $("#txtFolio").val("");
            $("#txtPagina").val("");
            $("#txtCorreo").val("");
            $("#txtContacto").val("");
            $("#txtTelefono").val("");
            $("#dataFolio"+idP+"").html();
            $("#dataPagin"+idP+"").html();
            $("#dataCorreo"+idP+"").html();
            $("#datTelefono"+idP+"").html();
            $("#dataContacto"+idP+"").html();
            $("#dataProvName"+idP+"").html();

            $("#folioUp").addClass("hidden");
            $("#cancelFl").addClass("hidden");
            $("#fileFolio").removeClass("hidden");
            $("#selProv").val("").trigger('change');
            $("#dataPage"+idP+"").addClass("hidden");
            $("#dataPhone"+idP+"").addClass("hidden");
            $("#dataFactura"+idP+"").addClass("hidden");
            $("#dataProveedor"+idP+"").addClass("hidden");
            $("#dataNoProv" +idP+ "").removeClass("hidden");
            $("#cardProveedor"+idP+"").removeClass("hidden");
            $("#bodyProveedor"+idP+"").css("display", "none");
            $("#dataCardProv"+idP+"").addClass("collapsed-card");

            $("#selProv").attr("disabled", true);
            $("#selLada").attr("disabled", true);
            $("#txtFolio").attr("disabled", true);
            $("#txtPagina").attr("disabled", true);
            $("#txtCorreo").attr("disabled", true);
            $("#txtContacto").attr("disabled", true);
            $("#txtTelefono").attr("disabled", true);

            nextTab(step);
            $("#txtStepNow").val(nextStep);
            $(".next.btnProv").removeClass("visible");
            $(".back.btnProv").removeClass("visible");
            $(".back.btnEnvio").removeClass("visible");
        }
    });

    $(document).on("change", "#fileFolio", function (event) {
        event.preventDefault();
        files = event.target.files;
        file = event.target.files[0];

        $("#spFolio").html("No-Folio.pdf");
        $("#fileFolio").addClass("hidden");
        $("#folioUp").removeClass("hidden");
        $("#cancelFl").removeClass("hidden");
    });
    
    $(document).on("change", "#selProv", function (event) {
        event.preventDefault();
        val = $(this).val();

        if (val == "1") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });

            $("#txtContacto").val("Jack Xu");
            $("#txtTelefono").val("000 0000-0000");
            $("#selLada").val("(+ 86)").attr("selected");
            $("#txtCorreo").val("supplier1@supplier.com");

            validarProveedor();
        } else if (val == "2") {
            $("#txtContacto").val("Joyce Q");
            $("#txtCorreo").val("supplier2@supplier.com");

            validarProveedor();
        } else if (val == "3") {
            $("#txtContacto").val("Joanna Sue");
            $("#txtCorreo").val("supplier3@supplier.com");

            validarProveedor();
        } else if (val == "4") {
            $("#txtContacto").val("Sarah");
            $("#txtCorreo").val("supplier1@supplier.com");

            validarProveedor();
        } else if (val == "5") {
            $("#txtContacto").val("Carol");
            $("#txtCorreo").val("supplier2@supplier.com");
            
            validarProveedor();
        } else {
            validarProveedor();
        }
    });

    $(document).on("change", "#selLada", function (event) {
        if (this.value == "(+ 66)" || this.value == "(+ 84)" || this.value == "(+ 1)" || this.value == "(+ 52)" || this.value == "(+ 91)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        } else if (this.value == "(+ 81)" || this.value == "(+ 82)" || this.value == "(+ 86)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        }
    });

    $(document).on("input", "#txtDestino", function () {
        validarEnvio();
    });

    $(document).on("input", "#txtCorreo", function () {
        validarProveedor();
    });

    $(document).on("input", "#txtContacto", function () {
        validarProveedor();
    });

    $(document).on("input", "#txtProducto", function () {
        validarProducto();
    });

    $(document).on("input", "#txtCantidad", function () {
        validarProducto();
    });
});