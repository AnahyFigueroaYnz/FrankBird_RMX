<?php
$level = $this->session->userdata('nivel');
if ($Data_detalle_proveedor != FALSE) {
    foreach ($Data_detalle_proveedor->result() as $row) {
        $id_proveedor = $row->id_proveedor;
        $proveedor = $row->proveedor;
        $contacto = $row->contacto;
        $email = $row->email;
        $lada = $row->abrev;
        $telefono = $row->telefono;
        $direccion = $row->direccion;
        $wechat = $row->wechat;
    }
}

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/proveedores.css?v=<?=$version;?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 letra text-uppercase">Detalles Proveedor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php if ($level <= 2) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Plataforma/DashboardAdministrador"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                        <?php } else if ($level == 3) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Plataforma/DashboardAsesor"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/Proveedores">Proveedores</a>
                    </li>
                    <li class="breadcrumb-item active">Detalles Proveedor</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<div class="col-12 ml-auto text-right" style="margin-top: 3.2px;">
    <button type="button" id="btnNuevoProd" class="btn btn-sm btn-outline-primary btn-nuevo add_producto" data-id="<?= $row->id_proveedor; ?>">
        Nuevo Producto <span><i class="fas fa-plus"></i></span>
    </button>
</div>
<br>
<section class="content">
    <div class="container-fluid">
        <div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body" style="padding-bottom: 0rem;">
                        <div class="row">
                            <div class="col-8">
                                <p style=" font-size: 14px;" class="font-weight-bold text-uppercase"><?= $proveedor; ?></p>
                            </div>
                            <div class="col-2 ml-auto text-right margin-edit">
                                <a href="" class="editProveedor" type="button" data-id="<?= $row->id_proveedor ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <form class="margin-details">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Proveedor
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $proveedor; ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Correo
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $email; ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Dirección
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $direccion; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Contacto
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $contacto ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Teléfono
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?php if ($lada === null || $lada === '') { ?>
                                            <?= $telefono; ?>
                                        <?php } else { ?>
                                            <?= $lada; ?> <?= $telefono; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        WeChat
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $wechat; ?>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body">
                        <table id="tblProductosProv" class="table table-borderless responsive nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Productos</th>
                                    <th>Fracc. Arancelaria</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($Data_productos_prov != FALSE) {
                                    foreach ($Data_productos_prov->result() as $row) {
                                ?>
                                        <tr class="shadow border-row" id="tr_<?= $row->id_producto; ?>" name="tr_<?= $row->id_producto; ?>">
                                            <td style="vertical-align: middle">
                                                <span><?= $row->producto; ?></span>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <span><?= $row->fracc_arancelaria; ?></span>
                                            </td>
                                            <td style="vertical-align: middle; text-align: center">
                                                <a type="button" href="" data-id="<?= $row->id_producto; ?>" class="edit_producto" title="Modificar producto" data-toggle="tooltip" data-placement="top">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <?php
                                                if ($level <= 2) {
                                                ?>
                                                    <a type="button" href="" data-id="<?= $row->id_producto; ?>" class="eliminar_producto" style="color: #dc3545;" title="Eliminar producto" data-toggle="tooltip" data-placement="top">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--modal crear proveedor-->
        <div class="modal fade" id="editProveedor" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal_proveedorLabel">
            <?php $this->load->view('plataforma/modals/modal-proveedor'); ?>
        </div>
        <!--fin modal crear proveedor-->

        <!-- Modal para agregar producto -->
        <div class="modal fade" id="modal_add_edit_productos" tabindex="-1" role="dialog" aria-labelledby="modal_add_edit_productosLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-producto'); ?>
        </div>
        <!--Fin modal agregar-->