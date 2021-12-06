<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color text-uppercase" id="titulo_modalTarifa"></h5>
            <button type="button" class="close closeTarifa" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="frmTarifa">
            <input type="hidden" id="id_tarifaEdit">    
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-3 col-lg-6 col-xl-6">
                        <label for="selIdOrigen">Origen</label>
                        <select id="selIdOrigen" required="true" class="form-control form-control-sm borders">
                            <option value="0">Seleccione origen</option>
                            <?php
                                if ($DATA_DESTINOS != false) {
                                    foreach ($DATA_DESTINOS->result() as $row) {
                                        if ($row->tipo == 1 || $row->tipo == 3) {
                                    ?>
                                        <option value="<?=$row->id_destino?>"><?= $row->destino?></option>
                                    <?php
                                        }
                                    }
                                }
                            ?>
                        </select>
                        <div id="divOrigen" style="display: none;"><span style="font-size: 12px;">Debe seleccionar una opción</span></div>
                    </div> 
                    <div class="col-md-3 col-lg-6 col-xl-6">
                        <label for="selIdDestino">Destino</label>
                        <select id="selIdDestino" required="true" class="form-control form-control-sm borders">
                            <option value="0">Seleccione destino</option>
                            <?php
                                if ($DATA_DESTINOS != false) {
                                    foreach ($DATA_DESTINOS->result() as $row) {
                                        if ($row->tipo == 2 || $row->tipo == 3) {
                                    ?>
                                        <option value="<?=$row->id_destino?>"><?= $row->destino?></option>
                                    <?php
                                        }
                                    }
                                }
                            ?>
                        </select>
                        <div id="divDestino" style="display: none;"><span style="font-size: 12px;">Debe seleccionar una opción</span></div>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <label for="selTipoTarifa">Tipo envío</label>
                        <select class="form-control form-control-sm borders" required="" id="selTipoTarifa">
                            <option value="0">Tipo tarifa</option>
                            <option value="1">Aereo</option>
                            <option value="2">Marítimo</option>
                        </select>
                        <div id="divTipo" style="display: none;"><span style="font-size: 12px;">Debe seleccionar una opción</span></div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <label for="selTipoMovimiento">Tipo movimiento</label>
                        <select class="form-control form-control-sm borders" required="" id="selTipoMovimiento">
                            <option value="0">Tipo movimiento</option>
                            <option value="1">Importar</option>
                            <option value="2">Exportar</option>
                        </select>
                        <div id="divTipoMovimiento" style="display: none;"><span style="font-size: 12px;">Debe seleccionar una opción</span></div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4" style="display: none;" id="divTarifaAer">
                        <label for="txt_tarifaAerea">Tarifa aerea</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_tarifaAerea">
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4" style="display: none;" id="divLcL">
                        <label for="txt_lcl">LCL</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_lcl">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-lg-4 col-xl-4" style="display: none;" id="div20FT">
                        <label for="txt_Ft20">20 FT</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_Ft20">
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4" style="display: none;" id="div40FT">
                        <label for="txt_Ft40">40 FT</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_Ft40">
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-4" style="display: none;" id="div40HQ">
                        <label for="txt_Hq40">40 HQ</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_Hq40">
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeTarifa" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>