<?php
function encrypted_id($id_proyecto)
{
    $key64 = "Reachmx1";
    $iv64 = "AAECAwQFBgcICQoLDA0ODw==";
    $key = base64_decode($key64, true);
    $iv = base64_decode($iv64, true);

    $search  = "/";
    $replace = "_";
    $encrypted = openssl_encrypt($id_proyecto, 'AES-256-CBC', $key, 0, $iv);

    return str_replace($search, $replace, $encrypted);
}

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/proyectos.css?v=<?=$version;?>">
<link rel="stylesheet" href="../css/detalle-proyectos.css">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Mis proyectos concluidos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/DashboardAsesor"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active">Mis proyectos concluidos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <table id="tblMisProyectos" class="table table-borderless responsive nowrap" style="width: 100%">
            <thead>
                <tr>
                    <th>#Folio</th>
                    <th>Nombre Proyecto</th>
                    <th>Fecha Orden</th>
                    <th>Estatus</th>
                    <th>Fecha Salida</th>
                    <th>Fecha Llegada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data_proy_asesor != FALSE) {
                    foreach ($data_proy_asesor->result() as $row) {
                        $id_proyecto = encrypted_id($row->id_proyecto);
                        $Date = date('d-m-Y', strtotime($row->fecha));
                        $ETD = date('d-m-Y', strtotime($row->etd));
                        $ETA = date('d-m-Y', strtotime($row->eta)); ?>
                        <tr class="shadow border-row">
                            <td style="vertical-align: middle">
                                <a id="btnDetallePy" href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>" style="margin-left: 0.5rem;">
                                    <span><?= $row->a_registro ?>-<?= $row->folio ?></span>
                                </a>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->Nombre_proyecto === '' || $row->Nombre_proyecto === null) { ?>
                                <span class="td-text">Por definir</span>
                                <?php } else { ?>
                                <span class="td-text"><?= $row->Nombre_proyecto; ?></span>
                                <?php } ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->fecha === '' || $row->fecha === null || $row->fecha === '0000-00-00') { ?>
                                <span class="td-text">Por definir</span>
                                <?php } else { ?>
                                <span class="td-text"><?= $Date; ?></span>
                                <?php } ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->id_estadoproyectos >= 1 && $row->id_estadoproyectos <= 5) { ?>
                                    <span class="badge badge-celeste"><?= $row->estado; ?></span>
                                <?php } else if ($row->id_estadoproyectos >= 6 && $row->id_estadoproyectos <= 9) { ?>
                                    <span class="badge badge-morado"><?= $row->estado; ?></span>
                                <?php } else if ($row->id_estadoproyectos >= 10 && $row->id_estadoproyectos <= 13) { ?>
                                    <span class="badge badge-verde-light"><?= $row->estado; ?></span>
                                <?php } else if ($row->id_estadoproyectos >= 14 && $row->id_estadoproyectos <= 18) { ?>
                                    <span class="badge badge-azul"><?= $row->estado; ?></span>
                                <?php } else if ($row->id_estadoproyectos >= 19 && $row->id_estadoproyectos <= 24) { ?>
                                    <span class="badge badge-verde"><?= $row->estado; ?></span>
                                <?php }?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->etd === '' || $row->etd === null || $row->etd === '0000-00-00') { ?>
                                <span class="td-text">Por definir</span>
                                <?php } else { ?>
                                <span class="td-text"><?= $ETD; ?></span>
                                <?php } ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php if ($row->eta === '' || $row->eta === null || $row->eta === '0000-00-00') { ?>
                                <span class="td-text">Por definir</span>
                                <?php } else { ?>
                                <span class="td-text"><?= $ETA; ?></span>
                                <?php } ?>
                            </td>
                            <td><span style="visibility: hidden"><?= $row->id_proyecto ?></span></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <script src="<?= base_url(); ?>js/proyectos-asesor.js?v=<?= $version ?>"></script>