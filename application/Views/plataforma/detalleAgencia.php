<?php
$level = $this->session->userdata('nivel');

if ($Data_detalle_agencia != FALSE) {
    foreach ($Data_detalle_agencia->result() as $row) {
        $id_agencia = $row->id_agencia;
        $agencia = $row->agencia;
        $agente = $row->agente;
        $email = $row->email;
        $telefono = $row->telefono;
        $honorarios = $row->honorarios;
        $revalidacion = $row->revalidacion;
        $complementarios = $row->complementarios;
        $previo = $row->previo;
        $maniobras_puerto = $row->maniobras_puerto;
        $desconsolidacion = $row->desconsolidacion;
    }
}

//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/agencias.css ">
<link rel="stylesheet" href="<?= base_url() ?>css/plataforma/agencias.css ">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 letra text-uppercase">Detalles Agencia</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Plataforma/agencias_aduanales">Agencias Aduanales</a>
                    </li>
                    <li class="breadcrumb-item active">Detalles Agencia</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>

<div class="col-12 ml-auto text-right" style="margin-top: 3.2px;">
    <button type="button" id="btnNuevoPuerto" class="btn btn-sm btn-outline-primary btn-nuevo add_puerto" data-id="<?= $row->id_agencia ?>">
        Nuevo Puerto <span><i class="fas fa-plus"></i></span>
    </button>
    <?php if($level <= 2){?>
    <button type="button" id="btnNuevoAgente" class="btn btn-sm btn-outline-primary btn-nuevo " data-id="<?= $row->id_agencia ?>">
        Nuevo Agente <span><i class="fas fa-plus"></i></span>
    </button>
    <?php }?>
</div>
<br>
<section class="content">
    <div class="container-fluid">
        <div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body" style="padding-bottom: 0rem;">
                        <div class="row">
                            <div class="col-8">
                                <p style=" font-size: 14px;" class="font-weight-bold text-uppercase"><?= $agencia; ?></p>
                            </div>
                            <div class="col-2 ml-auto text-right margin-edit">
                                <a href="" class="editAgencia" type="button" data-id="<?= $row->id_agencia ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <form class="margin-details">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Correo
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $email; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Contacto
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $agente; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Teléfono
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        <?= $telefono; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Honorarios
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $honorarios ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Revaldación
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $revalidacion ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Complementarios
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $complementarios; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Previo
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $previo; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Maniobras puerto
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $maniobras_puerto; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <label for="ShipmentName" style="margin-bottom: 0rem;" class="font-weight-bold">
                                        Desconsolidación
                                    </label>
                                    <p for="ShipmentName" style="font-size: 14px;" class="font-weight-light">
                                        $<?= $desconsolidacion; ?>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 1rem">
                <div class="card shadow-lg tarjeta">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home_tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Puertos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agentes</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <table id="tblPuertosAgencia" class="table table-borderless responsive nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Puerto</th>
                                            <th>Clave</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($Data_puertos != FALSE) {
                                            foreach ($Data_puertos->result() as $row) { ?>
                                                <tr class="shadow border-row" id="tr_<?= $row->id_transporte; ?>" name="tr_<?= $row->id_transporte; ?>">
                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->transporte; ?></span>
                                                    </td>

                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->clave; ?></span>
                                                    </td>
                                                    <td style="vertical-align: middle; text-align: center">
                                                        <a type="button" href="" data-id="<?= $row->id_transporte; ?>" class="edit_puerto" title="Modificar puerto" data-toggle="tooltip" data-placement="top">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <?php
                                                        if ($level <= 2) {
                                                        ?>
                                                            <a type="button" href="" data-id="<?= $row->id_transporte; ?>" class="eliminar_puerto" style="color: #dc3545;" title="Eliminar puerto" data-toggle="tooltip" data-placement="top">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                <table id="tblAgentes" class="table table-borderless responsive nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($Data_agentes != FALSE) {
                                            foreach ($Data_agentes->result() as $row) { ?>
                                                <tr class="shadow border-row" id="tr_<?= $row->id_usuario; ?>" name="tr_<?= $row->id_usuario; ?>">
                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->nombre; ?></span>
                                                    </td>

                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->email; ?></span>
                                                    </td>
                                                    <td style="vertical-align: middle">
                                                        <span><?= $row->abrev . ' ' . $row->telefono; ?></span>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 1rem">
            </div>
        </div>

        <!--Editar agencia-->
        <div class="modal fade" id="modal_add_editAgencia" tabindex="-1" role="dialog" aria-labelledby="modal_add_editAgenciaLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-agencia_editar'); ?>
        </div>
        <!--Fin modal editar-->

        <!-- Modal para editar puerto -->
        <div class="modal fade" id="modal_puerto" tabindex="-1" role="dialog" aria-labelledby="modal_puertoLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-puerto'); ?>
        </div>
        <!--Fin modal editar-->

        <!--Crear agente-->
        <div class="modal fade" id="modal_add_agente" tabindex="-1" role="dialog" aria-labelledby="modal_add_agenteLabel" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal_crear_agente'); ?>
        </div>
        <!--Fin modal crear-->