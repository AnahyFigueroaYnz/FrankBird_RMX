<?php
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
?>
<div class="card-body card-check" style="padding: 0rem;">
    <input type="hidden" id="txtIdProy" value="<?= $id_proyecto ?>">
    <div id="accordion card-acord">
        <?php if ($Data_freight != FALSE) {
            $count = 0;
            foreach ($Data_freight->result() as $row) {
                $count++;
                $IdFreiht = $row->id_freight;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $DetalleTask = $row->detalle;
                $Coment = $row->comentario;

                $fx = date('d-m-Y', strtotime($row->fecha_cambio)); ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_freight ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="btnNoCheckF<?= $row->id_freight ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckF" data-id="<?= $row->id_freight ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckF<?= $row->id_freight ?>" class="btn btn btn-success btn-check-af btnCheckF hide-button" data-id="<?= $row->id_freight ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_freight ?>"></i>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="btnNoCheckF<?= $row->id_freight ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckF hide-button" data-id="<?= $row->id_freight ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckF<?= $row->id_freight ?>" class="btn btn btn-success btn-check-af btnCheckF" data-id="<?= $row->id_freight ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_freight ?>"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-cont">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="taskNoCheckF<?= $row->id_freight ?>">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckF<?= $row->id_freight ?>" href="collapseTaskF<?= $row->id_freight ?>" class="colProds hide-button" data-id="<?= $row->id_freight ?>" data-toggle="collapse" data-target="#collapseTaskF<?= $row->id_freight ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="taskNoCheckF<?= $row->id_freight ?>" class="hide-button">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckF<?= $row->id_freight ?>" href="collapseTaskF<?= $row->id_freight ?>" class="colProds" data-id="<?= $row->id_freight ?>" data-toggle="collapse" data-target="#collapseTaskF<?= $row->id_freight ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                            <span id="nocheckDateF<?= $row->id_freight ?>" class="nocheckDateF"></span>
                                            <span id="checkDateF<?= $row->id_freight ?>" class="checkDateF hide-button"></span>
                                        <?php } else { ?>
                                            <span id="nocheckDateF<?= $row->id_freight ?>" class="nocheckDateF hide-button"></span>
                                            <span id="checkDateF<?= $row->id_freight ?>" class="checkDateF"><?= $fx ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTaskF<?= $row->id_freight ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_freight ?>" data-parent="#accordion">
                        <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                            <span id="txtComentF<?= $row->id_freight ?>"><?= $row->detalle ?></span>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>