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

if ($Data_Productos_SP_C != FALSE) {
    $countSP = 0;
    foreach ($Data_Productos_SP_C as $row) {
        $countSP++;
        $IdProductoSpC = $row->id_producto_sp_c;
        $img = $row->img_path;
        $cantidad_sp_c = number_format($row->cantidad_sp_c, 2);

        if ($countSP > 1) {
            $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-content"';
        } else {
            $titlePord = 'class="list-group-item d-flex justify-content-between align-items-center list-prod-title"';
        } ?>
        <li <?= $titlePord ?> data-toggle="collapse" data-target="#collapse<?= $row->id_producto_sp_c ?>" aria-expanded="false" aria-controls="collapse<?= $row->id_producto_sp_c ?>">
            <span class="list-content-prod" id="heading<?= $row->id_producto_sp_c ?>"><label class="m-0 font-w"><?= $row->producto_sp_c ?></label></span>
            <span>
                <label class="m-0 font-w" style="font-size: 14px">
                    <a href="" role="button" data-toggle="collapse" data-target="#collapse<?= $row->id_producto_sp_c ?>" aria-expanded="false" aria-controls="collapse<?= $row->id_producto_sp_c ?>">
                        <i class="fas fa-chevron-down" style="font-size: 11px;"></i> Detalle
                    </a>
                </label>
            </span>
        </li>
        <div id="collapse<?= $row->id_producto_sp_c ?>" class="collapse" aria-labelledby="heading<?= $row->id_producto_sp_c ?>" data-parent="#accordCotDet">
            <div class="content-prod">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-Pedido">
                        <p class="list-Title"><strong>Datos del producto</strong></p>
                        <?php if ($img == NULL || $img == "" || $img == '') { ?>
                            <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $row->producto_sp_c ?></label></p>
                            <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $cantidad_sp_c ?> <?= $row->clave; ?></label></p>
                            <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $row->especificaciones_sp_c ?></label></p>
                        <?php } else if ($img != NULL || $img != "" || $img != '') { ?>
                            <div class="row" style="margin: 0rem;">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7" style="padding: 0rem;">
                                    <p class="list-content-prod"><strong>Producto: </strong><label class="m-0 font-w"><?= $row->producto_sp_c ?></label></p>
                                    <p class="list-content-prod"><strong>Cantidad: </strong><label class="m-0 font-w"><?= $cantidad_sp_c ?> <?= $row->clave; ?></label></p>
                                    <p class="list-content-prod"><strong>Especificaciones: </strong><label class="m-0 font-w"><?= $row->especificaciones_sp_c ?></label></p>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 text-center" style="padding: 0rem;">
                                    <p class="list-content-prod">
                                        <label id="linkImgSp<?= $row->id_producto_sp_c ?>">
                                            <a href="" id="mediaProd_SP" data-id="<?= $row->id_producto_sp_c ?>">
                                                <img id="imgSp<?= $row->id_producto_sp_c ?>" src="<?= base_url() ?><?= $img ?>" class="img-fluid img-prods">
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
                </ul>
            </div>
        </div>
<?php }
}
?>