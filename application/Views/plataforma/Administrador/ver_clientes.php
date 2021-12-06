<?php
$level = $this->session->userdata('nivel');
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/admin/clientes.css?v=<?= $version; ?>">
<link rel="stylesheet" href="<?= base_url() ?>css/detalle-proyectos.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Clientes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php if ($level == 1) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Mantenimiento/DashboardRoot"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } else if ($level == 2) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Plataforma/DashboardAdministrador"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } ?>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section class="content">
    <div class="container-fluid">
        <br>
        <div style="padding-bottom: 1rem;">
            <table id="tbl_clientes" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data_clientes != FALSE) {
                        foreach ($data_clientes->result() as $row) { ?>
                            <tr class="shadow border-row" id="tr_<?= $row->id_usuario ?>" name="tr_<?= $row->id_usuario ?>">
                                <td style="vertical-align: middle">
                                    <a href="<?= base_url("Plataforma/DetalleUsuario/$row->id_usuario") ?>">
                                        <span class="td-text"><?= $row->nombre; ?></span>
                                    </a>
                                </td>
                                <td style="vertical-align: middle">
                                    <span class="td-text"><?= $row->email; ?></span>
                                </td>
                                <td style="vertical-align: middle">
                                    <?php if (($row->abrev == NULL || $row->abrev == '') && ($row->telefono == NULL || $row->telefono == '')) { ?>
                                        <span class="td-text">Por definir</span>
                                    <?php } else if (($row->abrev == NULL || $row->abrev == '') && ($row->telefono != NULL || $row->telefono != '')) { ?>
                                        <span class="td-text"><?= $row->telefono; ?></span>
                                    <?php } else if (($row->abrev != NULL || $row->abrev != '') && ($row->telefono != NULL || $row->telefono != '')) { ?>
                                        <span class="td-text"><?= $row->abrev; ?> <?= $row->telefono; ?></span>
                                    <?php } ?>
                                </td>
                                <td><span class="td-text" style="visibility: hidden"><?= $row->id_usuario ?></span></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>