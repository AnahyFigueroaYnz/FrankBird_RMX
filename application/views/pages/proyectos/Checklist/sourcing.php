<?php
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
?>
<div class="card-body card-check" style="padding: 0rem;">
    <input type="hidden" id="txtIdProy" value="<?= $id_proyecto ?>">
    <div id="accordion card-acord acrodSourcings">
        <?php if ($Data_sourcing != FALSE) {
            $count = 0;
            foreach ($Data_sourcing->result() as $row) {
                $count++;
                $IdSourcing = $row->id_sourcing;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $DetalleTask = $row->detalle;
                $Coment = $row->comentario;

                $fx = date('d-m-Y', strtotime($row->fecha_cambio)); ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_sourcing ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="btnNoCheckS<?= $row->id_sourcing ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckS" data-id="<?= $row->id_sourcing ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckS<?= $row->id_sourcing ?>" class="btn btn btn-success btn-check-af btnCheckS hide-button" data-id="<?= $row->id_sourcing ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_sourcing ?>"></i>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="btnNoCheckS<?= $row->id_sourcing ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckS hide-button" data-id="<?= $row->id_sourcing ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckS<?= $row->id_sourcing ?>" class="btn btn btn-success btn-check-af btnCheckS" data-id="<?= $row->id_sourcing ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_sourcing ?>"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-cont">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="taskNoCheckS<?= $row->id_sourcing ?>">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckS<?= $row->id_sourcing ?>" href="collapseTaskS<?= $row->id_sourcing ?>" class="colProds hide-button" data-id="<?= $row->id_sourcing ?>" data-toggle="collapse" data-target="#collapseTaskS<?= $row->id_sourcing ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="taskNoCheckS<?= $row->id_sourcing ?>" class="hide-button">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckS<?= $row->id_sourcing ?>" href="collapseTaskS<?= $row->id_sourcing ?>" class="colProds" data-id="<?= $row->id_sourcing ?>" data-toggle="collapse" data-target="#collapseTaskS<?= $row->id_sourcing ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) {
                                        ?>
                                            <span id="nocheckDateS<?= $row->id_sourcing ?>" class="nocheckDateS"></span>
                                            <span id="checkDateS<?= $row->id_sourcing ?>" class="checkDateS hide-button"></span>
                                        <?php } else {
                                        ?>
                                            <span id="nocheckDateS<?= $row->id_sourcing ?>" class="nocheckDateS hide-button"></span>
                                            <span id="checkDateS<?= $row->id_sourcing ?>" class="checkDateS"><?= $fx ?></span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTaskS<?= $row->id_sourcing ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_sourcing ?>" data-parent="#accordion">
                        <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                            <span id="txtComentS<?= $row->id_sourcing ?>"><?= $row->comentario ?></span>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>