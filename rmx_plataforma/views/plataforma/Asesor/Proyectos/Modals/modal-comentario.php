<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color" id="titleCheck">Comentario</h5>
            <button type="button" class="close closeComent" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal agregarComentario" id="agregarComentario">
            <div class="modal-body" style="padding: 0rem;">
                <div class="card-body cards-productos" style="padding-bottom: 0rem;">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input id="idSour" type="hidden" value="0">
                            <input id="idProc" type="hidden" value="0">
                            <input id="idFrei" type="hidden" value="0">
                            <input id="idCust" type="hidden" value="0">
                            <input id="idTask" type="hidden" value="0">
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <label class="font-weight-normal" id="txtDescripcion" style="font-size: large;display: none;"></label>
                                </div>
                                <div class="col-md-12">
                                    <label class="detalle-base-lable" for="txtComentario">Comentario</label>
                                    <textarea class="form-control form-control-sm borders txtComentario" rows="2"></textarea>
                                    <div id="val_txtComentario" style="display: none; color: red;">Debe ingresar un comentario</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeComent" data-dismiss="modal">Cancelar</button>
                <button id="btnComentario" type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Agregar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>