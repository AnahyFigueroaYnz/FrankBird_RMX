<?php
    $data_ver =  $this->versiones->get_version();
    $version = $data_ver->version;
    $level = $this->session->userdata('nivel');
    if ($DATA_TCAMBIO != FALSE) {
        $cambio = $DATA_TCAMBIO->tipo_cambio;
    }
?>
<style type="text/css">
    .btnTcambio{
        border: 1px solid #ced4da;
        border-left: 0px;
    }
</style>
<input type="hidden" value="<?= base_url() ?>" id="LogBaseURL">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Tarifario</h1>
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
                    <li class="breadcrumb-item active">Tarifario</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 form-group" style="margin-top: 1rem; margin-left: 1.5rem;">
                <label for="txtTipoCambioTarifas">Tipo de cambio</label>
                <div class="input-group mb-3">
                    <input id="txtTipoCambioTarifas" placeholder="<?= $cambio;?>" type="text" class="form-control" aria-label="Tipo de cambio" aria-describedby="basic-addon2" style="border-right: 0px;">
                    <div class="input-group-append">
                        <button class="btn btnTcambio btn-outline-secondary" id="btnTipoCambio"><i class="fas fa-check" style="color: green;"></i></button>
                    </div>
                    <div id="divVal_TipoCambio" style="display: none;"><span style="font-size: 12px; color: #677294">Ingresar tipo de cambio para actualizarlo</span></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ml-auto text-center" style="margin-top: 3rem;">
                <a type="button" href="" id="btnNuevaTarifa" class="btn btn-outline-primary btn-nuevo">
                    Nueva tarifa <span><i class="fas fa-plus"></i></span>
                </a>
            </div>
        </div>
        <br>
        <div style="padding-bottom: 1rem;">
            <table id="tblTarifas" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Tipo</th>
                        <th>Mov</th>
                        <th>T. aerea</th>
                        <th>Lcl</th>
                        <th>20 Ft</th>
                        <th>40 Ft</th>
                        <th>40 Hq</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

    <!--crear/editar tarifa-->
        <div class="modal fade bd-example-modal-lg" id="modal_nuevaTarifa" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal_nuevaTarifaLabel" aria-hidden="true">
            <?php $this->load->view('administrador/modals/modal-tarifas'); ?>
        </div>
    <!--Fin modal crear-->