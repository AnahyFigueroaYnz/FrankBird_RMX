<?php
if ($DATA_USUARIO != FALSE) {
    foreach ($DATA_USUARIO->result() as $row) {
        $id_usuario = $row->id_usuario;
        $nombre = $row->nombre;
        $email = $row->email;
        $telefono = $row->telefono;
        $id_lada_usuario = $row->id_lada;
    }
}
?>
<div class="card-body" style="padding-bottom: 0rem;">
    <div class="tab-content" style="padding: 0">
        <div class="tab-pane active" id="settings">
            <form id="form_editar_perfil" name="form_editar_perfil" class="form-horizontal">
                <div class="form-group row">
                    <input type="hidden" value="<?= $id_usuario; ?>" id="inpt_id" name="inpt_id">
                    <label for="inpt_nombre" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-form-label">Nombre</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">
                        <input type="text" class="form-control form-control-sm borders" id="inpt_nombre" name="inpt_nombre" value="<?= $nombre; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="celphone" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-form-label">Celular</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select class="form-control-sm borders-left-group" id="LadasCelphone">
                                    <?php if ($id_lada_usuario == null) { ?>
                                        <option selected value="0">lada</option>
                                        <?php if ($DATA_LADAS != FALSE) {
                                            foreach ($DATA_LADAS->result() as $row) { ?>
                                                <option value="<?= $row->id_lada ?>"><?= $row->abrev; ?></option>
                                            <?php   }
                                        }
                                    } else {
                                        if ($DATA_LADAS != FALSE) {
                                            foreach ($DATA_LADAS->result() as $row) { ?>
                                                <option value="<?= $row->id_lada ?>"
                                                <?php
                                                if ($row->id_lada == $id_lada_usuario) {
                                                    echo ' selected';
                                                } ?>
                                                ><?= $row->abrev; ?></option>
                                    <?php   }
                                        }
                                    } ?>
                                </select>
                                <span class="input-group-text span-middle" id="celphoneLada" style="background: #e9ecef;">
                                    <?php if ($DATA_LADAS != FALSE) {
                                        foreach ($DATA_LADAS->result() as $row) {
                                            if ($row->id_lada == $id_lada_usuario) {
                                                echo $row->lada;
                                            }
                                        }
                                    } ?>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-sm borders-right-group" id=celphone value="<?= $telefono ?>" placeholder="(000) 000 0000" maxlength="14" <?php if ($telefono==null) echo 'disabled="true"';?>>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_correo" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-form-label">Correo</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">
                        <input type="email" value="<?= $email; ?>" class="form-control form-control-sm form-control-sm borders" id="input_correo" name="input_correo" placeholder="name@example.com" autocomplete="off" maxlength="255">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-form-label">Foto Perfil</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-10">
                        <div class="input-group">
                            <div class="custom-file custom-file-sm">
                                <input type="file" class="custom-file-input custom-file-input-sm" id="imagen" accept=".jpg, .jpeg, .png">
                                <label id="lblPerfil" class="custom-file-label custom-file-label-sm" for="imagen"></label>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-danger btn-sm borders-right" id="btnLimpiar">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-between" style="margin-bottom: 1rem">
                    <a type="button" class="btn btn-outline-secondary btn-sm btn-nuevo " href="<?= base_url() ?>Plataforma/perfil">Cancelar</a>
                    <button id="btnEditPerfil" type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnEdPerfil">Guardar <i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>