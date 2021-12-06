<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color text-uppercase" id="modal_proveedorLabel"></h5>
            <button type="button" class="close closeProve" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="add_edit_proveedor">
            <div class="modal-body">
                <input type="hidden" id="txtIdProveedor" value="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Proveedor</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_proveedor" required>
                    </div>
                    <div class="col-md-6">
                        <label>Sitio web</label>
                        <input type="url" class="form-control form-control-sm borders" id="txt_webSite">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Contacto</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_contacto">
                    </div>
                    <div class="col-md-6">
                        <label for="txt_telefonoProveedor">Teléfono</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select class="form-control-sm boder-lad" id="sel_LadaProveedor">
                                    <option selected value="0">lada</option>
                                    <?php
                                    if ($DATA_LADAS != FALSE) {
                                        foreach ($DATA_LADAS->result() as $row) {
                                            $lad = $row->lada;
                                            echo '<option value="' . $row->id_lada . '"';
                                            echo '>';
                                            echo $row->abrev;
                                            echo '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="input-group-text span-lada" id="spLadaProveedor"></span>
                            </div>
                            <input type="text" class="form-control form-control-sm inp-phone" id="txt_telefonoProveedor" value="" maxlength="14">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_email">
                    </div>
                    <div class="col-md-6">
                        <label>Wechat</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_wechat">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Dirección</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_direccion">
                    </div>
                </div>
                <div id="div_prod_prov_add">
                    <hr>
                    <h5 class="modal-title title-color" id="modalDetalle">Producto</h5>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="txt_producto_provinsert" >Nombre producto</label>
                            <input type="text" class="form-control form-control-sm borders" id="txt_producto_provinsert" required>
                        </div>
                        <div class="col-md-6">
                            <label for="txt_fracc_provinsert">Fracc. Arancelaria</label>
                            <input type="text" class="form-control form-control-sm borders" id="txt_fracc_provinsert" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProve" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>