<?php
$level = $this->session->userdata('nivel');
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);

if ($Data_Proyecto != FALSE) {
  foreach ($Data_Proyecto as $row) {
    $activo_p = $row['activo_p'];
    $status = $row['id_estadoproyectos'];
    $bl = $row['num_bl'];
  }
}

$cot = false;
if ($Data_Cotizacion != FALSE) {
  $cot = true;
}
//variable provisional para hacer en funcion de la variable que tomara en cuenta la api
// $ContainerNumber = $bl;  //NULL
?>
<link rel="stylesheet" href="<?= base_url() ?>css/detalle-proyectos.css">
<link rel="stylesheet" href="<?= base_url() ?>css/cards.css">
<input type="hidden" id="ContainerNumber" value="<?= $bl ?>">
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color">Panel Proyecto
                    <?php if ($activo_p == 2) {
            echo " (Concluido)";
          } else if ($activo_p == 0) {
            echo " (Eliminado)";
          } ?>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= base_url() ?>Dashboard"><i class="nav-icon fas fa-home"></i> Home</a>
          </li>
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>Plataforma/Proyectos">Proyectos</a>
            </li>
          <li class="breadcrumb-item active">Panel Proyecto</li>
        </ol>
      </div>
    </div>
</section>
<br>

<section class="content">
    <div class="container-fluid">
        <div>
            <div class="scroller scroller-left">
                <i class="fas fa-angle-double-left scroller-arrows"></i>
            </div>
            <div class="scroller scroller-right">
                <i class="fas fa-angle-double-right scroller-arrows"></i>
            </div>
            <div class="wrapper-tabs">
                <nav class="nav nav-tabs list" id="myTab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-Detalless-tab" data-target="#nav-Detalles" href=""
                        role="tab" data-toggle="tab" aria-controls="nav-Detalles" aria-selected="true"
                        data-id="<?= $id_proyecto ?>">Detalles</a>
                    <a class="nav-item nav-link nav-Checklist" id="nav-Checklist-tab" data-target="#nav-Checklist"
                        href="" role="tab" data-toggle="tab" aria-controls="nav-Checklist" aria-expanded="false"
                        data-id="<?= $id_proyecto ?>">Checklist</a>
                    <a class="nav-item nav-link" id="nav-Documentos-tab" data-target="#nav-Documentos" href=""
                        role="tab" data-toggle="tab" aria-controls="nav-Documentos" aria-selected="false"
                        data-id="<?= $id_proyecto ?>">Documentos</a>

                </nav>
            </div>
            <div style="width: 100%">
                <input type="hidden" id="IdProy" value="<?= $id_proyecto ?>">
                <input type="hidden" id="baseURL" value="<?= base_url(); ?>">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-Detalles" role="tabpanel"
                        aria-labelledby="nav-Detalles-tab">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12">
                                <div class="card shadow-cards tarjeta" style="margin-bottom: 1rem">
                                    <div class="card tarjeta-form" style="border-bottom: transparent;">
                                        <?php $this->load->view('plataforma/asesor/proyectos/tabs/detalleForm'); ?>
                                        <br>
                                        <?php $this->load->view('plataforma/asesor/proyectos/tabs/products'); ?>
                                    </div>
                                </div>
                                <?php
                if ($comprobar_coordenadas != false && $bl == NULL) {
                  $this->load->view('plataforma/asesor/proyectos/tabs/mapa');
                } else if ($bl != NULL) {
                ?>

                                <div class="card shadow-cards tarjeta">
                                    <div class="card-header">
                                        <p class="card-title m-0"><i class="fas fa-map-marker-alt title-color"></i>
                                            Ubicación de tu pedido</p>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body p-0" style="display: block;">
                                        <iframe src="" id="IframeShipsgoLiveMap"
                                            style="height: 300px;width: 100%;border-radius: 0rem 0rem 1rem 1rem;"></iframe>
                                    </div>
                                </div>


                                <?php
                }
                ?>
                            </div>
                            <br>
                            <div class="col-lg-5 col-md-5 col-12">
                                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                                <?php if ($status >= 5) { ?>
                                <br>
                                <?php $this->load->view('plataforma/card-detalles/card-costs'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Cotiza" role="tabpanel" aria-labelledby="nav-Cotiza-tab">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12 card-right">
                                <div class="card shadow-cards tarjeta" style="margin-bottom: 1rem">
                                    <div class="card tarjeta-form" style="border-bottom: transparent;">
                                        <?php $this->load->view('plataforma/asesor/proyectos/tabs/cotizaciones'); ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-5 col-md-5 col-12 card-left">
                                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                                <?php if ($status >= 5) { ?>
                                <br>
                                <?php $this->load->view('plataforma/card-detalles/card-costs'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Checklist" role="tabpanel" aria-labelledby="nav-Checklist-tab">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12 card-right">
                                <?php $this->load->view('plataforma/asesor/proyectos/tabs/checklist'); ?>
                            </div>
                            <br>
                            <div class="col-lg-5 col-md-5 col-12 card-left">
                                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                                <?php if ($status >= 5) { ?>
                                <br>
                                <?php $this->load->view('plataforma/card-detalles/card-costs'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-CalculoCostos" role="tabpanel"
                        aria-labelledby="nav-CalculoCostos-tab">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12 card-right">
                                <div class="card shadow-cards tarjeta">
                                    <div class="card tarjeta-form" style="border-bottom: transparent;">
                                        <?php $this->load->view('plataforma/asesor/proyectos/tabs/calculo'); ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-5 col-md-5 col-12 card-left">
                                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                                <?php if ($status >= 5) { ?>
                                <br>
                                <?php $this->load->view('plataforma/card-detalles/card-costs'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Documentos" role="tabpanel" aria-labelledby="nav-Documentos-tab">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12 card-right">
                                <div class="card shadow-cards tarjeta" style="margin-bottom: 1rem">
                                    <div class="card tarjeta-form" style="border-bottom: transparent;">
                                        <?php $this->load->view('plataforma/asesor/proyectos/tabs/documnts'); ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-5 col-md-5 col-12 card-left">
                                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                                <?php if ($status >= 5) { ?>
                                <br>
                                <?php $this->load->view('plataforma/card-detalles/card-costs'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modales -->
        <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-import'); ?>
        </div>

        <div class="modal fade" id="modalProveedores" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-proveedores'); ?>
        </div>

        <div class="modal fade" id="modal_nuevoProvCal" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-prov-prod-cotizacion'); ?>
        </div>

        <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-cantidades'); ?>
        </div>

        <div class="modal fade" id="modalAgencia" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-agencias'); ?>
        </div>

        <div class="modal fade" id="modalEditarAgencia" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-editarAgencia'); ?>
        </div>

        <div class="modal fade" id="modalOemService" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-oem'); ?>
        </div>

        <div class="modal fade" id="modalInvoice" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-invoice'); ?>
        </div>

        <div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-cotizacion'); ?>
        </div>

        <div class="modal fade" id="modalDocumentos" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-documentos'); ?>
        </div>

        <div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-comentario'); ?>
        </div>

        <div class="modal fade" id="modalBL" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"
            data-backdrop="static">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-bl'); ?>
        </div>

        <div class="modal fade" id="modalDone" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"
            data-backdrop="static">
            <?php $this->load->view('plataforma/asesor/proyectos/modals/modal-done'); ?>
        </div>

        <div class="modal fade" id="modal_pago" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/modals/modal-pago'); ?>
        </div>
        <!-- Fin Modales -->
    </div>
</section>

<script src="<?= base_url(); ?>js/plataforma/cotizacion.js"></script>
<script src="<?= base_url(); ?>js/plataforma/checklist.js"></script>
<script src="<?= base_url(); ?>js/plataforma/detalle.js"></script>
<script src="<?= base_url(); ?>js/plataforma/rastreo.js"></script>

<!-- Script para api google maps, funcion de init en plataforma.js, incluye mapa y autollenado -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYqGCtJ6iT0S49ACAg-yo8Sf-KTaoa614&callback=initMap&libraries=places&v=weekly"
    async></script>

<script type="text/javascript">
//GOOGLE MAPS
let map;
let service;
let infowindow;

function initMap() {
    // Create the search box and link it to the UI element.
    const input = document.getElementById("txt_latitud");
    const searchBox = new google.maps.places.SearchBox(input);
    const inputContainer = document.getElementById("ContainerNumber");

    //Crea el mapa con el marcador para la fabrica
    if (input.value != "" && (inputContainer.value === null || inputContainer.value === "")) {
        //mostrar mapa con direccion
        const sydney = new google.maps.LatLng(-33.867, 151.195);
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById("mapa"), {
            center: sydney,
            zoom: 15,
        });
        const request = {
            // query: "No. 18, Guanghua Road, Luzhou District, Nuevo Taipéi, Taiwán",
            query: $("#inpt_direccion").val(),
            fields: ["name", "geometry"],
        };
        service = new google.maps.places.PlacesService(map);
        service.findPlaceFromQuery(request, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK && results) {
                for (let i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
                map.setCenter(results[0].geometry.location);
            }
        });
    }
}

function createMarker(place) {
    if (!place.geometry || !place.geometry.location) return;
    const marker = new google.maps.Marker({
        map,
        position: place.geometry.location,
    });
    google.maps.event.addListener(marker, "click", () => {
        infowindow.setContent(place.name || "");
        infowindow.open(map);
    });
}


//SHIPSGO

if (window.addEventListener) {
    window.addEventListener("message", ShipsgoMessagesListener);
}

function ShipsgoMessagesListener() {
    if (event.data.Action === "LoadNewContainerCode") {
        document.getElementById("IframeShipsgoLiveMap").src = "https://shipsgo.com/iframe/where-is-my-container/" +
            event.data.Parameters.ContainerCode;
    }
}

var urlParams = new URLSearchParams(window.location.search);
var defaultQuery = $("#ContainerNumber").val();
if (defaultQuery === undefined || defaultQuery === null) {
    defaultQuery = "default-container-code";
}
$("#IframeShipsgoLiveMap").attr("src", "https://shipsgo.com/iframe/where-is-my-container/" + defaultQuery + "");
</script>
