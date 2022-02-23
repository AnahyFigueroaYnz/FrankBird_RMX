<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase letra" id="modal_nuevo_asesorLabel">Agregar nuevo asesor</h5>
            <button type="button" class="close closeNewAsesor" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" name="agregar_usuarios" id="agregar_usuarios">
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_nombre">Nombre</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_nombre" required placeholder="Nombre completo">
                </div>
                    <div class="col-md-6">
                        <label for="sel_id_nivelusuario">Departamento</label>
                        <select required id="sel_id_nivelusuario" class="form-control form-control-sm borders">
                            <option value="">Seleccionar</option>
                            <?php
                            if ($DATA_NIVELES != FALSE) {
                                foreach ($DATA_NIVELES->result() as $row) {
                                    if ($row->tipo != 'root') {
                                        echo '<option value="' . $row->id_nivelusuario . '">';
                                        echo $row->tipo;
                                        echo '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="txt_email">Correo</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_email" placeholder="Correo electronico" maxlength="150" required>
                    </div>
                    <div class="col-md-4">
                        <label for="txt_contrasena">Contraseña</label>
                        <input type="password" class="form-control form-control-sm borders" id=txt_contrasena maxlength="150" required>
                    </div>
                    <div class="col-md-4">
                        <label for="txt_confirm_contrasena">Confirmar contraseña</label>
                        <input type="password" class="form-control form-control-sm borders" id=txt_confirm_contrasena maxlength="150" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-sm btn-nuevo closeNewAsesor" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>