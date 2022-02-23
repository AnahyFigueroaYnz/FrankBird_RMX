// funcion de la mascara de moneda
var options = {
    onKeyPress: function (cep, e, field, options) {
        if (cep.length <= 6) {
            var inputVal = parseFloat(cep);
            jQuery("#money").val(inputVal.toFixed(2));
        } var masks = ["#,##0.00", '0.00'];
        mask = (cep == 0) ? masks[1] : masks[0];
        // $("#money").mask(mask, options);
    },
    reverse: true
};
// funcion de la mascara para cantidades
var optionsA = {
    onKeyPress: function (cepA, e, field, optionsA) {
        if (cepA.length <= 6) {
            var inputVal = parseFloat(cepA);
            jQuery("#money").val(inputVal.toFixed(2));
        } var masks = ["#,##0", '0'];
        mask = (cepA == 0) ? masks[1] : masks[0];
        // $("#money").mask(mask, optionsA);
    },
    reverse: true
};
var mascaras = {
    globales: function () {
        $(document).ready(function (jQuery) {
            /* prevenir funciones de jquery en el javscript */
            jQuery.noConflict();

            $('#txt_tarifaAerea').mask("#,##0.00", options);
            $('#txt_lcl').mask("#,##0.00", options);
            $('#txt_Ft20').mask("#,##0.00", options);
            $('#txt_Ft40').mask("#,##0.00", options);
            $('#txt_Hq40').mask("#,##0.00", options);

            /* mascara de input globales */
            $('#txtTipoCambioTarifas').mask('#,##0.00', options);
            $("#spLada").html('(+ 52)');
            $("#input_phone").attr("placeholder", "(000) 000 0000");
            $("#input_phone").mask('(000) 000 0000');
            $("#inpt_form_cantidad").mask("#,##0.00", options);
            $(".txtInternacional").mask("#,##0.00", options);
            $(".txtnacional").mask("#,##0.00", options);
            $(".txtImpuestos").mask("#,##0.00", options);
            $(".txtHonorarios").mask("#,##0.00", options);
            $(".txtOtros").mask("#,##0.00", options);
            $(".txtPrecio").mask("#,##0.00", options);
            $(".txtCantidad").mask("#,##0.00", optionsA);
            $(".txtTotal").mask("#,##0.00", options);
            $(".txtDTA").mask("#,##0.00", options);
            $(".txtDolar").mask("#,##0.00", options);
            $(".inpHonora").mask("#,##0.00", options);
            $(".ipRevalida").mask("#,##0.00", options);
            $(".ipComplment").mask("#,##0.00", options);
            $(".inpPrevio").mask("#,##0.00", options);
            $(".inpManiobra").mask("#,##0.00", options);
            $(".inpDesco").mask("#,##0.00", options);
            $("#txt_honorarios").mask("#,##0.00", options);
            $("#txt_revalidacion").mask("#,##0.00", options);
            $("#txt_complementarios").mask("#,##0.00", options);
            $("#txt_previo").mask("#,##0.00", options);
            $("#txt_maniobras_puerto").mask("#,##0.00", options);
            $("#txt_desconsolidacion").mask("#,##0.00", options);

            /* funciones del registro del proveedor del nuevo pedido */
            $("#sel_ladaProv").change(function () {
                $("#sel_ladaProv option:selected").each(function () {
                    var tel = $("#inpt_telefono_proveedor").val();
                    var Value = $("#sel_ladaProv option:selected").text();
                    if (tel !== "") {
                        $("#inpt_telefono_proveedor").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLadaProv").html(" ");
                    } else {
                        $("#spLadaProv").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                        $("#inpt_telefono_proveedor").attr("placeholder", "");
                        $("#inpt_telefono_proveedor").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#inpt_telefono_proveedor").removeAttr("disabled");
                        $("#inpt_telefono_proveedor").mask('(000) 000 0000');
                        $("#inpt_telefono_proveedor").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#inpt_telefono_proveedor").removeAttr("disabled");
                        $("#inpt_telefono_proveedor").mask('(000) 0000 0000');
                        $("#inpt_telefono_proveedor").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });

            /* funciones del registro del proveedor durante la cotizacion */
            $("#sel_LadaProvCal").change(function () {
                $("#sel_LadaProvCal option:selected").each(function () {
                    var tel = $("#txt_telefonoProvCal").val();
                    var Value = $("#sel_LadaProvCal option:selected").text();
                    if (tel !== "") {
                        $("#txt_telefonoProvCal").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLadaProvCal").html(" ");
                    } else {
                        $("#spLadaProvCal").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#txt_telefonoProvCal").mask('(000) 000 0000');
                        $("#txt_telefonoProvCal").attr("placeholder", "");
                        $("#txt_telefonoProvCal").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#txt_telefonoProvCal").removeAttr("disabled");
                        $("#txt_telefonoProvCal").mask('(000) 000 0000');
                        $("#txt_telefonoProvCal").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#txt_telefonoProvCal").removeAttr("disabled");
                        $("#txt_telefonoProvCal").mask('(000) 0000 0000');
                        $("#txt_telefonoProvCal").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });

            /* funciones del registro-editar agencias aduanales */
            $("#sel_LadaAgencia").change(function () {
                $("#sel_LadaAgencia option:selected").each(function () {
                    var tel = $("#txt_telefonoAgencia").val();
                    var Value = $("#sel_LadaAgencia option:selected").text();
                    if (tel !== "") {
                        $("#txt_telefonoAgencia").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLadaAgencia").html(" ");
                    } else {
                        $("#spLadaAgencia").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#txt_telefonoAgencia").mask('(000) 000 0000');
                        $("#txt_telefonoAgencia").attr("placeholder", "");
                        $("#txt_telefonoAgencia").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#txt_telefonoAgencia").removeAttr("disabled");
                        $("#txt_telefonoAgencia").mask('(000) 000 0000');
                        $("#txt_telefonoAgencia").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#txt_telefonoAgencia").removeAttr("disabled");
                        $("#txt_telefonoAgencia").mask('(000) 0000 0000');
                        $("#txt_telefonoAgencia").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });

            /* funciones del registro de agente en agencia */
            $("#sel_LadaAgente").change(function () {
                $("#sel_LadaAgente option:selected").each(function () {
                    var tel = $("#txt_telefonoAgente").val();
                    var Value = $("#sel_LadaAgente option:selected").text();
                    if (tel !== "") {
                        $("#txt_telefonoAgente").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLadaAgente").html(" ");
                    } else {
                        $("#spLadaAgente").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#txt_telefonoAgente").mask('(000) 000 0000');
                        $("#txt_telefonoAgente").attr("placeholder", "");
                        $("#txt_telefonoAgente").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#txt_telefonoAgente").removeAttr("disabled");
                        $("#txt_telefonoAgente").mask('(000) 000 0000');
                        $("#txt_telefonoAgente").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#txt_telefonoAgente").removeAttr("disabled");
                        $("#txt_telefonoAgente").mask('(000) 0000 0000');
                        $("#txt_telefonoAgente").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });

            /* funciones del registro del proveedor */
            $("#sel_LadaProveedor").change(function () {
                $("#sel_LadaProveedor option:selected").each(function () {
                    var tel = $("#txt_telefonoProveedor").val();
                    var Value = $("#sel_LadaProveedor option:selected").text();
                    if (tel !== "") {
                        $("#txt_telefonoProveedor").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLadaProveedor").html(" ");
                    } else {
                        $("#spLadaProveedor").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#txt_telefonoProveedor").mask('(000) 000 0000');
                        $("#txt_telefonoProveedor").attr("placeholder", "");
                        $("#txt_telefonoProveedor").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#txt_telefonoProveedor").removeAttr("disabled");
                        $("#txt_telefonoProveedor").mask('(000) 000 0000');
                        $("#txt_telefonoProveedor").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#txt_telefonoProveedor").removeAttr("disabled");
                        $("#txt_telefonoProveedor").mask('(000) 0000 0000');
                        $("#txt_telefonoProveedor").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });

            /* funcion de la edicion del perfil*/
            $("#LadasCelphone").change(function () {
                $("#LadasCelphone option:selected").each(function () {
                    var tel = $("#celphone").val();
                    var Value = $("#LadasCelphone option:selected").text();
                    if (tel !== "") {
                        $("#celphone").val("");
                    }
                    if (Value == "lada" || Value == "") {
                        $("#celphoneLada").html(" ");
                        $("#celphoneLada").css("background", "#e9ecef");
                    } else {
                        $("#celphoneLada").html(Value);
                        $("#celphoneLada").css("background", "#fff");
                    }

                    if (Value == "lada" || Value == "") {
                        $("#celphone").mask('(000) 000 0000');
                        $("#celphone").attr("disabled", 'true');
                        $("#celphone").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#celphone").removeAttr("disabled");
                        $("#celphone").mask('(000) 000 0000');
                        $("#celphone").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#celphone").removeAttr("disabled");
                        $("#celphone").mask('(000) 0000 0000');
                        $("#celphone").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });
        });
    },
}
jQuery(document).ready(function () {
    mascaras.globales(this);
});