<?php
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/proveedor.css?v=<?=$version;?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Lista proveedores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active">Lista proveedores</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
  <div class="container-fluid">
    <div style="padding: 0rem 2rem 1rem 2rem;">
      <table id="tblProveedoresC" class="table table-borderless responsive nowrap" style="width: 100%">
        <thead>
          <tr>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Nombre del proveedor">Proveedor</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Contacto del proveedor">Contacto</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Telefono del contacto del proveedor">Telefono</a></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($proveedores_data != FALSE) {
            foreach ($proveedores_data->result() as $row) { ?>
              <tr class="shadow border-row">
                <td class="td-align">
                  <a href="<?= base_url(); ?>Clientes/DetalleProveedor/<?= $row->id_proveedor_c ?>" style="margin-left: 0.5rem;">
                    <span class="td-text"><?= $row->proveedor ?></span>
                  </a>
                </td>
                <td class="td-align"><span class="td-text"><?= $row->contacto; ?></span></td>
                <td class="td-align"><span class="td-text"><?= $row->telefono; ?></span></td>
                <td class="td-align text-center">
                  <a type="button" style="color: red" href="<?= base_url(); ?>Plataforma/eliminar_proveedor/<?= $row->id_proveedor_c ?>" title="Eliminar este proveedor" id="Eliminar" name="Eliminar" onclick="return confirm('¿Esta seguro de eliminar al proveedor?')">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
                <td><span style="visibility: hidden"><?= $row->id_proveedor_c ?></span></td>
                <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
              </tr>
          <?php  } } ?>
        </tbody>
      </table>
    </div>