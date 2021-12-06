<?php
$level = $this->session->userdata('nivel');

$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/agencias.css?v=<?= $version; ?>">
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/agencias.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0  title-color">Agencias aduanales</h1>
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
                    <?php } else if ($level == 3) { ?>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Plataforma/DashboardAsesor"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <?php } ?>
                    <li class="breadcrumb-item active">Agencias aduanales</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ml-auto text-center" style="margin-top: 1rem;">
            <a type="button" href="" id="btnNuevaAgencia" class="btn btn-sm btn-outline-primary btn-nuevo">
                Nueva Agencia <span><i class="fas fa-plus"></i></span>
            </a>
        </div>
        <br>
        <div style="padding-bottom: 1rem;">
            <table id="tblAgenciasAduanales" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Agencia</th>
                        <th>Agente</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <?php if ($level <= 2) { ?>
                            <th class="levelAdmin"></th>
                        <?php } else { ?>
                            <th class="levelAsesor"></th>
                        <?php } ?>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($Data_agencias_aduanales != FALSE) {
                        foreach ($Data_agencias_aduanales->result() as $row) { ?>
                            <tr class="shadow border-row" id="tr_<?= $row->id_agencia ?>" name="tr_<?= $row->id_agencia ?>" style="vertical-align: middle">
                                <td style="vertical-align: middle">
                                    <a href="<?= base_url() ?>Plataforma/DetalleAgenciaAduanal/<?= $row->id_agencia ?>" style="margin-left: 0.5rem;">
                                        <span class="td-text"><?= $row->agencia; ?></span>
                                    </a>
                                </td>
                                <td style="vertical-align: middle">
                                    <?php if ($row->agente == NULL || $row->agente == '') { ?>
                                        Por definir
                                    <?php } else { ?>
                                        <span class="td-text"><?= $row->agente ?></span>
                                    <?php } ?>
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
                                <td style="vertical-align: middle">
                                    <?php if ($row->email == NULL || $row->email == '') { ?>
                                        Por definir
                                    <?php } else { ?>
                                        <span class="td-text"><?= $row->email; ?></span>
                                    <?php } ?>
                                </td>
                                <?php if ($level <= 2) { ?>
                                    <td style="vertical-align: middle" class="text-center levelAdmin">
                                        <a type="button" href="#" data-id="<?= $row->id_agencia ?>" class="eliminar_agencia" style="color: #dc3545;">
                                            <i class="far fa-trash-alt eliminar_agencia" data-id="<?= $row->id_agencia ?>" data-toggle="tooltip" data-placement="top" title="Eliminar Agencia"></i>
                                        </a>
                                    </td>
                                <?php } else { ?>
                                    <td style="visibility: hidden;" class="levelAsesor"></td>
                                <?php } ?>
                                <td><span class="td-text" style="visibility: hidden"><?= $row->id_agencia ?></span></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>

        <!--crear agencia-->
        <div class="modal fade bd-example-modal-lg" id="modal_nueva_agencia" tabindex="-1" role="dialog" aria-labelledby="modal_nueva_agenciaLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-agencia'); ?>
        </div>
        <!--Fin modal crear-->