<?php
$level = $this->session->userdata('nivel');

//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/proveedores.css ">
<link rel="stylesheet" href="../css/detalle-proyectos.css">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Proveedores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <li class="breadcrumb-item active">Proveedores</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ml-auto text-center" style="margin-top: 1rem;">
            <a type="button" href="" id="btnNuevoProv" class="addProveedor btn btn-sm btn-outline-primary btn-nuevo">
                Nuevo Proveedor <span><i class="fas fa-plus"></i></span>
            </a>
        </div>
        <br>
        <div style="padding-bottom: 1rem;">
        <table id="tblProveedores" class="table table-borderless responsive nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Contacto</th>
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
                if ($data_proveedores_asesor != FALSE) {
                    foreach ($data_proveedores_asesor->result() as $row) { ?>
                        <tr class="shadow border-row" id="tr_<?= $row->id_proveedor_c ?>" name="tr_<?= $row->id_proveedor_c ?>">
                            <td style="vertical-align: middle">
                                <a href="<?= base_url("Plataforma/detalleProveedor/$row->id_proveedor_c") ?>" style="margin-left: 0.5rem;">
                                    <span class="td-text"><?= $row->proveedor; ?></span>
                                </a>
                            </td>
                            <td style="vertical-align: middle">
                                <span class="td-text"><?= $row->contacto; ?></span>
                            </td>
                            <td style="vertical-align: middle">
                                <span class="td-text"><?= $row->email; ?></span>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->abrev === null || $row->abrev === '') { ?>
                                    <span class="td-text"><?= $row->telefono; ?></span>
                                <?php } else { ?>
                                    <span class="td-text"><?= $row->abrev; ?> <?= $row->telefono; ?></span>
                                <?php } ?>
                            </td>
                            <?php if ($level <= 2) { ?>
                                <td style="vertical-align: middle" class="text-center levelAdmin">
                                    <a type="button" href="#" data-id="<?= $row->id_proveedor_c; ?>" class="eliminar_proveedor" style="color: #dc3545;">
                                        <i class="far fa-trash-alt eliminar_proveedor" data-id="<?= $row->id_proveedor_c; ?>" data-toggle="tooltip" data-placement="top" title="Eliminar Proveedor"></i>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td style="visibility: hidden;" class="levelAsesor"></td>
                            <?php } ?>
                            <td><span class="td-text" style="visibility: hidden"><?= $row->id_proveedor_c ?></span></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <!--modal crear proveedor-->
        <div class="modal fade" id="modal_add_edit_proveedor" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal_add_edit_proveedorLabel">
            <?php $this->load->view('plataforma/modals/modal-proveedor'); ?>
        </div>
        <!--fin modal crear proveedor-->