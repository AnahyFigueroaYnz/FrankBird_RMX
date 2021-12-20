<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title title-color text-uppercase" id="titulo-editar">Editar proyecto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" name="form_editar_proyecto_todo" id="form_editar_proyecto_todo">
        <input type="hidden" id="id_proyecto_editar">
        <div class="form-group row">
          <div class="valNombre col-md-4">
            <label for="txtPrecio">Nombre del proyecto</label>
            <input type="text" id="txt_nombre_proyecto_editar" class="form-control form-control-sm borders" required="">
          </div>
          <div class="valStatus col-md-6">
            <label for="txtTotal">Estatus proyecto</label>
            <select class="form-control form-control-sm borders" id="sel_editar_status">
              <?php
              if ($DATA_STATUS != FALSE) {
                foreach ($DATA_STATUS->result() as $row) {
                  echo '<option value="' . $row->id_estadoproyectos . '">';
                  echo $row->estado;
                  echo '</option>';
                }
              }
              ?>
            </select>
          </div>
        </div>
    </div>
    <div class="modal-footer  d-flex justify-content-between">
      <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeEditProy" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
      </form>
    </div>
  </div>
</div>