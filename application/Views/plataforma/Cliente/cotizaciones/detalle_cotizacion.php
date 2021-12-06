<link rel="stylesheet" href="<?= base_url() ?>css/cliente/cotizacion.css">
<?php
$id_cotizacion = $this->uri->segment(3);
if ($data_cotizacion != FALSE) {
	foreach ($data_cotizacion->result() as $row) {
		$IdCotizacion = $row->id_cotizacion;
		$Nombre = $row->nombre_cot;
		$ValorMercancia = $row->valor_mercancia;
		$FelteInter = $row->flete_internacional;
		$FleteNacio = $row->flete_nacional;
		$Arancel = $row->arancel;
		$AranPor = $row->arancel_porc;
		$Honorarios = $row->honorariosC;
		$DTA = $row->dta;
		$Otros = $row->otros;
		$Iva = $row->iva;
		$Suma = $row->suma;
		$Dolar = $row->dolar;
		$HonorariosC = $row->honorarios_c;
		$Revalidacion = $row->revalicacion_c;
		$ComplementarioC = $row->complementarios_c;
		$Previo = $row->previo_c;
		$Maniobras = $row->maniobras_c;
		$DesconoslidacionC = $row->desconsolidacion_c;
		$Agencia = $row->agencia;
		$PuertoSlida = $row->puerto;
		$ClavePuertoSlida = $row->claveSalida;
		$ClavePuertoLlegada = $row->transporte;
		$PuertoLlegada = $row->claveLlegada;
		$SumaAgencias = $row->sumaAgencia;
		$activo = $row->activ_cot;
		$SubTotal = $row->suma - $Iva;

		$mercanciaFormat = number_format($ValorMercancia, 2);
		$flInterFormat = number_format($FelteInter, 2);
		$flNacioFormat = number_format($FleteNacio, 2);
		$arancelFormat = number_format($Arancel, 2);
		$honorariosCFormat = number_format($Honorarios, 2);
		$dtaFormat = number_format($DTA, 2);
		$otrosFormat = number_format($Otros, 2);
		$ivaFormat = number_format($Iva, 2);
		$sumaFormat = number_format($Suma, 2);
		$dolarFormat = number_format($Dolar, 2);
		$honorariosFormat = number_format($HonorariosC, 2);
		$revalidacionFormat = number_format($Revalidacion, 2);
		$complementariosFormat = number_format($ComplementarioC, 2);
		$previoFormat = number_format($Previo, 2);
		$maniobrasFormat = number_format($Maniobras, 2);
		$desconsolidacionFormat = number_format($DesconoslidacionC, 2);
		$despachoFormat = number_format($SumaAgencias, 2);
		$subTotalFormat = number_format($SubTotal, 2);
?>
		<section class="content-header shadow-title">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h4 class="m-0 title-color">Cotización - <?= $row->nombre_cot ?></h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item">
								<a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= base_url() ?>Clientes/MisCotizaciones">Lista cotizaciones</a>
							</li>
							<li class="breadcrumb-item active">Cotización</li>
						</ol>
					</div>
				</div>
			</div>
		</section>
		<br>
		<div>
			<input type="hidden" id="baseURL" value="<?= base_url() ?>">
			<input type="hidden" id="idCotizacion" value="<?= $id_cotizacion ?>">
			<div class="col-12" style="margin-bottom: 1rem">
				<div class="card shadow-lg tarjeta">
					<div class="card-body">
						<div class="row mb-2">
							<div class="col-sm-12 text-right">
								<?php if ($activo == 5) { ?>
									<span class="badge badge-secondary">Recotizar admin</span>
								<?php } else if ($activo == 4) { ?>
									<span class="badge badge-danger">Recotizar</span>
								<?php } else if ($activo == 3) { ?>
									<span class="badge badge-success">Aceptada</span>
								<?php } else if ($activo == 2) { ?>
									<a href="" class="btn btn-outline-success btn-sm btnAceptar">Aceptar <i class="far fa-check-circle"></i></a>
									<a href="" class="btn btn-outline-warning btn-sm btnRecotizar">Recotizar <i class="fas fa-sync-alt"></i></a>
								<?php } ?>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<ul class="list-group">
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Puerto salida
										<span><?= $row->puerto ?>/<?= $row->claveSalida ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Puerto llegada
										<span><?= $row->transporte ?>/<?= $row->claveLlegada ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Tipo de cambio
										<span>USD $<?= $Dolar ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Valor mércancia
										<span>USD $<?= $mercanciaFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Flete internacional
										<span>USD $<?= $flInterFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Otros incrementables
										<span>USD $<?= $Otros ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Despacho aduanal
										<span>$<?= $despachoFormat  ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										DTA
										<span>$<?= $dtaFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Arancel (<?= $AranPor ?>%)
										<a class="infoArancel mr-auto" style="cursor: help;" data-toggle="popover" data-trigger="hover" title="Arancel" data-content="Esto es un Impuesto General de Importación variable dependiendo del producto. Se paga directamente a la Aduana."><i class="far fa-question-circle"></i></a>
										<span>$<?= $arancelFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Flete nacional
										<span>$<?= $flNacioFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										Servicio de importación
										<span>$<?= $honorariosCFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										SubTotal
										<span>$<?= $subTotalFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										IVA
										<span>$<?= $ivaFormat ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center list-card">
										<label style="margin-bottom: 0">Total cotización</label>
										<span><label style="margin-bottom: 0">$<?= $sumaFormat ?></label></span>
									</li>
								</ul>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div id="collapseCotizacion" style="margin-bottom: 1rem;">
									<?php if ($productos_cot != FALSE) {
										$count = 0;
										foreach ($productos_cot->result() as $row) {
											$count++;
											$IdProd = $row->id_producto_cot;
											$Producto = $row->producto;
											$Cantidad = $row->cantidad;
											$Precio = $row->precio;
											$Total = $row->total;
											$Especificaciones = $row->especificaciones;
											$Medida = $row->clave;
											$Proveedor = $row->proveedor;
											$classDivImg = 'col-0';
											$classDivDet = 'col-12';
											$display = 'none'; ?>
											<div class="card cardCotiza">
												<div class="card-header cardHeaderCotiza">
													<table class="table" style="margin-bottom: 0;">
														<tbody>
															<tr>
																<td href="collapse<?= $IdProd ?>" class="card-tbCotiza" data-id="<?= $IdProd ?>" data-toggle="collapse" data-target="#collapse<?= $IdProd ?>" aria-expanded="false">
																	<a href="collapse<?= $IdProd ?>" class="colProds" data-id="<?= $IdProd ?>" data-toggle="collapse" data-target="#collapse<?= $IdProd ?>" aria-expanded="false">
																		<span><?= $Producto ?></span>
																	</a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div id="collapse<?= $IdProd ?>" class="collapse" data-parent="#collapseCotizacion">
													<div class="card-body" style="border-top: 1px solid #dfdfdf;">
														<div class="row">
															<?php if ($medi_prod_cot != FALSE) {
																$countMedia = 0;
																$countProd = 0;
																foreach ($medi_prod_cot as $row) {
																	$countMedia++;
																	$countSlideCot = 0;
																	$countImgCot = 0;
																	$IdMediaCot = $row->id_media_prod_cot;
																	$IdProdMedia = $row->id_producto_cot;

																	if ($IdMediaCot != NULL) {
																		$classDivImg = 'col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4';
																		$classDivDet = 'col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8';
																		$display = '';
																	}

																	if ($IdProdMedia == $IdProd) {
																		$countProd++;
																	}
																}
															} ?>
															<div class="<?= $classDivImg ?>" style="display: <?= $display; ?>">
																<?php if ($countProd == 1) {
																	foreach ($medi_prod_cot as $row) {
																		$IdMediaCot = $row->id_media_prod_cot;
																		$IdProdMedia = $row->id_producto_cot;
																		$Path = $row->path_prod_cot;
																		if ($IdProdMedia == $IdProd) { ?>
																			<a href="" class="imgProdCat" data-id="<?= $IdProdMedia ?>">
																				<img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="d-block w-100 img-caroucel-cot">
																			</a>
																	<?php }
																	}
																} else { ?>
																	<div id="carouselMediaCot<?= $IdProd ?>" class="carousel slide" data-ride="carousel">
																		<ol class="carousel-indicators" style="bottom: 0;margin-bottom: 0;">
																			<?php if ($medi_prod_cot != FALSE) {
																				$countSlideCot = 0;
																				foreach ($medi_prod_cot as $row) {
																					$count++;
																					$IdMediaCot = $row->id_media_prod_cot;
																					$IdProdMedia = $row->id_producto_cot;
																					$Path = $row->path_prod_cot;
																					if ($IdProdMedia == $IdProd) {
																						if ($row === end($medi_prod_cot) || $row === current($medi_prod_cot)) { ?>
																							<li data-target="#carouselMediaCot<?= $IdProd ?>" data-slide-to="<?= $count ?>" class="active"></li>
																						<?php } else { ?>
																							<li data-target="#carouselMediaCot<?= $IdProd ?>" data-slide-to="<?= $count ?>"></li>
																			<?php }
																					}
																				}
																			} ?>
																		</ol>
																		<div class="carousel-inner det-caroucel">
																			<?php foreach ($medi_prod_cot as $row) {
																				$countImgCot++;
																				$IdMediaCot = $row->id_media_prod_cot;
																				$IdProdMedia = $row->id_producto_cot;
																				$Path = $row->path_prod_cot;
																				if ($IdProdMedia == $IdProd) {
																					if ($row === end($medi_prod_cot) || $row === current($medi_prod_cot)) { ?>
																						<div class="carousel-item active">
																							<a href="" class="imgProdCat" data-id="<?= $IdProdMedia ?>">
																								<img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="d-block w-100 img-caroucel-cot">
																							</a>
																						</div>
																					<?php } else { ?>
																						<div class="carousel-item">
																							<a href="" class="imgProdCat" data-id="<?= $IdProdMedia ?>">
																								<img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="d-block w-100 img-caroucel-cot">
																							</a>
																						</div>
																			<?php }
																				}
																			} ?>
																		</div>
																		<a class="carousel-control-prev" href="#carouselMediaCot<?= $IdProd ?>" role="button" data-slide="prev" style="width: 5%; opacity: 100%">
																			<span aria-hidden="true" style="font-size: 1.5rem; color: #565454">
																				<i class="fas fa-chevron-left"></i>
																			</span>
																			<span class="sr-only">Previous</span>
																		</a>
																		<a class="carousel-control-next" href="#carouselMediaCot<?= $IdProd ?>" role="button" data-slide="next" style="width: 5%; opacity: 100%">
																			<span aria-hidden="true" style="font-size: 1.5rem; color: #565454">
																				<i class="fas fa-chevron-right"></i>
																			</span>
																			<span class="sr-only">Next</span>
																		</a>
																	</div>
																<?php } ?>
															</div>
															<div class="<?= $classDivDet ?>">
																<table style="width: 100%;">
																	<tr>
																		<td><strong>Precio: </strong>$<?= $Precio ?></td>
																		<td><strong>Cantidad: </strong><?= $Cantidad ?><?= $Medida ?></td>
																		<td><strong>Total: </strong>$<?= $Total ?></td>
																	</tr>
																	<tr>
																		<td colspan="3"><strong>Especificaciones</strong></td>
																	</tr>
																	<tr>
																		<td colspan="3"><?= $Especificaciones ?></td>
																	</tr>
																	<?php if ($prov_cliente != FALSE) {
																		$provCliente = $prov_cliente->proveedor;
																		if ($Proveedor == $provCliente) { ?>
																			<tr>
																				<td colspan="3"><strong>Proveedor</strong></td>
																			</tr>
																			<tr>
																				<td colspan="3"><?= $Proveedor ?></td>
																			</tr>
																	<?php }
																	} ?>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
									<?php
										}
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php }
}
?>

<div class="modal fade" id="modal_cotCliente" tabindex="-1" role="dialog" aria-hidden="true">
	<?php $this->load->view('plataforma/cliente/modals/modal-cotizacion'); ?>
</div>

<script src="<?= base_url(); ?>js/clientes/cotizacion.js"></script>