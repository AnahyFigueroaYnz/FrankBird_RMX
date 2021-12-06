<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar Agencia</h5>
            <button type="button" class="close closeEditAg" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal editarAgencia">
            <div class="modal-body">
                <div class="card-body" style="padding: 0rem;">
                    <input type="hidden" id="txtIdAgenciaAduanal">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Honorarios</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-prefix">$</span>
                                </div>
                                <input type="text" class="form-control border-currency text-right inpHonora" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Revalidación</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-prefix">$</span>
                                </div>
                                <input type="text" class="form-control border-currency text-right ipRevalida" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Complmentario</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-prefix">$</span>
                                </div>
                                <input type="text" class="form-control border-currency text-right ipComplment" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
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
                                <input type="text" class="form-control border-currency text-right inpPrevio" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Maniobra puerto</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-prefix">$</span>
                                </div>
                                <input type="text" class="form-control border-currency text-right inpManiobra" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Desconsolidación</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-prefix">$</span>
                                </div>
                                <input type="text" class="form-control border-currency text-right inpDesco" min="1" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeEditAg" data-dismiss="modal">Cancelar</button>
                <button id="btnAddAgencias" type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnAddAgencias">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>