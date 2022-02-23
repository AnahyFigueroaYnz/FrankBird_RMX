// funcion de la mascara de moneda
var options = {
    onKeyPress: function (cep, e, field, options) {
        if (cep.length <= 6) {
            var inputVal = parseFloat(cep);
            jQuery('#money').val(inputVal.toFixed(2));
        } var masks = ['#,##0.00', '0.00'];
        mask = (cep == 0) ? masks[1] : masks[0];
        // $('#money').mask(mask, options);
    },
    reverse: true
};
// funcion de la mascara para cantidades
var optionsA = {
    onKeyPress: function (cepA, e, field, optionsA) {
        if (cepA.length <= 6) {
            var inputVal = parseFloat(cepA);
            jQuery('#money').val(inputVal.toFixed(2));
        } var masks = ['#,##0', '0'];
        mask = (cepA == 0) ? masks[1] : masks[0];
        // $('#money').mask(mask, optionsA);
    },
    reverse: true
};
// funcion de la mascara de medida en Cotizador Home con 3 despues del punto
var options3 = {
    onKeyPress: function (cep, e, field, options) {
        if (cep.length <= 6) {
            var inputVal = parseFloat(cep);
            jQuery('#money').val(inputVal.toFixed(2));
        } var masks = ['#,##0.000', '0.000'];
        mask = (cep == 0) ? masks[1] : masks[0];
        // $('#money').mask(mask, options);
    },
    reverse: true
};
var mascaras = {
    globales: function () {
        $(document).ready(function (jQuery) {
            /* prevenir funciones de jquery en el javscript */
            // jQuery.noConflict();

            /* mascara de input globales */
            $('#spLada').html('(+ 52)');
            $("#input_phone").attr("placeholder", "(000) 000 0000");
            $("#input_phone").mask('(000) 000 0000');
            $('#txtVolumen').mask('#,##0.000', options3);
            $('#txtPeso').mask('#,##0.000', options3);
            $('#txtValor').mask('#,##0.00', options);
            $('#txtFrac_arancel').mask('#,##0', optionsA);

            /* funciones del registro home */
            $("#sel_Lada").change(function () {
                $("#sel_Lada option:selected").each(function () {
                    var tel = $("#input_phone").val();
                    var Value = $("#sel_Lada option:selected").text();
                    if (tel !== "") {
                        $("#input_phone").val("");
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#spLada").html(" ");
                    } else {
                        $("#spLada").html(Value);
                    }
                    
                    if (Value == "lada" || Value == "") {
                        $("#input_phone").mask('(000) 000 0000');
                        $("#input_phone").attr("placeholder", "");
                        $("#input_phone").attr("disabled", 'true');
                    } else if (Value == '(+ 1)' || Value == '(+ 52)' || Value == '(+ 66)' || Value == '(+ 84)' || Value == '(+ 91)') {
                        $("#input_phone").removeAttr("disabled");
                        $("#input_phone").mask('(000) 000 0000');
                        $("#input_phone").attr("placeholder", "(000) 000 0000");
                    } else if (Value == '(+ 81)' || Value == '(+ 82)' || Value == '(+ 86)') {
                        $("#input_phone").removeAttr("disabled");
                        $("#input_phone").mask('(000) 0000 0000');
                        $("#input_phone").attr("placeholder", "(000) 0000 0000");
                    }
                });
            });
        });
    },
}
jQuery(document).ready(function () {
    mascaras.globales(this);
});