<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color" id="modal_puertoLabel"></h5>
            <button type="button" class="close closePuerto" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="edit_add_transporte">
                <input type="hidden" id="txt_p_id_agencia" value="0">
                <input type="hidden" id="txt_id_transporte" value="0">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Puerto</label>
                       <input type="text" class="form-control form-control-sm borders" id="txt_transporte" required>
                    </div>
                    <div class="col-md-6">
                        <label>Clave</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_clave" required>
                    </div>
                </div>
        </div>
        <div class="modal-footer  d-flex justify-content-between">
            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closePuerto" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>
            </form>
        </div>
    </div>
</div>