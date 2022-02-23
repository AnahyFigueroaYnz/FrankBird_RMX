<div class="form-group">
    <label class="form-text m-0" for="txtProducto">¿Cuentas con proveedor?</label>
    <div style="margin-top: 0.5rem;">
        <div class="icheck-primary d-inline" style="margin-right: 3rem;">
            <input type="radio" id="radioProvSi" name="r2" value="false" onclick="flechasOnCLick()">
            <label for="radioProvSi" id="lblProvSi" style="color: #5b6670;font-weight: 500;"> Si</label>
        </div>
        <div class="icheck-primary d-inline">
            <input type="radio" id="radioProvNo" name="r2" value="false">
            <label for="radioProvNo" id="lblProvNo" style="color: #5b6670;font-weight: 500;"> No</label>
        </div>
    </div>
    <span id="div_val_radio_proveedor" class="invalid-msj">Favor de una elegir opcion</span>
</div>
<div id="container-prov" style="display: none;">
    <div id="mnjEdicion" class="m-2 text-center" style="display: none;">
        <p class="invalid-msj">El proveedor no se puede editar, puede elegir uno diferente o agregar uno nuevo</p>
    </div>
    <div class="form-group">
        <label class="form-text m-0" for="inpt_nombre_proveedor">Nombre del proveedor <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
        <select class="form-control form-control-sm borders" id="inpt_nombre_proveedor">
            <option></option>
        </select>
        <p id="div_val_nombre_prov" class="invalid-msj">Favor de una ingresar el proveedor</p>
    </div>
    <div class="form-group">
        <label class="form-text m-0" for="inpt_contacto_proveedor">Persona de contacto <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
        <input type="text" class="form-control form-control-sm borders" id="inpt_contacto_proveedor" placeholder="Nombre completo" onchange="Validacion_proveedor_f3()" onclick="flechasOnCLick()">
        <p id="div_val_contacto_prov" class="invalid-msj">Favor de una ingresar la persona a contactar</p>
    </div>
    <div class="form-row">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <label class="form-text m-0" for="inpt_email_proveedor">Correo <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
            <input type="email" class="form-control form-control-sm borders" id="inpt_email_proveedor" placeholder="ejemplo@ejemplo.com" onchange="Validacion_proveedor_f3()" onclick="flechasOnCLick()">
            <p id="div_val_radio_personalizar" class="invalid-msj">Favor de una ingresar un correo electronico</p>
            <p id="div_val_email_formt_prov" class="invalid-msj">Correo no valido. Ejemplo: ejemplo@ejemplo.com</p>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <label class="form-text m-0" for=inpt_telefono_proveedor>Teléfono</label>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <select class="form-control-sm borders-left-group" id="sel_ladaProv"  onclick="flechasOnCLick()">
                        <option selected value="0">lada</option>
                        <?php if ($DATA_LADAS != FALSE) {
                                foreach ($DATA_LADAS->result() as $row) { ?>
                                    <option value="<?= $row->id_lada ?>"><?= $row->abrev ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span class="input-group-text span-middle" id="spLadaProv"></span>
                </div>
                <input type="text" class="form-control form-control-sm borders-right-group" id=inpt_telefono_proveedor value="" placeholder="(000) 000 0000" maxlength="14" disabled onclick="flechasOnCLick()">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-text m-0" for="inpt_direccion_proveedor">Liga página</label>
        <input type="url" class="form-control form-control-sm borders" id="inpt_direccion_proveedor" placeholder="https://www.alibaba.com/" onclick="flechasOnCLick()">
    </div>
    <div class="form-group">
        <label class="form-text m-0" for="inputFactura">No. de Factura</label>
        <div class="input-group">
            <div class="custom-file custom-file-sm">
                <input type="file" class="custom-file-input custom-file-input-sm" id="inputFactura" accept=".jpg, .jpeg, .png, .pdf, .xlsx, .xls" onclick="flechasOnCLick()">
                <label id="lblFactura" class="custom-file-label custom-file-label-sm" for="inputFactura"></label>
            </div>
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-danger btn-sm borders-right" id="cancelFactura" disabled onclick="flechasOnCLick()">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right container-button" style="margin: 1.5rem 0rem;display: none;">
    <button type="button" class="btn btn-outline-primary btn-sm btn-borders" id="btnEditProv" style="display: none;">Editar &nbsp;<i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-outline-success btn-sm btn-borders btnAgregar" id="btnAgregarProv">Añadir &nbsp;<i class="fas fa-plus"></i></button>
</div>