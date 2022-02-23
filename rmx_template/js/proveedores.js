var table;
var valProvs = false;
var valProv = false;
var valContacto = false;
var valProductos = false;
var countProveedor = $("#txtCountProveedor").val();
var countContacto = $("#txtCountContacto").val();
var countProducto = $("#txtCountProducto").val();

// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

function validarProveedores() {
    valProveedor = $("#txtProveedores").val();
    valDireccion = $("#txtDireccion").val();
    valProdProv = $("#txtProdProv").val();
    valFracAran = $("#txtFracAran").val();
    
    if (valProveedor == "") {
        $("#val_txtProveedores").css("display", "");
    } else if (valProveedor != "") {
        $("#val_txtProveedores").css("display", "none");
    }
    
    if (valDireccion == "") {
        $("#val_txtDireccion").css("display", "");
    } else if (valDireccion != "") {
        $("#val_txtDireccion").css("display", "none");
    }

    if (valProdProv == "") {
        $("#val_txtProdProv").css("display", "");
    } else if (valProdProv != "") {
        $("#val_txtProdProv").css("display", "none");
    }

    if (valFracAran == "") {
        $("#val_txtFracAran").css("display", "");
    } else if (valFracAran != "") {
        $("#val_txtFracAran").css("display", "none");
    }


    if (valProveedor != ""  && valDireccion != "" && valProdProv != ""  && valFracAran != "") {
        valProvs = true;
    } else {
        valProvs = false;
    }
}

function validarContacto() {
    valLada = $("#selLada").val();
    valContacto = $("#txtContacto").val();
    valCorreo = $("#txtCorreo").val();
    valTelefono = $("#txtTelefono").val();

    if (valLada == null) {
        $("#val_selLada").css("display", "");
    } else if (valLada != null) {
        $("#val_selLada").css("display", "none");
    }

    if (valContacto == "") {
        $("#val_txtContacto").css("display", "");
    } else if (valContacto != "") {
        $("#val_txtContacto").css("display", "none");
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

    if (valLada != null && valContacto != "" && valCorreo != "" && valTelefono != "") {
        valContacto = true;
    } else {
        valContacto = false;
    }
}

function validarProveedor() {
    valProveedor = $("#txtProveedor").val();
    valProvDirec = $("#txtProvDirec").val();
    
    if (valProvd == "") {
        $("#val_txtProveedor").css("display", "");
    } else if (valProveedor != "") {
        $("#val_txtProveedor").css("display", "none");
    }
    
    if (valProvDirec == "") {
        $("#val_txtProvDirec").css("display", "");
    } else if (valProvDirec != "") {
        $("#val_txtProvDirec").css("display", "none");
    }

    if (valProveedor != "" && valProvDirec != "") {
        valProv = true;
    } else {
        valProv = false;
    }
}

function validarProducto() {
    valProducto = $("#txtProducto").val();
    valFraccion = $("#txtFraccion").val();

    if (valProducto == "") {
        $("#val_txtProducto").css("display", "");
    } else if (valProducto != "") {
        $("#val_txtProducto").css("display", "none");
    }

    if (valFraccion == "") {
        $("#val_txtFraccion").css("display", "");
    } else if (valFraccion != "") {
        $("#val_txtFraccion").css("display", "none");
    }

    if (valProducto != "" && valFraccion != "") {
        valProv = true;
    } else {
        valProv = false;
    }
}

$(document).ready(function () {
    jQuery.noConflict();

    var dataLada = $("#dataLada").html();
    var dataStatus = $("#dataStatus").val();
    var dataContacto = $("#dataContacto").html();
    var dataCorreo = $("#dataCorreo").html();
    var dataTelefono = $("#dataTelefono").html();

    var selLada = $("#selLada").val();
    var selEstatus = $("#selEstatus").val();
    var txtContacto = $("#txtContacto").val();
    var txtCorreo = $("#txtCorreo").val();
    var txtTelefono = $("#txtTelefono").val();
    
    
    $("#txtFracAran").inputmask("99999999",{ rightAlign: false, allowMinus:false, placeholder: "00000000" });
    $("#txtFraccion").inputmask("99999999",{ rightAlign: false, allowMinus:false, placeholder: "00000000" });

    table = $("#tblContacto")
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
    $("#tblContacto").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este contacto?",
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
                        title: "Contacto eliminado correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    table = $("#tblProdProv")
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

    $("#tblProdProv").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este producto?",
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
                        title: "Producto eliminado correctamente",
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

    $(document).on("click", "#tabsProductos", function (event) {
        event.preventDefault();

        $("#tabProductos").removeClass("hidden");
        $("#tabContactos").addClass("hidden");
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });

    $(document).on("click", "#tabsContactos", function (event) {
        event.preventDefault();

        $("#tabContactos").removeClass("hidden");
        $("#tabProductos").addClass("hidden");
        $($.fn.dataTable.tables(true)).DataTable().responsive.recalc();
    });

    $(document).on("click", ".editContacto", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalContacto").modal();
        $("#titleModalA").html("Editar Contacto");
        $("#btn-contacto").html("Guardar");
        $("#btn-contacto").addClass("saveContacto");
        $("#btn-contacto").removeClass("addContacto");

        if (dataLada == "(+ 1)" || dataLada == "(+ 52)" || dataLada == "(+ 66)" || dataLada == "(+ 84)" || dataLada == "(+ 91)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 999-9999" });
        } else if (dataLada == "(+ 81)" || dataLada == "(+ 82)" || dataLada == "(+ 86)") {
            $("#txtTelefono").removeAttr("disabled");
            $("#txtTelefono").inputmask({ mask: "(999) 9999-9999" });
        }

        if (countContacto == 1) {
            $(".fmContacto").removeClass("col-9");
            $(".fmContacto").addClass("col-12");
            $(".fmStatus").addClass("hidden");

            $("#selEstatus").attr("disabled", "true");
            $("#selEstatus option[value='1']").attr("selected", true);
        } else {
            $(".fmContacto").removeClass("col-12");
            $(".fmContacto").addClass("col-9");
            $(".fmStatus").removeClass("hidden");

            $("#selEstatus").removeAttr("disabled");
            if (dataStatus == 0) {
                $("#selEstatus option[value='0']").attr("selected", true);
            } else if (dataStatus == 1) {
                $("#selEstatus option[value='1']").attr("selected", true);
            }
        }

        $("#idContacto").val(id);
        $("#txtContacto").val(dataContacto);
        $("#txtCorreo").val(dataCorreo);
        $("#txtTelefono").val(dataTelefono);
        $("#selLada option[value='" + dataLada + "']").attr("selected", true);
    });

    $(document).on("click", ".newContacto", function (event) {
        event.preventDefault();

        $("#modalContacto").modal();
        $("#titleModalA").html("Nuevo Contacto");
        $("#btn-contacto").html("Agregar");
        $("#btn-contacto").addClass("addContacto");
        $("#btn-contacto").removeClass("saveContacto");
    });

    $(document).on("click", ".saveContacto", function (event) {
        event.preventDefault();
        validarContacto();

        id = $("#idContacto").val();
        selLada = $("#selLada").val();
        txtContacto = $("#txtContacto").val();
        txtCorreo = $("#txtCorreo").val();
        selEstatus = $("#selEstatus").val();
        txtTelefono = $("#txtTelefono").val();

        if (valContacto == true) {
            if (selEstatus == 1) {
                $("#dataLada").html(selLada);
                $("#dataStatus").val(selEstatus);
                $("#dataContacto").html(txtContacto);
                $("#dataCorreo").html(txtCorreo);
                $("#dataTelefono").html(txtTelefono);
                $("#dataIdContacto").attr("data-id", id);

                $(".dataStatus_" + id + "").html("Definido");
            } else {
                $(".dataStatus_" + id + "").html("");
            }

            $(".dataLada_" + id + "").html(selLada);
            $(".dataContacto_" + id + "").html(txtContacto);
            $(".dataCorreo_" + id + "").html(txtCorreo);
            $(".dataTelefono_" + id + "").html(txtTelefono);

            Toast.fire({
                icon: "success",
                title: "Contacto actualizado correctamente",
            });

            $("#modalContacto").modal("hide");
            $("#selLada").val();
            $("#idContacto").val();
            $("#txtContacto").val();
            $("#txtCorreo").val();
            $("#selEstatus").val();
            $("#txtTelefono").val();
        }
    });

    $(document).on("click", ".addContacto", function (event) {
        event.preventDefault();
        validarContacto();

        if (valContacto == true) {
            countContacto++;

            id = "0" + countContacto;
            selLada = $("#selLada").val();
            txtContacto = $("#txtContacto").val();
            txtCorreo = $("#txtCorreo").val();
            selEstatus = $("#selEstatus").val();
            txtTelefono = $("#txtTelefono").val();

            if (selEstatus == 1) {
                $(".tdStatus").removeClass("selected");

                $("#dataLada").html(selLada);
                $("#dataStatus").val(selEstatus);
                $("#dataContacto").html(txtContacto);
                $("#dataCorreo").html(txtCorreo);
                $("#dataTelefono").html(txtTelefono);
                $("#dataIdContacto").attr("data-id", id);

                const tr = $(
                    '<tr class="shadow border-row align-td">' +
                        '<td class="align-td"></td>' +
                        '<td class="align-td">' +
                        '<span class="dataContacto_' +
                        id +
                        ' td-text">' +
                        txtContacto +
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
                        '<a href="" type="button" class="editContacto" data-id="' +
                        id +
                        '"><i class="fas fa-edit"></i></a>' +
                        '<a href="" type="button" class="trashCan" data-id="' +
                        id +
                        '"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>",
                );

                $("#txtCountContacto").val(countContacto);
                $("#tblContacto").DataTable().row.add(tr[0]).draw(false);
            } else {
                const tr = $(
                    '<tr class="shadow border-row align-td">' +
                        '<td class="align-td"></td>' +
                        '<td class="align-td">' +
                        '<span class="dataContacto_' +
                        id +
                        ' td-text">' +
                        txtContacto +
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
                        '<a href="" type="button" class="editContacto" data-id="' +
                        id +
                        '"><i class="fas fa-edit"></i></a>' +
                        '<a href="" type="button" class="trashCan" data-id="' +
                        id +
                        '"><i class="far fa-trash-alt"></i></a>' +
                        "</td>" +
                        "</tr>",
                );

                $("#txtCountContacto").val(countContacto);
                $("#tblContacto").DataTable().row.add(tr[0]).draw(false);
            }

            Toast.fire({
                icon: "success",
                title: "Contacto actualizado correctamente",
            });

            $("#modalContacto").modal("hide");
            $("#selLada").val();
            $("#idContacto").val();
            $("#txtContacto").val();
            $("#txtCorreo").val();
            $("#selEstatus").val();
            $("#txtTelefono").val();
        }
    });

    $(document).on("click", ".editProducto", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalProducto").modal();
        $("#titleModalPd").html("Editar Producto");
        $("#btn-Producto").html("Guardar");
        $("#btn-producto").addClass("saveProducto");
        $("#btn-producto").removeClass("addProducto");

        var dataProducto = $(".dataProducto_" + id + "").html();
        var dataFraccion = $(".dataFraccion_" + id + "").html();

        $("#idProducto").val(id);
        $("#txtProducto").val();
        $("#txtFraccion").val();
    });

    $(document).on("click", ".newProducto", function (event) {
        event.preventDefault();

        $("#modalProducto").modal();
        $("#titleModalPd").html("Nueva Producto");
        $("#btn-producto").html("Agregar");
        $("#btn-producto").addClass("addProducto");
        $("#btn-producto").removeClass("saveProducto");
    });

    $(document).on("click", ".saveProducto", function (event) {
        event.preventDefault();
        validarProducto();

        id = $("#idProducto").val();
        txtProducto = $("#txtProducto").val();
        txtFraccion = $("#txtFraccion").val();

        if (valProductos == true) {
            $(".dataProducto_" + id + "").html(txtProducto);
            $(".dataFraccion_" + id + "").html(txtFraccion);

            Toast.fire({
                icon: "success",
                title: "Producto actualizada correctamente",
            });

            $("#modalProducto").modal("hide");
            $("#txtProducto").val();
            $("#txtFraccion").val();
        }
    });

    $(document).on("click", ".addProducto", function (event) {
        event.preventDefault();
        validarProducto();

        if (valProv == true) {
            countProducto++;

            id = "0" + countProducto;
            txtProducto = $("#txtProducto").val();
            txtFraccion = $("#txtFraccion").val();

            const tr = $(
                '<tr class="shadow border-row align-td">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                        '<span class="dataProducto_' + id + ' td-text">' + txtProducto + '</span>' +
                    '</td>' +
                    '<td class="align-td">' +
                        '<span class="dataFraccion_' + id + ' td-text">' + txtFraccion + '</span>' +
                    '</td>' +
                    '<td class="icons-td">' +
                        '<a href="" type="button" class="editProducto" data-id="' + id + '"><i class="fas fa-edit"></i></a>' +
                        '<a href="" type="button" class="trashCan" data-id="' + id + '"><i class="far fa-trash-alt"></i></a>' +
                    '</td>' +
                '</tr>'
            );

            $("#txtCountProducto").val(countProducto);
            $("#tblProdProv").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Producto agregada correctamente",
            });

            $("#modalProducto").modal("hide");
            $("#idProducto").val(0);
            $("#txtProducto").val();
            $("#txtFraccion").val();
        }
    });


    $(document).on("click", ".editProveedor", function (event) {
        event.preventDefault();
        var id = $(this).data("id");

        $("#modalProv").modal();

        var dataProveedor = $("#dataProveedor").html();
        var dataDireccion = $("#dataDireccion").html();

        $("#txtProveedor").val(dataProveedor);
        $("#txtProvDirec").val(dataDireccion);
    });

    $(document).on("click", ".saveProveedor", function (event) {
        event.preventDefault();
        validarProveedor();

        txtProveedor = $("#txtProveedor").val();
        txtProvDirec = $("#txtProvDirec").val();

        if (valProv == true) {            
            $("#dataProveedor").html(txtProveedor);
            $("#dataDireccion").val(txtProvDirec);

            Toast.fire({
                icon: "success",
                title: "Proveedor actualizado correctamente",
            });

            $("#modalProveedor").modal("hide");
            $("#txtProveedor").val();
            $("#txtProvDirec").val();
        }
    });

    $(document).on("click", ".newProveedor", function (event) {
        event.preventDefault();

        $("#modalProveedor").modal();
    });

    $(document).on("click", ".addProveedor", function (event) {
        event.preventDefault();
        validarProveedores();

        if (valProvs == true) {
            countProveedor++;

            id = "0" + countProveedor;
            txtProveedor = $("#txtProveedor").val();

            const tr = $(
                '<tr class="shadow border-row align-td" id="tr_05">' +
                    '<td class="align-td"></td>' +
                    '<td class="align-td">' +
                        '<a href="/href="/aplication/proveedores-detalle.html"" style="margin-left: 0.5rem">' +
                            '<span class="td-text">' + txtProveedor + '</span>' +
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
                        '<a type="button" href="#" data-id="05" class="trashCan" data-toggle="tooltip" data-placement="top" title="Eliminar Proveedor">' +
                            '<i class="fas fa-trash-alt"></i>' +
                        '</a>' +
                    '</td>' +
                '</tr>'
            );

            $("#countProveedor").val(countProveedor);
            $("#tblProveedores").DataTable().row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Proveedor agregado correctamente",
            });

            $("#modalProveedor").modal("hide");
            $("#txtProveedor").val();
            $("#txtDireccion").val();
            $("#txtProdProv").val();
            $("#txtFracAran").val();
        }
    });
});
