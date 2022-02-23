<?php
$id_usuario = $this->session->userdata('id_usuario');
?>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 id="titleModal" class="modal-title text-uppercase title-color"></h5>
            <button type="button" class="close closeTask" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="agregarPendiente">
            <div class="modal-body" style="padding: 0rem;">
                <div class="card-body cards-productos" style="padding-bottom: 0rem;">
                    <div class="row">
                        <div class="col-12">
                            <input id="txtIdTask" type="hidden" value="">
                            <input id="txtIdUsuario" type="hidden" value="<?= $id_usuario ?>">
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label class="detalle-base-lable" for="txtTask">Pendiente</label>
                                    <input required id="txtTask" type="text" class="form-control form-control-sm borders txtTask">
                                    <div id="val_txtTask" style="display: none; color: red;">Debe ingresar el pendiente</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="txtfechaLimite">Fecha Limite</label>
                                    <input required id="txtfechaLimite" type="date" max="3000-12-31" min="1800-01-01" class="form-control form-control-sm borders">
                                    <div id="val_txtfechaLimite" style="display: none; color: red;">Debe ingresar una fecha limite</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeTask" data-dismiss="modal">Cancelar</button>
                <button id="btnAgregar" type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Agregar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>