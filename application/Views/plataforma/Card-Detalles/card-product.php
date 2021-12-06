<?php
$level = $this->session->userdata('nivel');
$this->load->library('cript');
if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $id_proyecto_uri = $row['id_proyecto'];
        $IdProyecto = $this->cript->decrypted_id($id_proyecto_uri);
        $NombrePr = $row['Nombre_proyecto'];
        $Asesor = $row['nombreAsesor'];
        $NombreCl = $row['nombreCliente'];
        $NoBL = $row['num_bl'];
        $status = $row['estado'];
        $activo_p = $row['activo_p'];
        $Restic = $row['restricciones'];
        $FracAran = $row['fracc_arancelaria'];
        $statusId = $row['id_estadoproyectos'];
    }
}
if ($DATA_STATUS != FALSE) {
    foreach ($DATA_STATUS->result() as $row) {
        $id_estadoproyectos = $row->id_estadoproyectos;
        $estado = $row->estado;
        if ($statusId == $id_estadoproyectos) {
            $status = $estado;
        }
    }
}

if ($NoBL != "" || $NoBL != null) {
    $authCode = $Data_ShipsGo;
    $searchParam = $NoBL;
    $dataApi = file_get_contents('https://shipsgo.com/api/ContainerService/GetContainerInfo/?authCode=' . $authCode . '&requestId=' . $searchParam);
    $array  = json_decode($dataApi);
    foreach ($array as $obj) {
        $ShippingLine = $obj->ShippingLine;
        $ContainerNumber = $obj->ContainerNumber;
        $ContainerTEU = $obj->ContainerTEU;
        $FromCountry = $obj->FromCountry;
        $Pol = $obj->Pol;
        $DepartureDate = $obj->DepartureDate;
        $ToCountry = $obj->ToCountry;
        $Pod = $obj->Pod;
        $ArrivalDate = $obj->ArrivalDate;
        $Vessel = $obj->Vessel;
        $VesselIMO = $obj->VesselIMO;
        $FormatedTransitTime = $obj->FormatedTransitTime;
    }
}else{
    $NoBL = null;
}
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cards.css?v=<?= $version; ?>">
<div class="card text-center shadow-lg tarjeta">
    <input type="hidden" id="txtBL" value="<?= $NoBL; ?>">
    <?php if ($NoBL != "" || $NoBL != null) { ?>
    <input type="hidden" id="txtIdProyecto" value="<?= $IdProyecto; ?>">
    <input type="hidden" id="txtShippingLine" value="<?= $ShippingLine; ?>">
    <input type="hidden" id="txtContainerNumber" value="<?= $ContainerNumber; ?>">
    <input type="hidden" id="txtContainerTEU" value="<?= $ContainerTEU; ?>">
    <input type="hidden" id="txtFromCountry" value="<?= $FromCountry; ?>">
    <input type="hidden" id="txtPol" value="<?= $Pol; ?>">
    <input type="hidden" id="txtDepartureDate" value="<?= $DepartureDate; ?>">
    <input type="hidden" id="txtToCountry" value="<?= $ToCountry; ?>">
    <input type="hidden" id="txtPod" value="<?= $Pod; ?>">
    <input type="hidden" id="txtArrivalDate" value="<?= $ArrivalDate; ?>">
    <input type="hidden" id="txtVessel" value="<?= $Vessel; ?>">
    <input type="hidden" id="txtVesselIMO" value="<?= $VesselIMO; ?>">
    <input type="hidden" id="txtFormatedTransitTime" value="<?= $FormatedTransitTime; ?>">
    <?php } ?>

    <ul class="list-group">
        <li class="list-group-item list-product" style="padding: 0.8rem 1.5rem !important;background-color: #060642 !important;color: #ffff !important;">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center card-prod-list">
                    <?php if ($level == 4) { ?>
                        <strong class="card-prod-title">Pedido</strong>
                    <?php } else { ?>
                        <strong class="card-prod-title">Proyecto</strong>
                    <?php }
                    if ($level != 4 && $level != 5 && $activo_p == 1) { ?>
                        <span>
                            <label class="m-0 font-w">
                                <a href="" type="button" id="btnEditProyecto" class="card-prod-btn" data-id="<?= $IdProyecto; ?>" data-toggle="modal" data-target="#editProduct">
                                    <i class="far fa-edit"></i>
                                </a>
                            </label>
                        </span>
                    <?php } ?>
                </li>
            </ul>
        </li>
        <li class="list-group-item list-product">
            <ul class="list-group">
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Nombre pedido</label></span>
                    <span>
                        <?php if ($NombrePr === '' || $NombrePr === null) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w"><?= $NombrePr; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Asesor</label></span>
                    <span>
                        <?php if ($Asesor === '' || $Asesor === null) { ?>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        <?php } else { ?>
                            <p class="list-Content"><label class="m-0 font-w"><?= $Asesor; ?></label></p>
                        <?php } ?>
                    </span>
                </li>
                <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                    <span class="list-Content"><label class="m-0 font-w">Estatus</label></span>
                    <span>
                        <p class="list-Content"><label class="m-0 font-w"><?= $status; ?></label></p>
                    </span>
                </li>
            </ul>
        </li>
        <li class="list-group-item list-product">
            <?php if ($statusId >= 4) { ?>
                <ul class="list-group" id="listRastreo" style="display: none;">
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Número contenedor</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 font-w" id="lblContBL"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Naviera</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContNaviera"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Buque carga</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContBuque"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 lblcont font-w">No. Viaje</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContViaje"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Puerto salida</label></span>
                        <span>
                            <p class="list-Content">
                                <label class="m-0 lblcont font-w" id="lblContPuertoS"></label>, 
                                <label class="m-0 lblcont font-w" id="lblContLuegarS"></label>
                            </p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Fecha salida</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContFechaSalida"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Puerto entrega</label></span>
                        <span>
                            <p class="list-Content">
                                <label class="m-0 lblcont font-w" id="lblContPuertoE"></label>, 
                            <label class="m-0 lblcont font-w" id="lblContLuegarE"></label>
                        </p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Fecha entrega</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContFechaLllegada"></label></p>
                        </span>
                    </li>
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Tiempo entrega</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 lblcont font-w" id="lblContTiempo"></label></p>
                        </span>
                    </li>
                    <?php if ($level != 4) { ?>
                        <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                            <span class="list-Content"><label class="m-0 font-w">Fracción A.</label></span>
                            <span>
                                <?php if ($FracAran === '' || $FracAran === null) { ?>
                                    <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                <?php } else { ?>
                                    <p class="list-Content"><label class="m-0 font-w"><?= $FracAran; ?></label></p>
                                <?php } ?>
                            </span>
                        </li>
                        <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                            <span class="list-Content"><label class="m-0 font-w">Resticciones</label></span>
                            <span>
                                <?php if ($Restic === '' || $Restic === null) { ?>
                                    <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                                <?php } else { ?>
                                    <p class="list-Content"><label class="m-0 font-w"><?= $Restic; ?></label></p>
                                <?php } ?>
                            </span>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <ul class="list-group" id="listCotiz">
                    <li class="list-group-item card-list d-flex justify-content-between align-items-center">
                        <span class="list-Content"><label class="m-0 font-w">Tiempo aproximado</label></span>
                        <span>
                            <p class="list-Content"><label class="m-0 font-w">Por definir</label></p>
                        </span>
                    </li>
                </ul>
            <?php } ?>
        </li>
    </ul>
</div>