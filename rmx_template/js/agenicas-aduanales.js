var table;
var valAgencia = false;
var valAgente = false;
var valPuerto = false;
var countA = $("#txtCount").val();
var count = $("#txtContP").val();
var countRows = $("#txtContA").val();

// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

function validarAgencia() {
    valAgencia = $("#txtAgencia").val();
    valAgPuerto = $("#txtAgPuerto").val();
    valAgCodigo = $("#txtAgCodigo").val();

    if (valAgencia == "") {
        $("#val_txtAgencia").css("display", "");
    } else if (valAgencia != "") {
        $("#val_txtAgencia").css("display", "none");
    }

    if (valAgPuerto == "") {
        $("#val_txtAgPuerto").css("display", "");
    } else if (valAgPuerto != "") {
        $("#val_txtAgPuerto").css("display", "none");
    }

    if (valAgCodigo == "") {
        $("#val_txtAgCodigo").css("display", "");
    } else if (valAgCodigo != "") {
        $("#val_txtAgCodigo").css("display", "none");
    }

    if (valAgencia != "" && valAgPuerto != "" && valAgCodigo != "") {
        valAgencia = true;
    } else {
        valAgencia = false;
    }
}

function validarAgente() {
    valLada = $("#selLada").val();
    valAgente = $("#txtAgente").val();
    valCorreo = $("#txtCorreo").val();
    valTelefono = $("#txtTelefono").val();

    if (valLada == null) {
        $("#val_selLada").css("display", "");
    } else if (valLada != null) {
        $("#val_selLada").css("display", "none");
    }

    if (valAgente == "") {
        $("#val_txtAgente").css("display", "");
    } else if (valAgente != "") {
        $("#val_txtAgente").css("display", "none");
    }

    if (valCorreo == "") {
        $("#val_txtCorreo").css("display", "");
    } else if (valCorreo != "") {
        $("#val_txtCorreo").css("display", "none");
    }

    if (valTelefono == "") {
        $("#val_txtTelefono").css("display", "");
    } else if (valTelefono != "") {
        $("#val_txtTelefono").css("display", "none");
    }

    if (valLada != null && valAgente != "" && valCorreo != "" && valTelefono != "") {
        valAgente = true;
    } else {
        valAgente = false;
    }
}

function validarPuerto() {
    valPuerto = $("#txtPuerto").val();
    valCodigo = $("#txtCodigo").val();

    if (valPuerto == "") {
        $("#val_txtPuerto").css("display", "");
    } else if (valPuerto != "") {
        $("#val_txtPuerto").css("display", "none");
    }

    if (valCodigo == "") {
        $("#val_txtCodigo").css("display", "");
    } else if (valCodigo != "") {
        $("#val_txtCodigo").css("display", "none");
    }

    if (valPuerto != "" && valCodigo != "") {
        valPuerto = true;
    } else {
        valPuerto = false;
    }
}

$(document).ready(function () {
    jQuery.noConflict();

    var dataLada = $("#dataLada").html();
    var dataStatus = $("#dataStatus").val();
    var dataAgente = $("#dataAgente").html();
    var dataCorreo = $("#dataCorreo").html();
    var dataTelefono = $("#dataTelefono").html();

    var selLada = $("#selLada").val();
    var selEstatus = $("#selEstatus").val();
    var txtAgente = $("#txtAgente").val();
    var txtCorreo = $("#txtCorreo").val();
    var txtTelefono = $("#txtTelefono").val();

    var dataAgencia = $("#dataAgencia").html();
    var dataHonorarios = $("#dataHonorarios").html();
    var dataRevalidación = $("#dataRevalidación").html();
    var dataComplementarios = $("#dataComplementarios").html();
    var dataPrevio = $("#dataPrevio").html();
    var dataManiobras = $("#dataManiobras").html();
    var dataDesconsolidación = $("#dataDesconsolidación").html();
    
    $("#txtRevalidación").inputmask({alias: "currency", prefix: '$ ', rightAlign: false, allowMinus:false});
    $("#txtComplementarios").inputmask({alias: "currency", prefix: '$ ', rightAlign: false, allowMinus:false});
    $("#txtPrevio").inputmask({alias: "currency", prefix: '$ ', rightAlign: false, allowMinus:false});
    $("#txtManiobras").inputmask({alias: "currency", prefix: '$ ', rightAlign: false, allowMinus:false});
    $("#txtDesconsolidación").inputmask({alias: "currency", prefix: '$ ', rightAlign: false, allowMinus:false});

    table = $("#tblAgentesAd")
        .DataTable({
            dom: '<tr><"mt-3 ml-auto"p>',
            responsive: {
                details: {
                    targets: [0],
                    type: "column",
                    orderable: false,
                },
            },
            processing: true,
            autoWidth: true,
            pageLength: 2,
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
                },
                {
                    targets: [5],
                    orderable: false,
                },
            ],
            buttons: [
                {
                    extend: "pageLength",
                    className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                },
            ],
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                spageLength: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún pendiente disponible",
                sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "",
                sUrl: "",
                sInfoDecimals: ".",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior",
                },
                oAria: {
                    sSortAscending: ": Activar orden ascendente",
                    sSortDescending: ": Activar orden descendente",
                },
                buttons: {
                    copy: "Copiar",
                    colvis: "Columnas",
                    print: "Imprimir",
                    pageLength: {
                        _: "Mostrar  %d",
                        "-1": "Todo",
                    },
                },
            },
        })
        .columns.adjust();
    $("#tblAgentesAd").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este agente?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar.",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    table.row($(this).parents("tr")).remove().draw();
                    Toast.fire({
                        icon: "success",
                        title: "Agente eliminado correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    table = $("#tblPuertosAd")
        .DataTable({
            dom: '<tr><"mt-3 ml-auto"p>',
            responsive: {
                details: {
                    targets: [0],
                    type: "column",
                    orderable: false,
                },
            },
            processing: true,
            autoWidth: true,
            pageLength: 2,
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
                },
                {
                    targets: [3],
                    orderable: false,
                },
            ],
            buttons: [
                {
                    extend: "pageLength",
                    className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                },
            ],
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                spageLength: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún pendiente disponible",
                sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "",
                sUrl: "",
                sInfoDecimals: ".",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior",
                },
                oAria: {
                    sSortAscending: ": Activar orden ascendente",
                    sSortDescending: ": Activar orden descendente",
                },
                buttons: {
                    copy: "Copiar",
                    colvis: "Columnas",
                    print: "Imprimir",
                    pageLength: {
                        _: "Mostrar  %d",
                        "-1": "Todo",
                    },
                },
            },
        })
        .columns.adjust();

    $("#tblPuertosAd").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este puerto?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar.",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    table.row($(this).parents("tr")).remove().draw();
                    Toast.fire({
                        icon: "success",
                        title: "Puerto eliminado correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    if (selLada == "(+ 66)" || selLada == "(+ 84)" || selLada == "(+ 1)" || selLada == "(+ 52)" || selLada == "(+ 91)") {
        $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
    } else if (selLada == "(+ 81)" || selLada == "(+ 82)" || selLada == "(+ 86)") {
        $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
    }

    $("#selLada").on("change", function () {
        if (this.value == "(+ 66)" || this.value == "(+ 84)" || this.value == "(+ 1)" || this.value == "(+ 52)" || this.value == "(+ 91)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        } else if (this.value == "(+ 81)" || this.value == "(+ 82)" || this.value == "(+ 86)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        }
    });

    $(document).on("click", "#tabsPuertos", function (event) {
        event.preventDefault();

        $("#tabPuertos").removeClass("hidden");
        $("#tabAgentes").addClass("hidden");
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });

    $(document).on("click", "#tabsAgentes", function (event) {
        event.preventDefault();

        $("#tabAgentes").removeClass("hidden");
        $("#tabPuertos").addClass("hidden");
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });

    $(document).on("click", ".editAgente", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalAgente").modal();
        $("#titleModalA").html("Editar agente");
        $("#btn-agente").html("Guardar");
        $("#btn-agente").addClass("saveAgente");
        $("#btn-agente").removeClass("addAgente");

        if (dataLada == "(+ 1)" || dataLada == "(+ 52)" || dataLada == "(+ 66)" || dataLada == "(+ 84)" || dataLada == "(+ 91)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        } else if (dataLada == "(+ 81)" || dataLada == "(+ 82)" || dataLada == "(+ 86)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        }

        if (countRows == 1) {
            $(".fmAgente").removeClass("col-9");
            $(".fmAgente").addClass("col-12");
            $(".fmStatus").addClass("hidden");

            $("#selEstatus").attr("disabled", "true");
            $("#selEstatus option[value='1']").attr("selected", true);
        } else {
            $(".fmAgente").removeClass("col-12");
            $(".fmAgente").addClass("col-9");
            $(".fmStatus").removeClass("hidden");

            $("#selEstatus").removeAttr("disabled");
            if (dataStatus == 0) {
                $("#selEstatus option[value='0']").attr("selected", true);
            } else if (dataStatus == 1) {
                $("#selEstatus option[value='1']").attr("selected", true);
            }
        }

        $("#idAgente").val(id);
        $("#txtAgente").val(dataAgente);
        $("#txtCorreo").val(dataCorreo);
        $("#txtTelefono").val(dataTelefono);
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
    });

    $(document).on("click", ".newAgente", function (event) {
        event.preventDefault();

        $("#modalAgente").modal();
        $("#titleModalA").html("Nuevo agente");
        $("#btn-agente").html("Agregar");
        $("#btn-agente").addClass("addAgente");
        $("#btn-agente").removeClass("saveAgente");
    });

    $(document).on("click", ".saveAgente", function (event) {
        event.preventDefault();
        validarAgente();

        id = $("#idAgente").val();
        selLada = $("#selLada").val();
        txtAgente = $("#txtAgente").val();
        txtCorreo = $("#txtCorreo").val();
        selEstatus = $("#selEstatus").val();
        txtTelefono = $("#txtTelefono").val();

        if (valAgente == true) {
            if (selEstatus == 1) {
                $("#dataLada").html(selLada);
                $("#dataStatus").val(selEstatus);
                $("#dataAgente").html(txtAgente);
                $("#dataCorreo").html(txtCorreo);
                $("#dataTelefono").html(txtTelefono);
                $("#dataIdAgente").attr("data-id", id);

                $(".dataStatus_" + id + "").html("Definido");
            } else {
                $(".dataStatus_" + id + "").html("");
            }

            $(".dataLada_" + id + "").html(selLada);
            $(".dataAgente_" + id + "").html(txtAgente);
            $(".dataCorreo_" + id + "").html(txtCorreo);
            $(".dataTelefono_" + id + "").html(txtTelefono);

            Toast.fire({
                icon: "success",
                title: "Agente actualizado correctamente",
            });

            $("#modalAgente").modal("hide");
            $("#selLada").val();
            $("#idAgente").val();
            $("#txtAgente").val();
            $("#txtCorreo").val();
            $("#selEstatus").val();
            $("#txtTelefono").val();
        }
    });

    $(document).on("click", ".addAgente", function (event) {
        event.preventDefault();
        validarAgente();

        if (valAgente == true) {
            countRows++;

            id = "0" + countRows;
            selLada = $("#selLada").val();
            txtAgente = $("#txtAgente").val();
            txtCorreo = $("#txtCorreo").val();
            selEstatus = $("#selEstatus").val();
            txtTelefono = $("#txtTelefono").val();

            if (selEstatus == 1) {
                $(".tdStatus").removeClass("selected");

                $("#dataLada").html(selLada);
                $("#dataStatus").val(selEstatus);
                $("#dataAgente").html(txtAgente);
                $("#dataCorreo").html(txtCorreo);
                $("#dataTelefono").html(txtTelefono);
                $("#dataIdAgente").attr("data-id", id);

                const tr = $(
                    '<tr class="shadow border-row align-td">' +
                        '<td class="align-td"></td>' +
                        '<td class="align-td">' +
                        '<span class="dataAgente_' +
                        id +
                        ' td-text">' +
                        txtAgente +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataCorreo_' +
                        id +
                        ' td-text">' +
                        txtCorreo +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataLada_' +
                        id +
                        ' td-text">' +
                        selLada +
                        "</span>" +
                        '<span class="dataTelefono_' +
                        id +
                        ' td-text">' +
                        txtTelefono +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataStatus_' +
                        id +
                        ' td-text tdStatus selected">Definido</span>' +
                        "</td>" +
                        '<td class="icons-td">' +
                        '<a href="" type="button" class="editAgente" data-id="' +
                        id +
                        '"><i class="fas fa-edit"></i></a>' +
                        '<a href="" type="button" class="trashCan" data-id="' +
                        id +
                        '"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>",
                );

                $("#txtContA").val(countRows);
                $("#tblAgentesAd").DataTable().row.add(tr[0]).draw(false);
            } else {
                const tr = $(
                    '<tr class="shadow border-row align-td">' +
                        '<td class="align-td"></td>' +
                        '<td class="align-td">' +
                        '<span class="dataAgente_' +
                        id +
                        ' td-text">' +
                        txtAgente +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataCorreo_' +
                        id +
                        ' td-text">' +
                        txtCorreo +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataLada_' +
                        id +
                        ' td-text">' +
                        selLada +
                        "</span>" +
                        '<span class="dataTelefono_' +
                        id +
                        ' td-text">' +
                        txtTelefono +
                        "</span>" +
                        "</td>" +
                        '<td class="align-td">' +
                        '<span class="dataStatus_' +
                        id +
                        ' td-text tdStatus"></span>' +
                        "</td>" +
                        '<td class="icons-td">' +
                        '<a href="" type="button" class="editAgente" data-id="' +
                        id +
                        '"><i class="fas fa-edit"></i></a>' +
                        '<a href="" type="button" class="trashCan" data-id="' +
                        id +
                        '"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>",
                );

                $("#txtContA").val(countRows);
                $("#tblAgentesAd").DataTable().row.add(tr[0]).draw(false);
            }

            Toast.fire({
                icon: "success",
                title: "Agente actualizado correctamente",
            });

            $("#modalAgente").modal("hide");
            $("#selLada").val();
            $("#idAgente").val();
            $("#txtAgente").val();
            $("#txtCorreo").val();
            $("#selEstatus").val();
            $("#txtTelefono").val();
        }
    });

    $(document).on("click", ".editPuerto", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalPuerto").modal();
        $("#titleModalP").html("Editar puerto");
        $("#btn-puerto").html("Guardar");
        $("#btn-puerto").addClass("savePuerto");
        $("#btn-puerto").removeClass("addPuerto");

        var dataPuerto = $(".dataPuerto_" + id + "").html();
        var dataCodigo = $(".dataCodigo_" + id + "").html();

        $("#idPuerto").val(id);
        $("#txtPuerto").val(dataPuerto);
        $("#txtCodigo").val(dataCodigo);
    });

    $(document).on("click", ".newPuerto", function (event) {
        event.preventDefault();

        $("#modalPuerto").modal();
        $("#titleModalP").html("Nuevo puerto");
        $("#btn-puerto").html("Agregar");
        $("#btn-puerto").addClass("addPuerto");
        $("#btn-puerto").removeClass("savePuerto");
    });

    $(document).on("click", ".savePuerto", function (event) {
        event.preventDefault();
        validarPuerto();

        id = $("#idPuerto").val();
        txtPuerto = $("#txtPuerto").val();
        txtCodigo = $("#txtCodigo").val();

        if (valPuerto == true) {
            $(".dataPuerto_" + id + "").html(txtPuerto);
            $(".dataCodigo_" + id + "").html(txtCodigo);

            Toast.fire({
                icon: "success",
                title: "Puerto actualizado correctamente",
            });

            $("#modalPuerto").modal("hide");
            $("#idPuerto").val(0);
            $("#txtPuerto").val();
            $("#txtCodigo").val();
        }
    });

    $(document).on("click", ".addPuerto", function (event) {
        event.preventDefault();
        validarPuerto();

        if (valPuerto == true) {
            count++;

            id = "0" + count;
            txtPuerto = $("#txtPuerto").val();
            txtCodigo = $("#txtCodigo").val();

            const tr = $(
                '<tr class="shadow border-row align-td">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                    '<span class="dataPuerto_' +
                    id +
                    ' td-text">' +
                    txtPuerto +
                    "</span>" +
                    "</td>" +
                    '<td class="align-td">' +
                    '<span class="dataCodigo_' +
                    id +
                    ' td-text">' +
                    txtCodigo +
                    "</span>" +
                    "</td>" +
                    '<td class="icons-td">' +
                    '<a href="" type="button" class="editPuerto" data-id="' +
                    id +
                    '"><i class="fas fa-edit"></i></a>' +
                    '<a href="" type="button" class="trashCan" data-id="' +
                    id +
                    '"><i class="far fa-trash-alt"></i></a>' +
                    "</td>" +
                    "</tr>",
            );

            $("#txtContP").val(countRows);
            $("#tblPuertosAd").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Puerto agregado correctamente",
            });

            $("#modalPuerto").modal("hide");
            $("#idPuerto").val(0);
            $("#txtPuerto").val();
            $("#txtCodigo").val();
        }
    });

    $(document).on("click", ".editAgencia", function (event) {
        event.preventDefault();
        $("#modalAgencia").modal();

        var dataRevalidación = $("#dataRevalidación").html();
        var dataComplementarios = $("#dataComplementarios").html();
        var dataPrevio = $("#dataPrevio").html();
        var dataManiobras = $("#dataManiobras").html();
        var dataDesconsolidación = $("#dataDesconsolidación").html();

        $("#txtRevalidación").val(dataRevalidación);
        $("#txtComplementarios").val(dataComplementarios);
        $("#txtPrevio").val(dataPrevio);
        $("#txtManiobras").val(dataManiobras);
        $("#txtDesconsolidación").val(dataDesconsolidación);
    });

    $(document).on("click", ".saveAgencia", function (event) {
        event.preventDefault();

        txtRevalidación = parseFloat(($("#txtRevalidación").val()).replace(/[$,]/g,""));
        var fixRevalidación = (txtRevalidación).toFixed(2);
        var stgRevalidación = String(fixRevalidación);
        var comRevalidación = numberWithCommas(stgRevalidación);

        txtComplementarios = parseFloat(($("#txtComplementarios").val()).replace(/[$,]/g,""));
        var fixComplementarios = (txtComplementarios).toFixed(2);
        var stgComplementarios = String(fixComplementarios);
        var comComplementarios = numberWithCommas(stgComplementarios);

        txtPrevio = parseFloat(($("#txtPrevio").val()).replace(/[$,]/g,""));
        var fixPrevio = (txtPrevio).toFixed(2);
        var stgPrevio = String(fixPrevio);
        var comPrevio = numberWithCommas(stgPrevio);

        txtManiobras = parseFloat(($("#txtManiobras").val()).replace(/[$,]/g,""));
        var fixManiobras = (txtManiobras).toFixed(2);
        var stgManiobras = String(fixManiobras);
        var comManiobras = numberWithCommas(stgManiobras);

        txtDesconsolidación = parseFloat(($("#txtDesconsolidación").val()).replace(/[$,]/g,""));
        var fixDesconsolidación = (txtDesconsolidación).toFixed(2);
        var stgDesconsolidación = String(fixDesconsolidación);
        var comDesconsolidación = numberWithCommas(stgDesconsolidación);

        $("#dataRevalidación").html(comRevalidación);
        $("#dataComplementarios").html(comComplementarios);
        $("#dataPrevio").html(comPrevio);
        $("#dataManiobras").html(comManiobras);
        $("#dataDesconsolidación").html(comDesconsolidación);

        $("#modalAgencia").modal("hide");
        $("#txtRevalidación").val();
        $("#txtComplementarios").val();
        $("#txtPrevio").val();
        $("#txtManiobras").val();
        $("#txtDesconsolidación").val();
    });

    $(document).on("click", ".newAgencia", function (event) {
        event.preventDefault();

        $("#modalAgencias").modal();
    });

    $(document).on("click", ".addAgencia", function (event) {
        event.preventDefault();
        validarAgencia();

        if (valAgencia == true) {
            countA++;

            id = "0" + count;
            txtAgencia = $("#txtAgencia").val();

            const tr = $(
                '<tr class="shadow border-row" id="tr_' + id + '" style="vertical-align: middle">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                        '<a href="/aplication/agencias-aduanales-detalle.html" style="margin-left: 0.5rem">' +
                            '<span class="td-text">' + txtAgencia + '</span>' +
                        '</a>' +
                    '</td>' +
                    '<td class="align-td">' +
                        '<span class="td-text">Por definir</span>' +
                    '</td>' +
                    '<td class="align-td">' +
                        '<span class="td-text">Por definir</span>' +
                    '</td>' +
                    '<td class="align-td">' +
                        '<span class="td-text">Por definir</span>' +
                    '</td>' +
                    '<td class="icons-td">' +
                        '<a type="button" href="#" data-id="' + id + '" class="eliminar_agencia trashCan" data-toggle="modal">' +
                            '<i class="fas fa-trash-alt"></i>' +
                        '</a>' +
                    '</td>' +
                '</tr>'
            );

            $("#txtCount").val(countA);
            $("#tblAgenciasAd").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Agencia agregada correctamente",
            });

            $("#modalAgencias").modal("hide");
            $("#txtAgencia").val();
            $("#txtAgPuerto").val();
            $("#txtAgCodigo").val();
        }
    });
});
