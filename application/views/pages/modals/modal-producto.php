<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color" id="title_add_edit_productos"></h5>
            <button type="button" class="close closeProve" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form-horizontal" id="add_edit_producto">
            <div class="modal-body">
                <input type="hidden" id="txt_id_proveedor" value="">
                <input type="hidden" id="txt_id_producto" value="">
                <div class="form-group">
                    <label for="txt_producto" class="Text-bodycard">Nombre</label>
                    <input type="text" class="form-control form-control-sm borders" id="txt_producto" required>
                </div>
                <div class="form-group">
                    <label for="txt_fr_arancel" class="Text-bodycard">Fracc. Arancelaria</label>
                    <input type="text" class="form-control form-control-sm borders" id="txt_fr_arancel" required>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProve" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEditProy">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>
</div>