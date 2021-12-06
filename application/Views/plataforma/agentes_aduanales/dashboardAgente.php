<?php
    $user = $this->session->userdata('usuario');
    $nombre = $this->session->userdata('nombre');
    $level = $this->session->userdata('nivel');
    $id_usuario = $this->session->userdata('id_usuario');
    $data_ver =  $this->versiones->get_version();
    
    $version = $data_ver->version;
    
    if ($Data_Proyectos != FALSE) {
        $NoProyAgent = $Data_Proyectos->NoProyAgent;
    }

    if ($Data_Activos != FALSE) {
        $NoProyActivoAgent = $Data_Activos->NoProyActivoAgent;
    }

    if ($Data_Cancluidos != FALSE) {
        $NoProyConclAgent = $Data_Cancluidos->NoProyConclAgent;
    }

    function encrypted_id($id_proyecto) {
        $key64 = "Reachmx1";
        $iv64 = "AAECAwQFBgcICQoLDA0ODw==";
        $key = base64_decode($key64, true);
        $iv = base64_decode($iv64, true);

        $search  = "/";
        $replace = "_";
        $encrypted = openssl_encrypt($id_proyecto, 'AES-256-CBC', $key, 0, $iv);

        return str_replace($search, $replace, $encrypted);
    }
?>

<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/dashboard.css?v=<?= $version; ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Bienvenido <?= $nombre ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/DashboardAgente"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1 class="m-0 letra text-uppercase">bienvenido <?= $nombre ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <input type="hidden" id="idUsuario" value="<?= $id_usuario ?>">
        <input type="hidden" id="idNivel" value="<?= $level ?>">
        <div class="row">
            <div class="col-lg-4 col-12 dash-margins">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $NoProyAgent ?></h3>
                        <p>Mis proyectos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <a href="<?= base_url() ?>Plataforma/Proyectos_agencia" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-12 dash-margins">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $NoProyActivoAgent ?></h3>
                        <p>Activos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <a href="<?= base_url() ?>Plataforma/ProyectosActivosAgencia" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-12 dash-margins">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $NoProyConclAgent ?></h3>
                        <p>Concluidos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-city"></i>
                    </div>
                    <a href="<?= base_url() ?>Plataforma/ProyectosConcluidosAgencia" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 dash-margins">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="margin-bottom: 0;"><i class="fab fa-algolia"></i> En Despacho +3 días</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="tblSourcings" class="table table-borderless responsive" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">#Folio</th>
                                            <th style="vertical-align: middle">Cliente</th>
                                            <th style="vertical-align: middle">Fecha Creacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($Data_DespachoProy != FALSE) {
                                            foreach ($Data_DespachoProy->result() as $row) {
                                                $id_proyecto = encrypted_id($row->id_proyecto);
                                                $fCr = date('d-m-Y', strtotime($row->fecha_creacion)); ?>
                                                <tr class="shadow border-row" id="tr_<?= $row->id_proyecto; ?>" style="vertical-align: middle">
                                                    <td style="vertical-align: middle">
                                                        <a href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>">
                                                            <span><?= $row->a_registro ?>-<?= $row->folio; ?></span>
                                                        </a>
                                                    </td>
                                                    <td style="vertical-align: middle"><span><?= $row->Cliente; ?></span></td>
                                                    <td style="vertical-align: middle"><span><?= $fCr; ?></span></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 dash-margins">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="margin-bottom: 0;"><i class="fas fa-clipboard-list"></i> Pendientes</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="tblPendientes" class="table table-borderless" style="width: 100%">
                                    <thead style="display: none;">
                                        <tr>
                                            <th></th>
                                            <th>Estatus</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($Data_Pendientes != FALSE) {
                                            foreach ($Data_Pendientes->result() as $row) {
                                                $IdTask = $row->id_task_dash;
                                                $Task = $row->task_dash;
                                                $Status = $row->estatus;
                                                $fx = date('d-m-Y', strtotime($row->fecha_cambio));
                                                $fxl = date('d-m-Y', strtotime($row->fecha_limite));?>
                                                <tr class="shadow border-row" id="tr_<?= $row->id_task_dash; ?>" style="vertical-align: middle">
                                                    <td style="vertical-align: middle">
                                                        <?php if ($row->estatus === '0') { ?>
                                                            <a id="btnNoCheck<?= $row->id_task_dash ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheck" data-id="<?= $row->id_task_dash ?>">
                                                                &nbsp;&nbsp;
                                                            </a>
                                                            <a id="btnCheck<?= $row->id_task_dash ?>" class="btn btn btn-success btn-check-af btnCheck hide-button" data-id="<?= $row->id_task_dash ?>">
                                                                <i class="fas fa-check" data-id="<?= $row->id_task_dash ?>"></i>
                                                            </a>
                                                        <?php } else if ($row->estatus === '1') { ?>
                                                            <a id="btnNoCheck<?= $IdTask ?>" class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheck hide-button" data-id="<?= $row->id_task_dash ?>">
                                                                &nbsp;&nbsp;
                                                            </a>
                                                            <a id="btnCheck<?= $row->id_task_dash ?>" class="btn btn btn-success btn-check-af btnCheck" data-id="<?= $row->id_task_dash ?>">
                                                                <i class="fas fa-check" data-id="<?= $row->id_task_dash ?>"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->task_dash ?></span>
                                                        <?php if ($row->fecha_limite === '' || $row->fecha_limite === '0000-00-00' || $row->fecha_limite === null) { ?>
                                                        <?php } else { ?>
                                                            <small id="limite<?= $row->id_task_dash ?>" class="badge badge-warning"><?= $fxl ?></small>
                                                        <?php } ?>
                                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                                            <small id="nocheckDate<?= $row->id_task_dash; ?>" class="badge badge-success nocheckDate"></small>
                                                            <small id="checkDate<?= $row->id_task_dash; ?>" class="badge badge-success checkDate hide-button"><?= $fx ?></small>
                                                        <?php } else { ?>
                                                            <small id="nocheckDate<?= $row->id_task_dash; ?>" class="badge badge-success nocheckDate hide-button"></small>
                                                            <small id="checkDate<?= $row->id_task_dash; ?>" class="badge badge-success checkDate"><?= $fx ?></small>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        <a href="" type="button" data-id="<?= $row->id_task_dash; ?>" class="editTask" style="margin-right: 10px;" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                        <a href="" type="button" data-id="<?= $row->id_task_dash; ?>" class="deleteTask trash"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <a id="btnAddTask" href="" class="btn btn-sm btn-outline-primary btn-nuevo float-right">Agregar Tarea</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para asignar y modificar agente -->
        <div class="modal fade" id="modalTask" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-task'); ?>
        </div>
        <!-- Fin modal -->