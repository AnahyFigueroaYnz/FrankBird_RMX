<?php
    $data_ver =  $this->versiones->get_version();
    $version = $data_ver->version;
    $level = $this->session->userdata('nivel');
?>

<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Origenes y Destinos</h1>
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
                    <li class="breadcrumb-item active">Origen-Destino</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 ml-auto text-center" style="margin-top: 1rem;">
            <a type="button" href="" id="btnNuevoDestino" class="btn btn-sm btn-outline-primary btn-nuevo">
                Nuevo destino <span><i class="fas fa-plus"></i></span>
            </a>
        </div>
        <br>
        <div style="padding-bottom: 1rem;">
            <table id="tbl_destinosCotizador" class="table table-borderless responsive nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Opcion</th> <!-- id -->
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

    <!--crear destino-->
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" id="modal_nuevoDestino" tabindex="-1" role="dialog" aria-labelledby="modal_nuevo_destinoLabel" aria-hidden="true">
            <?php $this->load->view('administrador/modals/modal-destino'); ?>
        </div>
    <!--Fin modal crear-->