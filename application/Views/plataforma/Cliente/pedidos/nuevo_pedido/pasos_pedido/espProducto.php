<div class="form-group">
    <label class="form-text m-0" for="txtProducto">¿Quieres agregar algún tipo de logotipo?</label>
    <div style="margin-top: 0.5rem;">
        <div class="icheck-primary d-inline" style="margin-right: 3rem;">
            <input type="radio" id="radioProdSi" name="r1" value="false" onclick="flechasOnCLick()">
            <label for="radioProdSi" id="lblProdSi" style="color: #5b6670;font-weight: 500;"> Si</label>
        </div>
        <div class="icheck-primary d-inline">
            <input type="radio" id="radioProdNo" name="r1" value="false">
            <label for="radioProdNo" id="lblProdNo" style="color: #5b6670;font-weight: 500;"> No</label>
        </div>
    </div>
    <p id="div_val_radio_personalizar" class="invalid-msj">Favor de una elegir opcion</p>
</div>
<div id="container-esp" style="display: none;">
    <div class="form-group">
        <label class="form-text m-0" for="filesOEM">Anexar tu logotipo <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
        <div class="input-group">
            <div class="custom-file custom-file-sm">
                <input type="file" class="custom-file-input custom-file-input-sm" id="filesOEM" accept=".jpg, .jpeg, .png" onchange="Validacion_personalizar_f2()" onclick="flechasOnCLick()">
                <label id="lblLogotipo" class="custom-file-label custom-file-label-sm" for="filesOEM"></label>
            </div>
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-danger btn-sm borders-right" id="cancelOEM" disabled onclick="flechasOnCLick()">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <p id="div_val_logo_oem" class="invalid-msj">Favor de selecionar un imagen de logotipo</p>
    </div>
    <div class="form-group">
        <label class="form-text m-0" for="inpt_form_colores">Color para la impresión <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
        <div class="input-group">
            <input type="text" class="form-control form-control-sm text-right borders-left" id="inpt_form_colores" placeholder="#fffff" autocomplete="off" onchange="Validacion_personalizar_f2()" onclick="flechasOnCLick()">
            <div class="input-group-append">
                <span class="input-group-text borders-right" id="spColor">
                    <i class="fas fa-circle iColor" id="iconColor" style="border: 1.5px solid #e7e8e9;border-radius: 2rem;"></i>
                </span>
            </div>
        </div>
        <p id="div_val_color" class="invalid-msj">Favor de seleccionar un color del logotipo</p>
    </div>
</div>
<div class="form-group text-right container-button" style="margin: 1.5rem 0rem;display: none;">
    <button type="button" class="btn btn-outline-primary btn-sm btn-borders" id="btnEditEspP" style="display: none;">Editar &nbsp;<i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-outline-success btn-sm btn-borders btnAgregar" id="btnAgregarEspP">Añadir &nbsp;<i class="fas fa-plus"></i></button>
</div>