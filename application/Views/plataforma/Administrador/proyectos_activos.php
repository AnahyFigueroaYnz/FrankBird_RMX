<?php
if ($DATA_STATUS != FALSE) {
  foreach ($DATA_STATUS->result() as $row) {
    $id_estadoproyectos = $row->id_estadoproyectos;
    $estado = $row->estado;
  }
}
$level = $this->session->userdata('nivel');

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
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/proyectos.css?v=<?= $version; ?>">
<!-- <link rel="stylesheet" href="<?= base_url() ?>css/detalle-proyectos.css"> -->
<section class="content-header shadow-title">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 title-color">Proyectos activos</h1>
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
          <li class="breadcrumb-item active">Proyectos activos</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<br>
<section class="content">
  <div class="container-fluid">
    <br>
    <div style="padding-bottom: 1rem;">
        <table id="tblTodosProy" class="table table-borderless responsive nowrap" style="width: 100%">
          <thead>
            <tr>
              <th>#Folio</th>
              <th>Cliente</th>
              <th>Estatus</th>
              <th>Nombre proy</th>
              <th>Fecha Orden</th>
              <th>Fecha Salida</th>
              <th>Fecha Llegada</th>
              <th>Asesor</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($DATA_TODOSPROYECTOS != FALSE) {
              foreach ($DATA_TODOSPROYECTOS->result() as $row) {
                $id_asesor2 = $row->id_asesor;
                $id_estadoproyectos2 = $row->id_estadoproyectos;
                $id_proyecto = encrypted_id($row->id_proyecto);
                $Date = date('d-m-Y', strtotime($row->fecha_creacion));
                $ETD = date('d-m-Y', strtotime($row->etd));
                $ETA = date('d-m-Y', strtotime($row->eta)); ?>

                <tr class="shadow border-row" id="tr_<?= $row->id_proyecto; ?>" name="tr_<?= $row->id_proyecto; ?>">
                  <td style="vertical-align: middle">
                    <a id="btnDetallePy" href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>" style="margin-left: 0.5rem;">
                      <span class="td-text"><?= $row->a_registro ?>-<?= $row->folio; ?></span>
                    </a>
                  </td>
                  <td style="vertical-align: middle">
                    <span class="td-text"><?= $row->Cliente; ?></span>
                  </td>
                  <td style="vertical-align: middle">
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
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <?php if ($row->Nombre_proyecto === '' || $row->Nombre_proyecto === null) { ?>
                      <span class="td-text">Por definir</span>
                    <?php } else { ?>
                      <span class="td-text"><?= $row->Nombre_proyecto; ?></span>
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <?php if ($row->fecha_creacion === '' || $row->fecha_creacion === null || $row->fecha_creacion === '0000-00-00') { ?>
                      <span class="td-text">Por definir</span>
                    <?php } else { ?>
                      <span class="td-text"><?= $Date; ?></span>
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <?php if ($row->etd === '' || $row->etd === null || $row->etd === '0000-00-00') { ?>
                      <span class="td-text">Por definir</span>
                    <?php } else { ?>
                      <span class="td-text"><?= $ETD; ?></span>
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <?php if ($row->eta === '' || $row->eta === null || $row->eta === '0000-00-00') { ?>
                      <span class="td-text">Por definir</span>
                    <?php } else { ?>
                      <span class="td-text"><?= $ETA; ?></span>
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <?php if ($row->Asesor === '' || $row->Asesor === null) { ?>
                      <span class="td-text">Por definir</span>
                    <?php } else { ?>
                      <span class="td-text"><?= $row->Asesor; ?></span>
                    <?php } ?>
                  </td>
                  <td style="vertical-align: middle">
                    <a type="button" href="#" data-id="<?= $row->id_proyecto; ?>" class="editar_todos_proyectos" data-toggle="modal">
                      <i class="far fa-edit"></i>
                    </a>
                  </td>
                  <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>

    <!-- Modal para asignar y modificar agente -->
    <div class="modal fade" id="modal_editar_proyeco" tabindex="-1" role="dialog" aria-labelledby="asignar_asesorModalLabel" aria-hidden="true">
      <?php $this->load->view('plataforma/administrador/modals/modal-asignar-asesor'); ?>
    </div>
    <!-- Fin modal -->