//#region variables globales
var baseURL = $("#txtBaseUrl").val();
var data_proveedores;
//#endregion

// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

function proveedoresTabla() {
    data_proveedores.forEach(row => {
        var id_proveedor = row.id_proveedor;
        var proveedor;
        var contacto = row.contacto;
        var dir_pais = row.dir_pais;
        var lada;
        var email;
        var telefono;
        var web_site;
        var direccion;
        var count = 0;

        if ($(window).width() <= 400) {
            provRw = row.proveedor;
            provSt = provRw.toString();
            proveedor = provSt.substring(0, 10) + '...';
        } else if ($(window).width() <= 320) {
            provRw = row.proveedor;
            provSt = provRw.toString();
            proveedor = provSt.substring(0, 5) + '...';
        } else {
            proveedor = row.proveedor;
        }

        if (row.telefono == null) {
            tel = 'Por definir';
        } else {
            telefono = row.telefono;
            lada = "(+ " + row.codigo + ")";

            tel = lada + " " + telefono;
        }

        if (row.email == null) {
            email = "Por definir";
        } else {
            email = row.email;
        }

        if (row.direccion == null) {
            direccion = "Por definir";
        } else {
            direccion = row.direccion;
        }

        if (row.web_site == null) {
            web_site = "Por definir";
        } else {
            web_site = row.web_site;
        }

        const tr_provedor = $('<tr id="rwProv' + count + '">' +
            '<td class="align-td"></td>' +
            '<td class="align-td">' + id_proveedor + '"</td>' +
            '<td class="align-td">' +
            '<a href="' + baseURL + 'Proveedores/Detalle" style="margin-left: 0.5rem" data-id="' + id_proveedor + '">' +
            '<span class="td-text">' + proveedor + '</span>' +
            '</a>' +
            '</td>' +
            '<td class="align-td">' +
            '<span class="td-text">' + contacto + '</span>' +
            '</td>' +
            '<td class="align-td">' +
            '<span class="td-text">' + email + '</span>' +
            '</td>' +
            '<td class="align-td">' +
            '<span class="td-text">' + tel + '</span>' +
            '</td>' +
            '<td class="visible-td">' +
            '<span class="td-text">' + direccion + ', ' + dir_pais + '</span>' +
            '</td>' +
            '<td class="visible-td">' +
            '<span class="td-text">' + web_site + '</span>' +
            '</td>' +
            '<td class="align-td text-center">' +
            '<a href="' + baseURL + 'Proveedores/Detalle" type="button" class="editTask" data-id="' + id_proveedor + '" data-toggle="tooltip" data-placement="top" title="Detalle Proveedor"><i class="fas fa-external-link-alt"></i></a>' +
            '<a href="" type="button" class="trashCan eliminar_proveedor" data-id="' + id_proveedor + '" data-toggle="tooltip" data-placement="top" title="Eliminar Proveedor"><i class="far fa-trash-alt"></i></a>' +
            '</td>' +
            '</tr>');
        $("#tblProveedores").DataTable().row.add(tr_provedor[count]).draw(false);
        count++;
    });
    $("#tblProveedores").DataTable().order([2, "asc"]).draw();
}

function asignacion() {
    jQuery(function($) {
        $("#txtPrecio").inputmask({
            alias: "currency",
            prefix: "$",
            rightAlign: true,
            allowMinus: false,
            suffix: " ud"
        });
        $("#txtCantidad").inputmask({
            alias: "currency",
            prefix: "$",
            rightAlign: true,
            allowMinus: false
        });
        $("#txtFraccAran").inputmask("99999999", {
            rightAlign: false,
            allowMinus: false,
            placeholder: "00000000"
        });

        // $(".js-example-tokenizer").select2({
        //     tags: true,
        //     tokenSeparators: [',', ' '],
        //     placeholder: "Select a state"
        // });


        $("#txtInternacional").inputmask({
            alias: "currency",
            prefix: "$",
            rightAlign: true,
            allowMinus: false
        });

    });
}

function validarProducto() {
    valPrecio = $("#txtPrecio").val();
    valMedida = $("#selMedida").val();
    valProducto = $("#txtProducto").val();
    valFraccion = $("#txtFraccion").val();

    if (valPrecio == "" && (valMedida == null || valMedida == 0)) {
        $("#val_txtPrecio").css("display", "");
    } else if (valPrecio != "" && (valMedida != null || valMedida != 0)) {
        $("#val_txtPrecio").css("display", "none");
    }

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

function validarContacto() {
    valLada = $("#selLada").val();
    valCorreo = $("#txtCorreo").val();
    valContacto = $("#txtContacto").val();
    valTelefono = $("#txtTelefono").val();

    if (valLada == null || valLada == 0) {
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

function validarProveedores() {
    valDireccion = $("#txtPais").val();
    valProveedor = $("#txtProveedores").val();

    if (valProveedor == "") {
        $("#val_txtProveedores").css("display", "");
    } else if (valProveedor != "") {
        $("#val_txtProveedores").css("display", "none");
    }

    if (valDireccion == "") {
        $("#val_val_txtPais").css("display", "");
    } else if (valDireccion != "") {
        $("#val_val_txtPais").css("display", "none");
    }


    if (valProveedor != "" && valDireccion != "" && valProdProv != "" && valFracAran != "") {
        valProvs = true;
    } else {
        valProvs = false;
    }
}

$(document).ready(function() {
    jQuery.noConflict();
});


var proveedores = {
    ready: function() {

        asignacion();

        var dataLada = $("#dataLada").html();
        var dataPais = $("#dataPais").html();
        var dataCorreo = $("#dataCorreo").html();
        var dataPrecio = $("#dataPrecio").html();
        var dataMedida = $("#dataMedida").html();
        var dataWebSite = $("#dataWebSite").html();
        var dataFactura = $("#dataFactura").html();
        var dataContacto = $("#dataContacto").html();
        var dataTelefono = $("#dataTelefono").html();
        var dataProducto = $("#dataProducto").html();
        var dataDireccion = $("#dataDireccion").html();
        var dataProveedores = $("#dataProveedores").html();

        var selLada = $("#selLada").val();
        var txtPais = $("#txtPais").val();
        var txtCorreo = $("#txtCorreo").val();
        var txtPrecio = $("#txtPrecio").val();
        var selMedida = $("#selMedida").val();
        var txtWebSite = $("#txtWebSite").val();
        var txtFactura = $("#txtFactura").val();
        var txtContacto = $("#txtContacto").val();
        var txtTelefono = $("#txtTelefono").val();
        var txtDireccion = $("#txtDireccion").val();
        var txtProveedores = $("#txtProveedores").val();

        var txtOrigen = $("#txtOrigen").val();
        // console.log(txtOrigen);
        // $("#tagsImput").keypress(function(e) {
        //     var select2 = $("#tagsImput").val();
        //     var code = (e.keyCode ? e.keyCode : e.which);
        //     if (code == 13) {
        //         console.log(select2);
        //     }
        // });

        console.log($(window).width());

    },
    list_proveedores: function() {
        var cc = 0;
        data_proveedores = cargar_ajax.run_server_ajax('proveedores/Data_Proveedores');
        if (data_proveedores != false) {
            proveedoresTabla();

            window.onresize = function() {
                data_proveedores.forEach(row => {
                    console.log(row.id_proveedor - 1);
                    var tis = $("rwProv" + row.id_proveedor - 1 + "");
                    console.log(tis);
                    $("#tblProveedores").DataTable().row().remove().draw();
                    cc++;
                });
                proveedoresTabla();
            };
        }
    },
    form_proveedor: function() {
        $(document).on("click", ".btnNuevo", function(event) {
            event.preventDefault();

            jQuery(function($) {
                $('#mdlProveedor').modal();
            });
            $('#mdlProveedor_title').html("Nuevo proveedor");
            $('#mdlProveedor_submit').html("Agregar");
            $('#mdlProveedor_submit').addClass("addTask");
            $('#mdlProveedor_submit').removeClass("saveTask");
        });
    },
    agregar_proveedor: function() {
        $(document).on("click", ".addProveedor", function(event) {
            event.preventDefault();
            jQuery.noConflict();
            jQuery(function($) {
                $("#modal_add_edit_proveedor").modal();
            });
            $("#modal_proveedorLabel").html("Agregar Proveedor");
        });

        $("#add_edit_proveedor").on("submit", function(form) {
            form.preventDefault();
            var IdProve = $("#txtIdProveedor").val();

            if (IdProve === "") {
                var data = {
                    proveedor: $("#txt_proveedor").val(),
                    contacto: $("#txt_contacto").val(),
                    email: $("#txt_email").val(),
                    id_lada: $("#sel_LadaProveedor").val(),
                    telefono: $("#txt_telefonoProveedor").val(),
                    direccion: $("#txt_direccion").val(),
                    wechat: $("#txt_wechat").val(),
                    website: $("#txt_webSite").val(),
                };

                cargar_ajax.run_server_ajax("Plataforma/crear_proveedor", data);

                //Crear funcion para producto
                resp_in_prov = cargar_ajax.run_server_ajax("Plataforma/ultimo_prov");
                var id_prov = resp_in_prov.id_proveedor;
                var data_producto = {
                    id_proveedor: resp_in_prov.id_proveedor,
                    producto: $("#txt_producto_provinsert").val(),
                    fracc_arancelaria: $("#txt_fracc_provinsert").val(),
                };
                cargar_ajax.run_server_ajax("Plataforma/crear_producto", data_producto);

                swal
                    .fire({
                        title: "CORRECTO",
                        text: "SE AGREGARON CORRECTAMENTE LOS DATOS",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                    })
                    .then((result) => {
                        location.reload();
                    });
            } else if (IdProve !== "") {
                var data = {
                    id_proveedor: IdProve,
                    proveedor: $("#txt_proveedor").val(),
                    contacto: $("#txt_contacto").val(),
                    email: $("#txt_email").val(),
                    id_lada: $("#sel_LadaProveedor").val(),
                    telefono: $("#txt_telefonoProveedor").val(),
                    direccion: $("#txt_direccion").val(),
                    wechat: $("#txt_wechat").val(),
                    website: $("#txt_webSite").val(),
                };
                cargar_ajax.run_server_ajax("Plataforma/editar_proveedor", data);
                swal
                    .fire({
                        title: "CORRECTO",
                        text: "SE MODIFICARON CORRECTAMENTE LOS DATOS",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                    })
                    .then((result) => {
                        location.reload();
                    });
            }
        });

        // agregar proveedor desde la cotización
        // $(document).on("click", ".btnaddNewProv", function (event) {
        // 	event.preventDefault();
        // 	jQuery.noConflict();
        // 	jQuery(function ($) {
        // 		$("#modal_add_edit_proveedor").modal();
        // 	});
        // 	$("#modal_proveedorLabel").html("Agregar Proveedor");
        // });
    },
}

jQuery(document).ready(function() {
    proveedores.ready(this);
    proveedores.list_proveedores(this);
    proveedores.form_proveedor(this);
});