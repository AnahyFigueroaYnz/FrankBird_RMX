<div class="card-body card-check" style="padding: 0rem;">
    <div id="accordion card-acord">
        <?php
        if ($Data_quoted != FALSE) {
            $count = 0;
            foreach ($Data_quoted->result() as $row) {
                $count++;
                $IdQuoted = $row->id_quoted;
                $IdTask = $row->id_task;
                $Estatus = $row->estatus;
                $FechaCambio = $row->fecha_cambio;
                $Task = $row->task;
                $DetalleTask = $row->detalle;
                
                $fx = date('d-m-Y', strtotime($row->fecha_cambio));
        ?>
                <div class="card cotiza-card">
                    <div class="card-body cotiza-header" id="headingTask<?= $row->id_quoted ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-icon">
                                        <?php if ($row->estatus === '0') {
                                        ?>
                                            <a id="btnNoCheckQ<?= $row->id_quoted ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckQ" data-id="<?= $row->id_quoted ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckQ<?= $row->id_quoted ?>" class="btn btn btn-success btn-check-af btnCheckQ hide-button" data-id="<?= $row->id_quoted ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_quoted ?>"></i>
                                            </a>
                                        <?php } else {
                                        ?>
                                            <a id="btnNoCheckQ<?= $row->id_quoted ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheckQ hide-button" data-id="<?= $row->id_quoted ?>">
                                                &nbsp;&nbsp;
                                            </a>
                                            <a id="btnCheckQ<?= $row->id_quoted ?>" class="btn btn btn-success btn-check-af btnCheckQ" data-id="<?= $row->id_quoted ?>">
                                                <i class="fas fa-check" data-id="<?= $row->id_quoted ?>"></i>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="prov-cont">
                                        <a href="collapseTaskQ<?= $row->id_quoted ?>" class="colProds" data-id="<?= $row->id_quoted ?>" data-toggle="collapse" data-target="#collapseTaskQ<?= $row->id_quoted ?>" aria-expanded="false">
                                            <span data-id=""><?= $row->task ?></span>
                                        </a>
                                    </td>
                                    <td class="prov-detile">
                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) {
                                        ?>
                                            <span id="nocheckDateQ<?= $row->id_production ?>" class="nocheckDateQ"></span>
                                            <span id="checkDateQ<?= $row->id_production ?>" class="checkDateQ hide-button"></span>
                                        <?php } else {
                                        ?>
                                            <span id="nocheckDateQ<?= $row->id_production ?>" class="nocheckDateQ hide-button"></span>
                                            <span id="checkDateQ<?= $row->id_production ?>" class="checkDateQ"><?= $fx ?></span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($row->detalle === '') {
                    ?>
                    <?php } else {
                    ?>
                        <div id="collapseTaskQ<?= $row->id_quoted ?>" class="collapse" aria-labelledby="headingTask<?= $row->id_quoted ?>" data-parent="#accordion">
                            <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                <table class="table" style="margin-bottom: 0;">
                                    <tbody>
                                        <tr>
                                            <td class="no-exist">
                                                <span><?= $row->detalle ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>