var dd;
var mm;
var yyyy;
var date;
var dtfm;
var frmt;
var liID;
var tabID;
var tabText;
var valFecha;
var todayPrint;
var tabMobil = false;

var salida;
var llegada;
var porcenAr;

var precio = 0;
var cantidad = 0;
var totalProd = 0;

var iva = 0;
var dta = 0;
var otros = 0;
var arancel = 0;
var subtotal = 0;
var nacional = 0;
var totalneto = 0;
var mercancia = 0;
var logistica = 0;
var tipocambio = 0;
var honorarios = 0;
var inter_otros = 0;
var internacional = 0;
var despachoAduana = 0;
var valorMercancia = 0;

var countProd = 0;
var countImgs = 0;
var countImgUp = 0;
var cntAduana = false;

function winSize() {
    if (window.innerHeight <= 833) {
        tabMobil = true;
        tabText = $(".responsive-tabs > li a.active").html();
        $("#txtTabDrop").val(tabText);
        $("#tabActive").html(tabText);

        tabID = $("#txtTabDrop").val();
        $("#tab" + tabID + "")
            .parent()
            .removeClass("active");

        $("#liActive").removeClass("hidden");
        $("#liActive").addClass("active");
        $("#tabActive").addClass("active");
    }
    if (window.innerWidth >= 834) {
        tabMobil = false;
        tabText = $(".responsive-tabs > li a.active").html();
        $("#txtTabDrop").val(tabText);
        $("#tabActive").html(tabText);

        tabID = $("#txtTabDrop").val();
        $("#tab" + tabID + "")
            .parent()
            .addClass("active");
        $("#liActive").addClass("hidden");
        $("#liActive").removeClass("active");
        $("#tabActive").removeClass("active");

        $(".responsive-tabs").removeClass("open");
    }
}

function winRezise() {
    window.onresize = function() {
        winSize();
    };
}

function todaysDate() {
    today = new Date();
    dd = String(today.getDate()).padStart(2, "0");
    mm = String(today.getMonth() + 1).padStart(2, "0");
    yyyy = today.getFullYear();
    today = yyyy + "-" + mm + "-" + dd;
    todayPrint = dd + "-" + mm + "-" + yyyy;
}

function asignacion() {
    txtCambio = $("#txtCambio").val();
    tipocambio = txtCambio;

    $("#txtETD").inputmask("99/99/9999", { placeholder: "dd/mm/yyyy" });
    $("#txtETA").inputmask("99/99/9999", { placeholder: "dd/mm/yyyy" });

    $("#txtDTA").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtIVA").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtTotal").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtOtros").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtCambio").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtSubtotal").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtNacional").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtMercancia").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtLogistica").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtDespachoAd").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtInternacional").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });

    $("#txtPrecio").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtCantidad").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtProdTotal").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtTotalProd").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });

    $("#txtPrevio").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtTotalAgAd").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtManiobras").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtHonorarios").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtRevalidación").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtComplementarios").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });
    $("#txtDesconsolidación").inputmask({ alias: "currency", prefix: "$", rightAlign: true, allowMinus: false });

    $("#txtFraccAran").inputmask("99999999", { rightAlign: false, allowMinus: false, placeholder: "00000000" });

    $("#txtNoViaje").inputmask("9{*}", { rightAlign: false, allowMinus: false, placeholder: "0", alias: "numeric" });
}

$(document).ready(function() {
    jQuery.noConflict();
    winSize();
    winRezise();
    todaysDate();
    asignacion();

    console.log("Window Width: " + window.innerWidth + "class used: col");

    $("#popAran").popover({
        headers: false,
        trigger: "hover",
        placement: "top",
        content: "Esto es un impuesto general de importación variable dependiendo del producto. Se paga directamente a la aduana.",
    });

    $(document).on("click", ".img_01", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $(".img-carousel").parent().removeClass("active");
        $("#imgCarFirst_" + id + "").addClass("active");
    });

    $(document).on("click", ".img_02", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $(".img-carousel").parent().removeClass("active");
        $("#imgCarSecond_" + id + "").addClass("active");
    });

    $(document).on("click", ".img_03", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $(".img-carousel").parent().removeClass("active");
        $("#imgCarThird_" + id + "").addClass("active");
    });

    $(document).on("click", "#liActive", function(event) {
        event.preventDefault();

        $(".responsive-tabs").toggleClass("open");
    });

    $(document).on("click", ".btn-show", function(event) {
        event.preventDefault();

        var clase = $(".card-extend").attr("class");
        if (clase == "card card-extend collapsed-card expanding-card") {
            $("#extendText").html("Ver menos");
            $(".card-extend .card-tools").css("border-bottom", "1px solid #dee2e6");
        } else if (clase == "card card-extend collapsing-card") {
            $("#extendText").html("Ver más");
            $(".card-extend .card-tools").css("border-bottom", "0px");
        }
    });

    $(document).on("click", ".saveFile", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $("#saveFile" + id + "").addClass("hidden");
        $("#cancelEx" + id + "").addClass("hidden");
        $("#docsName" + id + "").addClass("hidden");
        $("#docsFile" + id + "").removeClass("hidden");
        $("#trashCan" + id + "").removeClass("hidden");
    });

    $(document).on("click", ".cancelEx", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $(".nameFile" + id + "").html("");

        $("#fileClip" + id + "").removeClass("hidden");
        $("#saveFile" + id + "").addClass("hidden");
        $("#cancelEx" + id + "").addClass("hidden");
        $("#docsName" + id + "").removeClass("hidden");
        $("#docsFile" + id + "").addClass("hidden");
        $("#trashCan" + id + "").addClass("hidden");
    });

    $(document).on("click", ".trashCan", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $(".nameFile" + id + "").html("");

        $("#fileClip" + id + "").removeClass("hidden");
        $("#saveFile" + id + "").addClass("hidden");
        $("#cancelEx" + id + "").addClass("hidden");
        $("#docsName" + id + "").removeClass("hidden");
        $("#docsFile" + id + "").addClass("hidden");
        $("#trashCan" + id + "").addClass("hidden");
    });

    $(document).on("click", ".docsFile", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        nameFile = $("#docsName" + id + "").html();

        $("#modalDocs").modal();
        $("#titleModalDoc").html(nameFile);
    });

    $(document).on("click", "#upFiles", function(event) {
        event.preventDefault();
        id = countImgs;
        countImgUp++;

        $(".actions").html("Producto imagenes");
        $(".mediaStock" + id + "").removeClass("hidden");

        if (countImgs == 3) {
            $("#upFiles").addClass("hidden");
            $("#cancelEx").addClass("hidden");
            $("#fileClip").addClass("hidden");
            $(".actions").addClass("disabled");
            $(".actions").html("Máximo 3 archivos, eliminar para cambiar");
        } else {
            $("#upFiles").addClass("hidden");
            $("#cancelEx").addClass("hidden");
            $("#fileClip").removeClass("hidden");
        }
    });

    $(document).on("click", "#cancelEx", function(event) {
        event.preventDefault();
        id = countImgs;
        countImgs--;

        if (countImgs == 0) {
            $(".mediaStock").addClass("hidden");
            $(".actions").html("Producto imagenes");
            $(".actions").removeClass("disabled");
            $(".actions").html("Producto imagenes");
        }

        $("#imgProdName" + id + "").html("");
        $(".mediaStock" + id + "").addClass("hidden");

        $("#upFiles").addClass("hidden");
        $("#cancelEx").addClass("hidden");
        $("#fileClip").removeClass("hidden");
    });

    $(document).on("click", ".del-prod", function(event) {
        event.preventDefault();
        id = $(this).data("id");
        countImgs--;

        $("#imgProdName" + id + "").html("");
        $(".mediaStock" + id + "").addClass("hidden");

        if (countImgs == 0) {
            $(".mediaStock").addClass("hidden");
        }

        $("#upFiles").removeClass("hidden");
        $(".actions").removeClass("disabled");
        $(".actions").html("Producto imagenes");
    });

    $(document).on("click", ".imgProd", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $("#modalImgProd").modal();

        if (countImgUp == 1) {
            $("#minis").addClass("hidden");
            $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_02-1.jpg");
        } else {
            if (countImgUp == 2) {
                $("#imgProdMin1").removeClass("hidden");
                $("#imgProdMin2").removeClass("hidden");
                $("#imgProdMin3").addClass("hidden");
            } else if (countImgUp == 3) {
                $("#imgProdMin1").removeClass("hidden");
                $("#imgProdMin2").removeClass("hidden");
                $("#imgProdMin3").removeClass("hidden");
            }
            $("#minis").removeClass("hidden");
            $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_03-1.png");
        }
    });

    $(document).on("click", ".imgProd", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        $("#modalImgProd").modal();

        if (countImgUp == 1) {
            $("#minis").addClass("hidden");
            $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_02-1.jpg");
        } else {
            if (countImgUp == 2) {
                $("#imgProdMin1").removeClass("hidden");
                $("#imgProdMin2").removeClass("hidden");
                $("#imgProdMin3").addClass("hidden");
            } else if (countImgUp == 3) {
                $("#imgProdMin1").removeClass("hidden");
                $("#imgProdMin2").removeClass("hidden");
                $("#imgProdMin3").removeClass("hidden");
            }
            $("#minis").removeClass("hidden");
            $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_03-1.png");
        }
    });

    $(document).on("click", ".carousel-inner", function(event) {
        event.preventDefault();

        $("#modalImgProd").modal();
        $("#minis").removeClass("hidden");
        $("#imgProdMin1").removeClass("hidden");
        $("#imgProdMin2").removeClass("hidden");
        $("#imgProdMin3").removeClass("hidden");
        $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_03-1.png");
    });

    $(document).on("click", ".img-single", function(event) {
        event.preventDefault();

        $("#modalImgProd").modal();
        $("#minis").addClass("hidden");
        $("#imgProdMin1").addClass("hidden");
        $("#imgProdMin2").addClass("hidden");
        $("#imgProdMin3").addClass("hidden");
        $("#imgZoom").attr("src", "/resources/proyecto/productos/producto_02-1.jpg");
    });

    $(document).on("click", ".imgProdMin", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        src = $("#img_" + id + "").attr("src");
        $("#imgZoom").attr("src", src);
    });

    $(document).on("click", "#tabProductos", function(event) {
        event.preventDefault();
        $("#txtTabDrop").val("Productos");
        $("#tabActive").html("Productos");

        if (tabMobil == true) {
            $("#liActive").addClass("active");
            $("#tabActive").addClass("active");
            $("#liActive").removeClass("hidden");
            $(this).parent().removeClass("active");
            $(".responsive-tabs").toggleClass("open");
        } else if (tabMobil == false) {
            $("#liActive").removeClass("active");
            $("#tabActive").removeClass("active");
            $("#liActive").addClass("hidden");
            $(this).parent().addClass("active");
            $(".responsive-tabs").removeClass("open");
        }

        $(this).addClass("active");
        $("#tabDocumentos").removeClass("active");
        $("#tabDocumentos").parent().removeClass("active");
        $("#tabCotizacion").removeClass("active");
        $("#tabCotizacion").parent().removeClass("active");
        $("#tabChecklist").removeClass("active");
        $("#tabChecklist").parent().removeClass("active");
    });

    $(document).on("click", "#tabDocumentos", function(event) {
        event.preventDefault();
        $("#txtTabDrop").val("Documentos");
        $("#tabActive").html("Documentos");

        if (tabMobil == true) {
            $("#liActive").addClass("active");
            $("#tabActive").addClass("active");
            $("#liActive").removeClass("hidden");
            $(this).parent().removeClass("active");
            $(".responsive-tabs").toggleClass("open");
        } else if (tabMobil == false) {
            $("#liActive").removeClass("active");
            $("#tabActive").removeClass("active");
            $("#liActive").addClass("hidden");
            $(this).parent().addClass("active");
            $(".responsive-tabs").removeClass("open");
        }

        $(this).addClass("active");
        $("#tabProductos").removeClass("active");
        $("#tabProductos").parent().removeClass("active");
        $("#tabCotizacion").removeClass("active");
        $("#tabCotizacion").parent().removeClass("active");
        $("#tabChecklist").removeClass("active");
        $("#tabChecklist").parent().removeClass("active");
    });

    $(document).on("click", "#tabCotizacion", function(event) {
        event.preventDefault();
        $("#txtTabDrop").val("Cotizacion");
        $("#tabActive").html("Cotizacion");

        if (tabMobil == true) {
            $("#liActive").addClass("active");
            $("#tabActive").addClass("active");
            $("#liActive").removeClass("hidden");
            $(this).parent().removeClass("active");
            $(".responsive-tabs").toggleClass("open");
        } else if (tabMobil == false) {
            $("#liActive").removeClass("active");
            $("#tabActive").removeClass("active");
            $("#liActive").addClass("hidden");
            $(this).parent().addClass("active");
            $(".responsive-tabs").removeClass("open");
        }

        $(this).addClass("active");
        $("#tabProductos").removeClass("active");
        $("#tabProductos").parent().removeClass("active");
        $("#tabDocumentos").removeClass("active");
        $("#tabDocumentos").parent().removeClass("active");
        $("#tabChecklist").removeClass("active");
        $("#tabChecklist").parent().removeClass("active");
    });

    $(document).on("click", "#tabChecklist", function(event) {
        event.preventDefault();
        $("#txtTabDrop").val("Checklist");
        $("#tabActive").html("Checklist");

        if (tabMobil == true) {
            $("#liActive").addClass("active");
            $("#tabActive").addClass("active");
            $("#liActive").removeClass("hidden");
            $(this).parent().removeClass("active");
            $(".responsive-tabs").toggleClass("open");
        } else if (tabMobil == false) {
            $("#liActive").removeClass("active");
            $("#tabActive").removeClass("active");
            $("#liActive").addClass("hidden");
            $(this).parent().addClass("active");
            $(".responsive-tabs").removeClass("open");
        }

        $(this).addClass("active");
        $("#tabProductos").removeClass("active");
        $("#tabProductos").parent().removeClass("active");
        $("#tabDocumentos").removeClass("active");
        $("#tabDocumentos").parent().removeClass("active");
        $("#tabCotizacion").removeClass("active");
        $("#tabCotizacion").parent().removeClass("active");
    });

    $(document).on("click", ".editProyecto", function(event) {
        event.preventDefault();
        pyFolio = $("#dataFolio").html();
        pyNombre = $("#dataProyecto").html();

        $("#modalProyecto").modal();
        $("#titleModalP").html(pyFolio + "_" + pyNombre);

        asesor = $("#dataAsesor").html();
        estatus = $("#dataStatus").html();
        cliente = $("#dataCliente").html();

        $("#txtCliente").val(cliente);
        $("#selEstatus option").each(function() {
            if ($(this).val() != estatus) {
                $(this).removeAttr("selected");
            } else if ($(this).val() == estatus) {
                $(this).attr("selected", "true");
            }
        });
        $("#selAsesor option").each(function() {
            if ($(this).val() != asesor) {
                $(this).removeAttr("selected");
            } else if ($(this).val() == asesor) {
                $(this).attr("selected", "true");
            }
        });
    });

    $(document).on("click", ".saveProyecto", function(event) {
        event.preventDefault();

        asesor = $("#selAsesor").val();
        estatus = $("#selEstatus").val();
        cliente = $("#txtCliente").val();

        $("#dataAsesor").html(cliente);
        $("#dataStatus").html(estatus);
        $("#dataCliente").html(cliente);

        $("#modalProyecto").modal("hide");
    });

    $(document).on("click", ".editProyect", function(event) {
        event.preventDefault();
        pyFolio = $("#dataFolio").html();
        pyNombre = $("#dataProyecto").html();

        $("#modalProyect").modal();
        $("#titleModal").html(pyFolio + "_" + pyNombre);

        etd = $("#dataETD").html();
        eta = $("#dataETA").html();
        viaje = $("#dataViaje").html();
        buque = $("#dataBuque").html();
        arancel = $("#dataFracc").html();
        contenedor = $("#dataContenedor").html();
        resticciones = $("#dataRestigciones").html();

        etdfm = etd.split("/");
        fmetd = etdfm[2].trim() + "-" + etdfm[1].trim() + "-" + etdfm[0].trim();
        etafm = eta.split("/");
        fmeta = etafm[2].trim() + "-" + etafm[1].trim() + "-" + etafm[0].trim();

        $("#txtETD").val(fmetd);
        $("#txtETA").val(fmeta);
        $("#txtBuque").val(buque);
        $("#txtNoViaje").val(viaje);
        $("#txtFraccAran").val(arancel);
        $("#txtContenedor").val(contenedor);
        $("#txtRestricciones").val(resticciones);
    });

    $(document).on("click", ".saveProyect", function(event) {
        event.preventDefault();

        etd = $("#txtETD").val();
        eta = $("#txtETA").val();
        buque = $("#txtBuque").val();
        viaje = $("#txtNoViaje").val();
        arancel = $("#txtFraccAran").val();
        contenedor = $("#txtContenedor").val();
        resticciones = $("#txtRestricciones").val();

        etdfm = etd.split("-");
        fmetd = etdfm[2].trim() + "/" + etdfm[1].trim() + "/" + etdfm[0].trim();
        etafm = eta.split("-");
        fmeta = etafm[2].trim() + "/" + etafm[1].trim() + "/" + etafm[0].trim();

        $("#dataETD").html(fmetd);
        $("#dataETA").html(fmeta);
        $("#dataBuque").html(buque);
        $("#dataViaje").html(viaje);
        $("#dataFracc").html(arancel);
        $("#dataContenedor").html(contenedor);
        $("#dataRestigciones").html(resticciones);

        $("#modalProyect").modal("hide");
    });

    $(document).on("click", ".newProd", function(event) {
        event.preventDefault();

        $("#modalProductos").modal();
    });

    $(document).on("click", ".editProducto", function(event) {
        event.preventDefault();
        id = $(this).data("id");
        nameID = "#nameProducto" + id;
        agencia = $(nameID).html();
        $("#txtProd").html(agencia);

        $("#mdFootP").addClass("d-flex justify-content-between");
        $(".saveProducto").removeClass("hidden");
    });

    $(document).on("click", ".saveProducto", function(event) {
        event.preventDefault();
        countProd++;
        id = countProd;

        txtProd = $("#txtProd").html();
        selUnidad = $("#selUnidad").val();
        txtEspecf = $("#txtEspecf").val();
        dataPrecio = $("#txtPrecio").val();
        dataCantidad = $("#txtCantidad").val();
        dataProdTotal = $("#txtProdTotal").val();
        txtCantidad = $("#txtCantidad").val().split("$").pop();
        txtProdTotal = $("#txtProdTotal").val().split("$").pop();

        Cantidad = parseFloat(txtCantidad.replace(/,/g, ""));
        ProdTotal = parseFloat(txtProdTotal.replace(/,/g, ""));

        mltMercancia = ProdTotal * tipocambio;
        fixMercancia = mltMercancia.toFixed(2);
        fltMercancia = parseFloat(fixMercancia);
        mltMercTotal = fltMercancia * Cantidad;
        fixMercTotal = mltMercTotal.toFixed(2);
        fltMercTotal = parseFloat(fixMercTotal);
        mercancia = fltMercTotal;

        if (countProd == 1) {
            mltValorMercancia = mercancia * Cantidad;
            valorMercancia = mercancia;
        } else {
            sumValorMercancia = valorMercancia + mercancia;
            valorMercancia = sumValorMercancia;
        }

        if (selUnidad == "") {
            selUnidad = "pzas.";
        }

        var esp;
        if (txtEspecf == "") {
            esp = "";
        } else {
            esp = '<p class="text-dt">' + "<strong>Especificaciones: </strong>" + "<span>" + txtEspecf + "</span>" + "</p>";
        }

        var media;
        if (countImgUp == 0) {
            media = "";
        } else if (countImgUp == 1) {
            media =
                '<div class="mb-0">' +
                '<strong class="text-muted">Media: </strong>' +
                '<ul class="list-unstyled mb-0">' +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_1.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_02-1.png</span>' +
                "</a>" +
                "</li>" +
                "</ul>" +
                "</div>";
        } else if (countImgUp == 2) {
            media =
                '<div class="mb-0">' +
                '<strong class="text-muted">Media: </strong>' +
                '<ul class="list-unstyled mb-0">' +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_1.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_03-1.png</span>' +
                "</a>" +
                "</li>" +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_2.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_03-2.png</span>' +
                "</a>" +
                "</li>" +
                "</ul>" +
                "</div>";
        } else if (countImgUp == 3) {
            media =
                '<div class="mb-0">' +
                '<strong class="text-muted">Media: </strong>' +
                '<ul class="list-unstyled mb-0">' +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_1.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_03-1.png</span>' +
                "</a>" +
                "</li>" +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_2.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_03-2.png</span>' +
                "</a>" +
                "</li>" +
                '<li class="lstMedia">' +
                '<a href="" class="btn-link text-secondary imgProd" data-id="countImgUp">' +
                '<i class="far fa-fw fa-image"></i>' +
                '<span class="imgProd dataNameImg' +
                countImgUp +
                '" data-id="countImgUp"> Prod imag_3.png</span>' +
                '<span class="dataURLImg' +
                countImgUp +
                ' hidden">/resources/proyecto/productos/producto_03-3.png</span>' +
                "</a>" +
                "</li>" +
                "</ul>" +
                "</div>";
        }

        var prod =
            '<div class="lists-cont">' +
            '<div class="card card-element collapsed-card"  style="display: block;">' +
            '<div class="card-header" data-card-widget="collapse">' +
            '<label class="card-title mr-auto dataProd">txtProd</label>' +
            '<div class="card-btns ml-auto">' +
            '<a type="button" class="btn-min" data-card-widget="collapse">' +
            '<i class="fas fa-plus"></i>' +
            "</a>" +
            '<a type="button" class="btn-del trashCan" data-id="' +
            id +
            '" data-card-widget="remove">' +
            '<i class="fas fa-times"></i>' +
            "</a>" +
            "</div>" +
            "</div>" +
            '<div class="card-body" style="display: none">' +
            '<span class="element-title">' +
            '<span class="mr-auto">Total neto</span>' +
            '<span class="ml-auto d-block">' +
            '<span id="dataProdTotal' +
            id +
            '" class="dataProdTotal">' +
            dataProdTotal +
            "</span>" +
            '<small class="s-sm"> (USD)</small>' +
            "</span>" +
            "</span>" +
            '<div class="element-cont">' +
            '<div class="text-muted">' +
            '<p class="text-dt">' +
            "<strong>Prec.Unit.: </strong>" +
            "<span>" +
            dataPrecio +
            "</span>" +
            '<small class="s-sm"> (USD)</small>' +
            "</p>" +
            '<p class="text-dt">' +
            "<strong>Prec.Unit.: </strong>" +
            "<span>" +
            dataCantidad +
            "</span>" +
            "<small>" +
            selUnidad +
            "</small>" +
            "</p>" +
            esp +
            "</div>" +
            media +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>";

        $("#byProductos").append(prod);
        $("#byProductos").css("display", "block");

        $("#modalProductos").modal("hide");
        $("#cardProductos").removeClass("direct-chat-contacts-open");

        $("#selUnidad").val("");
        $("#txtEspecf").val("");
        $("#txtPrecio").val("");
        $("#txtCantidad").val("");
        $("#txtProdTotal").val("");

        countImgs = 0;
        $("#imgProdName1").html("");
        $("#imgProdName2").html("");
        $("#imgProdName3").html("");
        $("#upFiles").addClass("hidden");
        $("#cancelEx").addClass("hidden");
        $(".mediaStock").addClass("hidden");
        $(".mediaStock1").addClass("hidden");
        $(".mediaStock2").addClass("hidden");
        $(".mediaStock3").addClass("hidden");
        $("#fileClip").removeClass("hidden");
        $(".actions").html("Producto imagenes");

        if ((valorMercancia = 0 || valorMercancia <= 25000)) {
            mtlHonorarios = valorMercancia * 0.08;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 25001 || valorMercancia <= 50000) {
            mtlHonorarios = valorMercancia * 0.07;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 50001 || valorMercancia <= 100000) {
            mtlHonorarios = valorMercancia * 0.065;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 100001 || valorMercancia <= 200000) {
            mtlHonorarios = valorMercancia * 0.055;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 200001 || valorMercancia <= 300000) {
            mtlHonorarios = valorMercancia * 0.05;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 300001 || valorMercancia <= 500000) {
            mtlHonorarios = valorMercancia * 0.045;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        } else if (valorMercancia >= 500001) {
            mtlHonorarios = valorMercancia * 0.04;
            fixHonorarios = mtlHonorarios.toFixed(2);
            ftlHonorarios = parseFloat(fixHonorarios);
            honorarios = ftlHonorarios;

            stgHonorarios = String(fixHonorarios);
            $("#txtHonorarios").val(stgHonorarios);
            $("#dataHonorarios").html(stgHonorarios);
        }

        sumDTA = logistica + valorMercancia;
        mltDTA = sumDTA * 0.008;
        fixDTA = mltDTA.toFixed(2);
        fltDTA = parseFloat(fixDTA);
        stgDTA = String(fltDTA);
        $("#txtDTA").val(stgDTA);
        dta = fltDTA;

        if (cntAduana == true) {
            dataPrevio = $("#dataPrevio").html();
            dataManiobras = $("#dataManiobras").html();
            dataHonorarios = $("#dataHonorarios").html();
            dataRevalidación = $("#dataRevalidación").html();
            dataComplementarios = $("#dataComplementarios").html();
            dataDesconsolidación = $("#dataDesconsolidación").html();

            Previo = parseFloat(dataPrevio.replace(/,/g, ""));
            Maniobras = parseFloat(dataManiobras.replace(/,/g, ""));
            Honorarios = parseFloat(dataHonorarios.replace(/,/g, ""));
            Revalidación = parseFloat(dataRevalidación.replace(/,/g, ""));
            Complementarios = parseFloat(dataComplementarios.replace(/,/g, ""));
            Desconsolidación = parseFloat(dataDesconsolidación.replace(/,/g, ""));

            sumAduana = Previo + Maniobras + Honorarios + dta + Revalidación + Complementarios + Desconsolidación;
            fixAduana = sumAduana.toFixed(2);
            fltAduana = parseFloat(fixAduana);
            despachoAduana = fltAduana + nacional;

            $("#txtTotalAd").val(fltAduana);
            $("#txtTotalAgAd").val(fltAduana);
            totalAd = $("#txtTotalAgAd").val();

            $("#dataTotalAd").html(totalAd);
        }

        if ($("#selArancel").val() == "") {
            valArancel = 0;
        } else {
            valArancel = parseFloat($("#selArancel").val());
        }

        sumLogistic = logistica + valorMercancia;
        prcArancel = sumLogistic * valArancel;
        sumArancel = prcArancel + logistica;
        $("#txtArancel").val(sumArancel);
        arancel = sumArancel;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("click", ".newAduana", function(event) {
        event.preventDefault();

        $("#modalDespAduana").modal();
    });

    $(document).on("click", ".editAduana", function(event) {
        event.preventDefault();
        id = $(this).data("id");
        nameID = "#nameAduana" + id;
        agencia = $(nameID).html();
        $("#txtAduana").html(agencia);

        $("#mdFoot").addClass("d-flex justify-content-between");
        $(".saveAduana").removeClass("hidden");
    });

    $(document).on("click", ".saveAduana", function(event) {
        event.preventDefault();

        aduana = $("#txtAduana").html();
        txtPrevio = $("#txtPrevio").val().split("$").pop();
        txtManiobras = $("#txtManiobras").val().split("$").pop();
        txtRevalidación = $("#txtRevalidación").val().split("$").pop();
        txtComplementarios = $("#txtComplementarios").val().split("$").pop();
        txtDesconsolidación = $("#txtDesconsolidación").val().split("$").pop();

        Previo = parseFloat(txtPrevio.replace(/,/g, ""));
        Maniobras = parseFloat(txtManiobras.replace(/,/g, ""));
        Revalidación = parseFloat(txtRevalidación.replace(/,/g, ""));
        Complementarios = parseFloat(txtComplementarios.replace(/,/g, ""));
        Desconsolidación = parseFloat(txtDesconsolidación.replace(/,/g, ""));

        sumDTA = logistica + valorMercancia;
        mltDTA = sumDTA * 0.008;
        fixDTA = mltDTA.toFixed(2);
        fltDTA = parseFloat(fixDTA);
        stgDTA = String(fltDTA);
        $("#txtDTA").val(stgDTA);
        dta = fltDTA;

        sumAduana = Previo + Maniobras + honorarios + dta + Revalidación + Complementarios + Desconsolidación;
        fixAduana = sumAduana.toFixed(2);
        fltAduana = parseFloat(fixAduana);
        despachoAduana = fltAduana + nacional;

        $("#txtTotalAd").val(fltAduana);
        $("#txtTotalAgAd").val(fltAduana);
        totalAd = $("#txtTotalAgAd").val();

        $("#dataName").html(aduana);
        $("#dataPrevio").html(txtPrevio);
        $("#dataTotalAd").html(totalAd);
        $("#dataManiobras").html(txtManiobras);
        $("#dataRevalidación").html(txtRevalidación);
        $("#dataComplementarios").html(txtComplementarios);
        $("#dataDesconsolidación").html(txtDesconsolidación);

        $("#modalDespAduana").modal("hide");
        cntAduana = true;

        $(".newAduana").addClass("hidden");
        $("#byAduana").css("display", "block");
        $("#byElmAduana").css("display", "none");
        $("#crdElmAduana").css("display", "block");
        $("#crdElmAduana").addClass("collapsed-card");
        $("#cardAduanas").removeClass("direct-chat-contacts-open");

        $("#txtPrevio").val("300.00");
        $("#txtManiobras").val("5000.00");
        $("#txtRevalidación").val("500.00");
        $("#txtComplementarios").val("400.00");
        $("#txtDesconsolidación").val("1500.00");

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("click", "#delAduana", function(event) {
        event.preventDefault();

        $("#txtTotalAd").val(0);
        $("#txtTotalAgAd").val("0.00");
        $(".newAduana").removeClass("hidden");
        $("#byAduana").css("display", "none");
        $("#byElmAduana").css("display", "none");
        $("#crdElmAduana").css("display", "block");
        $("#crdElmAduana").addClass("collapsed-card");

        $("#dataName").html();
        $("#dataPrevio").html();
        $("#dataTotalAd").html();
        $("#dataManiobras").html();
        $("#dataRevalidación").html();
        $("#dataComplementarios").html();
        $("#dataDesconsolidación").html();

        cntAduana = false;
        despachoAduana = 0 + nacional;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;
    });

    $(document).on("input", "#txtPrecio", function() {
        txtPrecio = $(this).val().split("$").pop();

        fltPrecio = parseFloat(txtPrecio.replace(/,/g, ""));
        stgPrecio = String(fltPrecio);
        precio = fltPrecio;

        mltTotal = precio * cantidad;
        fixTotal = mltTotal.toFixed(2);
        fltTotal = parseFloat(fixTotal);
        stgTotal = String(fltTotal);
        totalProd = fltTotal;

        $("#txtTotalProds").val(fltTotal);
        $("#txtTotalProd").val(stgTotal);
        $("#txtProdTotal").val(stgTotal);
    });

    $(document).on("input", "#txtCantidad", function() {
        txtCantidad = $(this).val().split("$").pop();

        fltCantidad = parseFloat(txtCantidad.replace(/,/g, ""));
        cantidad = fltCantidad;

        mltTotal = precio * cantidad;
        fixTotal = mltTotal.toFixed(2);
        fltTotal = parseFloat(fixTotal);
        stgTotal = String(fltTotal);
        totalProd = fltTotal;

        $("#txtTotalProds").val(fltTotal);
        $("#txtTotalProd").val(stgTotal);
        $("#txtProdTotal").val(stgTotal);
    });

    $(document).on("input", "#txtCambio", function() {
        txtCambio = $(this).val().split("$").pop();

        fltCambio = parseFloat(txtCambio.replace(/,/g, ""));
        tipocambio = fltCambio;

        mltInternacional = tipocambio * internacional;
        internacional = mltInternacional;

        mltOtros = tipocambio * otros;
        otros = mltOtros;

        sumaLogistica = internacional + otros;
        logistica = sumaLogistica;

        sumDTA = logistica + valorMercancia;
        mltDTA = sumDTA * 0.008;
        fixDTA = mltDTA.toFixed(2);
        fltDTA = parseFloat(fixDTA);
        stgDTA = String(fltDTA);
        $("#txtDTA").val(stgDTA);
        dta = fltDTA;

        if ($("#selArancel").val() == "") {
            valArancel = 0;
        } else {
            valArancel = parseFloat($("#selArancel").val());
        }
        sumLogistic = logistica + valorMercancia;
        prcArancel = sumLogistic * valArancel;
        sumArancel = prcArancel + logistica;
        $("#txtArancel").val(sumArancel);
        arancel = sumArancel;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("input", "#txtInternacional", function() {
        txtInternacional = $(this).val().split("$").pop();

        fltInternacional = parseFloat(txtInternacional.replace(/,/g, ""));
        mltInternacional = tipocambio * fltInternacional;
        internacional = mltInternacional;

        sumaLogistica = internacional + otros;
        logistica = sumaLogistica;

        sumDTA = logistica + valorMercancia;
        mltDTA = sumDTA * 0.008;
        fixDTA = mltDTA.toFixed(2);
        fltDTA = parseFloat(fixDTA);
        stgDTA = String(fltDTA);
        $("#txtDTA").val(stgDTA);
        dta = fltDTA;

        if ($("#selArancel").val() == "") {
            valArancel = 0;
        } else {
            valArancel = parseFloat($("#selArancel").val());
        }
        sumLogistic = logistica + valorMercancia;
        prcArancel = sumLogistic * valArancel;
        sumArancel = prcArancel + logistica;
        $("#txtArancel").val(sumArancel);
        arancel = sumArancel;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("input", "#txtOtros", function() {
        txtOtros = $(this).val().split("$").pop();

        fltOtros = parseFloat(txtOtros.replace(/,/g, ""));
        mltOtros = tipocambio * fltOtros;
        otros = mltOtros;

        sumaLogistica = internacional + otros;
        stgLogistica = String(sumaLogistica);
        $("#txtLogistica").val(stgLogistica);
        logistica = sumaLogistica;

        if ($("#selArancel").val() == "") {
            valArancel = 0;
        } else {
            valArancel = parseFloat($("#selArancel").val());
        }
        sumLogistic = logistica + valorMercancia;
        prcArancel = sumLogistic * valArancel;
        sumArancel = prcArancel + logistica;
        $("#txtArancel").val(sumArancel);
        arancel = sumArancel;

        sumDTA = logistica + valorMercancia;
        mltDTA = sumDTA * 0.008;
        fixDTA = mltDTA.toFixed(2);
        fltDTA = parseFloat(fixDTA);
        stgDTA = String(fltDTA);
        $("#txtDTA").val(stgDTA);
        dta = fltDTA;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("input", "#txtNacional", function() {
        txtNacional = $(this).val().split("$").pop();
        txtTotalAd = $("#txtTotalAd").val();

        fltNacional = parseFloat(txtNacional.replace(/,/g, ""));
        nacional = fltNacional;

        fltTotalAd = parseFloat(txtTotalAd);
        sumDespachoAd = fltTotalAd + nacional;
        stgDespachoAd = String(sumDespachoAd);
        $("#txtDespachoAd").val(stgDespachoAd);
        despachoAduana = sumDespachoAd;

        sumSubSuma = despachoAduana + arancel;
        sumSubtotal = sumSubSuma + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("change", "#selArancel", function(event) {
        event.preventDefault();
        var selArancel = parseFloat($(this).children("option:selected").val());
        console.log(selArancel);
        porcenAr = $(this).find("option:selected").text();
        console.log(porcenAr);

        sumLogistic = logistica + valorMercancia;
        prcArancel = sumLogistic * selArancel;
        sumArancel = prcArancel + logistica;
        $("#txtArancel").val(sumArancel);
        txtArancel = $("#txtArancel").val();
        arancel = sumArancel;

        sumSubtotal = despachoAduana + arancel + nacional;
        stgSubtotal = String(sumSubtotal);
        $("#txtSubtotal").val(stgSubtotal);
        txtSubtotal = $("#txtSubtotal").val();
        subtotal = sumSubtotal;

        mltIVA = subtotal * 0.16;
        sumIVA = subtotal + mltIVA;
        stgIVA = String(sumIVA);
        $("#txtIVA").val(stgIVA);
        txtIVA = $("#txtIVA").val();
        iva = sumIVA;

        sumTotal = subtotal + iva;
        stgTotal = String(sumTotal);
        $("#txtTotal").val(stgTotal);
        txtTotal = $("#txtTotal").val();
        total = sumTotal;

        txtIVA = $("#txtIVA").val();
        txtTotal = $("#txtTotal").val();
        txtCambio = $("#txtCambio").val();
        txtArancel = $("#txtArancel").val();
        txtSubtotal = $("#txtSubtotal").val();
        txtNacional = $("#txtNacional").val();
        txtMercancia = $("#txtMercancia").val();
        txtLogistica = $("#txtLogistica").val();
        txtDespachoAd = $("#txtDespachoAd").val();

        $("#dataIVA").html(txtIVA);
        $("#dataTotal").html(txtTotal);
        $("#dataCambio").html(txtCambio);
        $("#dataArancel").html(txtArancel);
        $("#dataSubtotal").html(txtSubtotal);
        $("#dataNacional").html(txtNacional);
        $("#dataHonorario").html("$" + dataHonorarios);
        $("#dataMercancia").html(txtMercancia);
        $("#dataDesAduanal").html(txtDespachoAd);
        $("#dataLogistica").html(txtLogistica);
        $("#dataPorcentaje").html(porcenAr + "%");
    });

    $(document).on("change", ".lstTask", function(event) {
        event.preventDefault();
        id = $(this).data("id");
        var clase = $(this).attr("class");
        if (clase == "lstTask done") {
            $("#badgetCheck" + id + "").removeClass("hidden");
            $("#spTask" + id + "").css("text-decoration", "line-through");
        } else if (clase == "lstTask") {
            $("#badgetCheck" + id + "").addClass("hidden");
            $("#spTask" + id + "").css("text-decoration", "none");
        }

        $(".badgeCheck").html(todayPrint);
    });

    $(document).on("change", "#fileClip", function(event) {
        event.preventDefault();
        countImgs++;
        id = countImgs;

        files = event.target.files;
        spClass = "#imgProdName" + id;

        if (countImgs == 1) {
            $(".actions").html("Prod imag_1.png");
        } else if (countImgs == 2) {
            $(".actions").html("Prod imag_2.png");
        } else if (countImgs == 3) {
            $(".actions").html("Prod imag_3.png");
        }

        $(".mediaStock").removeClass("hidden");
        $("#trashCan" + id + "").attr("data-id", id);
        $("#imgProdName" + id + "").html("Prod imag_" + id + "");

        $("#fileClip").addClass("hidden");
        $("#upFiles").removeClass("hidden");
        $("#cancelEx").removeClass("hidden");
    });

    $(document).on("change", ".fileClip", function(event) {
        event.preventDefault();
        id = $(this).data("id");

        spClass = ".nameFile" + id;
        spName = $("" + spClass + "").html();

        if (spName == "") {
            inputFile = event.currentTarget;
            fileName = inputFile.files[0].name;

            $(inputFile)
                .parent()
                .find("" + spClass + "")
                .html(fileName);

            $("#fileClip" + id + "").addClass("hidden");
            $("#saveFile" + id + "").removeClass("hidden");
            $("#cancelEx" + id + "").removeClass("hidden");
        }
    });
});