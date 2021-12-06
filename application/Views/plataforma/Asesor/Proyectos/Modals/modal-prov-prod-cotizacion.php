<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color text-uppercase">Agregar proveedor y producto</h5>
            <button type="button" class="close closeProveCal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="add_prov_prod_cotiza">
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Proveedor</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_proveedorCal" required>
                    </div>
                    <div class="col-md-6">
                        <label>Contacto</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_contactoCal">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_telefonoProvCal">Teléfono</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select class="form-control-sm boder-lad" id="sel_LadaProvCal">
                                    <option selected value="0">lada</option>
                                    <?php if ($DATA_LADAS != FALSE) {
                                        foreach ($DATA_LADAS->result() as $row) { ?>
                                            '<option value="<?= $row->id_lada; ?>"><?= $row->abrev; ?></option>';
                                    <?php }
                                    } ?>
                                </select>
                                <span class="input-group-text span-lada" id="spLadaProvCal"></span>
                            </div>
                            <input type="text" class="form-control form-control-sm inp-phone" id="txt_telefonoProvCal" value="" maxlength="14">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_correoCal">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Nombre producto</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_productoCal" required>
                    </div>
                    <div class="col-md-6">
                        <label>Fracc. Arancelaria</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_fr_arancelCal" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProveCal" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>