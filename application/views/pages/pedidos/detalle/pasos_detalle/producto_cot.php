<?php
if ($Data_Cotizacion != FALSE) {
    if ($Data_productos_cot != FALSE) {
        $count = 0;
        foreach ($Data_productos_cot->result() as $row) {
            $count++;
            $IdProd = $row->id_producto_cot;
            $Producto = $row->producto;
            $Medida = $row->clave;
            $Especificaciones = $row->especificaciones;
            $Proveedor = $row->proveedor;
            $Estatus = $row->id_estatus;
            $CantidadFormat = number_format($row->cantidad, 2);
            $PrecioFormat = number_format($row->precio, 2);
            $TotalFormat = number_format($row->total, 2);

            $countSlide = 0;
            $countImg = 0;

            if ($count > 1) {
                $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-content"';
            } else {
                $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-title"';
            }
            

            if ($Data_medi_prod_cot != FALSE) {
                $countM = 0;
                $countProd = 0;
                foreach ($Data_medi_prod_cot as $row) {
                    $countM++;
                    $IdMediaCot = $row->id_media_prod_cot;
                    $IdProdMedia = $row->id_producto_cot;
                    $Path = $row->path_prod_cot;

                    if ($IdMediaCot != NULL) {
                        $img = true;
                    } else {
                        $img = false;
                    }

                    if ($IdProd == $IdProdMedia) {
                        $countProd++;
                    }
                }
            } ?>
            <li <?= $titlePord ?> data-toggle="collapse" data-target="#collapse<?= $IdProd ?>" aria-expanded="false" aria-controls="collapse<?= $IdProd ?>">
                <span class="list-content-prod" id="heading<?= $IdProd ?>"><label class="m-0 font-w"><?= $Producto ?></label></span>
                <span>
                    <label class="m-0 font-w" style="font-size: 14px">
                        <a href="" role="button" data-toggle="collapse" data-target="#collapse<?= $IdProd ?>" aria-expanded="false" aria-controls="collapse<?= $IdProd ?>">
                            <i class="fas fa-chevron-down" style="font-size: 11px;"></i> Detalle
                        </a>
                    </label>
                </span>
            </li>
            <div id="collapse<?= $IdProd ?>" class="collapse" aria-labelledby="heading<?= $IdProd ?>" data-parent="#accordCotDet">
                <div class="content-prod-cot">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-Pedido">
                            <?php if ($img == false) { ?>
                                <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $Producto ?></label></p>
                                <p class="list-content-prod"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormat ?></label></p>
                                <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormat ?> <?= $Medida; ?></label></p>
                                <p class="list-content-prod"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormat ?></label></p>
                                <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $Especificaciones ?></label></p>
                                <?php if ($Data_prov_cliente != FALSE) {
                                    $provCliente = $Data_prov_cliente->proveedor;
                                    if ($Proveedor == $provCliente) { ?>
                                        <p class="list-content-prod"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $Proveedor ?></label></p>
                                <?php } else if ($Estatus > 9) { ?>
                                        <p class="list-content-prod"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $Proveedor ?></label></p>
                                <?php }
                                } ?>
                            <?php } else if ($img == true) { ?>
                                <div class="row" style="margin: 0rem;">
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding: 0rem;">
                                        <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $Producto ?></label></p>
                                        <p class="list-content-prod"><strong>Precio unit.: </strong><label class="m-0 font-w">USD $<?= $PrecioFormat ?></label></p>
                                        <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $CantidadFormat ?> <?= $Medida; ?></label></p>
                                        <p class="list-content-prod"><strong>Total: </strong><label class="m-0 font-w">UDS $<?= $TotalFormat ?></label></p>
                                        <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $Especificaciones ?></label></p>
                                        <?php if ($Data_prov_cliente != FALSE) {
                                            $provCliente = $Data_prov_cliente->proveedor;
                                            if ($Proveedor == $provCliente) { ?>
                                                <p class="list-content-prod"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $Proveedor ?></label></p>
                                        <?php } else if ($Estatus > 9) { ?>
                                                <p class="list-content-prod"><strong>Proveedor: </strong><label class="m-0 font-w"><?= $Proveedor ?></label></p>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                        <?php if ($countProd == 1) {
                                            foreach ($Data_medi_prod_cot as $row) {
                                                $IdMediaCot = $row->id_media_prod_cot;
                                                $IdProdMedia = $row->id_producto_cot;
                                                $Path = $row->path_prod_cot;
                                                if ($IdProd == $IdProdMedia) { ?>
                                                    <p class="list-content-prod">
                                                        <label id="linkImgSp<?= $IdProd ?>" class="m-0">
                                                            <a href="" class="imgDetPodCar" data-id="<?= $IdProd ?>">
                                                                <img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="img-fluid img-cot">
                                                            </a>
                                                        </label>
                                                    </p>
                                            <?php }
                                            }
                                        } else { ?>
                                            <div id="carouselMediaCot<?= $IdProd ?>" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators" style="bottom: 0;margin-bottom: 0;">
                                                    <?php foreach ($Data_medi_prod_cot as $row) {
                                                        $countSlide++;
                                                        $IdProdMedia = $row->id_producto_cot;
                                                        if ($IdProd == $IdProdMedia) {
                                                            if ($row == end($Data_medi_prod_cot) || $row == reset($Data_medi_prod_cot)) { ?>
                                                                <li data-target="#carouselMediaCot<?= $IdProd ?>" data-slide-to="<?= $countSlide ?>" class="active"></li>
                                                            <?php } else { ?>
                                                                <li data-target="#carouselMediaCot<?= $IdProd ?>" data-slide-to="<?= $countSlide ?>"></li>
                                                    <?php }
                                                        }
                                                    } ?>
                                                </ol>
                                                <div class="carousel-inner det-caroucel">
                                                    <?php foreach ($Data_medi_prod_cot as $row) {
                                                        $countImg++;
                                                        $IdMediaCot = $row->id_media_prod_cot;
                                                        $IdProdMedia = $row->id_producto_cot;
                                                        $Path = $row->path_prod_cot;
                                                        if ($IdProd == $IdProdMedia) {
                                                            if ($row === end($Data_medi_prod_cot) || $row === reset($Data_medi_prod_cot)) { ?>
                                                                <div class="carousel-item active">
                                                                    <a href="" class="imgDetPodCar" data-id="<?= $IdProd ?>">
                                                                        <img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="img-fluid img-caroucel-cot">
                                                                    </a>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="carousel-item">
                                                                    <a href="" class="imgDetPodCar" data-id="<?= $IdProd ?>">
                                                                        <img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="img-fluid img-caroucel-cot">
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
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
<?php }
    }
} ?>