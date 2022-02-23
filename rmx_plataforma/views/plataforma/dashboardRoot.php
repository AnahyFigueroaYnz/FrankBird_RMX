<?php
    $user = $this->session->userdata('usuario');
    $nombre = $this->session->userdata('nombre');
    $level = $this->session->userdata('nivel');
    $id_usuario = $this->session->userdata('id_usuario');

    $obj_version = $this->versiones->get_version();
    $comprobacion = 0;
    $num_controladores = 0;

    if ($data_controladores != FALSE) {
        foreach ($data_controladores->result() as $row) {
            $num_controladores++;
            if ($row->activo == 1) {
                $comprobacion++;
            }
        }
    }
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center">
                <h1 class="m-0 title-color">Bienvenido <?= $nombre ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form id="frm_status_mantenimiento_a" name="frm_status_mantenimiento_a" class="form-horizontal" method="POST" role="form">
                    <div class="row">
                        <div class="col-12 dash-margins">
                            <div class="info-box bg-gradient-light">
                                <span class="info-box-icon"><i class="fas fa-cog"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Estatus de Mantenimiento</span>
                                    <div>
                                        <?php if ($num_controladores == $comprobacion) { ?>
                                            <input id="switchAll" type="checkbox" data-toggle="switchbutton" data-onstyle="outline-success" data-offstyle="outline-danger" checked>
                                        <?php } else { ?>
                                            <input id="switchAll" type="checkbox" data-toggle="switchbutton" data-onstyle="outline-success" data-offstyle="outline-danger">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="frm_status_mantenimiento_oxo" class="form-horizontal" method="POST" role="form">
                    <div class="row">
                        <?php if ($data_controladores != FALSE) {
                            foreach ($data_controladores->result() as $row) {
                                $Id_controlador = $row->id_controlador;
                                $Controlador = $row->nombre_controlador;
                                $Activo = $row->activo; ?>
                                <div class="col-md-6 col-sm-6 col-xl-3 col-12 dash-margins">
                                    <div class="info-box" class="id_controlador<?= $Id_controlador ?>" id="<?= $Id_controlador ?>">
                                        <span class="info-box-icon bg-light">
                                            <?php if ($Id_controlador == 1) { ?>
                                                <i class="nav-icon fas fa-home"></i>
                                            <?php } else if ($Id_controlador == 2) { ?>
                                                <i class="fas fa-users"></i>
                                            <?php } else if ($Id_controlador == 3) { ?>
                                                <i class="fas fa-pager"></i>
                                            <?php } else if ($Id_controlador == 4) { ?>
                                                <i class="fas fa-user"></i>
                                            <?php } else if ($Id_controlador == 5) { ?>
                                                <i class="fas fa-user-lock"></i>
                                            <?php } ?>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?= $Controlador ?></span>
                                            <?php
                                                if ($Activo == 1) {
                                            ?>
                                                    <input id="switch<?= $Id_controlador ?>" checked data-id="<?= $Id_controlador ?>" class="switch" type="checkbox" data-toggle="switchbutton" data-onstyle="outline-success" data-offstyle="outline-danger">
                                            <?php
                                                }else if ($Activo == 0) {
                                            ?>
                                                    <input id="switch<?= $Id_controlador ?>" data-id="<?= $Id_controlador ?>" class="switch" type="checkbox" data-toggle="switchbutton" data-onstyle="outline-success" data-offstyle="outline-danger">
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-body" style="padding: 1rem;">
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3><?= $obj_version->version; ?></h3>
                                    <p class="margin-bot">Version Actual</p>
                                </div>
                            </div>
                            <form id="frm_new_version" class="form-horizontal" method="POST" role="form">
                                <div class="form-group row" style="margin-bottom: 0.3rem;">
                                    <label class="col-sm-5 col-form-label col-form-label-sm">Nueva version</label>
                                    <div class="col-sm-7">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="nueva_version" required>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-info btn-flat">></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>