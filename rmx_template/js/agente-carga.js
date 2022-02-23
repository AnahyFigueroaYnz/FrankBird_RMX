var table;
var valAgenteC = false;
var valAgente = false;
var valCarga = false;
var countAg = $("#txtCountAg").val();
var countAgente = $("#txtCountAgente").val();
var countCarga = $("#txtCountCarga").val();

// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

function validarAgenteC() {
    valEmpresa = $("#txtEmpresa").val();
    valAgLCL = $("#txtAgLCL").val();
    valAg20FCL = $("#txtAg20FCL").val();
    valAg40FCL = $("#txtAg40FCL").val();

    if (valEmpresa == "") {
        $("#val_txtAgLCL").css("display", "");
    } else if (valEmpresa != "") {
        $("#val_txtAgLCL").css("display", "none");
    }

    if (valAgLCL == "") {
        $("#val_txtAgLCL").css("display", "");
    } else if (valAgLCL != "") {
        $("#val_txtAgLCL").css("display", "none");
    }

    if (valAg20FCL == "") {
        $("#val_txtAg20FCL").css("display", "");
    } else if (valAg20FCL != "") {
        $("#val_txtAg20FCL").css("display", "none");
    }

    if (valAg40FCL == "") {
        $("#val_txtAg40FCL").css("display", "");
    } else if (valAg40FCL != "") {
        $("#val_txtAg40FCL").css("display", "none");
    }

    if (valEmpresa != "" && valAgLCL != "" && valAg20FCL != ""  && valAg40FCL != "") {
        valAgenteC = true;
    } else {
        valAgenteC = false;
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

function validarCarga() {
    val20FCL = $("#txt20FCL").val();
    val40FCL = $("#txt40FCL").val();
    valLCL = $("#txtLCL").val();

    if (val20FCL == "") {
        $("#val_txt20FCL").css("display", "");
    } else if (val20FCL != "") {
        $("#val_txt20FCL").css("display", "none");
    }

    if (val40FCL == "") {
        $("#val_txt40FCL").css("display", "");
    } else if (val40FCL != "") {
        $("#val_txt40FCL").css("display", "none");
    }

    if (valLCL == "") {
        $("#val_txtLCL").css("display", "");
    } else if (valLCL != "") {
        $("#val_txtLCL").css("display", "none");
    }

    if (val20FCL != "" && val40FCL != "" && valLCL != "") {
        valCarga = true;
    } else {
        valCarga = false;
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
    
    $("#txt20FCL").inputmask({alias: "currency", prefix: '', rightAlign: false, allowMinus:false});
    $("#txt40FCL").inputmask({alias: "currency", prefix: '', rightAlign: false, allowMinus:false});
    $("#txtLCL").inputmask({alias: "currency", prefix: '', rightAlign: false, allowMinus:false});

    table = $("#tblAgentesCarga")
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
    $("#tblAgentesCarga").on("click", "a.trashCan", function (e) {
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

    table = $("#tblCarga")
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
                    targets: [4],
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

    $("#tblCarga").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar esta carga?",
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
                        title: "Carga eliminado correctamente",
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

    $(document).on("click", "#tabsCargas", function (event) {
        event.preventDefault();

        $("#tabCargas").removeClass("hidden");
        $("#tabAgentes").addClass("hidden");
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });

    $(document).on("click", "#tabsAgentes", function (event) {
        event.preventDefault();

        $("#tabAgentes").removeClass("hidden");
        $("#tabCargas").addClass("hidden");
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

        if (countAgente == 1) {
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
            countAgente++;

            id = "0" + countAgente;
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

                $("#txtCountAgente").val(countAgente);
                $("#tblAgentesCarga").DataTable().row.add(tr[0]).draw(false);
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

                $("#txtCountAgente").val(countAgente);
                $("#tblAgentesCarga").DataTable().row.add(tr[0]).draw(false);
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

    $(document).on("click", ".editCarga", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalCarga").modal();
        $("#titleModalC").html("Editar carga");
        $("#btn-carga").html("Guardar");
        $("#btn-carga").addClass("saveCarga");
        $("#btn-carga").removeClass("addCarga");

        var data20FCL = $(".data20FCL_" + id + "").html();
        var data40FCL = $(".data40FCL_" + id + "").html();
        var dataLCL = $(".dataLCL_" + id + "").html();

        $("#idCarga").val(id);
        $("#txt20FCL").val(data20FCL);
        $("#txt40FCL").val(data40FCL);
        $("#txtLCL").val(dataLCL);
    });

    $(document).on("click", ".newCarga", function (event) {
        event.preventDefault();

        $("#modalCarga").modal();
        $("#titleModalC").html("Nueva carga");
        $("#btn-carga").html("Agregar");
        $("#btn-carga").addClass("addCarga");
        $("#btn-carga").removeClass("saveCarga");
    });

    $(document).on("click", ".saveCarga", function (event) {
        event.preventDefault();
        validarCarga();

        id = $("#idCarga").val();
        txt20FCL = $("#txt20FCL").val();
        txt40FCL = $("#txt40FCL").val();
        txtLCL = $("#txtLCL").val();

        if (valCarga == true) {
            $(".data20FCL_" + id + "").html(txt20FCL);
            $(".data40FCL_" + id + "").html(txt40FCL);
            $(".dataLCL_" + id + "").html(txtLCL);

            Toast.fire({
                icon: "success",
                title: "Carga actualizada correctamente",
            });

            $("#modalCarga").modal("hide");
            $("#txt20FCL").val();
            $("#txt40FCL").val();
            $("#txtLCL").val();
        }
    });

    $(document).on("click", ".addCarga", function (event) {
        event.preventDefault();
        validarCarga();

        if (valCarga == true) {
            countCarga++;

            id = "0" + countCarga;
            txt20FCL = $("#txt20FCL").val();
            txt40FCL = $("#txt40FCL").val();
            txtLCL = $("#txtLCL").val();

            const tr = $(
                '<tr class="shadow border-row align-td">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                    '<span class="dataPuerto_' + id + ' td-text">' + txt20FCL +
                    "</span>" +
                    "</td>" +
                    '<td class="align-td">' +
                    '<span class="dataCodigo_' + id + ' td-text">' + txt40FCL +
                    "</span>" +
                    "</td>" +
                    '<td class="align-td">' +
                    '<span class="dataCodigo_' + id + ' td-text">' + txtLCL +
                    "</span>" +
                    "</td>" +
                    '<td class="icons-td">' +
                    '<a href="" type="button" class="editPuerto" data-id="' + id + '"><i class="fas fa-edit"></i></a>' +
                    '<a href="" type="button" class="trashCan" data-id="' + id + '"><i class="far fa-trash-alt"></i></a>' +
                    "</td>" +
                    "</tr>",
            );

            $("#countCarga").val(countRows);
            $("#tblCarga").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Carga agregada correctamente",
            });

            $("#modalCarga").modal("hide");
            $("#idCarga").val(0);
            $("#txt20FCL").val();
            $("#txt40FCL").val();
            $("#txtLCL").val();
        }
    });

    $(document).on("click", ".newAgenteC", function (event) {
        event.preventDefault();

        $("#modalAgenteC").modal();
    });

    $(document).on("click", ".addAgenteC", function (event) {
        event.preventDefault();
        validarAgenteC();

        if (valAgenteC == true) {
            countAg++;

            id = "0" + countAg;
            txtEmpresa = $("#txtEmpresa").val();

            const tr = $(
                '<tr class="shadow border-row" id="tr_' + id + '" style="vertical-align: middle">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                        '<a href="/aplication/agentes-carga-detalle.html" style="margin-left: 0.5rem">' +
                            '<span class="td-text">' + txtEmpresa + '</span>' +
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

            $("#txtCountAg").val(countAg);
            $("#tblAgenciasAd").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Agencia agregada correctamente",
            });

            $("#modalAgenteC").modal("hide");
            $("#txtEmpresa").val();
            $("#txtAg20FCL").val();
            $("#txtAg40FCL").val();
            $("#txtAgLCL").val();
        }
    });
});
