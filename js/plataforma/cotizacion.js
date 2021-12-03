// variables globales
var Listproductos = new Array();
var revalidacion;
var complementario;
var previo;
var maniobra;
var desconsolidacion;
var IDAgencia;
var countProducts = $('.txtCountProductos').val();
var arancel;
var porcen;
var valorMer;
var feleteInter;
var suma;
var arreglo_imagenes = new Array();
var file_Files = " ";
var countimagen = 1;
var countProd = 1;
var frmDataCot = new FormData();
var patha_tempo = '';
var valProducto = false;
var valCotizacion = false;
var i = 1;
var prodAgregado;
var HonorariosAA;
var idImgCotCl;
var table;
var baseUrl = $("#baseURL").val();

// funcion para convertir un numero en formato string a numero con comas y decimales
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}

// validar el contenido de la tabla de la agencia
function tablaAgen(tabla) {
    // cantidad de contenido dentro de la tabla
    let filasAgen = $(tabla).find('tbody tr').length;
    if (filasAgen > 1) {
        return 1;
    }
    else {
        return 0;
    }
}

// limpiar tabla de agencias
function emptyTablaAgen() {
    $('#tblAgencias tbody tr').remove();

    $('#tblAgencias td').find(".totalAgencia").html(0.00);

    $(function () {
        if (tablaAgen(tblAgencias)) {
            $('#AgenciasList').show();
            $('#btnAgencias').addClass('hide-button');
            $('#btnEditar').removeClass('hide-button');
        }
        else {
            $('#AgenciasList').hide();
            $('#btnAgencias').removeClass('hide-button');
            $('#btnEditar').addClass('hide-button');
        }
    });
}

// limpiar tabla de productos
function emptyTablaProd() {
    countProducts = 0;
    $("#accProd").empty();

    $('#tblproductoF tr').find("#totalPrecio").html(0.00);

    $('#tblproductoF tr').find("#totalCantidad").html(0.00);

    $('#tblproductoF tr').find("#totalTotal").html(0.00);

    if (countProducts !== 0) {
        $('#productosList').show();
    }
    else {
        $('#productosList').hide();
        $('.colProductos').removeClass('collapse show');
        $('.colProductos').addClass('collapse');
    }
}

// validar los campos de los productos a agegar
function validarProducto() {
    var valPrecio = $('.txtPrecio').val();
    var valCantidad = $('.txtCantidad').val();
    var valMedida = $('.slUnidad').val();
    var valExpec = $('.txtExpe').val();

    if (valPrecio !== '') {
        $('#val_txtPrecio').css('display', 'none');
    } else if (valPrecio === '') {
        $('#val_txtPrecio').css('display', '');
    }

    if (valCantidad !== '') {
        $('#val_txtCantidad').css('display', 'none');
    } else if (valCantidad === '') {
        $('#val_txtCantidad').css('display', '');
    }

    if (valMedida !== "0") {
        $('#val_slUnidad').css('display', 'none');
    } else if (valMedida === "0") {
        $('#val_slUnidad').css('display', '');
    }

    if (valExpec !== '') {
        $('#val_txtExpe').css('display', 'none');
    } else if (valExpec === '') {
        $('#val_txtExpe').css('display', '');
    }

    if ((valPrecio && valCantidad && valExpec) !== '' && valMedida !== "0") {
        valProducto = true;
    } else {
        valProducto = false;
    }
}

// validacion de los campos de la cotización
function validarCtizacion() {
    var valNombre = $('.txtNombreCot').val();
    var valEntrega = $('.txtEntrega').val();
    var valDolar = $('.txtDolar').val();
    var valTotalCotizacion = $('.txtTotalCotizacion').val();
    var valSalida = $('.slpuertoSalida').val();
    var valLlegada = $('.slpuertoLllegada').val();
    var valInternacional = $('.txtInternacional').val();
    var valNacional = $('.txtnacional').val();
    var valImpuesto = $('.slArancel').val();
    var valMercancia = $('.txtValorMercancia').val();
    var valIdAgencia = $('.txtIdAgencia').val();

    if (valNombre !== "") {
        $('#val_txtNombreCot').css('display', 'none');
    } else if (valNombre === '') {
        $('#val_txtNombreCot').css('display', '');
    }

    if (valEntrega !== "") {
        $('#val_txtEntrega').css('display', 'none');
    } else if (valEntrega === '') {
        $('#val_txtEntrega').css('display', '');
    }

    if (valDolar !== "" || valDolar !== "0") {
        $('#val_txtDolar').css('display', 'none');
    } else if (valDolar === '' || valDolar === "0") {
        $('#val_txtDolar').css('display', '');
    }

    if (valTotalCotizacion === '' || valTotalCotizacion === '0' || valTotalCotizacion === '0.00') {
        $('#val_txtTotalCotizacion').css('display', '');
    } else if (valTotalCotizacion !== '' || valTotalCotizacion !== '0' || valTotalCotizacion !== '0.00') {
        $('#val_txtTotalCotizacion').css('display', 'none');
    }

    if (valSalida !== "0") {
        $('#val_slpuertoSalida').css('display', 'none');
    } else if (valSalida === "0") {
        $('#val_slpuertoSalida').css('display', '');
    }
    if (valLlegada !== "0") {
        $('#val_slpuertoLllegada').css('display', 'none');
    } else if (valLlegada === "0") {
        $('#val_slpuertoLllegada').css('display', '');
    }

    if (valInternacional !== "") {
        $('#val_txtInternacional').css('display', 'none');
    } else if (valInternacional === '') {
        $('#val_txtInternacional').css('display', '');
    }

    if (valNacional !== "") {
        $('#val_txtnacional').css('display', 'none');
    } else if (valNacional === '') {
        $('#val_txtnacional').css('display', '');
    }

    if (valImpuesto !== "-1") {
        $('#val_slArancel').css('display', 'none');
    } else if (valImpuesto === "-1") {
        $('#val_slArancel').css('display', '');
    }

    if (valMercancia === '0' || valMercancia === '0.00' || valMercancia === '') {
        $('#val_txtValorMercancia').css('display', '');
    } else if (valMercancia !== '0' || valMercancia !== '0.00' || valMercancia !== '') {
        $('#val_txtValorMercancia').css('display', 'none');
    }

    if (valIdAgencia !== "") {
        $('#val_txtIdAgencia').css('display', 'none');
    } else if (valIdAgencia === '') {
        $('#val_txtIdAgencia').css('display', '');
    }

    if ((valNombre && valEntrega && valDolar && valTotalCotizacion && valInternacional && valNacional && valMercancia && valIdAgencia) !== ""
        && (valDolar && valTotalCotizacion && valMercancia && valSalida && valLlegada && valImpuesto) !== "-1") {
        valCotizacion = true;
    } else {
        valCotizacion = false;
    }
}

// funcion al hacer cambio en el tipo de cambio 
function convValues() {
    changeValues();
}
// funcion de calculos con el cambio de algun valor en inputs o tablas
function changeValues() {
    var cot = 0;
    var inter = 0;
    var nacio = 0;
    var otros = 0;
    var hono = 0;
    var dta = 0;
    var prod = 0;
    var agen = 0;
    var dll = 0;
    var total = 0;
    var cotSum;
    var totalD;
    var totlS;
    var totalC;
    var sumaFyO;
    var dlls = parseFloat($('.txtDolar').val());
    var Mercan = $('.txtValorMercancia').val();
    var int = $('.txtInternacional').val();
    var otr = $('.txtOtros').val();
    var nac = $('.txtnacional').val();
    var valDTA = $('.txtDTA').val();
    var hon = $('.txtHonorarios').val();
    var age = $('.txtValorAgencia').val();
    var valCoti = $('.txtTotalCotizacion').val();
    var aran = $('.slArancel').val();

    // comprobar si el valor del input es vacio o nan sino tomar su contenido
    if (valCoti === '' || valCoti === NaN) {
        cot = '0';
    } else {
        cot = valCoti;
        var coti = parseFloat((cot).replace(/,/g, ""));
    }

    // comprobar si el valor del input es vacio sino tomar su contenido
    if (dlls === '') {
        dlls = 0;
    } else {
        dll = dlls;
    }


    // comprobar si el valor del input es vacio sino tomar su contenido
    if (int === '') {
        inter = '0';
        // comprobar si el valor del input es vacio sino tomar su contenido
        if (otr === '') {
            otros = '0'
            feleteInter = 0;
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                hono = 0;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // reflejar el resultado en el objeto de AA
                $('.inpHonora').val(hono);
                // asignar el valor a la variable globar del calculo
                honoAA = 0;
                HonorariosAA = 0;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    dta = '0';
                    $('.txtDTA').val('0');
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                } else {
                    arancel = 0;
                    porcen = 0;
                    dta = '0';
                    $('.txtDTA').val('0');
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * dlls;
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                // igaualar el valor glabal a l de la suma
                prod = prodCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + 0;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + 0;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + 0 + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + arancel + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        } else {
            var otroFl = parseFloat((otr).replace(/,/g, ""));
            var multiOtro = otroFl * dlls;
            var otroFix = (multiOtro).toFixed(2);
            var otroStr = String(otroFix);
            var otroCom = numberWithCommas(otroStr);
            var otroFlo = parseFloat(otroFix);
            otros = otroCom;
            sumaFyO = 0 + otroFlo;
            feleteInter = sumaFyO;
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = 0 + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * dlls;
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        }
    } else {
        // comprobar si el valor del input es vacio sino tomar su contenido
        if (otr === '') {
            otros = '0'
            var interFl = parseFloat((int).replace(/,/g, ""));
            var multi = interFl * dlls;
            sumaFyO = multi + 0;
            feleteInter = sumaFyO;
            var interFix = (feleteInter).toFixed(2);
            var interStr = String(interFix);
            var InterCom = numberWithCommas(interStr);
            inter = InterCom;
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = 0 + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * dlls;
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        } else {
            // converir el valor a numero flotante y quitar comas separadoras
            var interFl = parseFloat((int).replace(/,/g, ""));
            var otroFl = parseFloat((otr).replace(/,/g, ""));
            // multipilicar el valor obtenido por el tipo de cambio actual
            var multi = interFl * dlls;
            var multiOtro = otroFl * dlls;
            // sumar los dos valores para obtener un solo valor total
            sumaFyO = multi + multiOtro;
            feleteInter = sumaFyO;
            // fijar los decimales a solo dos, redondeando los decimales extra 
            var interFix = (feleteInter).toFixed(2);
            // convertir a string el valor
            var interStr = String(interFix);
            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
            var InterCom = numberWithCommas(interStr);
            inter = InterCom;
            // fijar los decimalesa solo dos, redondeando los decimales extra
            var otroFix = (multiOtro).toFixed(2);
            var otroStr = String(otroFix);
            var otroCom = numberWithCommas(otroStr);
            otros = otroCom;
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * dlls;
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + feleteInter + valorMer;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        }
    }

    // comprobar si el valor del input es vacio sino tomar su contenido
    if (Mercan === '') {
        prod = '0';
        valorMer = 0;
        // comprobar si el valor del input es vacio sino tomar su contenido
        if (int === '') {
            inter = '0';
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (otr === '') {
                otros = '0'
                feleteInter = 0;
                hono = 0;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // reflejar el resultado en el objeto de AA
                $('.inpHonora').val(hono);
                // asignar el valor a la variable globar del calculo
                honoAA = 0;
                HonorariosAA = 0;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    dta = '0';
                    $('.txtDTA').val('0');
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                } else {
                    arancel = 0;
                    porcen = 0;
                    dta = '0';
                    $('.txtDTA').val('0');
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                }
            } else {
                var otroFl = parseFloat((otr).replace(/,/g, ""));
                var multiOtro = otroFl * dlls;
                var otroFix = (multiOtro).toFixed(2);
                var otroStr = String(otroFix);
                var otroCom = numberWithCommas(otroStr);
                var otroFlo = parseFloat(otroFix);
                otros = otroCom;
                sumaFyO = 0 + otroFlo;
                feleteInter = sumaFyO;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = 0 + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = 0 + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        } else {
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (otr === '') {
                otros = '0'
                var interFl = parseFloat((int).replace(/,/g, ""));
                var multi = interFl * dlls;
                sumaFyO = multi + 0;
                feleteInter = sumaFyO;
                var interFix = (feleteInter).toFixed(2);
                var interStr = String(interFix);
                var InterCom = numberWithCommas(interStr);
                inter = InterCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = 0 + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = 0 + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var interFl = parseFloat((int).replace(/,/g, ""));
                var otroFl = parseFloat((otr).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                var multi = interFl * dlls;
                var multiOtro = otroFl * dlls;
                // sumar los dos valores para obtener un solo valor total
                sumaFyO = multi + multiOtro;
                feleteInter = sumaFyO;
                // fijar los decimales a solo dos, redondeando los decimales extra 
                var interFix = (feleteInter).toFixed(2);
                // convertir a string el valor
                var interStr = String(interFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var InterCom = numberWithCommas(interStr);
                inter = InterCom;
                // fijar los decimalesa solo dos, redondeando los decimales extra
                var otroFix = (multiOtro).toFixed(2);
                var otroStr = String(otroFix);
                var otroCom = numberWithCommas(otroStr);
                otros = otroCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = 0 + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = 0 + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = 0 + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + 0 + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        }
    } else {
        // converir el valor a numero flotante y quitar comas separadoras
        var prodFl = parseFloat((Mercan).replace(/,/g, ""));
        // multipilicar el valor obtenido por el tipo de cambio actual
        valorMer = prodFl * dlls;
        // convertir a string el valor
        var prodStr = String(valorMer);
        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
        var prodCom = numberWithCommas(prodStr);
        prod = prodCom;
        // comprobar si el valor del input es vacio sino tomar su contenido
        if (int === '') {
            inter = '0';
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (otr === '') {
                otros = '0'
                feleteInter = 0;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + 0;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + 0;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + valorMer + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + 0;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + valorMer + 0;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                var otroFl = parseFloat((otr).replace(/,/g, ""));
                var multiOtro = otroFl * dlls;
                var otroFix = (multiOtro).toFixed(2);
                var otroStr = String(otroFix);
                var otroCom = numberWithCommas(otroStr);
                var otroFlo = parseFloat(otroFix);
                otros = otroCom;
                sumaFyO = 0 + otroFlo;
                feleteInter = sumaFyO;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        } else {
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (otr === '') {
                otros = '0'
                var interFl = parseFloat((int).replace(/,/g, ""));
                var multi = interFl * dlls;
                sumaFyO = multi + 0;
                feleteInter = sumaFyO;
                var interFix = (feleteInter).toFixed(2);
                var interStr = String(interFix);
                var InterCom = numberWithCommas(interStr);
                inter = InterCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto 
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var interFl = parseFloat((int).replace(/,/g, ""));
                var otroFl = parseFloat((otr).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                var multi = interFl * dlls;
                var multiOtro = otroFl * dlls;
                // sumar los dos valores para obtener un solo valor total
                sumaFyO = multi + multiOtro;
                feleteInter = sumaFyO;
                // fijar los decimales a solo dos, redondeando los decimales extra 
                var interFix = (feleteInter).toFixed(2);
                // convertir a string el valor
                var interStr = String(interFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var InterCom = numberWithCommas(interStr);
                inter = InterCom;
                // fijar los decimalesa solo dos, redondeando los decimales extra
                var otroFix = (multiOtro).toFixed(2);
                var otroStr = String(otroFix);
                var otroCom = numberWithCommas(otroStr);
                otros = otroCom;
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                var sumHono = valorMer + feleteInter;
                // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                if (valorMer >= 0 && valorMer < 25001) {
                    var multiHono = sumHono * 0.08;
                } else if (valorMer > 25000 && valorMer < 50001) {
                    var multiHono = sumHono * 0.07;
                } else if (valorMer > 50000 && valorMer < 100001) {
                    var multiHono = sumHono * 0.065;
                } else if (valorMer > 100000 && valorMer < 200001) {
                    var multiHono = sumHono * 0.055;
                } else if (valorMer > 200000 && valorMer < 300001) {
                    var multiHono = sumHono * 0.05;
                } else if (valorMer > 300000 && valorMer < 500001) {
                    var multiHono = sumHono * 0.045;
                } else if (valorMer > 500000) {
                    var multiHono = sumHono * 0.04;
                }
                // acortar los decimales a 2
                var honoFix = (multiHono).toFixed(2);
                // convertir a string el valor
                var honoStr = String(honoFix);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoCom = numberWithCommas(honoStr);
                // asignar el valor a la variable globar del calculo
                hono = honoCom;
                // reflejar el resultado en el objeto
                $('.txtHonorarios').val(hono);
                // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                var sumHonoAA = valorMer + feleteInter;
                // multiplicar la suma por el porcentaje de AA
                var multiHonoAA = sumHonoAA * 0.0045;
                // acortar los decimales a 2
                var honoFixAA = (multiHonoAA).toFixed(2);
                // convertir a string el valor
                var honoStrAA = String(honoFixAA);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var honoComAA = numberWithCommas(honoStrAA);
                // asignar el valor a la variable globar del calculo
                honoAA = honoComAA;
                HonorariosAA = honoFixAA;
                // reflejar el resultado en el objeto  de AA
                $('.txtHonorarioA').val(honoAA);
                var txtCot = $('.txtTotalCotizacion').val();
                var txtHonoAA = $('.txtHonorarioA').val();
                var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                    var cot = parseFloat((txtCot).replace(/,/g, ""));
                    var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                    var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                    var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                    // hacer la resta del total de agencia a la cotizacion
                    var resta = cot - totalAA;
                    // acortar los decimales a 2
                    var restaFix = (resta).toFixed(2);
                    // convertir el valor a flotante
                    var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                    // hacer la resta del honorario al total de AA
                    var restaAA = totalAA - honoAA;
                    // acortar los decimales a 2
                    var restaAAFix = (restaAA).toFixed(2);
                    // convertir el valor a flotante
                    var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                    // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                    var sumaAA = restaAAFl + honoCal;
                    // acortar los decimales a 2
                    var sumaAAFix = (sumaAA).toFixed(2);
                    // convertir a string el valor
                    var sumaStrAA = String(sumaAAFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaComAA = numberWithCommas(sumaStrAA);
                    // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                    var suma = restaFl + sumaAA;
                    // acortar los decimales a 2
                    var sumaFix = (suma).toFixed(2);
                    // convertir a string el valor
                    var sumaStr = String(sumaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var sumaCom = numberWithCommas(sumaStr);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find("#lblHonor").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                    // limpiar el valor anterior
                    $('#tblAgencias td').find(".totalAgencia").empty();
                    // asignar el nuevo valor al campo
                    $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                    // asignar el nuevo valor de la cotizacion con el cambio
                    $('.txtTotalCotizacion').val(sumaCom);
                }
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (nac === '') {
                    nacio = '0';
                } else {
                    nacio = nac;
                }
                // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                if (aran === '-1' && aran === '0') {
                    arancel = 0;
                    porcen = 0;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = 0 + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                        parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                } else {
                    // sumar los valores involucrados en la operacion
                    suma = valorMer + feleteInter;
                    // convertir el valor a un numero flotante
                    var aranPa = parseFloat(aran);
                    // obtener el procentaje de la suma con el valor seleccionado
                    porcen = suma * aranPa;
                    // sumar la suma con el porcenaje obtenido de esta misma 
                    var aranc = suma + porcen;
                    // igualar variable globar con el resulrado de suma
                    arancel = aranc;
                    // sumar el valor del flete con el de la mercancia para sacar el valor dta
                    var sumDTA = arancel + valorMer + feleteInter;
                    // multiplicar con el porcentaje de DTA
                    var multiDTA = sumDTA * 0.008;
                    // acortar los decimales a 2
                    var dtaFix = (multiDTA).toFixed(2);
                    // convertir a string el valor
                    var dtaStr = String(dtaFix);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var dtaCom = numberWithCommas(dtaStr);
                    // asignar el valor a la variable globar del calculo
                    dta = dtaStr;
                    // reflejar el resultado en el objeto 
                    $('.txtDTA').val(dtaCom);
                    // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                    total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                        parseFloat((hono).replace(/,/g, ""));
                }
            }
        }
    }


    // comprobar si el valor del input es vacio sino tomar su contenido
    if (nac === '') {
        nacio = '0';
    } else {
        nacio = nac;
    }


    // comprobar si el valor del input es vacio sino tomar su contenido
    if (age === '') {
        agen = '0';
    } else {
        agen = age;
    }


    // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
    if (aran !== '-1' && aran !== '0') {
        // sumar los valores involucrados en la operacion
        suma = valorMer + feleteInter;
        // convertir el valor a un numero flotante
        var aranPa = parseFloat(aran);
        // obtener el procentaje de la suma con el valor seleccionado
        porcen = suma * aranPa;
        // sumar la suma con el porcenaje obtenido de esta misma 
        var aranc = suma + porcen;
        arancel = aranc;
        // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
        total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
            parseFloat((hono).replace(/,/g, ""));
    } else {
        arancel = 0;
        porcen = 0;
        // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
        total = parseFloat((inter).replace(/,/g, "")) + parseFloat((nacio).replace(/,/g, "")) +
            parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
    }


    // comprobas el contenido de la variable y proceder con la funcion segun sea el caso
    if (prod === "0" && agen === "0") {
        cotSum = total;
        // fijar los decimales a solo dos, redondeando los decimales extra 
        totalD = cotSum.toFixed(2);
        // convertir a string el valor
        totlS = String(totalD);
        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
        totalC = numberWithCommas(totlS);
        $('.txtTotalCotizacion').val(totalC);
    } else if (prod !== "0" && agen === "0") {
        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
        if (aran !== '-1' && aran !== "0") {
            cotSum = total;
            totalD = cotSum.toFixed(2);
            totlS = String(totalD);
            totalC = numberWithCommas(totlS);
            $('.txtTotalCotizacion').val(totalC);
        } else {
            cotSum = parseFloat((prod).replace(/,/g, "")) + total;
            totalD = cotSum.toFixed(2);
            totlS = String(totalD);
            totalC = numberWithCommas(totlS);
            $('.txtTotalCotizacion').val(totalC);
        }
    } else if (prod === "0" && agen !== "0") {
        cotSum = parseFloat((agen).replace(/,/g, "")) + total;
        totalD = cotSum.toFixed(2);
        totlS = String(totalD);
        totalC = numberWithCommas(totlS);
        $('.txtTotalCotizacion').val(totalC);
    } else if (prod !== "0" && agen !== "0") {
        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
        if (aran !== '-1' && aran !== "0") {
            cotSum = parseFloat((agen).replace(/,/g, "")) + total;
            totalD = cotSum.toFixed(2);
            totlS = String(totalD);
            totalC = numberWithCommas(totlS);
            $('.txtTotalCotizacion').val(totalC);
        } else {
            cotSum = parseFloat((prod).replace(/,/g, "")) + parseFloat((agen).replace(/,/g, "")) + total;
            totalD = cotSum.toFixed(2);
            totlS = String(totalD);
            totalC = numberWithCommas(totlS);
            $('.txtTotalCotizacion').val(totalC);
        }
    }
    validarCtizacion();
}

function mostrar() {
    validarProducto();
    var txtprecio;
    var txtcantidad;

    if ($('.txtPrecio').val() === '') {
        txtprecio = '0';
    } else {
        txtprecio = $('.txtPrecio').val();
    }

    if ($('.txtCantidad').val() === '') {
        txtcantidad = '0';
    } else {
        txtcantidad = $('.txtCantidad').val();
    }

    var precio = txtprecio;
    var precioRound = parseFloat((precio).replace(/,/g, ""));
    var precioFix = (precioRound).toFixed(2);
    var cantidad = txtcantidad;
    var cantRound = parseFloat((cantidad).replace(/,/g, ""));
    var cantFix = (cantRound).toFixed(2);

    var totalMul = precioFix * cantFix;
    var totalRed = totalMul.toFixed(2);
    var totalSt = String(totalRed);
    var total = numberWithCommas(totalSt);
    $('.txtTotal').val(total);
}

function changeSelect() {
    validarCtizacion();
}


var agencias = {
    // Abrir modal de las agencias
    modal_agencias: function () {
        $('#btnAgencias').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modalAgencia").modal();
            });
        });
    },

    // Agregar agencia a la cotización
    agregar_agencia: function () {
        $(document).on('click', '.btnAddAgencias', function (event) {
            event.preventDefault();
            jQuery.noConflict();
            // obtener el id de la agencia
            var data = { id_agencia: $('#txtIdAgenciaAduanal').val() };
            // dar valor al input de idAgencia
            $('.txtIdAgencia').val(data.id_agencia);
            // traer puertos correspondientes al identificador de la agencia
            var trasport = cargar_ajax.run_server_ajax('plataforma/datos_transporte', data);
            // dar el valor defail a la variable que llenará el select
            var filas = '<option value="0" selected="">Elegir</option>';
            // recorrer el array de los datos obtenidos y agregarlos a la varibale 
            trasport.forEach(element => {
                filas += '<option value="' + element.id_transporte + '">' + element.transporte + ' - ' + element.clave + '</option>'
            });
            $('.slpuertoLllegada').prop('disabled', false);
            // llenar el select con los puertos correspondientes
            $('.slpuertoLllegada').html(filas);

            // traer datos de la agencia segun el identificador seleccionado
            var response = cargar_ajax.run_server_ajax('plataforma/datos_agencia', data);

            // igualar los datos de BD a variables locales
            nombreAg = response.Data_Agencia.agencia;
            revalidacion = response.Data_Agencia.revalidacion;
            complementario = response.Data_Agencia.complementarios;
            previo = response.Data_Agencia.previo;
            maniobra = response.Data_Agencia.maniobras_puerto;
            desconsolidacion = response.Data_Agencia.desconsolidacion;

            var RevaStr = String(revalidacion);
            var RevaNu = numberWithCommas(RevaStr);

            var CompStr = String(complementario);
            var CompNu = numberWithCommas(CompStr);

            var PrevStr = String(previo);
            var PrevNu = numberWithCommas(PrevStr);

            var ManioStr = String(maniobra);
            var ManioNu = numberWithCommas(ManioStr);

            var DescStr = String(desconsolidacion);
            var DescNu = numberWithCommas(DescStr);

            // traer los valores que se modificarón
            var txtHonorarioA = $('.inpHonora').val();
            var txtRevalidacionA = $('.ipRevalida').val();
            var txtComplementarioA = $('.ipComplment').val();
            var txtPrevioA = $('.inpPrevio').val();
            var txtManiobraA = $('.inpManiobra').val();
            var txtDesconsolidacionA = $('.inpDesco').val();

            // validar si hay datos en la tabla
            $(function () {
                if (tablaAgen(tblAgencias)) {
                    $('#AgenciasList').show();
                    $('#btnAgencias').addClass('hide-button');
                    $('#btnEditar').removeClass('hide-button');
                }
                else {
                    $('#AgenciasList').hide();
                    $('#btnAgencias').removeClass('hide-button');
                    $('#btnEditar').addClass('hide-button');
                }
            });

            // valores globales de la funcion
            var nameAgencia = nombreAg;
            var tlHonor;
            var tlReval;
            var tlCompl;
            var tlPrevio;
            var tlManiobra;
            var tlDesco;

            // si los valores fueron cambiados tomar el valor nuevo, si no el valor de la BD
            if (txtHonorarioA === '') {
                tlHonor = 0;
            } else {
                var txtHonoFl = parseFloat((txtHonorarioA).replace(/,/g, ""));
                var txtHonoFix = (txtHonoFl).toFixed(2);
                var txtHonoStr = String(txtHonoFix);
                var txtHonoNu = numberWithCommas(txtHonoStr);
                tlHonor = txtHonoNu;
            }

            if (txtRevalidacionA === '') {
                tlReval = RevaNu;
            } else {
                var txtRevalFl = parseFloat((txtRevalidacionA).replace(/,/g, ""));
                var txtRevalFix = (txtRevalFl).toFixed(2);
                var txtRevalStr = String(txtRevalFix);
                var txtRevalNu = numberWithCommas(txtRevalStr);
                tlReval = txtRevalNu;
            }

            if (txtComplementarioA === '') {
                tlCompl = CompNu;
            } else {
                var txtCompFl = parseFloat((txtComplementarioA).replace(/,/g, ""));
                var txtCompFix = (txtCompFl).toFixed(2);
                var txtCompStr = String(txtCompFix);
                var txtCompNu = numberWithCommas(txtCompStr);
                tlCompl = txtCompNu;
            }

            if (txtPrevioA === '') {
                tlPrevio = PrevNu;
            } else {
                var txtPrevioFl = parseFloat((txtPrevioA).replace(/,/g, ""));
                var txtPrevioFix = (txtPrevioFl).toFixed(2);
                var txtPrevioStr = String(txtPrevioFix);
                var txtPrevioNu = numberWithCommas(txtPrevioStr);
                tlPrevio = txtPrevioNu;
            }

            if (txtManiobraA === '') {
                tlManiobra = ManioNu;
            } else {
                var txtManiobraFl = parseFloat((txtManiobraA).replace(/,/g, ""));
                var txtManiobraFix = (txtManiobraFl).toFixed(2);
                var txtManiobraStr = String(txtManiobraFix);
                var txtManiobraNu = numberWithCommas(txtManiobraStr);
                tlManiobra = txtManiobraNu;
            }

            if (txtDesconsolidacionA === '') {
                tlDesco = DescNu;
            } else {
                var txtDescFl = parseFloat((txtDesconsolidacionA).replace(/,/g, ""));
                var txtDescFix = (txtDescFl).toFixed(2);
                var txtDescStr = String(txtDescFix);
                var txtDescNu = numberWithCommas(txtDescStr);
                tlDesco = txtDescNu;
            }

            // llenar los inputs con el valor de la valiable segun el movimento anteriro
            $('.txtHonorarioA').val(tlHonor);
            $('.txtRevalidacionA').val(tlReval);
            $('.txtComplementarioA').val(tlCompl);
            $('.txtPrevioA').val(tlPrevio);
            $('.txtManiobraA').val(tlManiobra);
            $('.txtDesconsolidacionA').val(tlDesco);

            // hacer la suma total de los valores, conviritnedo cada valor a numero flotante y quitando las comas sepadoras
            var total = parseFloat((tlHonor).replace(/,/g, "")) + parseFloat((tlReval).replace(/,/g, "")) +
                parseFloat((tlCompl).replace(/,/g, "")) + parseFloat((tlPrevio).replace(/,/g, "")) +
                parseFloat((tlManiobra).replace(/,/g, "")) + parseFloat((tlDesco).replace(/,/g, ""));
            var totalRound = total.toFixed(2);
            var totalStr = String(totalRound);
            var numTotal = numberWithCommas(totalStr);
            var tla = $('#tblAgencias td').find(".totalAgencia").html(numTotal);

            // crear la tabla con los datos de la agencia 
            $('#tblAgencias tbody').append(
                '<tr>' +
                '<th class="text-uppercase td-agen-name">' + nameAgencia + '</th>' +
                '<td class="text-right td-agen-cant">' +
                '<span>' +
                '<i class="fas fa-minus-circle borrarAgencia" id="' + i + '" style="color: red;"></i>' +
                '</span>' +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Honorarios</td>' +
                '<td class="text-right td-agen-cant">$ <label id="lblHonor" class="font-weight-normal" style="margin-bottom: 0;">' + tlHonor + '</label></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Revalidación</td>' +
                '<td class="text-right td-agen-cant">$ <label class="font-weight-normal" style="margin-bottom: 0;">' + tlReval + '</label></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Complementarios</td>' +
                '<td class="text-right td-agen-cant">$ <label id="lblComple" class="font-weight-normal" style="margin-bottom: 0;">' + tlCompl + '</label></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Previo</td>' +
                '<td class="text-right td-agen-cant">$ <label class="font-weight-normal" style="margin-bottom: 0;">' + tlPrevio + '</label></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Maniobria puerto</td>' +
                '<td class="text-right td-agen-cant">$ <label class="font-weight-normal" style="margin-bottom: 0;">' + tlManiobra + '</label></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="td-agen-name">Desconsolidación</td>' +
                '<td class="text-right td-agen-cant">$ <label id="lblDescon" class="font-weight-normal" style="margin-bottom: 0;">' + tlDesco + '</label></td>' +
                '</tr>'
            );
            $('.colAgencias').removeClass('collapse');
            $('.colAgencias').addClass('collapse show');

            var cot;
            if ($('.txtTotalCotizacion').val() === "") {
                cot = "0.00";
            } else {
                cot = $('.txtTotalCotizacion').val();
            }
            var tla = $('#tblAgencias td').find(".totalAgencia").html();
            var cotiza = parseFloat((cot).replace(/,/g, ""));
            var tlAgen = parseFloat((tla).replace(/,/g, ""));
            var sumAg = cotiza + tlAgen;
            var roundAg = (sumAg).toFixed(2);
            var convAg = String(roundAg);
            var sumFin = numberWithCommas(convAg);
            $('.txtTotalCotizacion').val(sumFin);
            jQuery(function ($) {
                $("#modalEditarAgencia").modal('hide');
            });
            $('.colAgencia').removeClass('collapse show');
            $('.colAgencia').addClass('collapse');
            $('.txtValorAgencia').val(tlAgen);
            $('.collapseAgencia').removeClass('show');
            // mandar a llamar la validacion 
            validarCtizacion();
        });
    },

    // editar datos default de la agencia 
    editar_agencia: function () {
        $(document).on('click', '.btnEdit', function (event) {
            event.preventDefault();
            jQuery.noConflict();
            jQuery(function ($) {
                $('#modalAgencia').modal('hide');
                $("#modalEditarAgencia").modal('show');
            });
            var data = { id_agencia: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('plataforma/datos_agencia', data);

            // llenar input de id de agencia con la agencia a editar
            $('#txtIdAgenciaAduanal').val(data.id_agencia);

            // traer datos de la BD correspondientes a la agencia a editar
            revalidacionA = response.Data_Agencia.revalidacion;
            complementarioA = response.Data_Agencia.complementarios;
            previoA = response.Data_Agencia.previo;
            maniobraA = response.Data_Agencia.maniobras_puerto;
            desconsolidacionA = response.Data_Agencia.desconsolidacion;

            if (revalidacionA === "0.00") {
                $(".ipRevalida").val('');
            } else {
                revalidacionA
                $(".ipRevalida").val(revalidacionA);
            }

            if (complementarioA === "0.00") {
                $(".ipComplment").val('');
            } else {
                $(".ipComplment").val(complementarioA);
            }

            if (previoA === "0.00") {
                $(".inpPrevio").val('');
            } else {
                $(".inpPrevio").val(previoA);
            }

            if (maniobraA === "0.00") {
                $(".inpManiobra").val('');
            } else {
                $(".inpManiobra").val(maniobraA);
            }

            if (desconsolidacionA === "0.00") {
                $(".inpDesco").val('');
            } else {
                $(".inpDesco").val(desconsolidacionA);
            }

            var prod = 0;
            var inter = 0;
            var nacio = 0;
            var otros = 0;
            var dta = 0;
            var sumaFyO;
            var dll = parseFloat($('.txtDolar').val());
            var Mercan = $('.txtValorMercancia').val();
            var int = $('.txtInternacional').val();
            var nac = $('.txtnacional').val();
            var otr = $('.txtOtros').val();
            var aran = $('.slArancel').val();
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        hono = 0;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parseFloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parseFloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parseFloat(dll);
                        var multiOtro = otroFl * parseFloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    }
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * parseFloat(dll);
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + 0;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parseFloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parseFloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parseFloat(dll);
                        var multiOtro = otroFl * parseFloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje 
                        var multiHono = sumHono * 0.0045;
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.inpHonora').val(hono);
                    }
                }
            }
        });
    },

    // eliminar y agregar otra agencia al calculo
    remplazar_agencia: function () {
        // eliminar la agencia agregada al formulario de calculo para agregar otra 
        $('#btnEditar').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modalAgencia").modal();
            });
            $('#tblAgencias tbody tr').remove();
            var cotiza = $('.txtTotalCotizacion').val();
            var totlAgen = $('#tblAgencias td').find(".totalAgencia").html();
            var cotiz = parseFloat((cotiza).replace(/,/g, ""));
            var tlAge = parseFloat((totlAgen).replace(/,/g, ""));
            var Rest = cotiz - tlAge;
            var roundRest = (Rest).toFixed(2);
            var conver = String(roundRest);
            var RestFin = numberWithCommas(conver);
            $('.txtTotalCotizacion').val(RestFin);
            $('#tblAgencias td').find(".totalAgencia").html(0.00);
            $('.txtHonorarioA').val(0.00);
            $('.txtComplementario').val(0.00);
            $('.txtDesconsolidacion').val(0.00);
            $('.txtValorAgencia').val(tlAge);
            $(function () {
                if (tablaAgen(tblAgencias)) {
                    $('#AgenciasList').show();
                    $('#btnAgencias').addClass('hide-button');
                    $('#btnEditar').removeClass('hide-button');
                }
                else {
                    $('#AgenciasList').hide();
                    $('#btnAgencias').removeClass('hide-button');
                    $('#btnEditar').addClass('hide-button');
                    $('.slpuertoLllegada').prop('disabled', true);
                }
            });
        });
    },

    // cerrar collapse de las agencias al abrir otra
    agencia_collapse: function () {
        $(document).on('click', '.colDetAgenCot', function (event) {
            event.preventDefault();
            $('.collapseAgencia').removeClass('show');
        });
    },

    // borrar la agencia agregada del formulario del calulo
    borrar_agencia: function () {
        $(document).on('click', '.borrarAgencia', function (event) {
            event.preventDefault();
            $('#tblAgencias tbody tr').remove();
            var cotiza = $('.txtTotalCotizacion').val();
            var totlAgen = $('#tblAgencias td').find(".totalAgencia").html();
            var cotiz = parseFloat((cotiza).replace(/,/g, ""));
            var tlAge = parseFloat((totlAgen).replace(/,/g, ""));
            var Rest = cotiz - tlAge;
            var roundRest = (Rest).toFixed(2);
            var conver = String(roundRest);
            var RestFin = numberWithCommas(conver);
            $('.txtTotalCotizacion').val(RestFin);
            $('#tblAgencias td').find(".totalAgencia").html(0.00);
            $('.txtValorAgencia').val(tlAge);
            $('.txtIdAgencia').val('');
            // comprobar si existe agencia y devolver los valores primarios
            $(function () {
                if (tablaAgen(tblAgencias)) {
                    $('#AgenciasList').show();
                    $('#btnAgencias').addClass('hide-button');
                    $('#btnEditar').removeClass('hide-button');
                }
                else {
                    $('#AgenciasList').hide();
                    $('#btnAgencias').removeClass('hide-button');
                    $('#btnEditar').addClass('hide-button');
                    $('.slpuertoLllegada').prop('disabled', true);
                }
            });
            validarCtizacion();
        });
    },

    // devolver los valores primarios o limpiar el formulario al cerrar el modal o cancelar
    cerrar_agencia: function () {
        $('.closeEditAg').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $('#modalEditarAgencia').modal('hide');
                $("#modalAgencia").modal('show');
            });
            $(".inpDesco").val(0.00);
            $(".ipComplment").val(0.00);
        });
    },
}

var productos = {
    modal_nuevoprov: function () {
        // abrir modal de nuevo proveedor desde modal del proveedor
        $('.btnaddNewProv').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modalProveedores").modal('hide');
                $("#modal_nuevoProvCal").modal();
            });
            $(".txtPrecio").val('');
            $(".txtCantidad").val('');
            $(".slUnidad").val('0');
            $(".txtTotal").val('');
            $('.txtExpe').val('');
            $('#txt_proveedorCal').val();
            $('#txt_contactoCal').val();
            $('#txt_correoCal').val();
            $('#sel_LadaProvCal').val();
            $('#txt_telefonoProvCal').val();
        });

        $('.closeProveCal').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modalProveedores").modal('show');
                $("#modal_nuevoProvCal").modal('hide');
            });
            $(".txtPrecio").val('');
            $(".txtCantidad").val('');
            $(".slUnidad").val('0');
            $(".txtTotal").val('');
            $('.txtExpe').val('');
            $('#txt_proveedorCal').val();
            $('#txt_contactoCal').val();
            $('#txt_correoCal').val();
            $('#sel_LadaProvCal').val();
            $('#txt_telefonoProvCal').val();
        });
    },
    add_prov_prod_cotizacion: function () {
        //envio de formulario
        $('#add_prov_prod_cotiza').on('submit', function (form) {
            form.preventDefault();
            jQuery.noConflict();
            var proveedor = $('#txt_proveedorCal').val();

            var data = {
                proveedor: $('#txt_proveedorCal').val(),
                contacto: $('#txt_contactoCal').val(),
                email: $('#txt_correoCal').val(),
                id_lada: $('#sel_LadaProvCal').val(),
                telefono: $('#txt_telefonoProvCal').val(),
            }
            cargar_ajax.run_server_ajax('Plataforma/crear_proveedor_cotiza', data);
            response_prov = cargar_ajax.run_server_ajax('Plataforma/ultimo_prov');

            var id_prov = response_prov.id_proveedor;
            var prod = $('#txt_productoCal').val();
            var data_producto = {
                id_proveedor: response_prov.id_proveedor,
                producto: $('#txt_productoCal').val(),
                fracc_arancelaria: $('#txt_fr_arancelCal').val(),
            }
            cargar_ajax.run_server_ajax('Plataforma/crear_producto', data_producto);
            response_prod = cargar_ajax.run_server_ajax('Plataforma/ultimo_prod', data_producto);

            jQuery(function ($) {
                $("#modal_nuevoProvCal").modal('hide');
                $("#modalProducto").modal('show');
            });

            $('.idProd').val(response_prod.id_producto);
            $('.idProv').val(id_prov);
            $('.txtNomProd').val(prod);
            $('#lblProveedor').html(proveedor);
            $('#txt_proveedorCal').val('');
            $('#txt_contactoCal').val('');
            $('#txt_correoCal').val('');
            $('#sel_LadaProvCal').val('');
            $('#txt_telefonoProvCal').val('');
            $('#txt_productoCal').val('');
            $('#txt_fr_arancelCal').val('');
            tableProv.ajax.reload();
        });
    },

    modal_prov: function () {
        // abrir el modal de productos
        $('#btnProveedores').click(function () {
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modalProveedores").modal();
            });
        });
        // obtener identificador del proveedor 
        $(document).on('click', '.btnDetailsProv', function (event) {
            event.preventDefault();
            var data = { id_proveedor: $(this).data('id') };
            $('.idProv').val(data.id_proveedor);
            $('.txtIdProveedor').val(data.id_proveedor);
        });
        // limpiararreglo de imagen al cancelar el formulario de la imagen
        $(document).on('click', '.cancelImgs', function (event) {
            event.preventDefault();
            $('#files-Imgs').val('');
            file_Files = " ";
            $('#selectImg').css('display', '');
            $('#imgSelected').css('display', 'none');
        });
        // obtenerinformacion de la imagen al cargarla en input
        $('#files-Imgs').on('change', function (e) {
            files = e.target.files;
            file_Files = files;
            $('#selectImg').css('display', 'none');
            $('#imgSelected').css('display', '');
        });
    },

    agregar_producto: function () {
        // agregar producto al formulario de calculo
        $(document).on('click', '.btnAddProducto', function (event) {
            event.preventDefault();
            jQuery.noConflict();
            validarProducto();

            if (valProducto === true) {
                if (file_Files != " ") {
                    // recorrer el arreglo de la informacion de la imagen
                    for (var j = 0, f; f = files[j]; ++j) {
                        var filename = file_Files[j].name;
                        // agregar el contador y la imagen al path temporal 
                        patha_tempo = countimagen + '_' + filename;
                        // data de las imagenes que se mandaran
                        var data_img = {
                            id: countimagen,
                            nombre_original: filename,
                            ruta: 'files/productos_cot/',
                            id_prod: countProd,
                            // countProd de media producto agregado
                            path_name: patha_tempo
                        }
                        // agregar la data al arreglo
                        arreglo_imagenes.push(data_img);
                        // agregar el archivo al formaData 
                        frmDataCot.append('' + countimagen + '', file_Files[j]);
                        // aumentar el contador de la imagen
                        countimagen++;
                    }
                    // vaciar la variable de la imagen
                    file_Files = " ";
                } else {
                    // aumentar el contador
                    countimagen++;
                    // igualar el path temporal a null si no se agrego ninguna imagen
                    patha_tempo = null;
                }

                // array con los datos del producto a agregar
                var data_Producto = {
                    precio: parseFloat(($('.txtPrecio').val()).replace(/,/g, "")),
                    cantidad: parseFloat(($('.txtCantidad').val()).replace(/,/g, "")),
                    id_unidad_md: parseInt($('.slUnidad').val()),
                    total: parseFloat(($('.txtTotal').val()).replace(/,/g, "")),
                    especificaciones: $('.txtExpe').val(),
                    id_proveedor: $('.idProv').val(),
                    producto: $('#txtNomProd').val(),
                    count: countProd,
                    // countProd de media producto agregado
                    path: arreglo_imagenes,
                    id: i,
                }

                // agregar al array el producto
                Listproductos.push(data_Producto);

                // aumentar el contar del producto
                // countProd de media producto agregado
                countProd++;

                // obtener el valor de cambio
                var dll = $('.txtDolar').val();
                // valores antes de agregar mas de un  producto
                var cotiInicio;
                var tlpInicio = $('#tblproductoF tr').find("#totalTotal").html();
                var mercanInicio = parseFloat((tlpInicio).replace(/,/g, "")) * parseFloat(dll);
                if ($('.txtTotalCotizacion').val() === "") {
                    var cotiInicio = '0.00';
                } else {
                    var cotiInicio = $('.txtTotalCotizacion').val();
                }
                var CotiInicioFl = parseFloat((cotiInicio).replace(/,/g, ""));
                if (CotiInicioFl === mercanInicio) {
                    $('.txtTotalCotizacion').val('0.00');
                } else if (CotiInicioFl > mercanInicio) {
                    var resInicio = CotiInicioFl - mercanInicio;
                    var restaIncioSt = String(resInicio);
                    var restaIncioN = numberWithCommas(restaIncioSt);
                    if (restaIncioN === '0') {
                        $('.txtTotalCotizacion').val('0.00');
                    } else {
                        $('.txtTotalCotizacion').val(restaIncioN);
                    }
                }

                // valor de la unidad de medida
                var unidadValue = $('.slUnidad').val();
                var unidad;
                if (unidadValue === '1') {
                    unidad = 'pzas';
                } else if (unidadValue === '2') {
                    unidad = 'mts';
                } else if (unidadValue === '3') {
                    unidad = 'kg';
                } else if (unidadValue === '4') {
                    unidad = 'm2';
                } else if (unidadValue === '5') {
                    unidad = 'tm';
                } else if (unidadValue === '6') {
                    unidad = 'tn';
                } else if (unidadValue === '7') {
                    unidad = 'l';
                } else if (unidadValue === '8') {
                    unidad = 'kt';
                }
                var idProducto = $('.idProd').val();
                var producto = $('#txtNomProd').val();

                var precio = $('.txtPrecio').val();
                var precioRound = parseFloat((precio).replace(/,/g, ""));
                var precioFix = (precioRound).toFixed(2);

                var cantidad = $('.txtCantidad').val();
                var cantRound = parseFloat((cantidad).replace(/,/g, ""));
                var cantFix = (cantRound).toFixed(2);
                var cantStr = String(cantFix);
                var cantN = numberWithCommas(cantStr);

                var total = $('.txtTotal').val();
                var totalN = parseFloat((total).replace(/,/g, ""));

                var espe = $('.txtExpe').val();
                var prov = $('#lblProveedor').html();

                // crear la tabla contenedora de los productos agregados
                var filas =
                    '<div class="card cotiza-card">' +
                    '<div class="card-header cotiza-header" id="headingTwo" style="padding: 0rem !important;">' +
                    '<table class="table table-borderless" style="margin-bottom: 0;" id="tblproductoP">' +
                    '<tbody>' +
                    '<tr id="row' + i + '">' +
                    '<td class="producto td-prod-content-prod" data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="false" aria-controls="collapse' + idProducto + '">' +
                    producto +
                    '</td>' +

                    '<td class="td-prod-content-cant"  data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="false" aria-controls="collapse' + idProducto + '">' +
                    'USD $<label class="font-weight-normal"  style="margin-bottom: 0;">' + precioFix + '</label>' +
                    '<label class="font-weight-normal precio" style="display: none">' + precioRound + '</label>' +
                    '</td>' +

                    '<td class="td-prod-content-cant"  data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="false" aria-controls="collapse' + idProducto + '">' +
                    '<label class="font-weight-normal"  style="margin-bottom: 0;">' + cantN + ' ' + unidad + '</label>' +
                    '<label class="font-weight-normal cantidad" style="display: none">' + cantRound + '</label>' +
                    '</td>' +

                    '<td class="td-prod-content-cant2"  data-toggle="collapse" data-target="#collapse' + idProducto + '" aria-expanded="false" aria-controls="collapse' + idProducto + '">' +
                    'USD $<label class="font-weight-normal total"  style="margin-bottom: 0;" id="totalPrd' + i + '">' + total + '</label>' +
                    '<label class="font-weight-normal totalN" style="display: none">' + totalN + '</label>' +
                    '</td>' +

                    '<td class="text-center td-prod-content-icon">' +
                    '<span>' +
                    '<i class="fas fa-minus-circle borrar name="remove" id="' + i + '"" style="color: red;"></i>' +
                    '</span>' +
                    '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '<div id="collapse' + idProducto + '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="border-top: 1px solid #d0d0d2;">' +
                    '<div class="card-body">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<div class="card-body" style="border: transparent;padding: 0;padding-bottom: 1rem;">' +
                    '<strong>Proveedor</strong>' +
                    '<p class="text-muted" style="margin-bottom: 0.1rem;">' + prov + '</p>' +
                    '</div>' +
                    '<div class="card-body" style="border: transparent;padding: 0;padding-bottom: 1rem;">' +
                    '<strong>Especificaciones</strong>' +
                    '<p class="text-muted" style="margin-bottom: 0.1rem;">' + espe + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                    ;

                i++;
                $('#accProd').append(filas);
                countProducts++;
                $('.txtCountProductos').val(countProducts);

                // obtener la informacion de todos los productos agregados y sumarlos
                // conforme se van agregando productos
                var totalCantidad = 0, totalPrecio = 0, totalC = 0;
                $(".precio").each(function () {
                    totalPrecio += parseFloat($(this).html()) || 0;
                });
                $(".cantidad").each(function () {
                    totalCantidad += parseFloat($(this).html()) || 0;
                });
                $(".totalN").each(function () {
                    totalC += parseFloat($(this).html() || 0);
                });

                prodAgregado = totalC;

                var coti = $('.txtTotalCotizacion').val();
                if (coti == "" || coti == "0.00") {
                    coti = "0.00";
                    var prodAnt = prodAgregado * parseFloat(dll);
                    var prodSt = String(prodAnt);
                    var prodN = numberWithCommas(prodSt);
                    if (prodN === '0') {
                        $('.txtTotalCotizacion').val('0.00');
                    } else {
                        $('.txtTotalCotizacion').val(prodN);
                    }
                } else {
                    var prodAnt = prodAgregado * parseFloat(dll);
                    var cotiz = parseFloat((coti).replace(/,/g, ""));
                    if (cotiz === prodAnt) {
                        $('.txtTotalCotizacion').val('0.00');
                    } else {
                        var resta = cotiz - prodAnt;
                        var restaSt = String(resta);
                        var restaN = numberWithCommas(restaSt);
                        if (restaN === '0') {
                            $('.txtTotalCotizacion').val('0.00');
                        } else {
                            $('.txtTotalCotizacion').val(restaN);
                        }
                    }
                }

                // agregar las sumas al pie de la tabla
                var tlPrecio = $('#tblproductoF tr').find("#totalPrecio").html();
                tlPrecio = parseFloat(totalPrecio)
                var RoundPrecio = tlPrecio.toFixed(2)
                $("#totalPrecio").html(numberWithCommas(RoundPrecio));

                var tlCantidad = $('#tblproductoF tr').find("#totalCantidad").html();
                tlCantidad = parseFloat(totalCantidad)
                var RoundCantidad = tlCantidad.toFixed(2)
                $("#totalCantidad").html(numberWithCommas(RoundCantidad));

                var tlTotal = $('#tblproductoF tr').find("#totalTotal").html();
                tlTotal = parseFloat(totalC)
                var RoundTotal = tlTotal.toFixed(2)
                $("#totalTotal").html(numberWithCommas(RoundTotal));

                // remover valores primarios para ajustalos a lo nuevo
                $('.colProductos').removeClass('collapse');
                $('.colProductos').addClass('collapse show');
                $('.colListProduct').removeClass('collapse show');
                $('.colListProduct').addClass('collapse');
                var co = $('.txtTotalCotizacion').val();
                var cot;
                // comporobar si la cotizacion ya tiene valores o no
                if (co === "" || co === "0.00") {
                    cot = "0.00";
                } else {
                    var cota = parseFloat((co).replace(/,/g, ""));
                    var cotaFlo = (cota).toFixed(2);
                    cot = parseFloat((cotaFlo).replace(/,/g, ""));
                }
                // obtener el total del pie de la tabla
                var tlp = $('#tblproductoF tr').find("#totalTotal").html();
                var suma;
                var rounder;
                var conver;
                var sumaFin;
                var Mercancia;
                var cotizac;
                var merConv;
                var prod = 0;
                var inter = 0;
                var otros = 0;
                var nacio = 0;
                var dta = 0;
                var sumaFyO;
                var Mercan = tlp;
                var int = $('.txtInternacional').val();
                var nac = $('.txtnacional').val();
                var otr = $('.txtOtros').val();
                var aran = $('.slArancel').val();
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (Mercan === '') {
                    prod = '0';
                    valorMer = 0;
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (int === '') {
                        inter = '0';
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (otr === '') {
                            otros = '0'
                            feleteInter = 0;
                            hono = 0;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // reflejar el resultado en el objeto de AA
                            $('.inpHonora').val(hono);
                            // asignar el valor a la variable globar del calculo
                            honoAA = 0;
                            HonorariosAA = 0;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                dta = '0';
                                $('.txtDTA').val('0');
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                            } else {
                                arancel = 0;
                                porcen = 0;
                                dta = '0';
                                $('.txtDTA').val('0');
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                            }
                        } else {
                            var otroFl = parseFloat((otr).replace(/,/g, ""));
                            var multiOtro = otroFl * parseFloat(dll);
                            var otroFix = (multiOtro).toFixed(2);
                            var otroStr = String(otroFix);
                            var otroCom = numberWithCommas(otroStr);
                            var otroFlo = parseFloat(otroFix);
                            otros = otroCom;
                            sumaFyO = 0 + otroFlo;
                            feleteInter = sumaFyO;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = 0 + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = 0 + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = 0 + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        }
                    } else {
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (otr === '') {
                            otros = '0'
                            var interFl = parseFloat((int).replace(/,/g, ""));
                            var multi = interFl * parseFloat(dll);
                            sumaFyO = multi + 0;
                            feleteInter = sumaFyO;
                            var interFix = (feleteInter).toFixed(2);
                            var interStr = String(interFix);
                            var InterCom = numberWithCommas(interStr);
                            inter = InterCom;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = 0 + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = 0 + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = 0 + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        } else {
                            // converir el valor a numero flotante y quitar comas separadoras
                            var interFl = parseFloat((int).replace(/,/g, ""));
                            var otroFl = parseFloat((otr).replace(/,/g, ""));
                            // multipilicar el valor obtenido por el tipo de cambio actual
                            var multi = interFl * parseFloat(dll);
                            var multiOtro = otroFl * parseFloat(dll);
                            // sumar los dos valores para obtener un solo valor total
                            sumaFyO = multi + multiOtro;
                            feleteInter = sumaFyO;
                            // fijar los decimales a solo dos, redondeando los decimales extra 
                            var interFix = (feleteInter).toFixed(2);
                            // convertir a string el valor
                            var interStr = String(interFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var InterCom = numberWithCommas(interStr);
                            inter = InterCom;
                            // fijar los decimalesa solo dos, redondeando los decimales extra
                            var otroFix = (multiOtro).toFixed(2);
                            var otroStr = String(otroFix);
                            var otroCom = numberWithCommas(otroStr);
                            otros = otroCom;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = 0 + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = 0 + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = 0 + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + 0 + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        }
                    }
                } else {
                    // converir el valor a numero flotante y quitar comas separadoras
                    var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                    // multipilicar el valor obtenido por el tipo de cambio actual
                    valorMer = prodFl * parseFloat(dll);
                    // convertir a string el valor
                    var prodStr = String(valorMer);
                    //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                    var prodCom = numberWithCommas(prodStr);
                    prod = prodCom;
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (int === '') {
                        inter = '0';
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (otr === '') {
                            otros = '0'
                            feleteInter = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = valorMer + 0;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = valorMer + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + valorMer + 0;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = valorMer + 0;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + valorMer + 0;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        } else {
                            var otroFl = parseFloat((otr).replace(/,/g, ""));
                            var multiOtro = otroFl * parseFloat(dll);
                            var otroFix = (multiOtro).toFixed(2);
                            var otroStr = String(otroFix);
                            var otroCom = numberWithCommas(otroStr);
                            var otroFlo = parseFloat(otroFix);
                            otros = otroCom;
                            sumaFyO = 0 + otroFlo;
                            feleteInter = sumaFyO;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = valorMer + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = valorMer + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = valorMer + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        }
                    } else {
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (otr === '') {
                            otros = '0'
                            var interFl = parseFloat((int).replace(/,/g, ""));
                            var multi = interFl * parseFloat(dll);
                            sumaFyO = multi + 0;
                            feleteInter = sumaFyO;
                            var interFix = (feleteInter).toFixed(2);
                            var interStr = String(interFix);
                            var InterCom = numberWithCommas(interStr);
                            inter = InterCom;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = valorMer + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = valorMer + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = valorMer + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        } else {
                            // converir el valor a numero flotante y quitar comas separadoras
                            var interFl = parseFloat((int).replace(/,/g, ""));
                            var otroFl = parseFloat((otr).replace(/,/g, ""));
                            // multipilicar el valor obtenido por el tipo de cambio actual
                            var multi = interFl * parseFloat(dll);
                            var multiOtro = otroFl * parseFloat(dll);
                            // sumar los dos valores para obtener un solo valor total
                            sumaFyO = multi + multiOtro;
                            feleteInter = sumaFyO;
                            // fijar los decimales a solo dos, redondeando los decimales extra 
                            var interFix = (feleteInter).toFixed(2);
                            // convertir a string el valor
                            var interStr = String(interFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var InterCom = numberWithCommas(interStr);
                            inter = InterCom;
                            // fijar los decimalesa solo dos, redondeando los decimales extra
                            var otroFix = (multiOtro).toFixed(2);
                            var otroStr = String(otroFix);
                            var otroCom = numberWithCommas(otroStr);
                            otros = otroCom;
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                            var sumHono = valorMer + feleteInter;
                            // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                            if (valorMer >= 0 && valorMer < 25001) {
                                var multiHono = sumHono * 0.08;
                            } else if (valorMer > 25000 && valorMer < 50001) {
                                var multiHono = sumHono * 0.07;
                            } else if (valorMer > 50000 && valorMer < 100001) {
                                var multiHono = sumHono * 0.065;
                            } else if (valorMer > 100000 && valorMer < 200001) {
                                var multiHono = sumHono * 0.055;
                            } else if (valorMer > 200000 && valorMer < 300001) {
                                var multiHono = sumHono * 0.05;
                            } else if (valorMer > 300000 && valorMer < 500001) {
                                var multiHono = sumHono * 0.045;
                            } else if (valorMer > 500000) {
                                var multiHono = sumHono * 0.04;
                            }
                            // acortar los decimales a 2
                            var honoFix = (multiHono).toFixed(2);
                            // convertir a string el valor
                            var honoStr = String(honoFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoCom = numberWithCommas(honoStr);
                            // asignar el valor a la variable globar del calculo
                            hono = honoCom;
                            // reflejar el resultado en el objeto 
                            $('.txtHonorarios').val(hono);
                            // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                            var sumHonoAA = valorMer + feleteInter;
                            // multiplicar la suma por el porcentaje de AA
                            var multiHonoAA = sumHonoAA * 0.0045;
                            // acortar los decimales a 2
                            var honoFixAA = (multiHonoAA).toFixed(2);
                            // convertir a string el valor
                            var honoStrAA = String(honoFixAA);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var honoComAA = numberWithCommas(honoStrAA);
                            // asignar el valor a la variable globar del calculo
                            honoAA = honoComAA;
                            HonorariosAA = honoFixAA;
                            // reflejar el resultado en el objeto  de AA
                            $('.txtHonorarioA').val(honoAA);
                            var txtCot = $('.txtTotalCotizacion').val();
                            var txtHonoAA = $('.txtHonorarioA').val();
                            var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                            var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                            if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                                var cot = parseFloat((txtCot).replace(/,/g, ""));
                                var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                                var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                                var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                                // hacer la resta del total de agencia a la cotizacion
                                var resta = cot - totalAA;
                                // acortar los decimales a 2
                                var restaFix = (resta).toFixed(2);
                                // convertir el valor a flotante
                                var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                                // hacer la resta del honorario al total de AA
                                var restaAA = totalAA - honoAA;
                                // acortar los decimales a 2
                                var restaAAFix = (restaAA).toFixed(2);
                                // convertir el valor a flotante
                                var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                                // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                                var sumaAA = restaAAFl + honoCal;
                                // acortar los decimales a 2
                                var sumaAAFix = (sumaAA).toFixed(2);
                                // convertir a string el valor
                                var sumaStrAA = String(sumaAAFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaComAA = numberWithCommas(sumaStrAA);
                                // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                                var suma = restaFl + sumaAA;
                                // acortar los decimales a 2
                                var sumaFix = (suma).toFixed(2);
                                // convertir a string el valor
                                var sumaStr = String(sumaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var sumaCom = numberWithCommas(sumaStr);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find("#lblHonor").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                                // limpiar el valor anterior
                                $('#tblAgencias td').find(".totalAgencia").empty();
                                // asignar el nuevo valor al campo
                                $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                                // asignar el nuevo valor de la cotizacion con el cambio
                                $('.txtTotalCotizacion').val(sumaCom);
                            }
                            // comprobar si el valor del input es vacio sino tomar su contenido
                            if (nac === '') {
                                nacio = '0';
                            } else {
                                nacio = nac;
                            }
                            // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                            if (aran === '-1' && aran === '0') {
                                arancel = 0;
                                porcen = 0;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = 0 + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                    parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                            } else {
                                // sumar los valores involucrados en la operacion
                                suma = valorMer + feleteInter;
                                // convertir el valor a un numero flotante
                                var aranPa = parseFloat(aran);
                                // obtener el procentaje de la suma con el valor seleccionado
                                porcen = suma * aranPa;
                                // sumar la suma con el porcenaje obtenido de esta misma 
                                var aranc = suma + porcen;
                                // igualar variable globar con el resulrado de suma
                                arancel = aranc;
                                // sumar el valor del flete con el de la mercancia para sacar el valor dta
                                var sumDTA = arancel + valorMer + feleteInter;
                                // multiplicar con el porcentaje de DTA
                                var multiDTA = sumDTA * 0.008;
                                // acortar los decimales a 2
                                var dtaFix = (multiDTA).toFixed(2);
                                // convertir a string el valor
                                var dtaStr = String(dtaFix);
                                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                                var dtaCom = numberWithCommas(dtaStr);
                                // asignar el valor a la variable globar del calculo
                                dta = dtaStr;
                                // reflejar el resultado en el objeto 
                                $('.txtDTA').val(dtaCom);
                                // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                                total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                    parseFloat((hono).replace(/,/g, ""));
                            }
                        }
                    }
                }
                // comprobar si la cotizacion es vacia, de lo contrario agregar los valores 
                if (cot === "0.00" || cot === "" || cot === NaN) {
                    Mercancia = parseFloat((tlp).replace(/,/g, "")) * parseFloat(dll);
                    suma = 0 + Mercancia;
                    rounder = (suma).toFixed(2);
                    conver = String(rounder);
                    sumaFin = numberWithCommas(conver);
                    $('.txtTotalCotizacion').val(sumaFin);
                } else {
                    Mercancia = parseFloat((tlp).replace(/,/g, "")) * parseFloat(dll);
                    cotizac = cot;
                    if (cotizac === Mercancia) {
                        rounder = (Mercancia).toFixed(2);
                        conver = String(rounder);
                        sumaFin = numberWithCommas(conver);
                        $('.txtTotalCotizacion').val(sumaFin);
                    } else {
                        suma = cotizac + Mercancia;
                        rounder = (suma).toFixed(2);
                        conver = String(rounder);
                        sumaFin = numberWithCommas(conver);
                        $('.txtTotalCotizacion').val(sumaFin);
                    }
                }

                // comporbar el contenido de la tabla de los productos
                if (countProducts !== 0) {
                    $('#productosList').show();
                    $('.colProductos').removeClass('collapse');
                    $('.colProductos').addClass('collapse show');
                }
                else {
                    $('#productosList').hide();
                }

                jQuery(function ($) {
                    $('#modalProveedores').modal('show');
                    $("#modalProducto").modal('hide');
                });

                $('.txtValorMercancia').val(tlp);
                $('#selectImg').css('display', '');
                $('#imgSelected').css('display', 'none');
                // validar la cotizacion
                validarCtizacion();
            }
        });
    },

    editar_prodcuto: function () {
        // abrir el modal de los productos y limpiar el formulario
        $(document).on('click', '.btnProd', function (event) {
            event.preventDefault();
            jQuery.noConflict();
            jQuery(function ($) {
                $('#modalProveedores').modal('hide');
                $("#modalProducto").modal('show');
            });
            $(".txtPrecio").val('');
            $(".txtCantidad").val('');
            $(".slUnidad").val('0');
            $(".txtTotal").val('');
            $('.txtExpe').val('');
        });
    },

    borrar_producto: function () {
        // borrar el producto de la lista
        $(document).on('click', '.borrar', function (event) {
            var button_id = $(this).attr("id");
            // recorrer el valor de la cotizacion y los totales de la tabla de productos y reahacer el calculo
            var cotizaDel;
            var cotiza = $('.txtTotalCotizacion').val();
            var totlProd = $('#tblproductoP tr').find('#totalPrd' + button_id + '').html();
            var dll = $('.txtDolar').val();
            $('#row' + button_id + '').remove();
            // recorrer la lista de los productos
            for (i = 0; i < Listproductos.length; i++) {
                // comprobar si en la lista ya existe un valor similar al id del producto a eliminar
                if (Listproductos[i].id == button_id) {
                    // eliminar ese producto de la lista
                    Listproductos.splice(Listproductos.indexOf(Listproductos[i]), 1);
                }
            }
            var mult = parseFloat((totlProd).replace(/,/g, "")) * parseFloat(dll);
            if (cotiza === "") {
                var cotizaDel = '0.00';
            } else {
                var cotizaDel = $('.txtTotalCotizacion').val();
            }
            var CotiFl = parseFloat((cotizaDel).replace(/,/g, ""));
            if (CotiFl === mult) {
                $('.txtTotalCotizacion').val('0.00');
            } else if (CotiFl > mult) {
                var resDel = CotiFl - mult;
                var roundRest = (resDel).toFixed(2);
                var conver = String(roundRest);
                var RestFin = numberWithCommas(conver);
                if (RestFin === '0') {
                    $('.txtTotalCotizacion').val('0.00');
                } else {
                    $('.txtTotalCotizacion').val(RestFin);
                }
            }
            var totalCantidad = 0, totalPrecio = 0, totalC = 0;
            $(".precio").each(function () {
                totalPrecio += parseFloat($(this).html()) || 0;
            });
            $(".cantidad").each(function () {
                totalCantidad += parseInt($(this).html()) || 0;
            });
            $(".totalN").each(function () {
                totalC += parseFloat($(this).html() || 0);
            });

            var tlPrecio = $('#tblproductoF tr').find("#totalPrecio").html();
            tlPrecio = parseFloat(totalPrecio);
            var RoundPrecio = tlPrecio.toFixed(2);
            $("#totalPrecio").html(numberWithCommas(RoundPrecio));

            var tlCantidad = $('#tblproductoF tr').find("#totalCantidad").html();
            tlCantidad = parseInt(totalCantidad);
            var RoundCantidad = tlCantidad.toFixed(2);
            $("#totalCantidad").html(numberWithCommas(RoundCantidad));

            var tlTotal = $('#tblproductoF tr').find("#totalTotal").html();
            tlTotal = parseFloat(totalC);
            var RoundTotal = tlTotal.toFixed(2);
            $("#totalTotal").html(numberWithCommas(RoundTotal));
            var cot = $('.txtTotalCotizacion').val();
            var tlp = $('#tblproductoF tr').find("#totalTotal").html();
            $('.txtValorMercancia').val(tlp);


            var txtDTA = $('.txtDTA').val();
            var valDTA;;
            if (txtDTA === "") {
                valDTA = '0.00';
            } else {
                valDTA = txtDTA;
            }
            restaDta = parseFloat((cot).replace(/,/g, "")) - parseFloat((valDTA).replace(/,/g, ""));
            rounDta = (restaDta).toFixed(2);
            conveDTA = String(rounDta);
            comaDta = numberWithCommas(conveDTA);
            $('.txtTotalCotizacion').val(comaDta);
            var cot = $('.txtTotalCotizacion').val();

            var suma;
            var rounder;
            var conver;
            var sumaFin;
            var merConv;
            var prod = 0;
            var inter = 0;
            var nacio = 0;
            var otros = 0;
            var dta = 0;
            var sumaFyO;
            var Mercan = tlp;
            var int = $('.txtInternacional').val();
            var nac = $('.txtnacional').val();
            var otr = $('.txtOtros').val();
            var aran = $('.slArancel').val();
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        hono = 0;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            dta = '0';
                            $('.txtDTA').val('0');
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                        } else {
                            arancel = 0;
                            porcen = 0;
                            dta = '0';
                            $('.txtDTA').val('0');
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) + 0 + 0;
                        }
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parsefloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = 0 + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parsefloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = 0 + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parsefloat(dll);
                        var multiOtro = otroFl * parsefloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = 0 + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = 0 + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + 0 + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    }
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * parsefloat(dll);
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + 0;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + valorMer + 0;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = valorMer + 0;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + valorMer + 0;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parsefloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = valorMer + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parsefloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = valorMer + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parsefloat(dll);
                        var multiOtro = otroFl * parsefloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios
                        var sumHono = valorMer + feleteInter;
                        // tabla de valores valor de mercancia y multiplicar con el porcentaje de honorarios segun la tabla
                        if (valorMer >= 0 && valorMer < 25001) {
                            var multiHono = sumHono * 0.08;
                        } else if (valorMer > 25000 && valorMer < 50001) {
                            var multiHono = sumHono * 0.07;
                        } else if (valorMer > 50000 && valorMer < 100001) {
                            var multiHono = sumHono * 0.065;
                        } else if (valorMer > 100000 && valorMer < 200001) {
                            var multiHono = sumHono * 0.055;
                        } else if (valorMer > 200000 && valorMer < 300001) {
                            var multiHono = sumHono * 0.05;
                        } else if (valorMer > 300000 && valorMer < 500001) {
                            var multiHono = sumHono * 0.045;
                        } else if (valorMer > 500000) {
                            var multiHono = sumHono * 0.04;
                        }
                        // acortar los decimales a 2
                        var honoFix = (multiHono).toFixed(2);
                        // convertir a string el valor
                        var honoStr = String(honoFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoCom = numberWithCommas(honoStr);
                        // asignar el valor a la variable globar del calculo
                        hono = honoCom;
                        // reflejar el resultado en el objeto 
                        $('.txtHonorarios').val(hono);
                        // comprobar si el valor del input es vacio sino tomar su contenido
                        if (nac === '') {
                            nacio = '0';
                        } else {
                            nacio = nac;
                        }
                        // comprobar si el valor del input es igual a -1 o 0 sino tomar su contenido
                        if (aran === '-1' && aran === '0') {
                            arancel = 0;
                            porcen = 0;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = 0 + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = 0 + parseFloat((nacio).replace(/,/g, "")) +
                                parseFloat((dta).replace(/,/g, "")) + parseFloat((hono).replace(/,/g, ""));
                        } else {
                            // sumar los valores involucrados en la operacion
                            suma = valorMer + feleteInter;
                            // convertir el valor a un numero flotante
                            var aranPa = parseFloat(aran);
                            // obtener el procentaje de la suma con el valor seleccionado
                            porcen = suma * aranPa;
                            // sumar la suma con el porcenaje obtenido de esta misma 
                            var aranc = suma + porcen;
                            // igualar variable globar con el resulrado de suma
                            arancel = aranc;
                            // sumar el valor del flete con el de la mercancia para sacar el valor dta
                            var sumDTA = arancel + valorMer + feleteInter;
                            // multiplicar con el porcentaje de DTA
                            var multiDTA = sumDTA * 0.008;
                            // acortar los decimales a 2
                            var dtaFix = (multiDTA).toFixed(2);
                            // convertir a string el valor
                            var dtaStr = String(dtaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var dtaCom = numberWithCommas(dtaStr);
                            // asignar el valor a la variable globar del calculo
                            dta = dtaStr;
                            // reflejar el resultado en el objeto 
                            $('.txtDTA').val(dtaCom);
                            // realizar la suma de los valores, conviriendo el valor a un numero flotante y quitanto las comas separadoras
                            total = arancel + parseFloat((nacio).replace(/,/g, "")) + parseFloat((dta).replace(/,/g, "")) +
                                parseFloat((hono).replace(/,/g, ""));
                        }
                    }
                }
            }

            merConv = parseFloat((tlp).replace(/,/g, "")) * parseFloat(dll);
            suma = parseFloat((cot).replace(/,/g, "")) + merConv;
            rounder = (suma).toFixed(2);
            conver = String(rounder);
            sumaFin = numberWithCommas(conver);
            $('.txtTotalCotizacion').val(sumaFin);
            countProducts--;
            validarCtizacion();

            if (countProducts !== 0) {
                $('#productosList').show();
            }
            else {
                $('#productosList').hide();
                $('.colProductos').removeClass('collapse show');
                $('.colProductos').addClass('collapse');
            }
        });
    },
}

var calculo = {
    // crear tabla con los productos que pertenecen al proveedor
    get_prductos_prov: function () {
        $(document).on('click', '.btnDetailsProv', function (event) {
            event.preventDefault();
            var data = { id_proveedor: $(this).data('id') };
            $('.idProv').val(data.id_proveedor);
            $('.txtIdProveedor').val(data.id_proveedor);
            var response = cargar_ajax.run_server_ajax('plataforma/datos_productos_proveedor', data);
            $('#tblProductosProv tbody tr').remove();
            var prov = response[0].proveedor;
            $('#txtProveedor').val(prov);
            $('#lblProveedor').html(prov);
            response.forEach(element => {
                $('#tblProductosProv tbody').append(
                    '<tr>' +
                    '<td class="product-name">' +
                    '<label class="spanProduct">' + element.producto + '</label>' +
                    '</td>' +
                    '<td class="product-detile">' +
                    '<a class="btnProd" role="button" href="" data-id="' + element.id_producto + '">' +
                    'Configurar <i class="fas fa-pencil-alt btnProd" data-id="' + element.id_producto + '"></i>' +
                    '</a>' +
                    '</td>' +
                    '</tr>'
                );
            });
        });
    },

    // obtener id del proveedor y el nombre del producto a configurar
    get_idProd: function () {
        $(document).on('click', '.btnProd', function (event) {
            event.preventDefault();
            var data = { id_producto: $(this).data('id') };
            $('#idProd').val(data.id_producto);
            var response = cargar_ajax.run_server_ajax('plataforma/nombreProducto', data);
            $('#txtNomProd').val(response[0].producto);
        });
    },

    // crear tabla con los valores de la agencia aduanal elegida
    get_agencias: function () {
        $(document).on('click', '.btnDetailsAg', function (event) {
            event.preventDefault();
            var data = { id_agencia: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('plataforma/datos_agencias', data)
            $('#detHon').html();
            $('#detRev').html();
            $('#detCom').html();
            $('#detPre').html();
            $('#detMan').html();
            $('#detDes').html();

            var prod = 0;
            var inter = 0;
            var nacio = 0;
            var otros = 0;
            var dta = 0;
            var sumaFyO;
            var dll = parseFloat($('.txtDolar').val());
            var Mercan = $('.txtValorMercancia').val();
            var int = $('.txtInternacional').val();
            var nac = $('.txtnacional').val();
            var otr = $('.txtOtros').val();
            // comprobar si el valor del input es vacio sino tomar su contenido
            if (Mercan === '') {
                prod = '0';
                valorMer = 0;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        // asignar el valor a la variable globar del calculo
                        honoAA = 0;
                        HonorariosAA = 0;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoAA);
                        // acortar los decimales a 2
                        var honoAAFix = (honoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoAAFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // reflejar el resultado en el objeto de AA
                        $('.inpHonora').val(honoComAA);
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parseFloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoFixAA);
                        $('.inpHonora').val(honoFixAA);
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parseFloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoFixAA);
                        $('.inpHonora').val(honoFixAA);
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parseFloat(dll);
                        var multiOtro = otroFl * parseFloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = 0 + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoFixAA);
                        $('.inpHonora').val(honoFixAA);
                    }
                }
            } else {
                // converir el valor a numero flotante y quitar comas separadoras
                var prodFl = parseFloat((Mercan).replace(/,/g, ""));
                // multipilicar el valor obtenido por el tipo de cambio actual
                valorMer = prodFl * parseFloat(dll);
                // convertir a string el valor
                var prodStr = String(valorMer);
                //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                var prodCom = numberWithCommas(prodStr);
                prod = prodCom;
                // comprobar si el valor del input es vacio sino tomar su contenido
                if (int === '') {
                    inter = '0';
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        feleteInter = 0;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = valorMer + 0;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoAA);
                        var txtCot = $('.txtTotalCotizacion').val();
                        var txtHonoAA = $('.txtHonorarioA').val();
                        var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                        var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                        if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                            var cot = parseFloat((txtCot).replace(/,/g, ""));
                            var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                            var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                            var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                            // hacer la resta del total de agencia a la cotizacion
                            var resta = cot - totalAA;
                            // acortar los decimales a 2
                            var restaFix = (resta).toFixed(2);
                            // convertir el valor a flotante
                            var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                            // hacer la resta del honorario al total de AA
                            var restaAA = totalAA - honoAA;
                            // acortar los decimales a 2
                            var restaAAFix = (restaAA).toFixed(2);
                            // convertir el valor a flotante
                            var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                            // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                            var sumaAA = restaAAFl + honoCal;
                            // acortar los decimales a 2
                            var sumaAAFix = (sumaAA).toFixed(2);
                            // convertir a string el valor
                            var sumaStrAA = String(sumaAAFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaComAA = numberWithCommas(sumaStrAA);
                            // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                            var suma = restaFl + sumaAA;
                            // acortar los decimales a 2
                            var sumaFix = (suma).toFixed(2);
                            // convertir a string el valor
                            var sumaStr = String(sumaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaCom = numberWithCommas(sumaStr);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find("#lblHonor").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find(".totalAgencia").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                            // asignar el nuevo valor de la cotizacion con el cambio
                            $('.txtTotalCotizacion').val(sumaCom);
                        }
                    } else {
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        var multiOtro = otroFl * parseFloat(dll);
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        var otroFlo = parseFloat(otroFix);
                        otros = otroCom;
                        sumaFyO = 0 + otroFlo;
                        feleteInter = sumaFyO;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoAA);
                        var txtCot = $('.txtTotalCotizacion').val();
                        var txtHonoAA = $('.txtHonorarioA').val();
                        var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                        var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                        if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                            var cot = parseFloat((txtCot).replace(/,/g, ""));
                            var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                            var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                            var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                            // hacer la resta del total de agencia a la cotizacion
                            var resta = cot - totalAA;
                            // acortar los decimales a 2
                            var restaFix = (resta).toFixed(2);
                            // convertir el valor a flotante
                            var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                            // hacer la resta del honorario al total de AA
                            var restaAA = totalAA - honoAA;
                            // acortar los decimales a 2
                            var restaAAFix = (restaAA).toFixed(2);
                            // convertir el valor a flotante
                            var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                            // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                            var sumaAA = restaAAFl + honoCal;
                            // acortar los decimales a 2
                            var sumaAAFix = (sumaAA).toFixed(2);
                            // convertir a string el valor
                            var sumaStrAA = String(sumaAAFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaComAA = numberWithCommas(sumaStrAA);
                            // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                            var suma = restaFl + sumaAA;
                            // acortar los decimales a 2
                            var sumaFix = (suma).toFixed(2);
                            // convertir a string el valor
                            var sumaStr = String(sumaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaCom = numberWithCommas(sumaStr);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find("#lblHonor").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find(".totalAgencia").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                            // asignar el nuevo valor de la cotizacion con el cambio
                            $('.txtTotalCotizacion').val(sumaCom);
                        }
                    }
                } else {
                    // comprobar si el valor del input es vacio sino tomar su contenido
                    if (otr === '') {
                        otros = '0'
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var multi = interFl * parseFloat(dll);
                        sumaFyO = multi + 0;
                        feleteInter = sumaFyO;
                        var interFix = (feleteInter).toFixed(2);
                        var interStr = String(interFix);
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoAA);
                        var txtCot = $('.txtTotalCotizacion').val();
                        var txtHonoAA = $('.txtHonorarioA').val();
                        var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                        var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                        if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                            var cot = parseFloat((txtCot).replace(/,/g, ""));
                            var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                            var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                            var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                            // hacer la resta del total de agencia a la cotizacion
                            var resta = cot - totalAA;
                            // acortar los decimales a 2
                            var restaFix = (resta).toFixed(2);
                            // convertir el valor a flotante
                            var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                            // hacer la resta del honorario al total de AA
                            var restaAA = totalAA - honoAA;
                            // acortar los decimales a 2
                            var restaAAFix = (restaAA).toFixed(2);
                            // convertir el valor a flotante
                            var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                            // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                            var sumaAA = restaAAFl + honoCal;
                            // acortar los decimales a 2
                            var sumaAAFix = (sumaAA).toFixed(2);
                            // convertir a string el valor
                            var sumaStrAA = String(sumaAAFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaComAA = numberWithCommas(sumaStrAA);
                            // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                            var suma = restaFl + sumaAA;
                            // acortar los decimales a 2
                            var sumaFix = (suma).toFixed(2);
                            // convertir a string el valor
                            var sumaStr = String(sumaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaCom = numberWithCommas(sumaStr);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find("#lblHonor").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find(".totalAgencia").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                            // asignar el nuevo valor de la cotizacion con el cambio
                            $('.txtTotalCotizacion').val(sumaCom);
                        }
                    } else {
                        // converir el valor a numero flotante y quitar comas separadoras
                        var interFl = parseFloat((int).replace(/,/g, ""));
                        var otroFl = parseFloat((otr).replace(/,/g, ""));
                        // multipilicar el valor obtenido por el tipo de cambio actual
                        var multi = interFl * parseFloat(dll);
                        var multiOtro = otroFl * parseFloat(dll);
                        // sumar los dos valores para obtener un solo valor total
                        sumaFyO = multi + multiOtro;
                        feleteInter = sumaFyO;
                        // fijar los decimales a solo dos, redondeando los decimales extra 
                        var interFix = (feleteInter).toFixed(2);
                        // convertir a string el valor
                        var interStr = String(interFix);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var InterCom = numberWithCommas(interStr);
                        inter = InterCom;
                        // fijar los decimalesa solo dos, redondeando los decimales extra
                        var otroFix = (multiOtro).toFixed(2);
                        var otroStr = String(otroFix);
                        var otroCom = numberWithCommas(otroStr);
                        otros = otroCom;
                        // sumar el valor del flete con el de la mercancia para sacar el valor honorarios de AA
                        var sumHonoAA = valorMer + feleteInter;
                        // multiplicar la suma por el porcentaje de AA
                        var multiHonoAA = sumHonoAA * 0.0045;
                        // acortar los decimales a 2
                        var honoFixAA = (multiHonoAA).toFixed(2);
                        // convertir a string el valor
                        var honoStrAA = String(honoFixAA);
                        //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                        var honoComAA = numberWithCommas(honoStrAA);
                        // asignar el valor a la variable globar del calculo
                        honoAA = honoComAA;
                        HonorariosAA = honoFixAA;
                        // reflejar el resultado en el objeto  de AA
                        $('.txtHonorarioA').val(honoAA);
                        var txtCot = $('.txtTotalCotizacion').val();
                        var txtHonoAA = $('.txtHonorarioA').val();
                        var honotblAA = $('#tblAgencias td').find("#lblHonor").html();
                        var totaltbl = $('#tblAgencias td').find(".totalAgencia").html();
                        if (txtHonoAA !== honotblAA && honotblAA !== undefined) {
                            var cot = parseFloat((txtCot).replace(/,/g, ""));
                            var totalAA = parseFloat((totaltbl).replace(/,/g, ""));
                            var honoAA = parseFloat((honotblAA).replace(/,/g, ""));
                            var honoCal = parseFloat((txtHonoAA).replace(/,/g, ""));
                            // hacer la resta del total de agencia a la cotizacion
                            var resta = cot - totalAA;
                            // acortar los decimales a 2
                            var restaFix = (resta).toFixed(2);
                            // convertir el valor a flotante
                            var restaFl = parseFloat((restaFix).replace(/,/g, ""));
                            // hacer la resta del honorario al total de AA
                            var restaAA = totalAA - honoAA;
                            // acortar los decimales a 2
                            var restaAAFix = (restaAA).toFixed(2);
                            // convertir el valor a flotante
                            var restaAAFl = parseFloat((restaAAFix).replace(/,/g, ""));
                            // hacer la suma de la resta de los otros elementos de AA con el nuevo honorario
                            var sumaAA = restaAAFl + honoCal;
                            // acortar los decimales a 2
                            var sumaAAFix = (sumaAA).toFixed(2);
                            // convertir a string el valor
                            var sumaStrAA = String(sumaAAFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaComAA = numberWithCommas(sumaStrAA);
                            // hacer la suma de la resta de la cotizacion y la suma nueva de AA
                            var suma = restaFl + sumaAA;
                            // acortar los decimales a 2
                            var sumaFix = (suma).toFixed(2);
                            // convertir a string el valor
                            var sumaStr = String(sumaFix);
                            //  al ser string se le agregan las comas separadoras segun la mascara de moneda
                            var sumaCom = numberWithCommas(sumaStr);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find("#lblHonor").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find("#lblHonor").append(txtHonoAA);
                            // limpiar el valor anterior
                            $('#tblAgencias td').find(".totalAgencia").empty();
                            // asignar el nuevo valor al campo
                            $('#tblAgencias td').find(".totalAgencia").append(sumaComAA);
                            // asignar el nuevo valor de la cotizacion con el cambio
                            $('.txtTotalCotizacion').val(sumaCom);
                        }
                    }
                }
            }

            var HonoStr = String(HonorariosAA);
            var HonoNu = numberWithCommas(HonoStr);

            var RevaStr = String(response.revalidacion);
            var RevaNu = numberWithCommas(RevaStr);

            var CompStr = String(response.complementarios);
            var CompNu = numberWithCommas(CompStr);

            var PrevStr = String(response.previo);
            var PrevNu = numberWithCommas(PrevStr);

            var ManioStr = String(response.maniobras_puerto);
            var ManioNu = numberWithCommas(ManioStr);

            var DescStr = String(response.desconsolidacion);
            var DescNu = numberWithCommas(DescStr);

            // crear la tabla de los valores de la agencia
            $('#detHon').html('$<label class="lblHonora" style="margin-bottom: 0rem">' + HonoNu + '</label>');
            $('#detRev').html('$ <label class="lblReval" style="margin-bottom: 0rem">' + RevaNu + '</label>');
            $('#detCom').html('$ <label class="lblComple" style="margin-bottom: 0rem">' + CompNu + '</label>');
            $('#detPre').html('$ <label class="lblPrevio" style="margin-bottom: 0rem">' + PrevNu + '</label>');
            $('#detMan').html('$ <label class="lblManiobra" style="margin-bottom: 0rem">' + ManioNu + '</label>');
            $('#detDes').html('$ <label class="lblDescons" style="margin-bottom: 0rem">' + DescNu + '</label>');
            $('.btnEdit').attr('data-id', '' + response.id_agencia + '');
        });
    },

    // agregar proveedor desde la cotización
    agregar_proveedor: function () {
        $(document).on("click", ".btnaddNewProv", function (event) {
            event.preventDefault();
            jQuery.noConflict();
            jQuery(function ($) {
                $("#modal_add_edit_proveedor").modal();
                $('#modal_proveedorLabel').html('Agregar Proveedor');
            });
        });
    },
}

var cotizacion = {
    // obtener todos los valores del formulario para guardarlos guardarlos
    add_cotizacion: function () {
        $('.agregarCotizacion').on('submit', function (form) {
            form.preventDefault();
            var SubtotalCot = parseFloat(($('.txtTotalCotizacion').val()).replace(/,/g, ""));
            var SubtotalCotStr = String(SubtotalCot);
            var SubtotalCotN = numberWithCommas(SubtotalCotStr);
            var iva = 0.16;
            var masIva = SubtotalCot * iva;
            var masIvaF = (masIva).toFixed(2);
            var masIvaFl = parseFloat(masIvaF);
            var masIvaStr = String(masIvaF);
            var masIvaN = numberWithCommas(masIvaStr);
            var totalCot = masIva + SubtotalCot;
            var totalCotF = (totalCot).toFixed(2);
            var totalCotStr = String(totalCotF);
            var totalCotN = numberWithCommas(totalCotStr);
            var ara = $('.slArancel').val();
            var aranPorcentaje;
            // porcentaje del arancel seleccionado
            if (ara === '0') {
                aranPorcentaje = 0;
            } else if (ara === '0.05') {
                aranPorcentaje = 5;
            } else if (ara === '0.10') {
                aranPorcentaje = 10;
            } else if (ara === '0.15') {
                aranPorcentaje = 15;
            }
            // mandar a llamar la validacion 
            validarCtizacion();

            if (valCotizacion === true) {
                // mensaje de confirmación?
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        cancelButton: 'btn btn-outline-primary btn-nuevo padding-buttons btnsi',
                        confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons btnno'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: '¿Esta seguro de enviar esta cotización?',
                    html:
                        '<table class="table table-borderless" style="margin-bottom: 0;width: 72%;">' +
                        '<tbody>' +
                        '<tr>' +
                        '<td style="padding: 0rem;width: 35%;text-align: right;">Subtotal:</td>' +
                        '<td style="padding: 0rem;width: 25%;text-align: right;">$ ' + SubtotalCotN + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="padding: 0rem;width: 35%;text-align: right;">IVA:</td>' +
                        '<td style="padding: 0rem;width: 15%;text-align: right;">16 %</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="padding: 0rem;width: 35%;text-align: right;">Total IVA:</td>' +
                        '<td style="padding: 0rem;width: 15%;text-align: right;">$ ' + masIvaN + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td style="padding: 0rem;width: 35%;text-align: right;">Total:</td>' +
                        '<td style="padding: 0rem;width: 15%;text-align: right;">$ ' + totalCotN + '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>',
                    icon: 'question',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                    reverseButtons: false,
                    focusConfirm: true
                }).then((result) => {
                    if (result.value) {
                        var honorarioA = parseFloat(($('.txtHonorarioA').val()).replace(/,/g, ""));
                        var revalidacionA = parseFloat(($('.txtRevalidacionA').val()).replace(/,/g, ""));
                        var complementarioA = parseFloat(($('.txtComplementarioA').val()).replace(/,/g, ""));
                        var previoA = parseFloat(($('.txtPrevioA').val()).replace(/,/g, ""));
                        var maniobraA = parseFloat(($('.txtManiobraA').val()).replace(/,/g, ""));
                        var desconsolidacionA = parseFloat(($('.txtDesconsolidacionA').val()).replace(/,/g, ""));

                        var cotizacion = {
                            nombreCotiza: $('.txtNombreCot').val(),
                            tiempo_entrega: $('.txtEntrega').val(),
                            totalCot: totalCot,
                            puertoSalida: parseFloat(($('.slpuertoSalida').val()).replace(/,/g, "")),
                            puertoLlegada: parseFloat(($('.slpuertoLllegada').val()).replace(/,/g, "")),
                            dta: parseFloat(($('.txtDTA').val()).replace(/,/g, "")),
                            inter: parseFloat(($('.txtInternacional').val()).replace(/,/g, "")),
                            nacio: parseFloat(($('.txtnacional').val()).replace(/,/g, "")),
                            otros: parseFloat(($('.txtOtros').val()).replace(/,/g, "")),
                            aranc: porcen,
                            arancel_porc: aranPorcentaje,
                            honor: parseFloat(($('.txtHonorarios').val()).replace(/,/g, "")),
                            id_proyecto: $('.txtIdProyecto').val(),
                            iva: masIvaFl,
                            dolar: parseFloat(($('.txtDolar').val()).replace(/,/g, "")),
                            id_agencia: parseFloat(($('.txtIdAgencia').val()).replace(/,/g, "")),
                            valor_mercancia: parseFloat(($('.txtValorMercancia').val()).replace(/,/g, "")),
                            honorarios_c: honorarioA,
                            revalicacion_c: revalidacionA,
                            complementario_c: complementarioA,
                            previo_c: previoA,
                            maniobras_c: maniobraA,
                            desconsolidacion_c: desconsolidacionA,
                        }

                        // array con los valores del formulario y el array de los productos 
                        data_cotizacion_final =
                        {
                            'cotizacion': cotizacion,
                            'Listproductos': Listproductos
                        }
                        cargar_ajax.run_server_ajax('Plataforma/cotizacion', data_cotizacion_final);

                        var idProyecto = $('.txtIdProyecto').val();
                        if (arreglo_imagenes.length !== 0) {
                            frmDataCot.append('imgs', JSON.stringify(arreglo_imagenes));
                            frmDataCot.append('idProyeco', idProyecto);
                            cargar_ajax2.run_server_ajax2('Plataforma/cotizacion_imagenes', frmDataCot);
                        }

                        $('.txtTotalCotizacion').val('');
                        $('.slpuertoSalida').val('0');
                        $('.slpuertoLllegada').val('0');
                        $('.txtInternacional').val('');
                        $('.txtOtros').val('');
                        $('.txtnacional').val('');
                        $('.txtImpuestos').val('');
                        $('.txtHonorarios').val('');
                        $('.txtIdAgencia').val('');
                        $('.txtValorMercancia').val('');
                        emptyTablaAgen();
                        emptyTablaProd();

                        swal.fire({
                            title: 'CORRECTO',
                            text: 'COTIZACIÓN GUARDADA CORRECTAMENTE',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        }).then((result) => {
                            location.reload();
                        });
                    }
                });
            }
        });
    },

    // crear tablas de las cotizaciones guardadas
    get_productos_coti: function () {
        // cerrar el modal de la imagenes y lmpiar el carucel
        $(document).on('click', '.closeProdCot', function () {
            // limpiar los objetos contenedores de las imagenes
            $("#divImgProdCot").css('display', 'none');
            $("#carouselCotizacion").css('display', 'none');
            $("#divImgProdCot").empty();
            $('#slidersCot').empty();
            $("#carouselCot").empty();
        });
        // obtener las imagenes de acuerdo al id del producto
        $(document).on('click', '.imgMedCot', function () {
            event.preventDefault();
            // limpiar los objetos contenedores de las imagenes
            $("#divImgProdCot").css('display', 'none');
            $("#carouselCotizacion").css('display', 'none');
            $("#divImgProdCot").empty();
            $('#slidersCot').empty();
            $("#carouselCot").empty();

            var id_producto_cot = { id_producto_cot: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaProdCot', id_producto_cot);
            var primerPath = response[0].path_prod_cot;
            var path = baseUrl + primerPath;

            if (response.length == 1) {
                $("#divImgProdCot").css('display', '');
                var img = '';        
                img = '<img class="img-fluid img-caroucel" src="' + path + '">';        
                $("#divImgProdCot").append(img);
            } else {
                $("#carouselCotizacion").css('display', '');
                var count = 1;
                var ca_active = '';
                var sl_active = '';
                var caroucel = '';
                var slider = '';
        
                ca_active = '<div class="carousel-item active">' +
                    '<img id="imgProd" src="' + path + '" class="img-fluid img-caroucel">' +
                    '</div>';
                sl_active = '<li data-target="#carouselCotizacion" data-slide-to="' + count + '" class="active"></li>';
        
                $("#carouselCot").append(ca_active);
                $("#slidersCot").append(sl_active);
        
                response.forEach(element => {
                    var imgsrc = $('#imgProd').attr('src');
                    var mediapath = baseUrl + element.path_prod_cot;
                    if (imgsrc !== mediapath) {
                        count++;
                        caroucel += '<div class="carousel-item">' +
                            '<img class="img-fluid img-caroucel" src="' + mediapath + '">' +
                            '</div>';
                        slider += '<li data-target="#carouselCotizacion" data-slide-to="' + count + '"></li>';
                    }
                });
        
                $("#carouselCot").append(caroucel);
                $("#slidersCot").append(slider);
            }

            jQuery(function ($) {
                $("#modalCotizacion").modal();
            });
        });
    },
}


jQuery(document).ready(function () {
    agencias.modal_agencias(this);
    agencias.agregar_agencia(this);
    agencias.editar_agencia(this);
    agencias.remplazar_agencia(this);
    agencias.borrar_agencia(this);
    agencias.cerrar_agencia(this);
    agencias.agencia_collapse(this);
    productos.modal_nuevoprov(this);
    productos.add_prov_prod_cotizacion(this);
    productos.modal_prov(this);
    productos.agregar_producto(this);
    productos.editar_prodcuto(this);
    productos.borrar_producto(this);
    cotizacion.add_cotizacion(this);
    cotizacion.get_productos_coti(this);
    calculo.get_prductos_prov(this);
    calculo.get_agencias(this);
    calculo.get_idProd(this);
    calculo.agregar_proveedor(this);
});