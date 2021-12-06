<div class="form-group">
    <label class="form-text m-0" for="inpt_form_producto">¿Qué quisieras importar? <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
    <input type="text" class="form-control form-control-sm borders" id="inpt_form_producto" placeholder="Nombre de tu producto" onchange="Validacion_producto_f1()" onclick="flechasOnCLick()">
    <p id="div_val_nombre_prod_sp" class="invalid-msj">Favor de ingresar el producto a importar</p>
</div>
<div class="form-group">
    <label class="form-text m-0" for="inpt_form_cantidad">
        ¿Que cantidad? <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a>
    </label>
    <div class="input-group">
        <input type="text" class="form-control form-control-sm text-right borders-left" id="inpt_form_cantidad" min="0.01" placeholder="0.00" onchange="Validacion_producto_f1()" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onclick="flechasOnCLick()">
        <div class="input-group-append">
            <select class="form-control form-control-sm borders-right-group" id="selUnidades_prod_sp" onchange="Validacion_producto_f1()" onclick="flechasOnCLick()">
                <option value="0" selected="">Unidades</option>
                <?php if ($data_unidades != FALSE) {
                    foreach ($data_unidades->result() as $row) { ?>
                        <option value="<?= $row->id_unidad_md; ?>"><?= $row->clave; ?></option>
                <?php }
                } ?>
            </select>
        </div>
    </div>
    <p id="div_val_cantidad_prod_sp" class="invalid-msj">Favor de ingresar una cantidad diferente a cero</p>
    <p id="div_val_selUnidades_prod_sp" class="invalid-msj">Favor de seleccionar una unidad de medida</p>
</div>
<div class="form-group">
    <label class="form-text m-0" for="inpt_form_especificaciones">Describe tu producto <a class="popValidacion mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Este campo es obligatorio para seguir con el formulario.">*</a></label>
    <textarea class="form-control form-control-sm borders" id="inpt_form_especificaciones" rows="3" placeholder="Menciona algunas especificaciones" onchange="Validacion_producto_f1()" onkeyup="Validacion_producto_f1()" onclick="flechasOnCLick()"></textarea>
    <p id="div_val_especif_prod_sp" class="invalid-msj">Favor de describir el producto</p>
</div>
<div class="form-group">
    <label class="form-text m-0" for="txtImgProducto">Tienes una foto del producto</label>
    <div class="input-group">
        <div class="custom-file custom-file-sm">
            <input type="file" class="custom-file-input custom-file-input-sm" id="filesImgProd" accept=".jpg, .jpeg, .png, .jfif" onclick="flechasOnCLick()">
            <label id="lblImgProducto" class="custom-file-label custom-file-label-sm file-placeholder" for="filesImgProd">Seleccionar una foto</label>
        </div>
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-danger btn-sm borders-right" id="cancelImgProd" disabled onclick="flechasOnCLick()"><i class="far fa-trash-alt"></i></button>
        </div>
    </div>
</div>
<div class="form-group text-right container-button" style="margin: 1.5rem 0rem;display: none;">
    <button type="button" class="btn btn-outline-primary btn-sm btn-borders" id="btnEditProd" style="display: none;">Editar &nbsp;<i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-outline-success btn-sm btn-borders btnAgregar" id="btnAgregarProd">Añadir &nbsp;<i class="fas fa-plus"></i></button>
</div>