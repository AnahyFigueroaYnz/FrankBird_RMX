<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color">Lista Proveedores</h5>
            <button type="button" class="close closeProve" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding: 0rem;max-height: 400px;overflow-y:auto;">
            <div style="padding: 1rem;" id="divTablePRov">
                <table id="tblProvedores" class="table table-borderless responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                <div class="row">
                                    <div class="col-10">
                                        <label class="h9">Proveedor</label>
                                    </div>
                                    <div class="col-2 d-flex flex-row-reverse bd-highlight">
                                        <a class="btnaddNewProv" role="button" href="" >
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                    </div>
                                </div>                                
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal-footer text-right">
            <button type="button" class="btn btn-outline-secondary btn-sm closeProve" data-dismiss="modal" id="closeProve">Cerrar</button>
        </div>
    </div>
</div>