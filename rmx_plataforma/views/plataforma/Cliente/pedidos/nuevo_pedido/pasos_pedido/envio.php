<div class="form-group">
    <label class="form-text m-0" for="inpt_form_destinoEntrega">¿Cuál es tu destino de entrega? <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
    <input type="text" class="form-control form-control-sm borders" id="inpt_form_destinoEntrega" placeholder="Hermosillo, Sonora, México" onchange="Validacion_envio_f4()" onkeyup="Validacion_envio_f4()">
</div>
<div class="form-group">
    <label class="form-text m-0">Tipo de envio <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
    <div style="margin-top: 0.5rem;">
        <div class="icheck-primary d-inline" style="margin-right: 3rem;">
            <input type="radio" id="rad_maritimo" name="r3" value="false">
            <label for="rad_maritimo" id="lblMaritimo" style="color: #5b6670;font-weight: 500;"> Marítimo</label>
        </div>
        <div class="icheck-primary d-inline">
            <input type="radio" id="rad_aereo" name="r3" value="false">
            <label for="rad_aereo" id="lblAereo" style="color: #5b6670;font-weight: 500;"> Aéreo</label>
        </div>
    </div>
    <span id="div_val_radio_pb" class="invalid-msj">Favor de una elegir opcion</span>
</div>
<div class="form-group text-right container-button" style="margin: 1.5rem 0rem;display: none;">
    <button type="button" class="btn btn-outline-primary btn-sm btn-borders" id="btnEditEnv" style="display: none;">Editar &nbsp;<i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-outline-success btn-sm btn-borders btnAgregar" id="btnAgregarEnvio">Añadir &nbsp;<i class="fas fa-plus"></i></button>
</div>
<script>
    function initAutocomplete() {
        // Create the search box and link it to the UI element.
        const input = document.getElementById("inpt_form_destinoEntrega");
        const searchBox = new google.maps.places.SearchBox(input);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYqGCtJ6iT0S49ACAg-yo8Sf-KTaoa614&callback=initAutocomplete&libraries=places&v=weekly" async></script>