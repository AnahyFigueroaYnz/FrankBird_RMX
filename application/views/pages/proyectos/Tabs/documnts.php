<?php
    $id_nivelusuario = $this->session->userdata('nivel');
    $this->load->library('cript');
    $id_proyecto_uri = $this->uri->segment(3);
    $id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
    if ($Data_Proyecto != FALSE) {
        foreach ($Data_Proyecto as $row) {
            $activo_p = $row['activo_p'];
        }
    }
?>
<div class="card-header borders-card">
    <h4 style="margin-bottom: 0;text-align: justify;">Documentos </h4>
</div>
<input type="hidden" value="<?= $id_nivelusuario ?>" name="inpt_id" id="inpt_id">
<div class="card-body" style="padding: 0rem;">
    <div id="accordion" style="margin-bottom: 1rem;">
        <?php
        if ($Data_tipo_documentos != FALSE) {
            $count = 0;
            foreach ($Data_tipo_documentos->result() as $row) {
                $count++;
                $IdTipoDocumento = $row->id_tipo_doc;
                $TipoDocumento = $row->tipo;
                if ($id_nivelusuario == 5 && $IdTipoDocumento == 12) {
                    
                }else{
        ?>
                <div class="card cotiza-card">
                    <div class="card-header cotiza-header" id="headingTipoDoc<?= $row->id_tipo_doc ?>">
                        <table class="table" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td class="prov-name" href="collapseTipoDoc<?= $row->id_tipo_doc ?>" class="colTipoDoc" data-id="<?= $row->id_tipo_doc; ?>">
                                        <span class="noFile<?= $row->id_tipo_doc ?> hide-button"><?= $row->tipo; ?></span>

                                        <a href="" class="colTipoDoc fileUp<?= $row->id_tipo_doc ?> hide-button" data-id="<?= $row->id_tipo_doc; ?>">
                                            <span class="fileName" data-id="<?= $row->id_tipo_doc; ?>">
                                                <?= $row->tipo; ?>
                                            </span>
                                            <span class="nameDoc<?= $row->id_tipo_doc ?> hide-button"></span>
                                        </a>
                                    </td>
                                    <?php
                                    if ($activo_p == 1) {
                                    ?>
                                    <td class="prov-detile">
                                        <a href="" class="subir<?= $row->id_tipo_doc; ?> hide-button" data-id="<?= $row->id_tipo_doc; ?>" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                            <label for="file-upload<?= $row->id_tipo_doc; ?>" class="iconUpload icon-label" data-id="<?= $row->id_tipo_doc; ?>">
                                                <i class="far fa-folder-open"></i>
                                            </label>
                                        </a>

                                        <a href="" type="button" href="" class="enviar enviar<?= $row->id_tipo_doc; ?> hide-button" data-id="<?= $row->id_tipo_doc; ?>" style="color: green;" data-toggle="tooltip" data-placement="bottom" title="Enviar archivo">
                                            <i class="fas fa-upload"></i>
                                        </a>

                                        <a href="" type="button" class="cancelar cancelar<?= $row->id_tipo_doc; ?> hide-button icons-margens" style="color: red;" data-id="<?= $row->id_tipo_doc; ?>" data-toggle="tooltip" data-placement="bottom" title="Cancelar operación">
                                            <i class="fas fa-ban"></i>
                                        </a>

                                        <a href="" type="button" class="borrarDocumento borrar<?= $row->id_tipo_doc; ?> hide-button icons-margens" style="color: red;" data-id="<?= $row->id_tipo_doc; ?>" data-toggle="tooltip" data-placement="bottom" title="Borrar archivo">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                        <input id="file-upload<?= $row->id_tipo_doc; ?>" class="iconUpload hide-button" data-id="<?= $row->id_tipo_doc; ?>" accept="application/pdf" type="file" />
                                        <div id="info" class="nameFile<?= $row->id_tipo_doc; ?> hide-button"></div>
                                        <input type="text" class="inpIdProyecto hide-button" value="<?= $id_proyecto; ?>">
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="collapseTipoDoc<?= $row->id_tipo_doc ?>" class="collapse" aria-labelledby="headingTipoDoc<?= $row->id_tipo_doc ?>" data-parent="#accordion">
                        <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                            <form class="form-horizontal">
                                as
                            </form>
                        </div>
                    </div>
                </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>