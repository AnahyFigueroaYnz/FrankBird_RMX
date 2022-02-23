<link rel="stylesheet" href="<?= base_url() ?>css/cliente/cotizacion.css">
<?php
$level = $this->session->userdata('nivel');
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;

if ($DETALLE_COTIZADOR != FALSE) {
    foreach ($DETALLE_COTIZADOR->result() as $row) {
        $folio = $row->folio;
        $tipo_cambio = number_format($row->tipo_cambio, 2);
        $tipo_solicitud = $row->tipo_solicitud;
        $tipo_envio = $row->tipo_envio;
        $tipo_contenedor = $row->tipo_contenedor;
        $volumen = number_format($row->volumen, 3);
        $peso = number_format($row->peso, 3);
        $origen = $row->origen;
        $destino = $row->destino;
        $comentarios = $row->comentarios;
        $contenedor = $row->contenedor;
        $cantidad_contenedor = $row->cantidad_contenedor;
        $nombre_producto = $row->nombre_producto;
        $valor_mercancia = number_format($row->valor_mercancia, 2);
        $logistica = number_format($row->logistica, 2);
        $fracc_arancelaria = number_format($row->fracc_arancelaria, 2);
        $despacho_aduanal = number_format($row->despacho_aduanal, 2);
        $previo_origen = number_format($row->previo_origen, 2);
        $inspeccion_fabrica = number_format($row->inspeccion_fabrica, 2);
        $seguros_mercancia = number_format($row->seguros_mercancia, 2);
        $iva = number_format($row->iva, 2);
        $total = number_format($row->total, 2);
        $fecha_creacion = $row->fecha_creacion;
        $email =  $row->email;
    }
}
?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 letra text-uppercase">Detalle Cotización</h1>
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
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Administrador/ListaCotizaciones">Cotizaciones</a>
                    </li>
                    <li class="breadcrumb-item active">Detalle Cotización</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-7" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body" style="padding-bottom: 0rem;">
                        <div class="row">
                            <div class="col-8">
                                <p style=" font-size: 14px;" class="font-weight-bold text-uppercase">Cotización <?= str_replace("-", "", $fecha_creacion).'-'. $folio; ?></p>
                            </div>
                        </div>
                        <form class="margin-details">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Nombre producto
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $nombre_producto; ?>
                                    </p>
                                </div>
                                <?php if ($fracc_arancelaria != 0) { ?>
                                    <div class="col-md-6">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Fracción arancelaria
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $fracc_arancelaria; ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Tipo movimiento
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $tipo_solicitud; ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Tipo envio
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $tipo_envio; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php if ($tipo_envio == "Áereo") { ?>
                                    <div class="col-md-6">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Volumen
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $volumen; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Peso
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $peso; ?>
                                        </p>
                                    </div>
                                <?php } else if ($tipo_envio == "Máritimo") { ?>
                                    <div class="col-md-6">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Contenedor
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $tipo_contenedor; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Carga
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $cantidad_contenedor; ?> de <?= $contenedor; ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Origen
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $origen; ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Destino
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $destino; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php if ($comentarios != "") { ?>
                                    <div class="col-md-12">
                                        <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                            Información adicional
                                        </label>
                                        <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                            <?= $comentarios; ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                                if ($email != '') {
                            ?>
                            <div class="form-row">
                                <div class="col-md-23">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Correo
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $email; ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-5" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                        Tipo de cambio
                                        <span>$<?= $tipo_cambio ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                        Valor mércancia
                                        <span>$<?= $valor_mercancia ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                        Logística internacional
                                        <span>$<?= $logistica ?></span>
                                    </li>
                                    <?php if ($despacho_aduanal != 0 || $despacho_aduanal != NULL) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                            Agencia aduanal
                                            <span>$<?= $despacho_aduanal ?></span>
                                        </li>
                                    <?php }
                                    if ($previo_origen  != 0 || $previo_origen  != NULL) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                            Previo en origen
                                            <span>$<?= $previo_origen  ?></span>
                                        </li>
                                    <?php }
                                    if ($inspeccion_fabrica != 0 || $inspeccion_fabrica != NULL) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                            Inspección a fábrica
                                            <span>$<?= $inspeccion_fabrica ?></span>
                                        </li>
                                    <?php }
                                    if ($seguros_mercancia != 0 || $seguros_mercancia != NULL) { ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                            Seguro de mercancías
                                            <span>$<?= $seguros_mercancia ?></span>
                                        </li>
                                    <?php } ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                        IVA
                                        <span>$<?= $iva ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-card">
                                        <label style="margin-bottom: 0">Total</label>
                                        <span><label style="margin-bottom: 0">$<?= $total ?></label></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>