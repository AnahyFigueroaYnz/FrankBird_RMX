<?php

$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);

?>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-uppercase title-color">Evidencia</h5>
      <button type="button" class="close closeimgdone" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form class="form-horizontal" name="agregarevidencia" id="agregarevidencia" class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
      <div class="modal-body" style="padding: 0rem 1rem">
        <div class="card-body" style="padding-bottom: 0.5rem 1rem 0rem 1rem;">
          <div class="row">
            <input id="idDone_d" type="hidden" value="0">
            <div class="col-md-12 text-center">
              <label class="font-weight-normal" style="font-size: large;display: none;">Archivos permitidos: .pdf, .jpg, .jpeg, .png</label>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <div class="input-group">
                  <div class="custom-file custom-file-sm">
                    <input type="file" accept="image/*, application/pdf" class="custom-file-input custom-file-input-sm" id="inputdone" name="inputdone">
                    <label id="lblDone" class="custom-file-label custom-file-label-sm borders" for="inputdone"></label>
                  </div>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secundary btn-sm border-limpiar closeimgdone" type="button" id="btnLimpiardone">
                      <i class="far fa-times-circle"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer  d-flex justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeimgdone" data-dismiss="modal">Cancelar</button>
        <button id="btnDoneimg" type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Agregar <i class="fas fa-check"></i></button>
      </div>
    </form>
  </div>
</div>