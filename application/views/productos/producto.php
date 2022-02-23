<?php
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/producto.css?v=<?=$version;?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Lista productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i>
                            Home</a>
                    </li>
                    <li class="breadcrumb-item active">Lista productos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div style="padding: 0rem 2rem 1rem 2rem;">
            <table id="tblProductos" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Nombre del producto">Producto</a></th>
                        <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Especificaciones agregadas al producto">Especificaciones</a></th>
                        <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Cantidad solicitada del producto">Cantidad</a></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data_producto_sp_cliente != FALSE) {
            foreach ($data_producto_sp_cliente->result() as $row) { ?>
                    <tr class="shadow border-row">
                        <td class="td-align">
                            <span class="td-text" style="margin-left: 15px;"><?= $row->producto_sp_c ?></span>
                        </td>
                        <td class="td-align">
                            <span class="td-text" style="margin-left: 15px;"><?= $row->especificaciones_sp_c ?></span>
                        </td>
                        <td class="td-align">
                            <span class="td-text" style="margin-left: 15px;"><?= $row->cantidad_sp_c ?></span>
                        </td>
                        <td><span style="visibility: hidden"><?= $row->id_producto_sp_c ?></span></td>
                        <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
