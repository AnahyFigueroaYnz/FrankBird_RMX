<?php
$level = $this->session->userdata('nivel');
$this->load->library('cript');
$id_proyecto_uri = $this->uri->segment(3);
$id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);

//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
if ($Data_Proyecto != FALSE) {
  foreach ($Data_Proyecto as $row) {
    $activo_p = $row['activo_p'];
    $registro = $row['registro_p'];
    $folio = $row['folio_p'];
    $status = $row['id_estadoproyectos'];
    $bl = $row['num_bl'];
  }
}
if ($comprobar_coordenadas != FALSE) {
  $direccion = $comprobar_coordenadas->direccion;
} else {
  $direccion = NULL;
}
// valores del estatus de la cotizacion
// 0 no hay cotizaciones realizadas o aceptadas por el administrador
// 1 no se ha aceptado ninguna cotizacion
// 2 cotizacion aceptada
if ($Data_Cotizacion != FALSE) {
  if ($Data_cot_acep != FALSE) {
    $statusCot = 2;
  } else {
    $statusCot = 1;
    $countDC = 0;
    foreach ($Data_Cotizacion->result() as $row) {
      $countDC++;
      $activo_c = $row->activ_cot;
      if ($countDC == 1) {
        if ($activo_c < 2 || $activo_c > 4) {
          $statusCot = 0;
        } else {
          $statusCot = 1;
        }
      } else {
        $statusCot = 1;
      }
    }
  }
} else {
  $statusCot = 0;
}
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cards.css ">
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/detalle-pedido.css ">
<input type="hidden" id="ContainerNumber" value="<?= $bl ?>">
<input type="hidden" id="txt_latitud" value="<?= $direccion; ?>">
<?php if ($activo_p == 2) {
  $statusPedido = '" (Concluido)"';
} else {
  $statusPedido = '';
} ?>
<section class="content-header shadow-title">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 title-color"><i class="far fa-file-alt"></i> Pedido <?= $registro ?>-<?= $folio ?>
                    <?= $statusPedido ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/DashboardCliente"><i class="nav-icon fas fa-home"></i>
                            Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>Clientes/MisPedidos">Mis Pedidos</a>
                    </li>
                    <li class="breadcrumb-item active">Detalle</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<!-- ondragstart="return false" onselectstart="return false" oncontextmenu="return false" -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" id="baseURL" value="<?= base_url() ?>">
            <?php if ($statusCot == 0) { ?>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $this->load->view('plataforma/cliente/pedidos/detalle/forms/productos'); ?>
            </div>
            <?php } else if ($statusCot == 1 || $statusCot == 2) { ?>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $this->load->view('plataforma/card-detalles/card-product'); ?>
                <?php $this->load->view('plataforma/cliente/pedidos/detalle/forms/productos'); ?>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php if ($status < 5) {
            if ($statusCot == 1) {
              $this->load->view('plataforma/cliente/pedidos/detalle/forms/cotizaciones');
            } else if ($statusCot == 2) {
              $this->load->view('plataforma/cliente/pedidos/detalle/forms/det-cotizacion');
            }
            $this->load->view('plataforma/cliente/pedidos/detalle/forms/pasos-seguir');
          } else if ($status >= 5) {
            $this->load->view('plataforma/card-detalles/card-costs');
          } ?>
            </div>
            <?php }
      if ($comprobar_coordenadas != false && $bl == NULL) { ?>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $this->load->view('plataforma/asesor/proyectos/tabs/mapa'); ?>
            </div>
            <?php } else if ($bl != NULL) {
      ?>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card shadow-cards tarjeta">
                    <div class="card-header">
                        <p class="card-title m-0"><i class="fas fa-map-marker-alt title-color"></i> Ubicación de tu
                            pedido</p>
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
            </div>
            <?php }?>
        </div>

        <div class="modal fade" id="modalFiles" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/cliente/modals/modal-files'); ?>
        </div>

        <div class="modal fade" id="modalTyC" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false"
            data-backdrop="static">
            <?php $this->load->view('plataforma/cliente/modals/modal-ter_con'); ?>
        </div>
    </div>
</section>

<script src="<?= base_url(); ?>js/plataforma/detalle.js?v=<?= $version ?>"></script>
<script src="<?= base_url(); ?>js/plataforma/rastreo.js?v=<?= $version ?>"></script>
<!-- <script src="<?= base_url(); ?>js/plataforma/cotizacion.js?v=<?= $version ?>"></script> -->

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
        document.getElementById("IframeShipsgoLiveMap").src =
            "https://shipsgo.com/iframe/where-is-my-container/" + event.data.Parameters.ContainerCode;
    }
}

var urlParams = new URLSearchParams(window.location.search);
var defaultQuery = $("#ContainerNumber").val();
if (defaultQuery === undefined || defaultQuery === null) {
    defaultQuery = "default-container-code";
}
$("#IframeShipsgoLiveMap").attr("src", "https://shipsgo.com/iframe/where-is-my-container/" + defaultQuery + "");
</script>
