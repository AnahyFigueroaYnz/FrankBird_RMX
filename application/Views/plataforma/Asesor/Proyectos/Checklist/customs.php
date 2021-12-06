<div class="card-body card-check" style="padding: 0rem;">
    <div id="accordion card-acord">
        <?php if ($Data_customs != FALSE) {
            $count = 0;
            foreach ($Data_customs->result() as $row) {
                $count++;
                $IdCustoms = $row->id_customs;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $DetalleTask = $row->detalle;
                $Coment = $row->comentario;
                
                $fx = date('d-m-Y', strtotime($row->fecha_cambio)); ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_customs ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="btnNoCheckC<?= $row->id_customs ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckC" data-id="<?= $row->id_customs ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckC<?= $row->id_customs ?>" class="btn btn btn-success btn-check-af btnCheckC hide-button" data-id="<?= $row->id_customs ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_customs ?>"></i>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="btnNoCheckC<?= $row->id_customs ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckC hide-button" data-id="<?= $row->id_customs ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckC<?= $row->id_customs ?>" class="btn btn btn-success btn-check-af btnCheckC" data-id="<?= $row->id_customs ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_customs ?>"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-cont">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="taskNoCheckC<?= $row->id_customs ?>">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckC<?= $row->id_customs ?>" href="collapseTaskC<?= $row->id_customs ?>" class="colProds hide-button" data-id="<?= $row->id_customs ?>" data-toggle="collapse" data-target="#collapseTaskC<?= $row->id_customs ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="taskNoCheckC<?= $row->id_customs ?>" class="hide-button">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckC<?= $row->id_customs ?>" href="collapseTaskC<?= $row->id_customs ?>" class="colProds" data-id="<?= $row->id_customs ?>" data-toggle="collapse" data-target="#collapseTaskC<?= $row->id_customs ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                            <span id="nocheckDateC<?= $row->id_customs ?>" class="nocheckDateC"></span>
                                            <span id="checkDateC<?= $row->id_customs ?>" class="checkDateC hide-button"></span>
                                        <?php } else { ?>
                                            <span id="nocheckDateC<?= $row->id_customs ?>" class="nocheckDateC hide-button"></span>
                                            <span id="checkDateC<?= $row->id_customs ?>" class="checkDateC"><?= $fx ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTaskC<?= $row->id_customs ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_customs ?>" data-parent="#accordion">
                        <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                            <span id="txtComentC<?= $row->id_customs ?>"><?= $row->detalle ?></span>
                        </div>
                    </div>
                </div>
        <?php } } ?>
    </div>
</div>