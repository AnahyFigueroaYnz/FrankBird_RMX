<?php
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);

if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $oem_path = $row['oemservice_path'];
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

if ($Data_Productos_C != FALSE) {
    $countP = 0;
    foreach ($Data_Productos_C as $row) {
        $countP++;
        $archivo_invoice = $row->invoice_path;
        $img = $row->img_path;
        $cantidad_proveedor_c = number_format($row->cantidad_proveedor_c, 2);
        $extension = new SplFileInfo($archivo_invoice);
        $ext = $extension->getExtension();
        $path_parts = pathinfo($archivo_invoice);
        $filename = $path_parts['filename'];

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

        if ($countP > 1) {
            $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-content"';
        } else {
            $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-title"';
        } ?>
        <li <?= $titlePord ?> data-toggle="collapse" data-target="#collapse<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapse<?= $row->id_producto_c ?>">
            <span class="list-content-prod" id="heading<?= $row->id_producto_c ?>"><label class="m-0 font-w"><?= $row->producto_proveedor_c ?></label></span>
            <span>
                <label class="m-0 font-w" style="font-size: 14px">
                    <a href="" role="button" data-toggle="collapse" data-target="#collapse<?= $row->id_producto_c ?>" aria-expanded="false" aria-controls="collapse<?= $row->id_producto_c ?>">
                        <i class="fas fa-chevron-down" style="font-size: 11px;"></i> Detalle
                    </a>
                </label>
            </span>
        </li>
        <div id="collapse<?= $row->id_producto_c ?>" class="collapse" aria-labelledby="heading<?= $row->id_producto_c ?>" data-parent="#accordCotDet">
            <div class="content-prod-cot">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-Pedido">
                        <p class="list-Title"><strong>Datos del producto</strong></p>
                        <?php if ($img == NULL || $img == "" || $img == '') { ?>
                            <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $row->producto_proveedor_c ?></label></p>
                            <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $cantidad_proveedor_c ?> <?= $row->clave; ?></label></p>
                            <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $row->especificaciones_prod_c ?></label></p>
                        <?php } else if ($img != NULL || $img != "" || $img != '') { ?>
                            <div class="row" style="margin: 0rem;">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding: 0rem;">
                                    <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $row->producto_proveedor_c ?></label></p>
                                    <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $cantidad_proveedor_c ?> <?= $row->clave; ?></label></p>
                                    <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $row->especificaciones_prod_c ?></label></p>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                    <p class="list-content-prod">
                                        <label id="linkImgP<?= $row->id_producto_c ?>">
                                            <a href="" id="mediaProd_P" data-id="<?= $row->id_producto_c ?>">
                                                <img id="imgP<?= $row->id_producto_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid img-prods">
                                            </a>
                                        </label>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </li>
                    <?php if ($row->color_oem != "") { ?>
                        <li class="list-group-item list-Pedido">
                            <p class="list-Title"><strong>Personalización del producto</strong></p>
                            <p class="list-content-prod"><strong>Color: </strong><label class="m-0 font-w"><?= $row->color_oem ?></label> <i class="fas fa-circle" style="color: <?= $row->color_oem ?>"></i></p>
                            <?php if ($oem_path != NULL || $oem_path != "") { ?>
                                <p class="list-content-prod"><strong>Logotipo: </strong>
                                    <a id="mediaOEM" data-id="<?= $id_proyecto ?>" <?= $imgicons ?> href="">
                                        <i class="fas fa-image img-icon"></i>
                                    </a>
                                    <a id="mediaOEM" data-id="<?= $id_proyecto ?>" <?= $pdficons ?>>
                                        <i class="far fa-file-pdf pdf-icon"></i>
                                    </a>
                                </p>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    <li class="list-group-item list-Pedido">
                        <p class="list-Title"><strong>Datos del proveedor</strong></p>
                        <p class="list-content-prod"><strong>Proveedor: </strong><label class="m-0 font-w nameProveedor"><?= $row->proveedor ?></label></p>
                        <p class="list-content-prod"><strong>Persona Contacto: </strong><label class="m-0 font-w"><?= $row->contacto ?></label></p>
                        <p class="list-content-prod"><strong>Correo: </strong><label class="m-0 font-w"><?= $row->email ?></label></p>
                        <?php if ($row->telefono != "") { ?>
                            <p class="list-content-prod"><strong>Teléfono: </strong>
                                <label class="m-0 font-w"><?= $row->abrev ?> <?= $row->telefono; ?></label>
                            </p>
                        <?php }
                        if ($row->direccion != "") { ?>
                            <p class="list-content-prod"><strong>Liga página: </strong>
                                <label class="m-0 font-w"><a href="<?= $row->direccion ?>" target="_blank"><?= $row->direccion ?></a></label>
                            </p>
                        <?php }
                        if ($archivo_invoice != NULL || $archivo_invoice != "") { ?>
                            <p class="list-content-prod"><strong>No. de factura: </strong>
                                <a id="mediaProv" <?= $imgIcon ?> data-id="<?= $row->id_producto_c ?>" href="">
                                    <i class="fas fa-image img-icon"></i>
                                </a>
                                <a id="mediaProv" <?= $pdfIcon ?> data-id="<?= $row->id_producto_c ?>">
                                    <i class="far fa-file-pdf pdf-icon"></i>
                                </a>
                                <a href="<?= base_url() ?><?= $archivo_invoice ?>" <?= $excelIcon ?> data-id="<?= $row->id_producto_c ?>" download="<?= $filename ?>">
                                    <i class="far fa-file-excel excel-icon"></i>
                                </a>
                            </p>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
<?php }
} ?>