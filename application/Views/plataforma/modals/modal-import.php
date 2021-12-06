<?php
if ($DATA_STATUS != FALSE) {
    foreach ($DATA_STATUS->result() as $row) {
        $id_estadoproyectos = $row->id_estadoproyectos;
        $estado = $row->estado;
    }
}
if ($DATA_ASESORES != FALSE) {
    foreach ($DATA_ASESORES->result() as $row) {
        $id_usuario = $row->id_usuario;
        $asesor = $row->nombre;
    }
}
if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $id_estadoproyectos2 = $row['id_estadoproyectos'];
        $id_asesor = $row['id_asesor'];
    }
}
if ($Data_Poyecto_Edit != FALSE) {
    foreach ($Data_Poyecto_Edit->result() as $row) {
        $NombrePr = $row->Nombre_proyecto;
        $NoBL = $row->num_bl;
        $rwETD = $row->etd;
        $rwETA = $row->eta;
        $ETD = date('d-m-Y', strtotime($row->etd));
        $ETA = date('d-m-Y', strtotime($row->eta));
        $FracAran = $row->fracc_arancelaria;
        $Restic = $row->restricciones;
        $Buque = $row->buque;
        $NoViaje = $row->no_viaje;
    }
}
if ($comprobar_coordenadas != FALSE) {
    $direccion = $comprobar_coordenadas->direccion;
} else {
    $direccion = NULL;
}
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
$nivel = $this->session->userdata('nivel');
?>
<style type="text/css">
    div.pac-container {
        z-index: 99999999999 !important;
    }
</style>
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title title-color" id="modalDetalle">Detalle proyecto</h5>
            <button type="button" class="close closeProy" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <input type="hidden" id="estado_ant" value="<?= $id_estadoproyectos2; ?>">
        <input type="hidden" value="nivel_us" value="<?= $nivel; ?>">
        <form class="form" id="form_detalle_proyecto_asesor">
            <div class="modal-body">
                <input type="hidden" value="<?= $id_proyecto ?>" id="id_proyecto_editar">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="txtNombreP">Nombre Proyecto</label>
                        <input type="text" class="form-control form-control-sm borders" id="txtNombreP" value="<?= $row->Nombre_proyecto; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="sel_status" style="margin-left: 1rem;">Estatus</label>
                        <select class="form-control form-control-sm borders" id="sel_status" style="padding: 0rem 0.5rem;margin-right: 1rem;">
                            <?php if ($DATA_STATUS != FALSE) {
                                foreach ($DATA_STATUS->result() as $row) {
                                    if ($row->id_estadoproyectos == $id_estadoproyectos2) {
                                        $sl = 'selected';
                                    } else {
                                        $sl = '';
                                    } ?>
                                    <option value="<?= $row->id_estadoproyectos ?>" <?= $sl ?>><?= $row->estado; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <?php if ($nivel <= 2 && $id_asesor == null) { ?>
                        <div class="col-md-4">
                            <label for="sel_validacion_existe_asesor" style="margin-left: 1rem;">Asesor</label>
                            <select id="sel_validacion_existe_asesor" class="form-control form-control-sm borders" style="padding: 0rem 0.5rem;margin-right: 1rem;" disabled>
                                <?php if ($DATA_ASESORES != FALSE) {
                                    foreach ($DATA_ASESORES->result() as $row) {
                                        if ($row->id_usuario == $id_asesor) {
                                            $sl = 'selected';
                                        } else {
                                            $sl = '';
                                        } ?>
                                        <option value="<?= $row->id_usuario ?>" <?= $sl ?>><?= $row->nombre; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    <?php } else if ($nivel >= 3) { ?>
                        <div class="col-md-4">
                            <label for="sel_validacion_existe_asesor" style="margin-left: 1rem;">Asesor</label>
                            <input type="text" class="form-control form-control-sm borders" id="txtAsesor" value="<?= $asesor; ?>" disabled>
                            <input type="hidden" class="form-control form-control-sm borders" id="txtIdAsesor" value="<?= $id_usuario; ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="txtNumBl">N° Contenedor</label>
                        <input type="text" placeholder="XXXX1234567" class="form-control form-control-sm borders" id="txtNumBl" value="<?= $NoBL; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="txtFraccAran">Frac. Arancelario</label>
                        <input type="text" class="form-control form-control-sm borders" id="txtFraccAran" value="<?= $FracAran; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="txtResticciones">Resticciones</label>
                        <input type="text" class="form-control form-control-sm borders" id="txtResticciones" value="<?= $Restic; ?>">
                    </div>
                </div>
                <?php if ($NoBL == "" || $NoBL == null) { ?>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="txt_latitud" id="modalDetalle">Ubicación fabrica</label>
                            <input type="text" class="form-control form-control-sm borders" id="txt_latitud" value="<?= $direccion; ?>" placeholder="Dirección">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProy" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>