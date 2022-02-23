<?php
$user = $this->session->userdata('usuario');
$nombre = $this->session->userdata('nombre');
$level = $this->session->userdata('nivel');
$id_usuario = 2;
$notask = 'style="display: none;"';
$tasks = 'style="display: none;"';

if ($Data_Proyectos != FALSE) {
    $Proyectos = $Data_Proyectos->proyectos;
} else {
    $Proyectos = 0;
}
if ($Data_AgenciasAd != FALSE) {
    $agencias = $Data_AgenciasAd->agencias;
} else {
    $agencias = 0;
}
if ($Data_Proveedores != FALSE) {
    $proveedores = $Data_Proveedores->proveedores;
} else {
    $Proveedores = 0;
}
if ($Data_Ganancias != FALSE) {
    $ganancias = $Data_Ganancias->ganancias;
    $gananciasFormat = number_format($ganancias, 2);
} else {
    $gananciasFormat = '0.00';
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

if ($Data_Tareas != FALSE) {
    $tasks = 'style="display: block;"';
    $notask = 'style="display: none;"';
} else {
    $tasks = 'style="display: none;"';
    $notask = 'style="display: block;"';
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="m-0 title-color">Bienvenido Usuario</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <input type="hidden" id="txtIdUsuario" value="<?= $id_usuario ?>">
            <div class="row">
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-light">
                        <div class="overlay">
                            <i class="fas fa-3x fa-plus" style="color: #3eb058;"></i>
                        </div>
                        <div class="inner">
                            <h3>&nbsp;</h3>
                            <p>&nbsp;</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: #228e3b;">Nuevo pedido <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $Proyectos ?></h3>
                            <p>Proyectos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-archive"></i>
                        </div>
                        <a href="<?= base_url() ?>Proyectos" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $agencias ?></h3>
                            <p>Proveedores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="<?= base_url() ?>Proveedores" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 dash-margins">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= $proveedores ?></h3>
                            <p>Agencias</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <a href="<?= base_url() ?>Agencias" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-12 dash-margins">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>$<?= $gananciasFormat ?></h3>
                            <p>&nbsp;</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a class="small-box-footer">Ingresos del mes</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7 dash-margins">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0"><i class="fas fa-comments-dollar"></i>Ultimas cotizaciones</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <?php if ($Data_Ultimas_Cotizaciones != FALSE) {
                                            foreach ($Data_Ultimas_Cotizaciones->result() as $row) {
                                                $id_proyecto = encrypted_id($row->id_proyecto);

                                                $p_folio = $row->p_folio;
                                                $p_registro = $row->p_registro;

                                                $folio = $row->folio;
                                                $id_cot = $row->id_cotizacion;

                                                $totalCot = number_format($row->suma, 2); ?>
                                                <li class="item">
                                                    <div>
                                                        <a href="<?= base_url(); ?>" class="product-title">C<?= $id_cot; ?>_<?= $folio; ?>
                                                            <span class="badge badge-light float-right">Proyecto <?= $p_registro; ?>-<?= $p_folio; ?></span>
                                                        </a>
                                                        <span class="product-description">Total: $<?= $totalCot ?></span>
                                                    </div>
                                                </li>
                                            <?php }
                                        } else { ?>
                                            <li class="item">
                                                <div class="text-center">
                                                    <span class="product-description">No se encuentran cotizaciones disponibles</span>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 dash-margins">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-bottom: 0"><i class="fas fa-chart-pie mr-1"></i> Avances proyectos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="divGraph" class="card-body text-center pt-4 pb-0 px-4"></div>
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
                                    <h5 class="card-title" style="margin-bottom: 0"><i class="far fa-clock"></i>Sourcing +24 hr</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                        <table id="tblSourcings" class="table row-border table-hover responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th data-priority="0"></th>
                                                    <th data-priority="4" class="noVisible"></th>
                                                    <th data-priority="1">Proyecto</th>
                                                    <th data-priority="2">Fecha creación</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dash-margins">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title" style="margin-bottom: 0"><i class="fas fa-clipboard-list"></i> <span class="letra"> Tareas</span>
                                    </h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block">
                                    <div class="border-0 card-header p-0 text-right" style="margin-bottom: -35px;">
                                        <a href="" class="newTask">Agregar Tarea</a>
                                    </div>
                                    <div id="dvNoTasks" class="card-body text-center pt-5 pb-0 px-4" <?= $notask; ?>>
                                        <p>No se encuentran tareas disponibles</p>
                                    </div>
                                    <div id="dvTasks" class="card-body text-center pt-3 px-0" <?= $tasks; ?>>
                                        <table id="tblTareas" class="table row-border table-hover responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th data-priority="0"></th>
                                                    <th data-priority="4" class="noVisible"></th>
                                                    <th data-priority="1"></th>
                                                    <th data-priority="2"></th>
                                                    <th data-priority="3" class="row-icons"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($Data_Tareas != FALSE) {
                                                    foreach ($Data_Tareas->result() as $row) {
                                                        $estatus = $row->estatus;
                                                        $id_task = $row->id_task_dash;
                                                        $task_dash = $row->task_dash;
                                                        $fecha_limite = date('d-m-Y', strtotime($row->fecha_limite));
                                                        $fecha_cambio = date('d-m-Y', strtotime($row->fecha_cambio));

                                                        if ($estatus == 0) {
                                                            $edit = '';
                                                            $show = 'hide-button';
                                                            $limit = 'badge-info';
                                                            $ckicon = '  ';
                                                            $check = 'btn-light btn-bf';
                                                            $style = 'style="font-weight: 400; text-decoration: none;"';
                                                        } else {
                                                            $show = '';
                                                            $edit = 'hide-button';
                                                            $limit = 'badge-secondary';
                                                            $check = 'btn-success btn-af';
                                                            $ckicon = '<i class="fas fa-check"></i>';
                                                            $style = 'style="font-weight: 600; text-decoration: line-through;"';
                                                        }

                                                ?>
                                                        <tr class="align-td">
                                                            <td class="align-td"></td>
                                                            <td class="visible-td"><?= $id_task; ?></td>
                                                            <td class="align-td">
                                                                <a id="btnCheck_<?= $id_task; ?>" class="btn btn-task <?= $check; ?>" data-id="<?= $id_task; ?>"><?= $ckicon; ?></a>
                                                            </td>
                                                            <td class="align-td text-left">
                                                                <span id="task_<?= $id_task; ?>" class="badget-task" <?= $style; ?>><?= $task_dash; ?></span><span>&nbsp;&nbsp;</span>
                                                                <small id="limiteDate_<?= $id_task; ?>" class="badge <?= $limit; ?> badge-task"><?= $fecha_limite; ?></small>
                                                                <small id="checkDate_<?= $id_task; ?>" class="badge badge-success badge-task <?= $show; ?>"><?= $fecha_cambio; ?></small>
                                                            </td>
                                                            <td class="align-td">
                                                                <a href="" type="button" class="editTask <?= $edit; ?>" data-id="<?= $id_task; ?>"><i class="fas fa-edit"></i></a>
                                                                <a href="" type="button" class="trashCan" data-id="<?= $id_task; ?>"><i class="far fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalTask" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="titleModal" class="modal-title title-color">Nuevo pendiente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form class="form-horizontal" id="agregarPendiente">
                                <input type="hidden" id="idTask" value="0" />
                                <div class="modal-body p-0">
                                    <div class="card-body cards-productos pb-0">
                                        <div class="form-group">
                                            <label class="font-weight-normal">Pendiente</label>
                                            <input required id="txtTask" type="text" class="form-control form-control-border" placeholder="Agregar documentos">
                                            <div id="val_txtTask" class="valid-inputs" style="display: none">Debe ingresar
                                                el pendiente</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-normal">Fecha Limite</label>
                                            <input required="" id="txtDate" type="date" max="3000-12-31" min="1950-01-01" class="form-control form-control-border" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask />
                                            <div id="val_txtDate" class="valid-inputs" style="display: none">Debe ingresar
                                                una fecha limite</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo addTask" id="btn-task">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>