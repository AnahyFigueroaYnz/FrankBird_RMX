<?php
//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
$level = $this->session->userdata('nivel');
$CotAcept = false;

if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $activo_p = $row['activo_p'];
        $Buque = $row['buque'];
        $NoViaje = $row['no_viaje'];
        $status = $row['id_estadoproyectos'];
    }
}

if ($Data_Cotizacion != FALSE) {
    if ($Data_cot_acep != FALSE) {
        foreach ($Data_cot_acep->result() as $row) {
            $CotAcept = true;
            $IdProyecto = $row->id_proyecto;
            $IdCotizacion = $row->id_cotizacion;
            $Activo = $row->arancel_porc;
            $Suma = $row->suma;
            $ValorMercancia = $row->valor_mercancia;
            $FleteNacio = $row->flete_nacional;
            $FelteInter = $row->flete_internacional;
            $Otros = $row->otros;
            $Impuestos = $row->impuestosImpor;
            $Honorarios = $row->honorariosC;
            $Iva = $row->iva;
            $Despacho = $row->sumaAgencia;
            $Dolar = $row->dolar;
            $Logistica = $row->logisticaInter;
            $SubTotal = $row->suma - $Iva;
            $AranPor = $row->arancel_porc;

            $subTotalFormat = number_format($SubTotal, 2);
            $ivaFormat = number_format($Iva, 2);
            $sumaFormat = number_format($Suma, 2);
            $mercanciaFormat = number_format($ValorMercancia, 2);
            $despachoFormat = number_format($Despacho, 2);
            $flInterFormat = number_format($FelteInter, 2);
            $flNacioFormat = number_format($FleteNacio, 2);
            $otrosFormat = number_format($Otros, 2);
            $impuestosFormat = number_format($Impuestos, 2);
            $honorariosCFormat = number_format($Honorarios, 2);
            $dolarFormat = number_format($Dolar, 2);
            $logisticaFormat = number_format($Logistica, 2);
        }
    } else {
        $CotAcept = false;
        $AranPor = 0;
        $subTotalFormat = 0;
        $ivaFormat = 0;
        $sumaFormat = 0;
        $mercanciaFormat = 0;
        $despachoFormat = 0;
        $flInterFormat = 0;
        $flNacioFormat = 0;
        $otrosFormat = 0;
        $impuestosFormat = 0;
        $honorariosCFormat = 0;
        $dolarFormat = 0;
        $logisticaFormat = 0;
    }
} else {
    $CotAcept = false;
    $AranPor = 0;
    $subTotalFormat = 0;
    $ivaFormat = 0;
    $sumaFormat = 0;
    $mercanciaFormat = 0;
    $despachoFormat = 0;
    $flInterFormat = 0;
    $flNacioFormat = 0;
    $otrosFormat = 0;
    $impuestosFormat = 0;
    $honorariosCFormat = 0;
    $dolarFormat = 0;
    $logisticaFormat = 0;
} ?>
<link rel="stylesheet" href="<?= base_url() ?>css/cards.css ">
<div class="card text-center shadow-lg tarjeta">
    <ul class="list-group">
        <li class="list-group-item list-gastos text-center" style="padding: 0.5rem 0.3rem !important;">
            <img class="img-log" src="<?= base_url() ?>resources/logos/logo_letter_beta.svg">
            <span>
                <strong class="list-card-title">Resumen de Gastos</strong>
            </span>
        </li>
        <li class="list-group-item list-gastos">
            <ul class="list-group" id="liValoresOpen" style="display: block;">
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Valor mercancía (USD)</label></span>
                    <span>
                        <?php if ($mercanciaFormat == 0 || $mercanciaFormat == NULL) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w">$ <?= $mercanciaFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Tipo cambio</label></span>
                    <span>
                        <?php if ($dolarFormat == 0 || $dolarFormat == NULL) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w">$ <?= $dolarFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
            </ul>
            <ul class="list-group" id="liValoresClose" style="display: none;">
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">SubTotal</label></span>
                    <span>
                        <?php if ($subTotalFormat == 0 || $subTotalFormat == NULL) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w">$ <?= $subTotalFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">IVA (16%)</label></span>
                    <span>
                        <?php if ($ivaFormat == 0 || $ivaFormat == NULL) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w">$ <?= $ivaFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Tipo cambio</label></span>
                    <span>
                        <?php if ($dolarFormat == 0 || $dolarFormat == NULL) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w">$ <?= $dolarFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
            </ul>
        </li>
        <?php if ($CotAcept == true && $status >= 5) { ?>
            <div class="accordion" id="accordGastos">
                <div id="collapseGastos" class="collapse show" aria-labelledby="headingGastos" data-parent="#accordGastos">
                    <li class="list-group-item list-gastos">
                        <ul class="list-group">
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">Logística internacional (USD)</label></span>
                                <span>
                                    <?php if ($logisticaFormat == 0 || $logisticaFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $logisticaFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">Despacho aduanal</label></span>
                                <span>
                                    <?php if ($despachoFormat == 0 || $despachoFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $despachoFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">Arancel (<?= $AranPor ?>%) <a class="infoArancel disabled mr-auto" style="cursor: help;" aria-disabled="true" data-toggle="popover" data-trigger="hover" data-placement="top" title="Arancel" data-content="Esto es un Impuesto General de Importación variable dependiendo del producto. Se paga directamente a la Aduana."><i class="far fa-question-circle"></i></a></label></span>
                                <span>
                                    <?php if ($impuestosFormat == 0 || $impuestosFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $impuestosFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">Flete nacional</label></span>
                                <span>
                                    <?php if ($honorariosCFormat == 0 || $honorariosCFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $honorariosCFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">Servicio ReachMx</label></span>
                                <span>
                                    <?php if ($flNacioFormat == 0 || $flNacioFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $flNacioFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">SubTotal</label></span>
                                <span>
                                    <?php if ($subTotalFormat == 0 || $subTotalFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $subTotalFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                            <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                                <span class="list-Content"><label class="m-0 font-w">IVA (16%)</label></span>
                                <span>
                                    <?php if ($ivaFormat == 0 || $ivaFormat == NULL) { ?>
                                        <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                    <?php } else { ?>
                                        <p class="list-Content"><label class="m-0 font-w">$ <?= $ivaFormat; ?></label></p>
                                    <?php } ?>
                                </span>
                            </li>
                        </ul>
                    </li>
                </div>
                <li class="list-group-item list-gastos collapsed" data-toggle="collapse" data-target="#collapseGastos" aria-expanded="true" aria-controls="collapseGastos">
                    <span class="list-more" id="headingGastos"><label class="m-0 font-wt" id="liDesglose" style="cursor: pointer !important;"></label></span>
                </li>
            </div>
        <?php } ?>
        <li class="list-group-item list-gastos" style="background-color: #28a745 !important;color: #ffff;padding: 0.8rem 0rem !important;">
            <ul class="list-group">
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-title"><label class="m-0 font-wt">TOTAL NETO</label></span>
                    <span>
                        <?php if ($mercanciaFormat == 0 || $mercanciaFormat == NULL) { ?>
                            <p class="list-title"><label class="m-0 font-wt">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-title"><label class="m-0 font-wt">$ <?= $sumaFormat; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
            </ul>
        </li>
    </ul>
</div>
<br>