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
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/cotizacion.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 title-color">Lista cotizaciones</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
          </li>
          <li class="breadcrumb-item active">Lista cotizaciones</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<br>
<section class="content">
  <div class="container-fluid">
    <div style="padding: 0rem 2rem 1rem 2rem;">
      <table id="tblCotizaciones" class="table table-borderless responsive nowrap" style="width: 100%">
        <thead>
          <tr>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Es el identificacdr o numero de la cotizacion">#Folio</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Nombre de la cotización asignada por el asesor">Cotizacion</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Es el identificacdr o numero del pedido">#Pedido</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Total monetario de la cotización">Total</a></th>
            <th><a class="mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-content="Estatus del pedido segun el avance de este">Estatus</a></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($get_cotizaciones != FALSE) {
            foreach ($get_cotizaciones->result() as $row) {
              $id_proyecto = encrypted_id($row->id_proyecto);
              $Folio_p = $row->folio_p;
              $Registro_p = $row->registro_p;
              $Folio = $row->folio;
              $Nombre = $row->nombre_cot;
              $sumaFormat = number_format($row->suma, 2);
          ?>
              <tr class="shadow border-row">
                <td style="vertical-align: middle">
                  <a href="<?= base_url(); ?>Clientes/DetalleCotizacion/<?= $row->id_cotizacion ?>" style="margin-left: 0.5rem;">
                    <span class="td-text"><?= $Folio ?>-<?= $Registro_p ?>-<?= $Folio_p ?></span>
                  </a>
                </td>
                <td style="vertical-align: middle"><span class="td-text"><?= $Nombre ?></span></td>
                <td style="vertical-align: middle"><span class="td-text">
                  <a href="<?= base_url() ?>Plataforma/DetalleProyectos/<?= $id_proyecto ?>">
                    <span class="td-text"><?= $Registro_p ?>-<?= $Folio_p ?></span>
                  </a>
                </td>
                <td style="vertical-align: middle"><span class="td-text">$<?= $sumaFormat ?></span></td>
                <td class="text-center">
                  <?php if ($row->activo == 2) { ?>
                    <span class="badge badge-secondary">Pendiente</span>
                  <?php } else if ($row->activo == 3) { ?>
                    <span class="badge badge-success">Aceptada</span>
                  <?php } else if ($row->activo == 4) { ?>
                    <span class="badge badge-danger">Recotizar</span>
                  <?php } ?>
                </td>
                <td><span style="visibility: hidden"><?= $row->id_cotizacion ?></span></td>
                <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
              </tr>
          <?php  }
          } ?>
        </tbody>
      </table>
    </div>
    <script src="<?= base_url(); ?>js/clientes/cotizacion.js"></script>