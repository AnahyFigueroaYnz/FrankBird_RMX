<?php $level = $this->session->userdata('nivel');
if ($Data_Proyecto != FALSE) {
  foreach ($Data_Proyecto as $row) {
    $activo_p = $row['activo_p'];
    $statusId = $row['id_estadoproyectos'];
  }

}?>
<div class="card-header borders-card">
  <h4 style="margin-bottom: 0;text-align: justify;">Cotizaciones </h4>
</div>

<div class="card-body" style="padding: 0rem;">
  <div class="accordion" id="accoCotizaciones">
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
        $Agencia = $row->agencia;

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
        // echo $activo;
        if ($count > 1) {
          $class = 'class="list-group-item d-flex justify-content-between align-items-center list-Cots"';
        } else {
          $class = 'class="list-group-item d-flex justify-content-between align-items-center list-Cot"';
        }

    ?>
        <ul class="list-group list-group-flush" data-id="<?= $IdCotizacion ?>">
          <li <?= $class ?> data-toggle="collapse" data-target="#colCotizacion<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="colCotizacion<?= $IdCotizacion ?>">
            <span class="text-CotDetTitle text-left" id="headCotizacion<?= $IdCotizacion ?>">
              <label class="m-0">
                <a href="" data-toggle="collapse" data-target="#colCotizacion<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="colCotizacion<?= $IdCotizacion ?>">
                  <strong>Cotizacion <?= $Folio_p ?>-<?= $Registro_p ?>-<?= $Folio ?></strong>
                </a>
                <p class="m-0 font-w" style="font-size: 13px;"><?= $Nombre ?></p>
              </label>
            </span>
            <span>
              <?php if ($level == 1 || $level == 2) {
                if ($activo == 0) { ?>
                  <span class="badge badge-danger badge-pill">Eliminada</span>
                <?php } else if ($activo == 1) { ?>
                  <span class="badge badge-secondary badge-pill">Nueva</span>
                  <span class="badge badge-outline-danger badge-pill-btn btnEliminar" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Eliminar Cotización">
                    <i class="far fa-trash-alt"></i>
                  </span>
                  <span class="badge badge-outline-warning badge-pill-btn btnRecotizar_admin" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Recotizar">
                    <i class="fas fa-sync-alt"></i>
                  </span>
                  <span class="badge badge-outline-success badge-pill-btn btnAceptar_admin" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Aceptar Cotización">
                    <i class="far fa-check-circle"></i>
                  </span>
                <?php } else if ($activo == 2) { ?>
                  <span class="badge badge-primary badge-pill">Enviada</span>
                <?php } else if ($activo == 3) { ?>
                  <span class="badge badge-success badge-pill">Aceptada</span>
                <?php } else if ($activo == 4) { ?>
                  <span class="badge badge-info badge-pill">Recotizacion por cliente</span>
                  <?php if ($activo_p == 1) { ?>
                    <span class="badge badge-outline-warning badge-pill-btn btnRecotizar_admin" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Recotizar">
                      <i class="fas fa-sync-alt"></i>
                    </span>
                    <span class="badge badge-outline-danger badge-pill-btn btnEliminar" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Eliminar Cotización">
                      <i class="far fa-trash-alt"></i>
                    </span>
                  <?php } ?>
                <?php } else if ($activo == 5) { ?>
                  <span class="badge badge-light badge-pill">Historial</span>
                  <?php if ($activo_p == 1) { ?>
                    <span class="badge badge-outline-danger badge-pill-btn btnEliminar" data-id="<?= $IdCotizacion ?>" data-toggle="tooltip" data-placement="bottom" title="Eliminar Cotización">
                      <i class="far fa-trash-alt"></i>
                    </span>
                  <?php } ?>
                <?php }
              } else if ($level == 3) { ?>
                <?php if ($activo == 1) { ?>
                  <span class="badge badge-secondary badge-pill">Pendiente apobación administrador</span>
                <?php } else if ($activo == 2) { ?>
                  <span class="badge badge-primary badge-pill">Pendiente aprobación cliente</span>
                <?php } else if ($activo == 3) { ?>
                  <span class="badge badge-success badge-pill">Aceptada</span>
                <?php } else if ($activo == 4) { ?>
                  <span class="badge badge-info badge-pill">Recotizada por cliente</span>
                <?php } else if ($activo == 5) { ?>
                  <span class="badge badge-light badge-pill">Historial</span>
                <?php } ?>
              <?php } ?>
            </span>
          </li>
          <?php if (($activo == 0 || $activo == 1) && $level == 3) { ?>
            <!-- no mostrar informacion si aun no pasa por el admin -->
          <?php } else { ?>
            <div id="colCotizacion<?= $IdCotizacion ?>" class="collapse" aria-labelledby="headCotizacion<?= $IdCotizacion ?>" data-parent="#accoCotizaciones" style="padding: 0rem 1rem 1rem 1rem !important">
              <div class="accordion" id="accoProductos<?= $IdCotizacion ?>">
                <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet" data-toggle="collapse" data-target="#collProductos<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="collProductos<?= $IdCotizacion ?>">
                  <span class="text-CotDetTitle" id="headProductos<?= $IdCotizacion ?>"><label class="m-0 font-wt">Productos</label></span>
                  <span>
                    <p class="text-CotDetTitle">
                      <label class="m-0 font-wt">
                        <a href="" role="button" data-toggle="collapse" data-target="#collProductos<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="collProductos<?= $IdCotizacion ?>">
                          <i class="fas fa-chevron-down" style="font-size: 13px;"></i> Detalles
                        </a>
                      </label>
                    </p>
                  </span>
                </li>
                <div id="collProductos<?= $IdCotizacion ?>" class="collapse" aria-labelledby="headProductos<?= $IdCotizacion ?>" data-parent="#accoProductos<?= $IdCotizacion ?>">
                  <div class="accordion" id="accoProdDet<?= $IdCotizacion ?>">
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
                            $titlePordCot = 'class="list-group-item d-flex justify-content-between align-items-center list-CotDet"';
                          }

                          if ($Data_MedProdCot != FALSE) {
                            $countProd = 0;
                            $countMedCot = 0;
                            $Data_MedProdIdCot = array();

                            foreach ($Data_MedProdCot as $row) {
                              $IdProdMedia = $row->id_producto_cot;

                              if ($IdProdMedia == $IdProdCot) {
                                $countMedCot++;
                                array_push($Data_MedProdIdCot, $row);
                              }
                            }

                            foreach ($Data_MedProdIdCot as $row) {
                              $countSlideCot = 0;
                              $countImgCot = 0;
                              $IdMedIdCot = $row->id_media_prod_cot;
                              $IdProdCotMedCot = $row->id_producto_cot;

                              if ($IdMedIdCot != NULL) {
                                $imgCot = true;
                              }

                              if ($IdProdCotMedCot == $IdProdCot) {
                                $countProd++;
                              }
                            }
                          }
                          var_dump($imgCot);
                    ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet" data-toggle="collapse" data-target="#collProdDet<?= $IdProdCot ?>" aria-expanded="false" aria-controls="collProdDet<?= $IdProdCot ?>">
                              <span class="text-CotDetCont" id="headProdDet<?= $IdProdCot ?>"><label class="m-0 font-w"><?= $ProductoCot ?></label></span>
                            </li>
                            <div id="collProdDet<?= $IdProdCot ?>" class="collapse" aria-labelledby="headProdDet<?= $IdProdCot ?>" data-parent="#accoProdDet<?= $IdCotizacion ?>">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item list-Pedido" style="margin: 0.5rem 0.8rem !important;">
                                  <?php if ($imgCot == false) { ?>
                                    <p class="text-CotDetCont text-left m-0"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormatCot ?></label></p>
                                    <p class="text-CotDetCont text-left m-0"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormatCot ?> <?= $MedidaCot; ?></label></p>
                                    <p class="text-CotDetCont text-left m-0"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormatCot ?></label></p>
                                    <p class="text-CotDetCont text-left m-0"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $EspecificacionesCot ?></label></p>
                                    <p class="text-CotDetCont text-left m-0"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $ProveedorCot ?></label></p>
                                  <?php } else if ($imgCot == true) { ?>
                                    <div class="row" style="margin: 0rem !important;">
                                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 text-left" style="padding: 0rem;">
                                        <p class="text-CotDetCont m-0"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormatCot ?></label></p>
                                        <p class="text-CotDetCont m-0"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormatCot ?> <?= $MedidaCot; ?></label></p>
                                        <p class="text-CotDetCont m-0"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormatCot ?></label></p>
                                        <p class="text-CotDetCont m-0"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $EspecificacionesCot ?></label></p>
                                        <p class="text-CotDetCont m-0"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $ProveedorCot ?></label></p>
                                      </div>
                                      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                        <?php if ($countProd == 1) {
                                          foreach ($Data_MedProdIdCot as $row) {
                                            $IdMedIdCot = $row->id_media_prod_cot;
                                            $IdProdCotMedCot = $row->id_producto_cot;
                                            $PathCot = $row->path_prod_cot;
                                            if ($IdProdCotMedCot == $IdProdCot) { ?>
                                              <p class="text-CotDetCont m-0">
                                                <label class="m-0">
                                                  <a href="" class="imgMedCot" data-id="<?= $IdProdCot ?>">
                                                    <img id="cotImg<?= $IdMedIdCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-cot">
                                                  </a>
                                                </label>
                                              </p>
                                          <?php }
                                          }
                                        } else { ?>
                                          <div id="caroCotMedia<?= $IdProdCot ?>" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators" style="bottom: 0;margin-bottom: 0;">
                                              <?php foreach ($Data_MedProdIdCot as $row) {
                                                $countSlideCot++;
                                                $IdProdCotMedCot = $row->id_producto_cot;
                                                if ($IdProdCotMedCot == $IdProdCot) {
                                                  if ($row == reset($Data_MedProdIdCot)) { ?>
                                                    <li data-target="#caroCotMedia<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>" class="active"></li>
                                                  <?php } else { ?>
                                                    <li data-target="#caroCotMedia<?= $IdProdCot ?>" data-slide-to="<?= $countSlideCot ?>"></li>
                                                <?php }
                                                }
                                              } ?>
                                            </ol>
                                            <div class="carousel-inner det-caroucel">
                                              <?php foreach ($Data_MedProdIdCot as $row) {
                                                $countImgCot++;
                                                $IdMedIdCot = $row->id_media_prod_cot;
                                                $IdProdCotMedCot = $row->id_producto_cot;
                                                $PathCot = $row->path_prod_cot;
                                                if ($IdProdCotMedCot == $IdProdCot) {
                                                  if ($row == reset($Data_MedProdIdCot)) { ?>
                                                    <div class="carousel-item active">
                                                      <a href="" class="imgMedCot" data-id="<?= $IdProdCot ?>">
                                                        <img id="cotImg<?= $IdMedIdCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                      </a>
                                                    </div>
                                                  <?php } else { ?>
                                                    <div class="carousel-item">
                                                      <a href="" class="imgMedCot" data-id="<?= $IdProdCot ?>">
                                                        <img id="cotImg<?= $IdMedIdCot ?>" src="<?= base_url() ?><?= $PathCot ?>" class="img-fluid img-caroucel-cot">
                                                      </a>
                                                    </div>
                                              <?php }
                                                }
                                              } ?>
                                            </div>
                                            <a class="carousel-control-prev" href="#caroCotMedia<?= $IdProdCot ?>" role="button" data-slide="prev" style="width: 5%; opacity: 100%">
                                              <span aria-hidden="true" style="font-size: 1.5rem; color: #565454">
                                                <i class="fas fa-chevron-left"></i>
                                              </span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#caroCotMedia<?= $IdProdCot ?>" role="button" data-slide="next" style="width: 5%; opacity: 100%">
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
                  </div>
                </div>
              </div>
              <div class="accordion" id="accoAgenica<?= $IdCotizacion ?>">
                <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet" data-toggle="collapse" data-target="#collAgenica<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="collAgenica<?= $IdCotizacion ?>">
                  <span class="text-CotDetTitle" id="headAgencia<?= $IdCotizacion ?>"><label class="m-0 font-wt">Agencia</label></span>
                  <span>
                    <p class="text-CotDetTitle">
                      <label class="m-0 font-wt">
                        <a href="" role="button" data-toggle="collapse" data-target="#collAgenica<?= $IdCotizacion ?>" aria-expanded="false" aria-controls="collAgenica<?= $IdCotizacion ?>">
                          <i class="fas fa-chevron-down" style="font-size: 13px;"></i> Detalles
                        </a>
                      </label>
                    </p>
                  </span>
                </li>
                <div id="collAgenica<?= $IdCotizacion ?>" class="collapse" aria-labelledby="headAgencia<?= $IdCotizacion ?>" data-parent="#accoAgenica<?= $IdCotizacion ?>">
                  <li class="list-group-item text-center list-CotDet">
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-wt"><?= $Agencia ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Honorarios</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $honorariosFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Revalidación</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $revalidacionFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Complementarios</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $complementariosFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Previo</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $previoFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Maniobria puerto</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $maniobrasFormat  ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Desconsolidación</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $desconsolidacionFormat ?></label></p>
                    </span>
                  </li>
                </div>
              </div>
              <div class="accordion" id="accoCostos<?= $IdCotizacion ?>">
                <div id="collCostos<?= $IdCotizacion ?>" class="collapse show" aria-labelledby="headCostos<?= $IdCotizacion ?>" data-parent="#accoCostos<?= $IdCotizacion ?>">
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetTitle"><label class="m-0 font-wt">Concepto</label></span>
                    <span>
                      <p class="text-CotDetTitle"><label class="m-0 font-wt">Importe</label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Tiempo de entrega</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w"><?= $TiempoEntrega ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Tipo de cambio</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">USD $<?= $dolarFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Valor mercancia</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">USD $<?= $mercanciaFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Flete internacional</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">USD $<?= $flInterFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Otros incrementables</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">USD $<?= $otrosFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Despacho aduanal</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $despachoFormat  ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">DTA</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $dtaFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont">
                      <label class="m-0 font-w">Arancel (<?= $AranPor ?>%)
                        <a tabindex="0" class="infoArancel" style="cursor: help;" data-toggle="popover" data-trigger="hover" title="Arancel" data-content="Esto es un Impuesto General de Importación variable dependiendo del producto. Se paga directamente a la Aduana."><i class="far fa-question-circle"></i></a>
                      </label>
                    </span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $arancelFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Flete nacional</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $flNacioFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">Servicio Reachmx</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $honorariosCFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">SubTotal</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $subTotalFormat ?></label></p>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center list-CotDet">
                    <span class="text-CotDetCont"><label class="m-0 font-w">IVA (16%)</label></span>
                    <span>
                      <p class="text-CotDetCont"><label class="m-0 font-w">$<?= $ivaFormat ?></label></p>
                    </span>
                  </li>
                </div>
                <li class="list-group-item d-flex justify-content-between align-items-center list-CotDetTotal collapsed" data-toggle="collapse" data-target="#collCostos<?= $IdCotizacion ?>" aria-expanded="true" aria-controls="collCostos<?= $IdCotizacion ?>">
                  <span class="text-CotDetTitle" id="headCostos<?= $IdCotizacion ?>"><label class="m-0 font-wt">Total</label></span>
                  <span class="text-CotDetTitle"><label class="m-0 font-wt">$<?= $sumaFormat ?></label></span>
                </li>
              </div>
            </div>
          <?php } ?>
        </ul>
    <?php }
    } ?>
  </div>
</div>