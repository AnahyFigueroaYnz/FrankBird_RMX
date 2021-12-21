<?php
$level = $this->session->userdata('nivel');
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/productos.css">
<link rel="stylesheet" href="<?= base_url() ?>css/detalle-proyectos.css">

<section class="content-header shadow-title">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 title-color">Productos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <?php if ($level == 1) { ?>
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>Mantenimiento/DashboardRoot"><i class="nav-icon fas fa-home"></i> Home</a>
            </li>
          <?php } else if ($level == 2) { ?>
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
            </li>
          <?php } else if ($level == 3) { ?>
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
            </li>
          <?php } ?>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<br>
<section class="content">
  <div class="container-fluid">
    <div style="padding-bottom: 1rem;">
      <table id="tblSearchProd" class="table table-borderless responsive nowrap" style="width: 100%">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Proveedor</th>
            <th>Fra. Arancelaria</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($Data_todos_productos != FALSE) {
            foreach ($Data_todos_productos->result() as $row) { ?>
              <tr class="shadow border-row">
                <td style="vertical-align: middle" style="margin-left: 0.5rem;">
                  <a href="<?= base_url("Plataforma/detalleProveedor/$row->id_proveedor") ?>">
                    <span class="td-text"><?= $row->producto; ?></span>
                  </a>
                </td>
                <td style="vertical-align: middle">
                  <span class="td-text"><?= $row->proveedor; ?></span>
                </td>
                <td style="vertical-align: middle">
                  <?php if ($row->fracc_arancelaria == NULL || $row->fracc_arancelaria == '') { ?>
                    <span class="td-text">Por definir</span>
                  <?php } else { ?>
                    <span class="td-text"><?= $row->producto; ?></span>
                  <?php } ?>
                </td>
                <td><span class="td-text" style="visibility: hidden"><?= $row->id_producto ?></span></td>
                <td><span class="td-text" style="visibility: hidden"><?= $row->id_proveedor ?></span></td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>