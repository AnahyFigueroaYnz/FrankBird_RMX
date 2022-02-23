<?php
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
?>
<div class="card-body card-check" style="padding: 0rem;">
    <input type="hidden" id="txtIdProy" value="<?= $id_proyecto ?>">
    <div id="accordion card-acord">
        <?php if ($Data_production != FALSE) {
            $count = 0;
            foreach ($Data_production->result() as $row) {
                $count++;
                $IdProduction = $row->id_production;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $DetalleTask = $row->detalle;
                $Coment = $row->comentario;

                $fx = date('d-m-Y', strtotime($row->fecha_cambio)); ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_production ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="btnNoCheckP<?= $row->id_production ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckP" data-id="<?= $row->id_production ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckP<?= $row->id_production ?>" class="btn btn btn-success btn-check-af btnCheckP hide-button" data-id="<?= $row->id_production ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_production ?>"></i>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="btnNoCheckP<?= $row->id_production ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckP hide-button" data-id="<?= $row->id_production ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckP<?= $row->id_production ?>" class="btn btn btn-success btn-check-af btnCheckP" data-id="<?= $row->id_production ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_production ?>"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-cont">
                                        <?php if ($row->estatus === '0') { ?>
                                                <a id="taskNoCheckP<?= $row->id_production ?>">
                                                    <span data-id=""><?= $row->task ?></span>
                                                </a>
                                                <a id="taskCheckP<?= $row->id_production ?>" href="collapseTaskP<?= $row->id_production ?>" class="colProds hide-button" data-id="<?= $row->id_production ?>" data-toggle="collapse" data-target="#collapseTaskP<?= $row->id_production ?>" aria-expanded="false">
                                                    <span data-id=""><?= $row->task ?></span>
                                                </a>
                                            <?php } else if ($row->estatus === '1') { ?>
                                                <a id="taskNoCheckP<?= $row->id_production ?>" class="hide-button">
                                                    <span data-id=""><?= $row->task ?></span>
                                                </a>
                                                <a id="taskCheckP<?= $row->id_production ?>" href="collapseTaskP<?= $row->id_production ?>" class="colProds" data-id="<?= $row->id_production ?>" data-toggle="collapse" data-target="#collapseTaskP<?= $row->id_production ?>" aria-expanded="false">
                                                    <span data-id=""><?= $row->task ?></span>
                                                </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                            <span id="noCheckDateP<?= $row->id_production ?>" class="noCheckDateP"></span>
                                            <span id="checkDateP<?= $row->id_production ?>" class="checkDateP hide-button"></span>
                                        <?php } else { ?>
                                            <span id="noCheckDateP<?= $row->id_production ?>" class="noCheckDateP hide-button"></span>
                                            <span id="checkDateP<?= $row->id_production ?>" class="checkDateP"><?= $fx ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTaskP<?= $row->id_production ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_production ?>" data-parent="#accordion">
                        <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                            <span id="txtComentP<?= $row->id_production ?>"><?= $row->comentario ?></span>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>