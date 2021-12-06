<?php
if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $NombreProyecto = $row['Nombre_proyecto'];
        $Destino = $row['destino'];
        $Envio = $row['tipo_envio'];
        $Comentarios = $row['comentarios'];
        $IdCliente = $row['id_cliente'];
        $NombreCliente = $row['nombreCliente'];
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
?>
<div class="card-header borders-card">
    <h4 style="margin-bottom: 0;">Detalle</h4>
</div>
<div class="card-body" style="padding-bottom: 0rem;">
    <form class="form-horizontal">
        <div class="form-group row">
            <div class="col-md-6">
                <label class="font-weight-bold detalle-base-lable">Nombre Proyecto</label>
                <?php if ($NombreProyecto == '' || $NombreProyecto == null) { ?>
                    <p class="font-weight-light detalle-base-p">Por definir</p>
                <?php } else { ?>
                    <p class="font-weight-light detalle-base-p"><?= $NombreProyecto ?></p>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <label class="font-weight-bold detalle-base-lable">Cliente</label>
                <p class="font-weight-light detalle-base-p"><?= $NombreCliente ?></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="font-weight-bold detalle-base-lable" for="order">Envio</label>
                <p class="font-weight-light detalle-base-p"><?= $Envio ?></p>
            </div>
            <div class="col-md-6">
                <label class="font-weight-bold detalle-base-lable" for="order">Comentarios</label>
                <p class="font-weight-light detalle-base-p"><?= $Comentarios ?></p>
            </div>
        </div>
    </form>
</div>