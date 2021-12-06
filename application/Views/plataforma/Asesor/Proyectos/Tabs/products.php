<?php
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        // $id_proyecto = $row['id_proyecto'];
        $oem_path = $row['oemservice_path'];
        $Status = $row['id_estadoproyectos'];
        $extension = new SplFileInfo($oem_path);
        $ext = $extension->getExtension();
        if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "JPEG" || $ext == "png" || $ext == "PNG") {
            $imgicons = '';
            $pdficons = 'class="hide-button"';
        } else if ($ext == "pdf" || $ext == "PDF") {
            $imgicons = 'class="hide-button"';
            $pdficons = '';
        }
    }
}
?>

<div class="card-header borders-card-prod">
    <h4 style="margin-bottom: 0;">Productos</h4>
</div>
<div class="card-body" style="padding: 0rem;">
    <div id="accordion" style="margin-bottom: 1rem;">
        <?php if ($Data_Cotizacion != FALSE) {
            if ($Data_productos_cot != FALSE) {
                foreach ($Data_productos_cot->result() as $row) {
                    $IdCotizacion = $row->id_cotizacion;
                    $IdProd = $row->id_producto_cot;
                    $Producto = $row->producto;
                    $Medida = $row->clave;
                    $Especificaciones = $row->especificaciones;
                    $Proveedor = $row->proveedor;
                    $CantidadFormat = number_format($row->cantidad, 2);
                    $PrecioFormat = number_format($row->precio, 2);
                    $TotalFormat = number_format($row->total, 2);

                    $countImg = 0;
                    $img = false;

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
                            }

                            if ($IdProd == $IdProdMedia) {
                                $countProd++;
                            }
                        }
                    } ?>
                    <div class="card prodcuts-cards">
                        <div class="card-header collapsed-title" id="headingProdC<?= $IdProd ?>">
                            <table class="table" style="margin-bottom: 0;">
                                <tbody>
                                    <tr class="colProdCot" data-id="<?= $IdProd ?>" data-toggle="collapse" data-target="#collapseProdC<?= $IdProd ?>" aria-expanded="false" aria-controls="collapseOne">
                                        <td class="prov-name">
                                            <span><?= $Producto ?></span>
                                        </td>
                                        <td class="prov-detile">
                                            <a href="" class="colProdCot" data-id="<?= $IdProd ?>" data-toggle="collapse" data-target="#collapseProdC<?= $IdProd ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <i class="fas fa-caret-square-down"></i> Detalles
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="collapseProdC<?= $IdProd ?>" class="collapse" aria-labelledby="headingProdC<?= $IdProd ?>" data-parent="#accordion">
                            <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                <div class="row">
                                    <?php if ($img == true) { ?>
                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                            <?php if ($countProd == 1) {
                                                foreach ($Data_medi_prod_cot as $row) {
                                                    $IdMediaCot = $row->id_media_prod_cot;
                                                    $IdProdMedia = $row->id_producto_cot;
                                                    $Path = $row->path_prod_cot;
                                                    if ($IdProd == $IdProdMedia) { ?>                                                    
                                                        <div class="card cards-img">
                                                            <div class="card-body" style="padding: 0rem 0rem;">
                                                                <div class="text-center">
                                                                    <label class="m-0">
                                                                        <a href="" class="imgMedCot" data-id="<?= $IdProd ?>">
                                                                            <img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="img-fluid img-cot">
                                                                        </a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                }
                                            } else { ?>
                                                <div id="carouselMediaCot<?= $IdProd ?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner det-caroucel">
                                                        <?php foreach ($Data_medi_prod_cot as $row) {
                                                            $countImg++;
                                                            $IdMediaCot = $row->id_media_prod_cot;
                                                            $IdProdMedia = $row->id_producto_cot;
                                                            $Path = $row->path_prod_cot;
                                                            if ($IdProd == $IdProdMedia) {
                                                                if ($row === end($Data_medi_prod_cot) || $row === reset($Data_medi_prod_cot)) { ?>
                                                                    <div class="carousel-item active">
                                                                        <a href="" class="imgMedCot" data-id="<?= $IdProd ?>">
                                                                            <img id="img<?= $IdMediaCot ?>" src="<?= base_url() ?><?= $Path ?>" class="img-fluid img-caroucel-cot">
                                                                        </a>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="carousel-item">
                                                                        <a href="" class="imgMedCot" data-id="<?= $IdProd ?>">
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
                                                            <i class="fas fa-chevron-right"></i></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding: 0rem;">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item list-Pedido">
                                                    <p class="list-Title"><strong>Datos del producto</strong></p>
                                                    <p class="list-Content"><strong>Producto: </strong>
                                                        <label class="m-0" style="font-weight: 300;"><?= $Producto ?></label>
                                                    </p>
                                                    <p class="list-Content"><strong>Precio unit.: </strong>
                                                        <label class="m-0" style="font-weight: 300;">USD $<?= $PrecioFormat ?></label>
                                                    </p>
                                                    <p class="list-Content"><strong>Cantidad: </strong>
                                                        <label class="m-0" style="font-weight: 300;"><?= $CantidadFormat ?></label>
                                                        <label class="m-0" style="font-weight: 300;"><?= $Medida ?></label>
                                                    </p>
                                                    <p class="list-Content"><strong>Total: </strong>
                                                        <label class="m-0" style="font-weight: 300;"><?= $TotalFormat ?></label>
                                                    </p>
                                                    <p class="list-Content"><strong>Especificaciones: </strong>
                                                        <label class="m-0" style="font-weight: 300;"><?= $Especificaciones ?></label>
                                                    </p>
                                                    <?php if ($Data_prov_cliente != FALSE) {
                                                        $provCliente = $Data_prov_cliente->proveedor;
                                                        if ($Proveedor == $provCliente) { ?>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $Proveedor ?></label>
                                                            </p>
                                                    <?php } else if ($Status > 9) { ?>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $Proveedor ?></label>
                                                            </p>
                                                    <?php }
                                                    } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php } else if ($img == false) { ?>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-Pedido">
                                                <p class="list-Title"><strong>Datos del producto</strong></p>
                                                <p class="list-Content"><strong>Producto: </strong>
                                                    <label class="m-0" style="font-weight: 300;"><?= $Producto ?></label>
                                                </p>
                                                <p class="list-Content"><strong>Precio unit.: </strong>
                                                    <label class="m-0" style="font-weight: 300;">USD $<?= $PrecioFormat ?></label>
                                                </p>
                                                <p class="list-Content"><strong>Cantidad: </strong>
                                                    <label class="m-0" style="font-weight: 300;"><?= $CantidadFormat ?></label>
                                                    <label class="m-0" style="font-weight: 300;"><?= $Medida ?></label>
                                                </p>
                                                <p class="list-Content"><strong>Total: </strong>
                                                    <label class="m-0" style="font-weight: 300;"><?= $TotalFormat ?></label>
                                                </p>
                                                <p class="list-Content"><strong>Especificaciones: </strong>
                                                    <label class="m-0" style="font-weight: 300;"><?= $Especificaciones ?></label>
                                                </p>
                                                <?php if ($Data_prov_cliente != FALSE) {
                                                    $provCliente = $Data_prov_cliente->proveedor;
                                                    if ($Proveedor == $provCliente) { ?>
                                                        <p class="list-Content"><strong>Proveedor: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $Proveedor ?></label>
                                                        </p>
                                                <?php }
                                                } ?>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
            } else {
                if ($Data_Productos_C != FALSE) {
                    $count = 0;
                    foreach ($Data_Productos_C as $row) {
                        $count++;
                        $IdProductoC = $row->id_producto_c;
                        $archivo_invoice = $row->invoice_path;
                        $img = $row->img_path;
                        $extension = new SplFileInfo($archivo_invoice);
                        $ext = $extension->getExtension();

                        if (($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono != "" && $row->direccion != "") {
                            $Style = 'style="object-fit: scale-down;height: 45vh;width: 100%;"';
                            $font = 'style="font-size: 18rem;margin-top: 0.5rem;"';
                        } else if ((($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono != "" && $row->direccion != "") || (($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono == "" && $row->direccion != "")) {
                            $Style = 'style="object-fit: scale-down;height: 41vh;width: 100%;"';
                            $font = 'style="font-size: 16rem;margin-top: 0.5rem;"';
                        } else if ((($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono != "" && $row->direccion == "") || (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono == "" && $row->direccion != "")) {
                            $Style = 'style="object-fit: scale-down;height: 38vh;width: 100%;"';
                            $font = 'style="font-size: 15rem;margin-top: 0.5rem;"';
                        } else if ((($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono == "" && $row->direccion == "") || (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono != "" && $row->direccion == "")) {
                            $Style = 'style="object-fit: scale-down;height: 34vh;width: 100%;"';
                            $font = 'style="font-size: 13rem;margin-top: 1rem;"';
                        } else if (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono == "" && $row->direccion == "") {
                            $Style = 'style="object-fit: scale-down;height: 31vh;width: 100%;"';
                            $font = 'style="font-size: 12rem;margin-top: 0.5rem;"';
                        }


                        if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "JPEG" || $ext == "png" || $ext == "PNG") {
                            $imgIcon = '';
                            $pdfIcon = 'class="hide-button"';
                            $excelIcon = 'class="hide-button"';
                        } else if ($ext == "pdf" || $ext == "PDF") {
                            $imgIcon = 'class="hide-button"';
                            $pdfIcon = '';
                            $excelIcon = 'class="hide-button"';
                        } else if ($ext == "xlsx" || $ext == "XLSX" || $ext == "xls" || $ext == "XLS") {
                            $imgIcon = 'class="hide-button"';
                            $pdfIcon = 'class="hide-button"';
                            $excelIcon = '';
                        }

                        if ($IdProductoC !== NULL) { ?>
                            <div class="card prodcuts-cards">
                                <div class="card-header collapsed-title" id="headingProdC<?= $row->id_producto_c ?>">
                                    <table class="table" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#collapseProdC<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <td class="prov-name">
                                                    <span><?= $row->producto_proveedor_c ?></span>
                                                </td>
                                                <td class="prov-detile">
                                                    <a href="" data-toggle="collapse" data-target="#collapseProdC<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapseOne">
                                                        <i class="fas fa-caret-square-down"></i> Detalles
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="collapseProdC<?= $row->id_producto_c ?>" class="collapse" aria-labelledby="headingProdC<?= $row->id_producto_c ?>" data-parent="#accordion">
                                    <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                        <div class="row">
                                            <?php if (($img != NULL || $img != "" || $img != '') && ($archivo_invoice != NULL || $archivo_invoice != "")) { ?>
                                                <div class="col-sm-5">
                                                    <div class="card cards-img">
                                                        <div class="card-body" style="padding: 0rem 0rem;">
                                                            <div class="text-center">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item list-Pedido">
                                                                        <label id="linkImgP<?= $row->id_producto_c ?>">
                                                                            <a href="" id="imgP-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <img id="imgP<?= $row->id_producto_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" style="object-fit: scale-down;height: 18vh;width: 100%;">
                                                                            </a>
                                                                        </label>
                                                                    </li>
                                                                    <li class="list-group-item list-Pedido">
                                                                        <label id="linkImg<?= $row->id_producto_c ?>" <?= $imgIcon ?>>
                                                                            <a href="" id="img-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <i class="fas fa-image img-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="linkPDF<?= $row->id_producto_c ?>" <?= $pdfIcon ?>>
                                                                            <a href="" id="pdf-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <i class="far fa-file-pdf pdf-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="linkExe<?= $row->id_producto_c ?>" <?= $excelIcon ?>>
                                                                            <a href="" id="excel-icon<?= $row->id_producto_c ?>">
                                                                                <i class="far fa-file-excel excel-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                            </a>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del producto</strong></p>
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                        <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                            <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Persona contacto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Email: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                            </p>
                                                            <?php if ($row->telefono != "") { ?>
                                                                <p class="list-Content"><strong>Telefono: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                                </p>
                                                            <?php }
                                                            if ($row->direccion != "") { ?>
                                                                <p class="list-Content"><strong>Liga página: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } else if (($img != NULL || $img != "" || $img != '') && ($archivo_invoice == NULL || $archivo_invoice == "")) { ?>
                                                <div class="col-sm-5">
                                                    <div class="card cards-img">
                                                        <div class="card-body" style="padding: 0rem 0rem;">
                                                            <div class="text-center">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item list-Pedido">
                                                                        <label id="linkImgP<?= $row->id_producto_c ?>">
                                                                            <a href="" id="imgP-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <img id="imgP<?= $row->id_producto_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" <?= $Style ?>>
                                                                            </a>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del producto</strong></p>
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                        <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                            <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Persona contacto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Email: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                            </p>
                                                            <?php if ($row->telefono != "") { ?>
                                                                <p class="list-Content"><strong>Telefono: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                                </p>
                                                            <?php }
                                                            if ($row->direccion != "") { ?>
                                                                <p class="list-Content"><strong>Liga página: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } else if (($img == NULL || $img == "" || $img == '') && ($archivo_invoice != NULL || $archivo_invoice != "")) { ?>
                                                <div class="col-sm-5">
                                                    <div class="card cards-img">
                                                        <div class="card-body" style="padding: 0rem 0rem;">
                                                            <div class="text-center">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item list-Pedido">
                                                                        <label id="linkImg<?= $row->id_producto_c ?>" <?= $imgIcon ?>>
                                                                            <a href="" id="img-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <i class="fas fa-image img-icon" <?= $font ?>></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="linkPDF<?= $row->id_producto_c ?>" <?= $pdfIcon ?>>
                                                                            <a href="" id="pdf-icon" data-id="<?= $row->id_producto_c ?>">
                                                                                <i class="far fa-file-pdf pdf-icon" <?= $font ?>></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="linkExe<?= $row->id_producto_c ?>" <?= $excelIcon ?>>
                                                                            <a href="" id="excel-icon<?= $row->id_producto_c ?>">
                                                                                <i class="far fa-file-excel excel-icon" <?= $font ?>></i>
                                                                            </a>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del producto</strong></p>
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                        <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                            <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Persona contacto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Email: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                            </p>
                                                            <?php if ($row->telefono != "") { ?>
                                                                <p class="list-Content"><strong>Telefono: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                                </p>
                                                            <?php }
                                                            if ($row->direccion != "") { ?>
                                                                <p class="list-Content"><strong>Liga página: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } else if (($img == NULL || $img == "" || $img == '') && ($archivo_invoice == NULL || $archivo_invoice == "")) { ?>
                                                <div class="col-sm-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del producto</strong></p>
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                            <p class="list-Content"><strong>Proveedor: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Persona contacto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Email: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                            </p>
                                                            <?php if ($row->telefono != "") { ?>
                                                                <p class="list-Content"><strong>Telefono: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                                </p>
                                                            <?php }
                                                            if ($row->direccion != "") { ?>
                                                                <p class="list-Content"><strong>Liga página: </strong>
                                                                    <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                if ($Data_Productos_SP_C != FALSE) {
                    $count2 = 0;
                    foreach ($Data_Productos_SP_C as $row) {
                        $count2++;
                        $IdProductoSpC = $row->id_producto_sp_c;
                        $img = $row->img_path;

                        if ($row->color_oem != "" || $row->color_oem != NULL) {
                            $StyleSP = 'margin-top: 1.5rem;';
                        } else {
                            $StyleSP = 'margin-top: 0.75rem;';
                        }
                        if ($IdProductoSpC !== NULL) { ?>
                            <div class="card prodcuts-cards">
                                <div class="card-header collapsed-title" id="headingProdSpC<?= $row->id_producto_sp_c ?>">
                                    <table class="table" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr data-toggle="collapse" data-target="#collapseProdSpC<?= $row->id_producto_sp_c ?>" aria-expanded="true" aria-controls="collapseOne">
                                                <td class="prov-name">
                                                    <span><?= $row->producto_sp_c ?></span>
                                                </td>
                                                <td class="prov-detile">
                                                    <a href="" data-toggle="collapse" data-target="#collapseProdSpC<?= $row->id_producto_sp_c ?>" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="fas fa-caret-square-down"></i> Detalles
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="collapseProdSpC<?= $row->id_producto_sp_c ?>" class="collapse" aria-labelledby="headingProdSpC<?= $row->id_producto_sp_c ?>" data-parent="#accordion">
                                    <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                        <div class="row">
                                            <?php if ($img === NULL || $img === "" || $img === '') { ?>
                                                <div class="col-sm-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Title"><strong>Datos del producto</strong></p>
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_sp_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_sp_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_sp_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-5">
                                                    <div class="card cards-img">
                                                        <div class="card-body" style="padding: 0rem 0rem;">
                                                            <div class="text-center">
                                                                <label id="linkImgSp<?= $row->id_producto_sp_c ?>">
                                                                    <a href="" id="imgSp-icon" data-id="<?= $row->id_producto_sp_c ?>">
                                                                        <img id="imgSp<?= $row->id_producto_sp_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" style="object-fit: scale-down;height: 15vh;width: 100%;margin-top: 0.5rem;">
                                                                    </a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <ul class="list-group list-group-flush" style="<?= $StyleSP ?>">
                                                        <li class="list-group-item list-Pedido">
                                                            <p class="list-Content"><strong>Producto: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->producto_sp_c ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Cantidad: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_sp_c ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                            </p>
                                                            <p class="list-Content"><strong>Especificaciones: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_sp_c ?></label>
                                                            </p>
                                                            <?php if ($row->color_oem != "") { ?>
                                                                <p class="list-Content"><strong>Personalización</strong>
                                                                    <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                    <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                        <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                            <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-images"></i>
                                                                            </a>
                                                                        </label>
                                                                        <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                            <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                                <i class="far fa-file-pdf pdf-icon"></i>
                                                                            </a>
                                                                        </label>
                                                                    <?php } ?>
                                                                </p>
                                                            <?php } ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                    }
                }
                if ($Data_Productos_C != FALSE) {
                    $count3 = 0;
                    foreach ($Data_Productos_C as $row) {
                        $count3++;
                        $IdProductoC = $row->id_producto_c;
                        if ($Data_Productos_SP_C != FALSE) {
                            $count4 = 0;
                            foreach ($Data_Productos_SP_C as $row) {
                                $count4++;
                                $IdProductoSpC = $row->id_producto_sp_c;
                                if ($IdProductoC === NULL && $IdProductoSpC === NULL) { ?>
                                    <div class="card prodcuts-cards">
                                        <div class="card-header collapsed-title" id="headingProdSpC<?= $row->id_producto_sp_c ?>">
                                            <table class="table" style="margin-bottom: 0;">
                                                <tbody>
                                                    <tr>
                                                        <td class="no-exist">
                                                            <span>No se encuentran productos disponibles</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                        <?php }
                            }
                        }
                    }
                }
            }
        } else {
            if ($Data_Productos_C != FALSE) {
                $count = 0;
                foreach ($Data_Productos_C as $row) {
                    $count++;
                    $IdProductoC = $row->id_producto_c;
                    $archivo_invoice = $row->invoice_path;
                    $img = $row->img_path;
                    $extension = new SplFileInfo($archivo_invoice);
                    $ext = $extension->getExtension();

                    if (($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono != "" && $row->direccion != "") {
                        $Style = 'style="object-fit: scale-down;height: 45vh;width: 100%;"';
                        $font = 'style="font-size: 18rem;margin-top: 0.5rem;"';
                    } else if ((($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono != "" && $row->direccion != "") || (($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono == "" && $row->direccion != "")) {
                        $Style = 'style="object-fit: scale-down;height: 41vh;width: 100%;"';
                        $font = 'style="font-size: 16rem;margin-top: 0.5rem;"';
                    } else if ((($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono != "" && $row->direccion == "") || (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono == "" && $row->direccion != "")) {
                        $Style = 'style="object-fit: scale-down;height: 38vh;width: 100%;"';
                        $font = 'style="font-size: 15rem;margin-top: 0.5rem;"';
                    } else if ((($row->color_oem != "" || $row->color_oem != NULL) && $row->telefono == "" && $row->direccion == "") || (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono != "" && $row->direccion == "")) {
                        $Style = 'style="object-fit: scale-down;height: 34vh;width: 100%;"';
                        $font = 'style="font-size: 13rem;margin-top: 1rem;"';
                    } else if (($row->color_oem == "" || $row->color_oem == NULL) && $row->telefono == "" && $row->direccion == "") {
                        $Style = 'style="object-fit: scale-down;height: 31vh;width: 100%;"';
                        $font = 'style="font-size: 12rem;margin-top: 0.5rem;"';
                    }


                    if ($ext == "jpg" || $ext == "JPG" || $ext == "jpeg" || $ext == "JPEG" || $ext == "png" || $ext == "PNG") {
                        $imgIcon = '';
                        $pdfIcon = 'class="hide-button"';
                        $excelIcon = 'class="hide-button"';
                    } else if ($ext == "pdf" || $ext == "PDF") {
                        $imgIcon = 'class="hide-button"';
                        $pdfIcon = '';
                        $excelIcon = 'class="hide-button"';
                    } else if ($ext == "xlsx" || $ext == "XLSX" || $ext == "xls" || $ext == "XLS") {
                        $imgIcon = 'class="hide-button"';
                        $pdfIcon = 'class="hide-button"';
                        $excelIcon = '';
                    }

                    if ($IdProductoC !== NULL) { ?>
                        <div class="card prodcuts-cards">
                            <div class="card-header collapsed-title" id="headingProdC<?= $row->id_producto_c ?>">
                                <table class="table" style="margin-bottom: 0;">
                                    <tbody>
                                        <tr data-toggle="collapse" data-target="#collapseProdC<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapseOne">
                                            <td class="prov-name">
                                                <span><?= $row->producto_proveedor_c ?></span>
                                            </td>
                                            <td class="prov-detile">
                                                <a href="" data-toggle="collapse" data-target="#collapseProdC<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="fas fa-caret-square-down"></i> Detalles
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="collapseProdC<?= $row->id_producto_c ?>" class="collapse" aria-labelledby="headingProdC<?= $row->id_producto_c ?>" data-parent="#accordion">
                                <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                    <div class="row">
                                        <?php if (($img != NULL || $img != "" || $img != '') && ($archivo_invoice != NULL || $archivo_invoice != "")) { ?>
                                            <div class="col-sm-5">
                                                <div class="card cards-img">
                                                    <div class="card-body" style="padding: 0rem 0rem;">
                                                        <div class="text-center">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item list-Pedido">
                                                                    <label id="linkImgP<?= $row->id_producto_c ?>">
                                                                        <a href="" id="imgP-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <img id="imgP<?= $row->id_producto_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" style="object-fit: scale-down;height: 18vh;width: 100%;">
                                                                        </a>
                                                                    </label>
                                                                </li>
                                                                <li class="list-group-item list-Pedido">
                                                                    <label id="linkImg<?= $row->id_producto_c ?>" <?= $imgIcon ?>>
                                                                        <a href="" id="img-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <i class="fas fa-image img-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="linkPDF<?= $row->id_producto_c ?>" <?= $pdfIcon ?>>
                                                                        <a href="" id="pdf-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <i class="far fa-file-pdf pdf-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="linkExe<?= $row->id_producto_c ?>" <?= $excelIcon ?>>
                                                                        <a href="" id="excel-icon<?= $row->id_producto_c ?>">
                                                                            <i class="far fa-file-excel excel-icon" style="font-size: 10rem;margin-top: 1rem;"></i>
                                                                        </a>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del producto</strong></p>
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                    <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                        <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                        <p class="list-Content"><strong>Proveedor: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Persona contacto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Email: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                        </p>
                                                        <?php if ($row->telefono != "") { ?>
                                                            <p class="list-Content"><strong>Telefono: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                            </p>
                                                        <?php }
                                                        if ($row->direccion != "") { ?>
                                                            <p class="list-Content"><strong>Liga página: </strong>
                                                                <label class="m-0" style="font-weight: 300;">
                                                                    <a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a>
                                                                </label>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } else if (($img != NULL || $img != "" || $img != '') && ($archivo_invoice == NULL || $archivo_invoice == "")) { ?>
                                            <div class="col-sm-5">
                                                <div class="card cards-img">
                                                    <div class="card-body" style="padding: 0rem 0rem;">
                                                        <div class="text-center">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item list-Pedido">
                                                                    <label id="linkImgP<?= $row->id_producto_c ?>">
                                                                        <a href="" id="imgP-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <img id="imgP<?= $row->id_producto_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" <?= $Style ?>>
                                                                        </a>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del producto</strong></p>
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                    <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                        <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                        <p class="list-Content"><strong>Proveedor: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Persona contacto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Email: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                        </p>
                                                        <?php if ($row->telefono != "") { ?>
                                                            <p class="list-Content"><strong>Telefono: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                            </p>
                                                        <?php }
                                                        if ($row->direccion != "") { ?>
                                                            <p class="list-Content"><strong>Liga página: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } else if (($img == NULL || $img == "" || $img == '') && ($archivo_invoice != NULL || $archivo_invoice != "")) { ?>
                                            <div class="col-sm-5">
                                                <div class="card cards-img">
                                                    <div class="card-body" style="padding: 0rem 0rem;">
                                                        <div class="text-center">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item list-Pedido">
                                                                    <label id="linkImg<?= $row->id_producto_c ?>" <?= $imgIcon ?>>
                                                                        <a href="" id="img-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <i class="fas fa-image img-icon" <?= $font ?>></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="linkPDF<?= $row->id_producto_c ?>" <?= $pdfIcon ?>>
                                                                        <a href="" id="pdf-icon" data-id="<?= $row->id_producto_c ?>">
                                                                            <i class="far fa-file-pdf pdf-icon" <?= $font ?>></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="linkExe<?= $row->id_producto_c ?>" <?= $excelIcon ?>>
                                                                        <a href="" id="excel-icon<?= $row->id_producto_c ?>">
                                                                            <i class="far fa-file-excel excel-icon" <?= $font ?>></i>
                                                                        </a>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del producto</strong></p>
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                    <li class="list-group-item list-Pedido" style="margin-top: 1rem;">
                                                        <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                        <p class="list-Content"><strong>Proveedor: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Persona contacto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Email: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                        </p>
                                                        <?php if ($row->telefono != "") { ?>
                                                            <p class="list-Content"><strong>Telefono: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                            </p>
                                                        <?php }
                                                        if ($row->direccion != "") { ?>
                                                            <p class="list-Content"><strong>Liga página: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } else if (($img == NULL || $img == "" || $img == '') && ($archivo_invoice == NULL || $archivo_invoice == "")) { ?>
                                            <div class="col-sm-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del producto</strong></p>
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_proveedor_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_proveedor_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_prod_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del proveedor</strong></p>
                                                        <p class="list-Content"><strong>Proveedor: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->proveedor ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Persona contacto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->contacto ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Email: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->email ?></label>
                                                        </p>
                                                        <?php if ($row->telefono != "") { ?>
                                                            <p class="list-Content"><strong>Telefono: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->abrev ?></label>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->telefono; ?></label>
                                                            </p>
                                                        <?php }
                                                        if ($row->direccion != "") { ?>
                                                            <p class="list-Content"><strong>Liga página: </strong>
                                                                <label class="m-0" style="font-weight: 300;"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            if ($Data_Productos_SP_C != FALSE) {
                $count2 = 0;
                foreach ($Data_Productos_SP_C as $row) {
                    $count2++;
                    $IdProductoSpC = $row->id_producto_sp_c;
                    $img = $row->img_path;

                    if ($row->color_oem != "" || $row->color_oem != NULL) {
                        $StyleSP = 'margin-top: 1.5rem;';
                    } else {
                        $StyleSP = 'margin-top: 0.75rem;';
                    }
                    if ($IdProductoSpC !== NULL) { ?>
                        <div class="card prodcuts-cards">
                            <div class="card-header collapsed-title" id="headingProdSpC<?= $row->id_producto_sp_c ?>">
                                <table class="table" style="margin-bottom: 0;">
                                    <tbody>
                                        <tr data-toggle="collapse" data-target="#collapseProdSpC<?= $row->id_producto_sp_c ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <td class="prov-name">
                                                <span><?= $row->producto_sp_c ?></span>
                                            </td>
                                            <td class="prov-detile">
                                                <a href="" data-toggle="collapse" data-target="#collapseProdSpC<?= $row->id_producto_sp_c ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fas fa-caret-square-down"></i> Detalles
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="collapseProdSpC<?= $row->id_producto_sp_c ?>" class="collapse" aria-labelledby="headingProdSpC<?= $row->id_producto_sp_c ?>" data-parent="#accordion">
                                <div class="card-body" style="border-top: 1px solid #dfdfdf;">
                                    <div class="row">
                                        <?php if ($img === NULL || $img === "" || $img === '') { ?>
                                            <div class="col-sm-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Title"><strong>Datos del producto</strong></p>
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_sp_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_sp_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_sp_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-sm-5">
                                                <div class="card cards-img">
                                                    <div class="card-body" style="padding: 0rem 0rem;">
                                                        <div class="text-center">
                                                            <label id="linkImgSp<?= $row->id_producto_sp_c ?>">
                                                                <a href="" id="imgSp-icon" data-id="<?= $row->id_producto_sp_c ?>">
                                                                    <img id="imgSp<?= $row->id_producto_sp_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid" style="object-fit: scale-down;height: 15vh;width: 100%;margin-top: 0.5rem;">
                                                                </a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <ul class="list-group list-group-flush" style="<?= $StyleSP ?>">
                                                    <li class="list-group-item list-Pedido">
                                                        <p class="list-Content"><strong>Producto: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->producto_sp_c ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Cantidad: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->cantidad_sp_c ?></label>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->clave; ?></label>
                                                        </p>
                                                        <p class="list-Content"><strong>Especificaciones: </strong>
                                                            <label class="m-0" style="font-weight: 300;"><?= $row->especificaciones_sp_c ?></label>
                                                        </p>
                                                        <?php if ($row->color_oem != "") { ?>
                                                            <p class="list-Content"><strong>Personalización</strong>
                                                                <label class="m-0" style="font-weight: 300;"><?= $row->color_oem ?></label>
                                                                <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                                                    <label id="lblMedia" data-id="<?= $id_proyecto ?>" <?= $imgicons ?>>
                                                                        <a id="mediaIMG" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-images"></i>
                                                                        </a>
                                                                    </label>
                                                                    <label id="lblPDF" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                                                        <a id="mediaPDF" href="" data-id="<?= $id_proyecto ?>">
                                                                            <i class="far fa-file-pdf pdf-icon"></i>
                                                                        </a>
                                                                    </label>
                                                                <?php } ?>
                                                            </p>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                }
            }
            if ($Data_Productos_C != FALSE) {
                $count3 = 0;
                foreach ($Data_Productos_C as $row) {
                    $count3++;
                    $IdProductoC = $row->id_producto_c;
                    if ($Data_Productos_SP_C != FALSE) {
                        $count4 = 0;
                        foreach ($Data_Productos_SP_C as $row) {
                            $count4++;
                            $IdProductoSpC = $row->id_producto_sp_c;
                            if ($IdProductoC === NULL && $IdProductoSpC === NULL) { ?>
                                <div class="card prodcuts-cards">
                                    <div class="card-header collapsed-title" id="headingProdSpC<?= $row->id_producto_sp_c ?>">
                                        <table class="table" style="margin-bottom: 0;">
                                            <tbody>
                                                <tr>
                                                    <td class="no-exist">
                                                        <span>No se encuentran productos disponibles</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
        <?php }
                        }
                    }
                }
            }
        } ?>
    </div>
</div>