<?php
$user = $this->session->userdata('usuario');
$nombre = $this->session->userdata('nombre');
$level = $this->session->userdata('nivel');
$id_usuario = $this->session->userdata('id_usuario');

if ($Data_Proyectos != FALSE) {
    $NoProyecto = $Data_Proyectos->NoProyecto;
}
if ($Data_Agencias != FALSE) {
    $NoAgencias = $Data_Agencias->NoAgencias;
}
if ($Data_Proveedores != FALSE) {
    $NoProveedores = $Data_Proveedores->NoProveedores;
}
if ($Data_Productos != FALSE) {
    $NoProductos = $Data_Productos->NoProductos;
}
if ($Data_Ganancias != FALSE) {
    $Ganancias = $Data_Ganancias->Ganancias;
    $gananciasFormat = number_format($Ganancias, 2);
}

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
?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>css/plataforma/dashboard.css"> -->

<link rel="stylesheet" href="<?= base_url() ?>css/dashboard.css" />
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="m-0 title-color">Bienvenido <?= $nombre ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <input type="hidden" id="idUsuario" value="<?= $id_usuario ?>">
            <input type="hidden" id="idNivel" value="<?= $level ?>">
            <div class="row">
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>1</h3>
                            <p>Proyectos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <a href="<?= base_url() ?>Plataforma/vista_admin_proyectos" class="small-box-footer">Mas
                            información
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Agencias</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <a href="<?= base_url() ?>Plataforma/agencias_aduanales" class="small-box-footer">Mas
                            información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Proveedores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?= base_url() ?>Plataforma/Proveedores" class="small-box-footer">Mas información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>33</h3>
                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <a href="<?= base_url() ?>Plataforma/vista_clientes" class="small-box-footer">Mas información <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-12 dash-margins">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>$2,800,000.00</h3>
                            <p>Ingresos del mes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a class="small-box-footer">&nbsp;</a>
                        <!-- <a href="#" class="small-box-footer">Masinfo <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 dash-margins">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0;"><i class="fas fa-th mr-1"></i>
                                        Ultimas
                                        cotizaciones</h3>
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

                                                $totalCotFormat = number_format($totalCot, 2); ?>
                                        <li class="item">
                                            <div>
                                                <a href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>"
                                                    class="product-title">
                                                    <?= $nombreCot ?>
                                                    <span class="badge badge-light float-right">Proyecto -
                                                        <?= $aRegistro ?>-<?= $folio ?></span>
                                                </a>
                                                <span class="product-description">Total: $<?= $totalCotFormat ?></span>
                                            </div>
                                        </li>
                                        <?php }
                                        } else { ?>
                                        <li class="item">
                                            <div>
                                                <span class="product-description">No se encuentran cotizaciones
                                                    disponibles</span>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 dash-margins">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0;"><i
                                            class="fas fa-chart-pie mr-1"></i>
                                        Avances de proyectos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
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
                                    <canvas id="donutAdmin"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 575px;"
                                        width="575" height="250" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 dash-margins" style="padding: 0;display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0;"><i class="fas fa-cubes"></i>Ultimos
                                        productos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="display: block;">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <?php if ($Data_UltProductos != FALSE) {
                                            foreach ($Data_UltProductos->result() as $row) {
                                                $Nombre = $row->producto;
                                                $Proveedor = $row->proveedor;
                                                $Precio = $row->precio;

                                                $precioFormat = number_format($Precio, 2); ?>
                                        <li class="item">
                                            <div>
                                                <a href="" class="product-title">
                                                    <?= $Nombre ?>
                                                    <span class="badge badge-light float-right">Precio:
                                                        $<?= $precioFormat ?></span>
                                                </a>
                                                <span class="product-description"><?= $Proveedor ?></span>
                                            </div>
                                        </li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                                <div class="card-footer text-center" style="display: block;">
                                    <a href="javascript:void(0)" class="uppercase">Ver todos los productos</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 dash-margins" style="padding: 0;display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0;">Asesores</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="display: block;">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <?php if ($Data_UltProyectos != FALSE) {
                                            foreach ($Data_UltProyectos->result() as $row) {
                                                $aRegistro = $row->a_registro;
                                                $folio = $row->folio;
                                                $nombre = $row->Nombre_proyecto;

                                                $fechaCreacion = date('d/m/Y', strtotime($row->fecha_creacion)); ?>
                                        <li class="item">
                                            <div>
                                                <a href="" class="product-title">
                                                    <?= $aRegistro ?>-<?= $folio ?>
                                                    <span
                                                        class="badge badge-light float-right"><?= $fechaCreacion ?></span>
                                                </a>
                                                <span class="product-description"><?= $nombre ?></span>
                                            </div>
                                        </li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                                <div class="card-footer text-center" style="display: block;">
                                    <a href="javascript::">Ver todos los asesores</a>
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
                                    <h5 class="card-title" style="margin-bottom: 0;"><i class="fab fa-algolia"></i>
                                        Sourcing
                                        +24 hr</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <table id="tblSourcings" class="table table-borderless responsive"
                                        style="width: 100%">
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
                                            <tr class="shadow border-row" id="tr_<?= $row->id_proyecto; ?>"
                                                style="vertical-align: middle">
                                                <td style="vertical-align: middle">
                                                    <a
                                                        href="<?= base_url("Plataforma/DetalleProyectos/$id_proyecto") ?>">
                                                        <span><?= $row->a_registro ?>-<?= $row->folio; ?></span>
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle"><span><?= $row->Asesor; ?></span>
                                                </td>
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
                                    <h5 class="card-title" style="margin-bottom: 0;"><i
                                            class="fas fa-clipboard-list"></i>
                                        Pendientes</h5>
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
                                            <tr class="shadow border-row" id="tr_<?= $row->id_task_dash; ?>"
                                                style="vertical-align: middle">
                                                <td style="vertical-align: middle">
                                                    <?php if ($row->estatus === '0') { ?>
                                                    <a id="btnNoCheck<?= $row->id_task_dash ?>"
                                                        class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheck"
                                                        data-id="<?= $row->id_task_dash ?>">
                                                        &nbsp;&nbsp;
                                                    </a>
                                                    <a id="btnCheck<?= $row->id_task_dash ?>"
                                                        class="btn btn btn-success btn-check-af btnCheck hide-button"
                                                        data-id="<?= $row->id_task_dash ?>">
                                                        <i class="fas fa-check" data-id="<?= $row->id_task_dash ?>"></i>
                                                    </a>
                                                    <?php } else if ($row->estatus === '1') { ?>
                                                    <a id="btnNoCheck<?= $IdTask ?>"
                                                        class="btn btn btn-light btn-nuevo btn-check-bf btnNoCheck hide-button"
                                                        data-id="<?= $row->id_task_dash ?>">
                                                        &nbsp;&nbsp;
                                                    </a>
                                                    <a id="btnCheck<?= $row->id_task_dash ?>"
                                                        class="btn btn btn-success btn-check-af btnCheck"
                                                        data-id="<?= $row->id_task_dash ?>">
                                                        <i class="fas fa-check" data-id="<?= $row->id_task_dash ?>"></i>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <span><?= $row->task_dash ?></span>
                                                    <?php if ($row->fecha_limite === '' || $row->fecha_limite === '0000-00-00' || $row->fecha_limite === null) { ?>
                                                    <?php } else { ?>
                                                    <small id="limite<?= $row->id_task_dash ?>"
                                                        class="badge badge-warning"><?= $fxl ?></small>
                                                    <?php } ?>
                                                    <?php if ($row->fecha_cambio === '' || $row->fecha_cambio === '0000-00-00' || $row->fecha_cambio === null) { ?>
                                                    <small id="nocheckDate<?= $row->id_task_dash; ?>"
                                                        class="badge badge-success nocheckDate"></small>
                                                    <small id="checkDate<?= $row->id_task_dash; ?>"
                                                        class="badge badge-success checkDate hide-button"><?= $fx ?></small>
                                                    <?php } else { ?>
                                                    <small id="nocheckDate<?= $row->id_task_dash; ?>"
                                                        class="badge badge-success nocheckDate hide-button"></small>
                                                    <small id="checkDate<?= $row->id_task_dash; ?>"
                                                        class="badge badge-success checkDate"><?= $fx ?></small>
                                                    <?php } ?>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <a href="" type="button" data-id="<?= $row->id_task_dash; ?>"
                                                        class="editTask" style="margin-right: 10px;"
                                                        data-toggle="modal"><i class="fas fa-edit"></i></a>
                                                    <a href="" type="button" data-id="<?= $row->id_task_dash; ?>"
                                                        class="deleteTask trash"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <a id="btnAddTask" href=""
                                        class="btn btn-sm btn-outline-primary btn-nuevo float-right">Agregar Tarea</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para asignar y modificar agente -->
            <div class="modal fade" id="modalTask" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel"
                aria-hidden="true">
                <?php $this->load->view('plataforma/modals/modal-task'); ?>
            </div>
            <!-- Fin modal -->
        </div>
    </section>
</div>
