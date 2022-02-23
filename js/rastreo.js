$(document).ready(function () {
    if ($("#txtBL").val() != "") {
        var naviera = $("#txtShippingLine").val();
        var contenedor = $("#txtContainerNumber").val();
        var carga = $("#txtContainerTEU").val();
        var lugarSalida = $("#txtFromCountry").val();
        var puertoSalida = $("#txtPol").val();
        var fechaSalida = $("#txtDepartureDate").val();
        var lugarLlegada = $("#txtToCountry").val();
        var puertoLlegada = $("#txtPod").val();
        var fechaLlegada = $("#txtArrivalDate").val();
        var buque = $("#txtVessel").val();
        var nobuque = $("#txtVesselIMO").val();
        var tiempoViaje = $("#txtFormatedTransitTime").val();

        var splFechaS = fechaSalida.split("/");
        var savFechaS = splFechaS[2] + "-" + splFechaS[1] + "-" + splFechaS[0];

        var splFecha = fechaLlegada.split("/");
        var fmtFecha = new Date(splFecha[1] + "-" + splFecha[0] + "-" + splFecha[2]);
        var dteFecha = new Date(fmtFecha.setDate(fmtFecha.getDate() + 10));
        var dayFecha = String(dteFecha.getDate()).padStart(2, "0");
        var mntFecha = String(dteFecha.getMonth() + 1).padStart(2, "0");
        var yerFecha = String(dteFecha.getFullYear());
        var newFecha = dayFecha + "/" + mntFecha + "/" + yerFecha;
        var savFecha = yerFecha + "-" + mntFecha + "-" + dayFecha;

        var splTiempo = tiempoViaje.split(" ");
        var intTiempo = parseInt(splTiempo[0]);
        var sumTiempo = intTiempo + 10;
        var newTiempo = sumTiempo + " Días";

        var splPuerto = puertoLlegada.split("(");
        var newPuerto = splPuerto[0];

        $("#lblContBL").html(contenedor.toUpperCase());
        $("#lblContNaviera").html(naviera);
        $("#lblContPuertoS").html(puertoSalida);
        $("#lblContLuegarS").html(lugarSalida);
        $("#lblContFechaSalida").html(fechaSalida);
        $("#lblContPuertoE").html(newPuerto);
        $("#lblContLuegarE").html(lugarLlegada);
        $("#lblContFechaLllegada").html(newFecha);
        $("#lblContBuque").html(buque);
        $("#lblContViaje").html(parseInt(nobuque));
        $("#lblContTiempo").html(newTiempo);

        $("#listRastreo").css("display", "block");
        var datos = {
            id_proyecto: $("#IdProy").val(),
            etd: savFechaS,
            eta: savFecha,
            buque: buque,
            no_viaje: nobuque,
        };

        cargar_ajax.run_server_ajax("Plataforma/actualizar_rastreo", datos);
    }
});
