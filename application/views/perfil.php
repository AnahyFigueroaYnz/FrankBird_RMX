<?php
//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
$level = $this->session->userdata('nivel');
?>
<link rel="stylesheet" href="<?= base_url() ?>css/perfil.css ">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Perfil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">                    
                        <?php if ($level <= 2) { ?>
                                <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 3) { ?>
                                <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 4) { ?>
                                <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php }  else if ($level == 5) { ?>
                                <a href="<?= base_url() ?>Plataforma/DashboardAgente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } ?>
                    </li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div>
            <div class="row-perfil">
                <div class="col-sm-4" style="padding: 0rem 1rem 2rem 1rem;">
                    <?php $this->load->view('plataforma/modals/perfil-detalle'); ?>
                </div>
                <div class="col-sm-8" style="padding: 0rem 1rem 2rem 1rem;">
                    <div class="card shadow-lg tarjeta">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                            </div>
                        </nav>
                        <?php $this->load->view('plataforma/modals/perfil-edit'); ?>
                    </div>
                </div>
            </div>
        </div>