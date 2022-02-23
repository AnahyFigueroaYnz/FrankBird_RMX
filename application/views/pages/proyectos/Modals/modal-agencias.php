<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color">Lista Agencias Aduanales</h5>
            <button id="btnCloseAgencias" type="button" class="close closeAgencias" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding: 0rem;max-height: 400px;overflow-y:auto;">
            <div style="padding: 1rem">
                <table id="tblNombreAgencias" class="table table-borderless responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Agencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($Data_Agencias != FALSE) {
                            foreach ($Data_Agencias->result() as $row) { ?>
                                <tr class="nameAgenciaRow shadow border-row">
                                    <td style="vertical-align: middle;" class="details-agencias btnDetailsAg" role="button" href="colAgencia<?= $row->id_agencia ?>" data-id="<?= $row->id_agencia ?>">
                                        <a class="btnDetailsAg" role="button" href="colAgencia<?= $row->id_agencia ?>" data-id="<?= $row->id_agencia ?>">
                                            <span class="nameAgencia"><?= $row->agencia ?></span>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-sm closeAgencias" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>