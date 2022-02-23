<?php
    $level = $this->session->userdata('nivel');
    function encrypted_id($id_cotizador)
    {
      $key64 = "Reachmx1";
      $iv64 = "AAECAwQFBgcICQoLDA0ODw==";
      $key = base64_decode($key64, true);
      $iv = base64_decode($iv64, true);

      $search  = "/";
      $replace = "_";
      $encrypted = openssl_encrypt($id_cotizador, 'AES-256-CBC', $key, 0, $iv);

      return str_replace($search, $replace, $encrypted);
    }
?>

<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Cotizaciones</h1>
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
                    <li class="breadcrumb-item active">Cotizaciones</li>
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
            <table id="tbl_Cotizador" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Solicitud</th>
                        <th>Envio</th>
                        <th>Producto</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($DATA_COTIZADOR != FALSE) {
                        foreach ($DATA_COTIZADOR->result() as $row) { 
                            $id_cotizador = encrypted_id($row->id_cotizador);
                            ?>
                            <tr class="shadow border-row" id="tr_<?= $id_cotizador ?>" name="tr_<?= $id_cotizador; ?>" style="vertical-align: middle">
                                <td style="vertical-align: middle">
                                    <a href="<?= base_url()?>Administrador/DetalleCotizacion/<?= $id_cotizador;?>">
                                        <span class="td-text">
                                            <?= str_replace("-", "", $row->fecha_creacion).'-'. $row->folio;?>
                                        </span>
                                    </a>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->tipo_solicitud;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->tipo_envio;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->nombre_producto;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->origen;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->destino;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->fecha_creacion;?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <a type="button" href="#" data-id="<?= $row->id_cotizador ?>" class="eliminar_cotCotizador" style="color: #dc3545;">
                                        <i class="far fa-trash-alt eliminar_cotCotizador" data-id="<?= $row->id_cotizador ?>" data-toggle="tooltip" data-placement="top" title="Eliminar cotización"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>