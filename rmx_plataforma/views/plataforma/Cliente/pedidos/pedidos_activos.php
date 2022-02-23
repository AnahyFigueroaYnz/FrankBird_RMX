<?php
function encrypted_id($id_proyecto)
{
  $key64 = "Reachmx1";
  $iv64 = "AAECAwQFBgcICQoLDA0ODw==";
  $key = base64_decode($key64, true);
  $iv = base64_decode($iv64, true);

  $search  = "/";
  $replace = "_";
  $encrypted = openssl_encrypt($id_proyecto, 'AES-256-CBC', $key, 0, $iv);

  return str_replace($search, $replace, $encrypted);
}

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/pedidos.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 title-color">Lista pedidos activos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
          </li>
          <li class="breadcrumb-item active">Lista pedidos activos</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<br>
<section class="content">
  <div class="container-fluid">
    <div class="tab-container">
      <table id="tblPedidos" class="table table-borderless responsive nowrap" style="width: 100%">
        <thead>
          <tr>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Es el identificacdr o numero del pedido">#Folio</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Nombre asignado por el asesor al pedido">Nombre Proyecto</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Estatus del pedido segun el avance de este">Estatus</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Fecha en la que se realizó el pedido">Fecha Orden</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Fecha donde los productos del pedido se encuentran en camino">Fecha Salida</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Fecha donde los productos del pedido han llegado a su destino">Fecha Llegada</a></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($data_activos != FALSE) {
            foreach ($data_activos->result() as $row) {
              $id_proyecto = encrypted_id($row->id_proyecto);
              $Date = date('d-m-Y', strtotime($row->fecha_creacion));
              $ETD = date('d-m-Y', strtotime($row->etd));
              $ETA = date('d-m-Y', strtotime($row->eta)); ?>
              <tr class="shadow border-row">
                <td style="vertical-align: middle">
                  <a href="<?= base_url() ?>Plataforma/DetalleProyectos/<?= $id_proyecto ?>" style="margin-left: 0.5rem;">
                    <span class="td-text"><?= $row->a_registro ?>-<?= $row->folio ?></span>
                </td>
                <td>
                  <?php if ($row->Nombre_proyecto === '' || $row->Nombre_proyecto === null) { ?>
                    <span class="td-text">Por definir</span>
                  <?php } else { ?>
                    <span class="td-text"><?= $row->Nombre_proyecto; ?></span>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($row->id_estadoproyectos >= 1 && $row->id_estadoproyectos <= 5) { ?>
                    <span class="badge badge-celeste"><?= $row->estado; ?></span>
                  <?php } else if ($row->id_estadoproyectos >= 6 && $row->id_estadoproyectos <= 9) { ?>
                    <span class="badge badge-morado"><?= $row->estado; ?></span>
                  <?php } else if ($row->id_estadoproyectos >= 10 && $row->id_estadoproyectos <= 13) { ?>
                    <span class="badge badge-verde-light"><?= $row->estado; ?></span>
                  <?php } else if ($row->id_estadoproyectos >= 14 && $row->id_estadoproyectos <= 18) { ?>
                    <span class="badge badge-azul"><?= $row->estado; ?></span>
                  <?php } else if ($row->id_estadoproyectos >= 19 && $row->id_estadoproyectos <= 24) { ?>
                    <span class="badge badge-verde"><?= $row->estado; ?></span>
                  <?php }?>
                </td>
                <td>
                  <?php if ($row->fecha_creacion === '' || $row->fecha_creacion === null || $row->fecha_creacion === '0000-00-00') { ?>
                    <span class="td-text">Por definir</span>
                  <?php } else { ?>
                    <span class="td-text"><?= $Date; ?></span>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($row->etd === '' || $row->etd === null || $row->etd === '0000-00-00') { ?>
                    <span class="td-text">Por definir</span>
                  <?php } else { ?>
                    <span class="td-text"><?= $ETD; ?></span>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($row->eta === '' || $row->eta === null || $row->eta === '0000-00-00') { ?>
                    <span class="td-text">Por definir</span>
                  <?php } else { ?>
                    <span class="td-text"><?= $ETA; ?></span>
                  <?php } ?>
                </td>
                <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
              </tr>
          <?php }
          }
          ?>
        </tbody>
      </table>
    </div>