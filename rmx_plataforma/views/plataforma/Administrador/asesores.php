<?php
if ($DATA_NIVELES != FALSE) {
    foreach ($DATA_NIVELES->result() as $row) {
        $id_nivelusuario = $row->id_nivelusuario;
        $tipo = $row->tipo;
        $nivel = $row->nivel;
    }
}
$level = $this->session->userdata('nivel');

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/admin/asesores.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Asesores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php if ($level == 1) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Mantenimiento/DashboardRoot"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } else if ($level == 2) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Plataforma/DashboardAdministrador"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } ?>
                    <li class="breadcrumb-item active">Asesores</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ml-auto text-center" style="margin-top: 1rem;">
            <a type="button" href="" id="btnNuevoAgente" class="btn btn-sm btn-outline-primary btn-nuevo">
                Nueva Asesor <span><i class="fas fa-plus"></i></span>
            </a>
        </div>
        <br>
        <div style="padding-bottom: 1rem;">
            <table id="tblAsesores" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <?php if ($level <= 2) { ?>
                            <th class="levelAdmin"></th>
                        <?php } else { ?>
                            <th class="levelAsesor"></th>
                        <?php } ?>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($DATA_USUARIOS != FALSE) {
                        foreach ($DATA_USUARIOS as $row) {
                            $id_nivelusuario2 = $row->id_nivelusuario;
                    ?>
                            <tr class="shadow border-row" id="tr_<?= $row->id_usuario; ?>" name="tr_<?= $row->id_usuario; ?>">
                                <td style="vertical-align: middle;">
                                    <a href="<?= base_url("Plataforma/DetalleUsuario/$row->id_usuario") ?>">
                                        <span class="td-text"><?= $row->nombre; ?></span>
                                    </a>
                                </td>
                                <td style="vertical-align: middle">
                                    <?php if ($row->id_nivelusuario == 1) { ?>
                                        <span class="td-text">Sistemas</span>
                                    <?php } else { ?>
                                        <span class="td-text"><?= $row->tipo; ?></span>
                                    <?php } ?>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->email; ?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <?php if ($row->telefono == NULL || $row->telefono == '') { ?>
                                        <span class="td-text">Por definir</span>
                                    <?php } else { ?>
                                        <span class="td-text"><?= $row->abrev; ?> <?= $row->telefono; ?></span>
                                    <?php } ?>
                                </td>
                                <?php if ($level <= 2) { ?>
                                    <td style="vertical-align: middle; text-align: center levelAdmin">
                                        <a type="button" href="" data-id="<?= $row->id_usuario; ?>" class="editar_user" data-toggle="modal">
                                            <i class="far fa-edit" data-id="<?= $row->id_usuario; ?>" data-toggle="tooltip" data-placement="top" title="Modificar Usuario"></i>
                                        </a>
                                        <a type="button" href="" data-id="<?= $row->id_usuario; ?>" class="eliminar_user" style="color: #dc3545;">
                                            <i class="far fa-trash-alt" data-id="<?= $row->id_usuario; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario"></i>
                                        </a>
                                    </td>
                                <?php } else { ?>
                                    <td style="visibility: hidden;" class="levelAsesor"></td>
                                <?php } ?>
                                <td><span class="td-text" style="visibility: hidden"><?= $row->id_usuario ?></span></td>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>

        <!-- Modal para agregar usuarios -->
        <div class="modal fade" id="modal_nuevo_asesor" tabindex="-1" role="dialog" aria-labelledby="modal_nuevo_asesorLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/administrador/modals/modal-nuevo-asesor'); ?>
        </div>
        <!--Fin modal agregar-->

        <!-- MODAL PARA EDITAR LOS USUARIOS -->
        <div class="modal fade" id="modal_usuarios_editar" tabindex="-1" role="dialog" aria-labelledby="modal_nuevo_asesorLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/administrador/modals/modal-edit-asesor'); ?>
        </div>