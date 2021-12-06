
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color text-uppercase" id="titulo_add_edit"></h5>
            <button type="button" class="close closeNewAg" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="agregar_agencia_editar">
                <input type="hidden" id="txtIdAgencia" value="">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_agencia">Agencia</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_agencia" required>
                    </div>
                    <div class="col-md-6">
                        <label for="txt_email">Correo</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_email" placeholder="usuario@ejemplo.com">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_agente">Contacto</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_agente">
                    </div>
                    <div class="col-md-6">
                        <label for="txt_telefonoAgencia">Teléfono</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select class="form-control-sm styleselectladas boder-lad" id="sel_LadaAgencia">
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
                                <span class="input-group-text span-lada" id="spLadaAgencia"></span>
                            </div>
                            <input type="text" class="form-control form-control-sm inp-phone" id="txt_telefonoAgencia" value="" maxlength="14">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Honorarios</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_honorarios" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Revalidación</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_revalidacion" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Complementarios</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_complementarios" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Previo</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_previo" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Maniobras puerto</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_maniobras_puerto" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Desconosolidación</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right" id="txt_desconsolidacion" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer  d-flex justify-content-between">
            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeNewAg" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
            </form>
        </div>
    </div>
</div>