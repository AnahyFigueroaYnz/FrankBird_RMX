<div class="card text-center shadow-lg tarjeta">
    <ul class="list-group list-group-flush">
        <li class="list-group-item card-cot text-left" id="listCot" style="padding: 0.8rem 0.8rem 0rem 0.8rem !important;">
            <p class="list-cot-title m-0"><i class="fas fa-coins title-color"></i><strong> Cotizaciones</strong></p>
        </li>
        <li class="list-group-item card-cot list-none" id="listDetCot" style="padding: 0.8rem !important;display: none;">
            <div class="d-flex">
                <div class="flex-shrink-1">
                    <p class="list-cot-title m-0">
                        <a href="" type="button" id="btnVolver"><i class="fas fa-undo title-color"></i></a>
                    </p>
                </div>
                <div class="w-100">
                    <p class="list-cot-title m-0"><strong>Detalle cotización</strong></p>
                </div>
            </div>
        </li>
        <li class="list-group-item card-cot" style="padding: 1rem 0.5rem !important;">
            <?php if ($Data_Cotizacion != FALSE) {
                $count = 0;
                foreach ($Data_Cotizacion->result() as $row) {
                    $count++;
                    $IdCotizacion = $row->id_cotizacion;
                    $Folio_p = $row->folio_p;
                    $Registro_p = $row->registro_p;
                    $Folio = $row->folio;
                    $Nombre = $row->nombre_cot;
                    $activo = $row->activ_cot;
                    $AranPor = $row->arancel_porc;
                    $statusId = $row->id_status;
                    $TiempoEntrega = $row->tiempo_entrega;
                    $Puerto = $row->puerto;
                    $ClaveSalida = $row->claveSalida;
                    $Transporte = $row->transporte;
                    $ClaveLlegada = $row->claveLlegada;

                    $dolarFormat = number_format($row->dolar, 2);
                    $subTotalFormat = number_format($row->suma - $row->iva, 2);
                    $ivaFormat = number_format($row->iva, 2);
                    $sumaFormat = number_format($row->suma, 2);
                    $mercanciaFormat = number_format($row->valor_mercancia, 2);
                    $agenciasFormat = number_format($row->sumaAgencia, 2);
                    $despachoFormat = number_format($row->sumaAgencia, 2);
                    $flInterFormat = number_format($row->flete_internacional, 2);
                    $flNacioFormat = number_format($row->flete_nacional, 2);
                    $otrosFormat = number_format($row->otros, 2);
                    $dtaFormat = number_format($row->dta, 2);
                    $arancelFormat = number_format($row->arancel, 2);
                    $honorariosCFormat = number_format($row->honorariosC, 2);
                    $honorariosFormat = number_format($row->honorarios_c, 2);
                    $revalidacionFormat = number_format($row->revalicacion_c, 2);
                    $complementariosFormat = number_format($row->complementarios_c, 2);
                    $previoFormat = number_format($row->previo_c, 2);
                    $maniobrasFormat = number_format($row->maniobras_c, 2);
                    $desconsolidacionFormat = number_format($row->desconsolidacion_c, 2);

                    if ($activo > 1 && $activo < 5) { ?>
                        <ul class="list-group liCotizacion" id="liCotizacion" data-id="<?= $IdCotizacion ?>">
                            <li class="list-group-item d-flex justify-content-between align-items-center list-cot" style="margin-bottom: 1rem;">
                                <span class="list-Content text-left">
                                    <label class="m-0">
                                        <strong>Cotizacion <?= $Folio_p ?>-<?= $Registro_p ?>-<?= $Folio ?></strong>
                                        <p class="m-0 font-w" style="font-size: 12px;"><?= $Nombre ?></p>
                                    </label>
                                </span>
                                <?php if ($activo == 2) { ?>
                                    <span class="badge badge-secondary badge-pill">Pendiente</span>
                                <?php } else if ($activo == 4) { ?>
                                    <span class="badge badge-warning badge-pill">Recotizada</span>
                                <?php } ?>
                            </li>
                        </ul>
                        <ul class="list-group list-none liDetCotizacion" id="liDetCotizacion<?= $IdCotizacion ?>" style="display: none;">
                            <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det" style="padding: 0rem 1.5rem 0.5rem 1.5rem !important;">
                                <span class="list-Content m-0 text-left">
                                    <label class="m-0">
                                        <strong>Cotizacion <?= $Folio_p ?>-<?= $Registro_p ?>-<?= $Folio ?></strong>
                                        <p class="m-0 font-w" style="font-size: 13px;"><?= $Nombre ?></p>
                                    </label>
                                </span>
                                <?php if ($activo == 2) { ?>
                                    <span class="badge badge-secondary badge-pill">Pendiente</span>
                                <?php } else if ($activo == 3) { ?>
                                    <span class="badge badge-success badge-pill">Aceptada</span>
                                <?php } else if ($activo == 4) { ?>
                                    <span class="badge badge-warning badge-pill">Recotizada</span>
                                <?php } ?>
                            </li>
                            <li class="list-group-item list-cot-det" style="padding: 0.5rem 2.3rem 0.8rem 1.5rem !important;">
                                <div class="accordion" id="accordDetCot<?= $IdCotizacion ?>">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det" style="padding: 0rem !important;">
                                            <span class="list-Content"><label class="m-0 font-wt">Productos</label></span>
                                            <span class="list-Content"><label class="m-0 font-wt">Importe</label></span>
                                        </li>
                                        <?php if ($Data_ProdCotiza != FALSE) {
                                            $countProdCot = 0;
                                            foreach ($Data_ProdCotiza->result() as $row) {
                                                $IdProdCot = $row->id_producto_cot;
                                                $IdCotProd = $row->id_cotizacion;
                                                $ProductoCot = $row->producto;
                                                $MedidaCot = $row->clave;
                                                $EspecificacionesCot = $row->especificaciones;
                                                $ProveedorCot = $row->proveedor;
                                                $EstatusCot = $row->id_estatus;
                                                $CantidadFormatCot = number_format($row->cantidad, 2);
                                                $PrecioFormatCot = number_format($row->precio, 2);
                                                $TotalFormatCot = number_format($row->total, 2);

                                                if ($IdCotProd == $IdCotizacion) {
                                                    $countProdCot++;
                                                    $imgCot = false;

                                                    if ($countProdCot > 1) {
                                                        $titlePordCot = 'class="list-group-item d-flex justify-content-between align-items-center list-cotDet-prodCont"';
                                                    } else {
                                                        $titlePordCot = 'class="list-group-item d-flex justify-content-between align-items-center list-cotDet-prodTitle"';
                                                    }

                                                    if ($Data_MedProdCot != FALSE) {
                                                        $countProd = 0;
                                                        $countMedCot = 0;
                                                        $Data_MedProdIdCot = array();

                                                        foreach ($Data_MedProdCot as $row) {
                                                            $IdCotMedCot = $row->id_cotizacion;

                                                            if ($IdCotMedCot == $IdCotProd) {
                                                                $countMedCot++;
                                                                array_push($Data_MedProdIdCot, $row);
                                                            }
                                                        }
                                                        // var_dump($Data_MedProdIdCot);
                                                        foreach ($Data_MedProdIdCot as $row) {
                                                            $countSlideCot = 0;
                                                            $countImgCot = 0;
                                                            $IdMedIdCot = $row->id_media_prod_cot;
                                                            $IdProdCotMedIdCot = $row->id_producto_cot;

                                                            if ($IdMedIdCot != NULL) {
                                                                $imgCot = true;
                                                            }

                                                            if ($IdProdCotMedIdCot == $IdProdCot) {
                                                                $countProd++;
                                                            }
                                                        } 
                                                    } ?>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center list-cotDet-prodTitle" style="padding: 0.5rem 0rem 0rem 0rem !important;" data-toggle="collapse" data-target="#collCot<?= $IdProdCot ?>" aria-expanded="false" aria-controls="collCot<?= $IdProdCot ?>">
                                                            <span class="list-content-cot" id="headingCot<?= $IdProdCot ?>">
                                                                <a href="" role="button" data-toggle="collapse" data-target="#collCot<?= $IdProdCot ?>" aria-expanded="false" aria-controls="collCot<?= $IdProdCot ?>">
                                                                    <i class="fas fa-chevron-down" style="font-size: 13px;"></i> <?= $ProductoCot ?>
                                                                </a>
                                                            </span>
                                                            <span class="list-content-cot"><label class="m-0 font-w">USD $<?= $TotalFormatCot ?></label></span>
                                                        </li>
                                                        <div id="collCot<?= $IdProdCot ?>" class="collapse" aria-labelledby="headingCot<?= $IdProdCot ?>" data-parent="#accordDetCot<?= $IdCotizacion ?>">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item list-Pedido" style="margin: 0.5rem 0.8rem !important;">
                                                                    <?php if ($imgCot == false) { ?>
                                                                        <p class="list-content-cot text-left"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormatCot ?></label></p>
                                                                        <p class="list-content-cot text-left"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormatCot ?> <?= $MedidaCot; ?></label></p>
                                                                        <p class="list-content-cot text-left"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormatCot ?></label></p>
                                                                        <p class="list-content-cot text-left"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $EspecificacionesCot ?></label></p>
                                                                        <p class="list-content-cot text-left"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $ProveedorCot ?></label></p>
                                                                    <?php } else if ($imgCot == true) { ?>
                                                                        <div class="row" style="margin: 0rem !important;">
                                                                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 text-left" style="padding: 0rem;">
                                                                                <p class="list-content-cot"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormatCot ?></label></p>
                                                                                <p class="list-content-cot"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormatCot ?> <?= $MedidaCot; ?></label></p>
                                                                                <p class="list-content-cot"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormatCot ?></label></p>
                                                                                <p class="list-content-cot"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $EspecificacionesCot ?></label></p>
                                                                                <?php if ($Data_prov_cliente != FALSE) {
                                                                                    $provClCot = $Data_prov_cliente->proveedor;
                                                                                    if ($ProveedorCot == $provClCot) { ?>
                                                                                        <p class="text-CotDetCont m-0"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $ProveedorCot ?></label></p>
                                                                                <?php }
                                                                                } ?>
                                                                            </div>
                                                                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                                                                <?php if ($countProd == 1) {
                                                                                    foreach ($Data_MedProdIdCot as $row) {
                                                                                        $IdMedCot = $row->id_media_prod_cot;
                                                                                        $IdProdCotMedCot = $row->id_producto_cot;
                                                                                        $PathCot = $row->path_prod_cot;
                                                                                        if ($IdProdCot == $IdProdCotMedCot) { ?>
                                                                                            <p class="list-content-cot">
                                                                                                <label class="m-0">
                                                                                                    <a href="" class="imgDetPodCar" data-id="<?= $IdProdCot ?>">
                                                                                                        <img id="cotImg<?= $IdMedCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-cot">
                                                                                                    </a>
                                                                                                </label>
                                                                                            </p>
                                                                                    <?php }
                                                                                    }
                                                                                } else { ?>
                                                                                    <div id="carCotMediaDet<?= $IdProdCot ?>" class="carousel slide" data-ride="carousel">
                                                                                        <ol class="carousel-indicators" style="bottom: 0;margin-bottom: 0;">
                                                                                            <?php foreach ($Data_MedProdIdCot as $row) {
                                                                                                $countSlideCot++;
                                                                                                $IdProdCotMedCot = $row->id_producto_cot;
                                                                                                if ($IdProdCotMedCot == $IdProdCot) {
                                                                                                    if ($countProd == 2) {
                                                                                                        if ($row == reset($Data_MedProdIdCot)) { ?>
                                                                                                            <li data-target="#carCotMediaDet<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>" class="active"></li>
                                                                                                        <?php } else { ?>
                                                                                                            <li data-target="#carCotMediaDet<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>"></li>
                                                                                                        <?php }
                                                                                                    } else {
                                                                                                        if ($row == end($Data_MedProdIdCot) || $row == reset($Data_MedProdIdCot)) { ?>
                                                                                                            <li data-target="#carCotMediaDet<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>" class="active"></li>
                                                                                                        <?php } else { ?>
                                                                                                            <li data-target="#carCotMediaDet<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>"></li>
                                                                                                    <?php }
                                                                                                    }
                                                                                                }
                                                                                            } ?>
                                                                                        </ol>
                                                                                        <div class="carousel-inner det-caroucel">
                                                                                            <?php foreach ($Data_MedProdIdCot as $row) {
                                                                                                $countImgCot++;
                                                                                                $IdMedCot = $row->id_media_prod_cot;
                                                                                                $IdProdCotMedCot = $row->id_producto_cot;
                                                                                                $PathCot = $row->path_prod_cot;
                                                                                                if ($IdProdCotMedCot == $IdProdCot) {
                                                                                                    if ($countProd == 2) {
                                                                                                        if ($row == reset($Data_MedProdIdCot)) { ?>
                                                                                                            <div class="carousel-item active">
                                                                                                                <a href="" class="imgDetPodCar" data-id="<?= $IdProdCot ?>">
                                                                                                                    <img id="cotImg<?= $IdMedCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php } else { ?>
                                                                                                            <div class="carousel-item">
                                                                                                                <a href="" class="imgDetPodCar" data-id="<?= $IdProdCot ?>">
                                                                                                                    <img id="cotImg<?= $IdMedCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php }
                                                                                                    } else {
                                                                                                        if ($row == end($Data_MedProdIdCot) || $row == reset($Data_MedProdIdCot)) { ?>
                                                                                                            <div class="carousel-item active">
                                                                                                                <a href="" class="imgDetPodCar" data-id="<?= $IdProdCot ?>">
                                                                                                                    <img id="cotImg<?= $IdMedCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        <?php } else { ?>
                                                                                                            <div class="carousel-item">
                                                                                                                <a href="" class="imgDetPodCar" data-id="<?= $IdProdCot ?>">
                                                                                                                    <img id="cotImg<?= $IdMedCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                    <?php }
                                                                                                    }
                                                                                                }
                                                                                            } ?>
                                                                                        </div>
                                                                                        <a class="carousel-control-prev" href="#carCotMediaDet<?= $IdProdCot ?>" role="button" data-slide="prev" style="width: 5%; opacity: 100%">
                                                                                            <span aria-hidden="true" style="font-size: 1.5rem; color: #565454">
                                                                                                <i class="fas fa-chevron-left"></i>
                                                                                            </span>
                                                                                            <span class="sr-only">Previous</span>
                                                                                        </a>
                                                                                        <a class="carousel-control-next" href="#carCotMediaDet<?= $IdProdCot ?>" role="button" data-slide="next" style="width: 5%; opacity: 100%">
                                                                                            <span aria-hidden="true" style="font-size: 1.5rem; color: #565454">
                                                                                                <i class="fas fa-chevron-right"></i>
                                                                                            </span>
                                                                                            <span class="sr-only">Next</span>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                            <?php }
                                            }
                                        } ?>
                                    </ul>
                                </div>
                            </li>
                            <div class="accordion" id="accordTotal<?= $IdCotizacion ?>">
                                <div id="collTotal<?= $IdCotizacion ?>" class="collapse show" aria-labelledby="headTotal<?= $IdCotizacion ?>" data-parent="#accordTotal<?= $IdCotizacion ?>" style="margin-bottom: 0.7rem;">
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-Content"><label class="m-0 font-wt">Concepto</label></span>
                                        <span>
                                            <p class="list-Content"><label class="m-0 font-wt">Importe</label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Tiempo entrega</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w"><?= $TiempoEntrega ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Tipo de cambio</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">USD $<?= $dolarFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Valor mércancia</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">USD $<?= $mercanciaFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Flete internacional</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">USD $<?= $flInterFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Otros incrementables</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">USD $<?= $otrosFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Despacho aduanal</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $despachoFormat  ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">DTA</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $dtaFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot">
                                            <label class="m-0 font-w">Arancel (<?= $AranPor ?>%)
                                                <a tabindex="0" class="infoArancel" style="cursor: help;" data-toggle="popover" data-trigger="hover" title="Arancel" data-content="Esto es un Impuesto General de Importación variable dependiendo del producto. Se paga directamente a la Aduana."><i class="far fa-question-circle"></i></a>
                                            </label>
                                        </span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $arancelFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Flete nacional</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $flNacioFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">Servicio de importación</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $honorariosCFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">SubTotal</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $subTotalFormat ?></label></p>
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center list-cot-det">
                                        <span class="list-content-cot"><label class="m-0 font-w">IVA (16%)</label></span>
                                        <span>
                                            <p class="list-content-cot"><label class="m-0 font-w">$<?= $ivaFormat ?></label></p>
                                        </span>
                                    </li>
                                </div>
                                <li class="list-group-item d-flex justify-content-between align-items-center list-cot-total collapsed" data-toggle="collapse" data-target="#collTotal<?= $IdCotizacion ?>" aria-expanded="true" aria-controls="collTotal<?= $IdCotizacion ?>" style="cursor: pointer !important;">
                                    <span class="list-Content" id="headTotal<?= $IdCotizacion ?>"><label class="m-0 font-wt">Total</label></span>
                                    <span class="list-Content">
                                        <a href="" role="button" data-toggle="collapse" data-target="#collTotal<?= $IdCotizacion ?>" aria-expanded="true" aria-controls="collTotal<?= $IdCotizacion ?>">
                                            <label class="m-0 font-wt">$<?= $sumaFormat ?></label> <i class="fas fa-chevron-down" style="font-size: 13px;"></i>
                                        </a>
                                    </span>
                                </li>
                            </div>
                            <li class="list-group-item list-cot-det">
                                <span class="list-Content text-left">
                                    <p class="m-0 font-w" style="font-size: 12px;">
                                        Nota: al aceptar estás aceptando nuestos <a href="" type="button" id="btnTer_Con">Términos y condiciones</a>
                                    </p>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-end align-items-center list-cot-det" style="padding: 1rem 1.5rem 0.5rem 1.5rem !important;">
                                <span class="list-Content m-0 text-left">
                                    <a href="" class="btn btn-outline-warning btnRecotCot btnRecotizar" data-id="<?= $IdCotizacion ?>">Recotizar <i class="fas fa-sync-alt"></i></a>
                                </span>
                                <span>
                                    <a href="" class="btn btn-outline-success btnAceptCot btnAceptar" data-id="<?= $IdCotizacion ?>">Aceptar <i class="far fa-check-circle"></i></a>
                                </span>
                            </li>
                        </ul>
            <?php }
                }
            } ?>
        </li>
    </ul>
</div>