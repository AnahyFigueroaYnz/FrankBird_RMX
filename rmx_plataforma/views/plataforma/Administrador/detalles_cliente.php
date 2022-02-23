<?php
if ($data_detalle_cliente != FALSE) {
    foreach ($data_detalle_cliente->result() as $row) {
        $id_usuario = $row->id_usuario;
        $nombre = $row->nombre;
        $email = $row->email;
        $telefono = $row->telefono;
    }
}
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
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/admin/detCliente.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Detalle cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/DashboardAdministrador"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/vista_clientes">Clientes</a>
                    </li>
                    <li class="breadcrumb-item active">Detalle cliente</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body" style="padding-bottom: 0rem;">
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                    Nombre
                                </label>
                                <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                    <?= $nombre; ?>
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
                                    Teléfono
                                </label>
                                <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                    <?= $telefono; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body">
                        <table id="tblProyCleinte" class="table table-borderless responsive nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Proyecto</th>
                                    <th>Fecha orden</th>
                                    <th>Estatus</th>
                                    <th>Fecha Salida</th>
                                    <th>Fecha Llegada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data_pedidos_cliente != FALSE) {
                                    foreach ($data_pedidos_cliente->result() as $row) {
                                        $id_proyecto = encrypted_id($row->id_proyecto); ?>
                                        <tr class="shadow border-row" id="tr_<?= $row->id_proyecto; ?>" name="tr_<?= $row->id_proyecto; ?>">

                                            <td style="vertical-align: middle">
                                                <a id="btnDetallePy" href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>" style="margin-left: 0.5rem;">
                                                    <span><?= $row->a_registro . '-' . $row->folio ?></span>
                                                </a>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <span><?= $row->Nombre_proyecto; ?></span>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <span><?= $row->fecha_creacion; ?></span>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <span><?= $row->estado; ?></span>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <span><?= $row->etd; ?></span>
                                            </td>

                                            <td style="vertical-align: middle">
                                                <span><?= $row->eta; ?></span>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>