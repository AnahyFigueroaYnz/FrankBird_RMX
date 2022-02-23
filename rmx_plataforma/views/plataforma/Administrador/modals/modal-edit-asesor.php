<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title text-uppercase letra">Modificar usuario</h5>
            <button type="button" class="close closeEditAsesor" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" name="editar_usuarios" id="editar_usuarios">
            <div class="modal-body">
                <input type="hidden" id="id_usuario_editar" name="id_usuario_editar">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_nombre_editar">Nombre</label>
                        <input type="text" class="form-control form-control-sm borders" id="txt_nombre_editar" required placeholder="Nombre completo">
                    </div>
                    <div class="col-md-6">
                        <label for="select_nivel_editar">Departamento</label>
                        <select required id="select_nivel_editar" class="form-control form-control-sm borders" required>
                            <?php
                            if ($DATA_NIVELES != FALSE) {
                                foreach ($DATA_NIVELES->result() as $row) {
                                    echo '<option value="' . $row->id_nivelusuario . '">';
                                    echo $row->tipo;
                                    echo '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="txt_user_editar">Correo</label>
                        <input type="email" class="form-control form-control-sm borders" id="txt_user_editar" placeholder="Correo electronico" maxlength="150" required>
                    </div>
                    <div class="col-md-6">
                        <label for="txt_password_editar">Contraseña</label>
                        <input type="password" class="form-control form-control-sm borders" id=txt_password_editar maxlength="150" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-sm btn-nuevo closeEditAsesor" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo">Guardar <i class="fas fa-check"></i></button>

            </div>
        </form>
    </div>
</div>