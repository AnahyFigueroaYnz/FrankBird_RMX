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
$user = $this->session->userdata('usuario');
$nombre = $this->session->userdata('nombre');
$data_ver =  $this->versiones->get_version();
$id_usuario = $this->session->userdata('id_usuario');

$version = $data_ver->version;

if ($Data_Proyectos != FALSE) {
    foreach ($Data_Proyectos as $key) {
        $NoMyProyecto = $key['NoMyProyecto'];
    }
}
if ($Data_Activos != FALSE) {
    $NoActivos = $Data_Activos->NoActivos;
}
if ($Data_Cancluidos != FALSE) {
    $NoConcluidos = $Data_Cancluidos->NoConcluidos;
}
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/dashboard.css ">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Bienvenido <?= $nombre ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <input type="hidden" id="idUsuario" value="<?= $id_usuario ?>">
        <div class="row">
            <div class="col-lg-3 col-6 dash-margins">
                <div class="small-box bg-light">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="<?= base_url() ?>Clientes/NuevoPedido" type="button" id="btnNuevoPedido" class=" bnt-circle-cl">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div>
                    <a href="<?= base_url() ?>Clientes/NuevoPedido" class="small-box-footer" type="button" id="btnNuevoPedido">Nuevo pedido <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 dash-margins">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= $NoMyProyecto ?></h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <a href="<?= base_url() ?>Clientes/MisPedidos" class="small-box-footer">Mis pedidos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 dash-margins">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $NoActivos ?></h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <a href="<?= base_url() ?>Clientes/PedidosActivos" class="small-box-footer">Pedidos activos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6 dash-margins">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $NoConcluidos ?></h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-city"></i>
                    </div>
                    <a href="<?= base_url() ?>Clientes/PedidosConcluidos" class="small-box-footer">Pedidos concluidos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 dash-margins">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-bottom: 0;"><i class="fas fa-th mr-1"></i> Ultimas cotizaciones</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0" style="display: block;">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <?php if ($Data_UltCotizaciones != FALSE) {
                                        foreach ($Data_UltCotizaciones->result() as $row) {
                                            $aRegistro = $row->a_registro;
                                            $folio = $row->folio;
                                            $totalCot = $row->suma;
                                            $nombreCot = $row->nombre_cot;
                                            $id_proyecto = encrypted_id($row->id_proyecto);
                                            $id_Cotizacion = $row->id_cotizacion;
                                            $totalCotFormat = number_format($totalCot, 2); ?>
                                            <li class="item" style="padding: 4.6px 0;">
                                                <div>
                                                    <a href="<?= base_url("Clientes/DetalleCotizacion/$id_Cotizacion") ?>" class="product-title">
                                                        <?= $nombreCot ?>
                                                        <span class="badge badge-light float-right">Proyecto - <?= $aRegistro ?>-<?= $folio ?></span>
                                                    </a>
                                                    <span class="product-description">Total: $<?= $totalCotFormat ?></span>
                                                </div>
                                            </li>
                                        <?php }
                                    } else { ?>
                                        <li class="item">
                                            <div>
                                                <span class="product-description">No se encuentran cotizaciones disponibles</span>
                                            </div>
                                        </li>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 dash-margins">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-bottom: 0;"><i class="fas fa-chart-pie mr-1"></i> Avances de proyectos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="donutCliente" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 575px;" width="575" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 dash-margins">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" style="margin-bottom: 0;"><i class="fab fa-algolia"></i> Sourcing +24 hr</h5>
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
                                            <th style="vertical-align: middle">Asesor</th>
                                            <th style="vertical-align: middle">Fecha Creacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($Data_SourcingProy != FALSE) {
                                            foreach ($Data_SourcingProy->result() as $row) {
                                                $id_proyecto = encrypted_id($row->id_proyecto);
                                                $fCr = date('d-m-Y', strtotime($row->fecha_creacion)); ?>
                                                <tr class="shadow border-row" id="tr_<?= $row->id_proyecto; ?>" style="vertical-align: middle">
                                                    <td style="vertical-align: middle">
                                                        <a href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>">
                                                            <span class="td-text"><?= $row->a_registro ?>-<?= $row->folio; ?></span>
                                                        </a>
                                                    </td>
                                                    <td style="vertical-align: middle"><span class="td-text"><?= $row->Asesor; ?></span></td>
                                                    <td style="vertical-align: middle"><span class="td-text"><?= $fCr; ?></span></td>
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
                                                $fxl = date('d-m-Y', strtotime($row->fecha_limite)); ?>
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
                                                        <span class="td-text"><?= $row->task_dash ?></span> &nbsp;
                                                        <?php if ($row->fecha_limite === '' || $row->fecha_limite === '0000-00-00' || $row->fecha_limite === null) { ?>
                                                        <?php } else { ?>
                                                            <small id="limite<?= $row->id_task_dash ?>" class="badge badge-warning"><?= $fxl ?></small>
                                                        <?php } ?>
                                                        <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                                            <small id="nocheckDate<?= $row->id_task_dash; ?>" class="badge badge-secondary nocheckDate"></small>
                                                            <small id="checkDate<?= $row->id_task_dash; ?>" class="badge badge-secondary checkDate hide-button"><?= $fx ?></small>
                                                        <?php } else { ?>
                                                            <small id="nocheckDate<?= $row->id_task_dash; ?>" class="badge badge-secondary nocheckDate hide-button"></small>
                                                            <small id="checkDate<?= $row->id_task_dash; ?>" class="badge badge-secondary checkDate"><?= $fx ?></small>
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

        <!-- Modal para agregar tareas -->
        <div class="modal fade" id="modalTask" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-task'); ?>
        </div>
        <!-- Fin modal -->

        <script src="<?= base_url(); ?>js/plataforma/dashboard.js?v=<?= $version ?>"></script>