<?php
if ($proveedores_detalle != FALSE) {
    foreach ($proveedores_detalle->result() as $row) {
        $id_proveedor_c = $row->id_proveedor_c;
        $contacto = $row->contacto;
        $proveedor = $row->proveedor;
        $telefono = $row->telefono;
        $email = $row->email;
        $direccion = $row->direccion;
    }
}

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/proveedor.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 title-color">Proveedor</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/MisProveedores">Lista proveedores</a>
                    </li>
                    <li class="breadcrumb-item active">Proveedor</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body" style="padding-bottom: 0rem;">
                        <!-- <div class="col-2 ml-auto text-right margin-edit">
                            <a data-toggle="modal" data-target="#editProveedor" type="button" style="color: #007bff">
                                <i class="far fa-edit"></i>
                            </a>
                        </div> -->
                        <form class="margin-details">
                            <div class="form-row">
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="txtProveedorCl" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Proveedor
                                    </label>
                                    <p for="txtProveedorCl" style="font-size: 14px;" class="font-weight-light">
                                        <?= $proveedor; ?>
                                    </p>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label for="txtDireccionPovCl" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Direccion
                                    </label>
                                    <p for="txtDireccionPovCl" style="font-size: 14px;" class="font-weight-light">
                                        <?php if ($direccion == "") { ?>
                                            Sin definir
                                        <?php } else { ?>
                                            <?= $direccion; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label for="txtContactoProvCl" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Contacto
                                    </label>
                                    <p for="txtContactoProvCl" style="font-size: 14px;" class="font-weight-light">
                                        <?php if ($contacto == "") { ?>
                                            Sin definir
                                        <?php } else { ?>
                                            <?= $contacto; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label for="txtCorreoProvCl" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Correo
                                    </label>
                                    <p for="txtCorreoProvCl" style="font-size: 14px;" class="font-weight-light">
                                        <?php if ($email == "") { ?>
                                            Sin definir
                                        <?php } else { ?>
                                            <?= $email; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="form-group col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label for="txtTelefonoProvCl" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Telefono
                                    </label>
                                    <p for="txtTelefonoProvCl" style="font-size: 14px;" class="font-weight-light">
                                        <?php if ($telefono == "") { ?>
                                            Sin definir
                                        <?php } else { ?>
                                            <?= $telefono; ?>
                                        <?php } ?>
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
                        <table id="tblProdProve" class="table table-borderless responsive nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Productos</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($productos_cliente_prov != FALSE) {
                                    foreach ($productos_cliente_prov->result() as $row) { ?>
                                        <tr class="shadow border-row">
                                            <td class="td-align">
                                                <span><?= $row->producto_proveedor_c ?></span>
                                            </td>

                                            <td class="td-align">
                                                <span><?= $row->cantidad_proveedor_c ?></span>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>