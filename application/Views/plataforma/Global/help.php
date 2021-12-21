<?php
$level = $this->session->userdata('nivel');
?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Preguntas frecuentes - Ayuda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <?php if ($level == 1) { ?>
                            <a href="<?= base_url() ?>Mantenimiento/DashboardRoot"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 2) { ?>
                            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 3) { ?>
                            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 4) { ?>
                            <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } else if ($level == 5) { ?>
                            <a href="<?= base_url() ?>Plataforma/DashboardAgente"><i class="nav-icon fas fa-home"></i> Home</a>
                        <?php } ?>
                    </li>
                    <li class="breadcrumb-item active">Preguntas frecuentes - Ayuda</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div style="padding: 0rem 2rem 1rem 2rem;">
            <div style="padding: 2rem;"></div>
        </div>