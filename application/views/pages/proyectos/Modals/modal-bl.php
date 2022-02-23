<?php

$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);

?>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color">Número BL</h5>
            <button type="button" class="close closeBL" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal agregarBL" id="agregarBL">
            <div class="modal-body" style="padding: 0rem;">
                <div class="card-body cards-productos" style="padding-bottom: 0rem;">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input id="idProy_bl" type="hidden" value="<?= $id_proyecto;?>">
                            <input id="idProc_bl" type="hidden" value="0">
                            <input id="idTask_bl" type="hidden" value="0">      
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <label class="font-weight-normal" id="txtDescripcion" style="font-size: large;display: none;"></label>
                                </div>
                                <div class="col-md-12">
                                    <label class="detalle-base-lable" for="txtbl">Número</label>
                                    <input type="text" class="form-control form-control-sm borders" required id="txtbl" name="txtbl">   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeBL" data-dismiss="modal">Cancelar</button>
                <button id="btnBL" type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Agregar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>