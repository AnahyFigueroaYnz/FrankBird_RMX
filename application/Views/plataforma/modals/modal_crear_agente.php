<?php
$id_agencia = $this->uri->segment(3);
?>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_add_agenteLabel" class="text-uppercase title-color">Nuevo Agente Aduanal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="crear_agente">
                <input type="hidden" id="txt_id_agencia" value="<?=$id_agencia;?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_nombre">Nombre</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_nombre" required placeholder="Nombre completo">
                    </div>
                    <div class="col-md-6">
                        <label for="txt_email_agente">Email</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_email_agente" required placeholder="ejemplo@gmail.com" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_telefonoAgente" class="form-text">Telefono</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <select class="form-control-sm styleselectladas boder-lad" id="sel_LadaAgente">
                                    <option selected value="0">lada</option> 
                                    <?php
                                    if ($DATA_LADAS != FALSE) {
                                        foreach ($DATA_LADAS->result() as $row) {
                                            $lad = $row->lada;
                                            echo '<option value="' . $row->id_lada . '"';
                                            echo '>';
                                            echo $row->abrev;
                                            echo '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="input-group-text span-lada" id="spLadaAgente"></span>
                            </div>
                            <input type="tel" required class="form-control form-control-sm inp-phone" id="txt_telefonoAgente" title="Seleccione una lada " value="" maxlength="14">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="txt_contrasena">Contraseña</label>
                        <input type="password" class="form-control form-control-sm borders" id="txt_contrasena" required maxlength="16" minlength="8" pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*"  title="Debe tener al menos 8 caracteres, una mayúscula, una minúscula, un dígito.">
                    </div>
                </div>
        </div>
        <div class="modal-footer  d-flex justify-content-between">
            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closePuerto" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>
            </form>
        </div>
    </div>
</div>