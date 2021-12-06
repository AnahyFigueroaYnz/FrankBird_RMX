<div class="card-body card-check" style="padding: 0rem;">
    <div id="accordion card-acord">
        <?php if ($Data_done != FALSE) {
            $count = 0;
            foreach ($Data_done->result() as $row) {
                $count++;
                $IdDone = $row->id_done;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $Coment = $row->comentario;

                $ext = strrchr($Coment, ".");

                $fx = date('d-m-Y', strtotime($row->fecha_cambio)); ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_done ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="btnNoCheckD<?= $row->id_done ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckD" data-id="<?= $row->id_done ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckD<?= $row->id_done ?>" class="btn btn btn-success btn-check-af btnCheckD hide-button" data-id="<?= $row->id_done ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_done ?>"></i>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="btnNoCheckD<?= $row->id_done ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckD hide-button" data-id="<?= $row->id_done ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckD<?= $row->id_done ?>" class="btn btn btn-success btn-check-af btnCheckD disabled" data-id="<?= $row->id_done ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_done ?>"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-cont">
                                        <?php if ($row->estatus === '0') { ?>
                                            <a id="taskNoCheckD<?= $row->id_done ?>">
                                                <?php if ($row->detalle === '') { ?>
                                                    <span data-id=""><?= $row->task ?></span>
                                                <?php } else { ?>
                                                    <span data-id=""><?= $row->task ?> (<?= $row->detalle ?> ) </span>
                                                <?php } ?>
                                            </a>
                                            <a id="taskCheckD<?= $row->id_done ?>" href="collapseTaskD<?= $row->id_done ?>" class="colProds hide-button" data-id="<?= $row->id_done ?>" data-toggle="collapse" data-target="#collapseTaskD<?= $row->id_done ?>" aria-expanded="false">
                                                <?php if ($row->detalle === '') { ?>
                                                    <span data-id=""><?= $row->task ?></span>
                                                <?php } else { ?>
                                                    <span data-id=""><?= $row->task ?> (<?= $row->detalle ?> ) </span>
                                                <?php } ?>
                                            </a>
                                        <?php } else if ($row->estatus === '1') { ?>
                                            <a id="taskNoCheckD<?= $row->id_done ?>" class="hide-button">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                            <a id="taskCheckD<?= $row->id_done ?>" href="collapseTaskD<?= $row->id_done ?>" class="colProds" data-id="<?= $row->id_done ?>" data-toggle="collapse" data-target="#collapseTaskD<?= $row->id_done ?>" aria-expanded="false">
                                                <span data-id=""><?= $row->task ?></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                            <span id="nocheckDateD<?= $row->id_done ?>" class="nocheckDateD"></span>
                                            <span id="checkDateD<?= $row->id_done ?>" class="checkDateD hide-button"></span>
                                        <?php } else { ?>
                                            <span id="nocheckDateD<?= $row->id_done ?>" class="nocheckDateD hide-button"></span>
                                            <span id="checkDateD<?= $row->id_done ?>" class="checkDateD"><?= $fx ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTaskD<?= $row->id_done ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_done ?>" data-parent="#accordion">
                        <div class="card-body text-center" style="border-top: 1px solid #dfdfdf;">
                            <label id="baseURL" class="hide-button"><?= base_url() ?></label>
                            <?php if ($row->estatus === '0') { ?>
                                <a href="" id="pdfEvidencia" class="hide-button">
                                    <i class="far fa-file-pdf" style="color: #cb1212; font-size: 10rem"></i>
                                    <label id="srcPDF" style="display: none;"></label>
                                </a>
                                <img id="imgEvidencia" src="" class="img-fluid hide-button" alt="Sample photo">
                                <?php } else {
                                if ($ext == '.pdf' || $ext == '.PDF') { ?>
                                    <a href="" id="pdfEvidencia">
                                        <i class="far fa-file-pdf" style="color: #cb1212; font-size: 10rem"></i>
                                        <label id="srcPDF" style="display: none;"><?= base_url() ?><?= $row->comentario ?></label>
                                    </a>
                                <?php } else if ($ext == '.png' || $ext == '.PNG' || $ext == '.jpeg' || $ext == '.JPEG' || $ext == '.jpg' || $ext == '.JPG') { ?>
                                    <img id="imgEvidencia" src="<?= base_url() ?><?= $row->comentario ?>" class="img-fluid" alt="Sample photo">
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>