<?php
//$data_ver =  $this->versiones->get_version();
//$version = $data_ver->version;
$id_cliente = $this->session->userdata('id_usuario');
?>
<link rel="stylesheet" href="<?= base_url() ?>css/cliente/nuevo-pedido.css ">
<input type="hidden" id="txtStepActivo" value="1">
<input type="hidden" id="txtStepForm" value="1">
<input type="hidden" id="baseURL" value="<?= base_url() ?>">
<input type="hidden" id="idCliente" value="<?= $id_cliente ?>">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 d-flex align-items-center">
            <div class="col-8 col-xs-8 col-sm-8 col-md-8 col-lg-6 col-xl-6">
                <span class="title-icon" id="iconTitle" style="margin-left: 5px;"></span>
                <span class="title-text">
                    <label id="textTitel"></label>
                    <p class="text-subtitle" id="container-subtitle"></p>
                </span>
            </div>
            <div class="col-4 col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2 ml-auto text-right" id="progressForm" style="display: none;">
                <span class="info-text" id="numProgress"></span>
                <div class="progress progress-xs" style="border-radius: 2rem;border: 1px solid #a9a7a7;">
                    <div class="progress-bar bg-success progress-bar-striped" id="barProgress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row" id="container-pedido" style="display: none; padding-bottom: 1rem;">
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div style="padding: 0rem 1rem;">
                    <form id="agregar_pedido">
                        <div id="step1" style="display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/productos'); ?>
                        </div>
                        <div id="step2" style="display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/espProducto'); ?>
                        </div>
                        <div id="step3" style="display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/proveedores'); ?>
                        </div>
                        <div id="step4" style="display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/envio'); ?>
                        </div>
                        <div id="step5" style="display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/comentarios'); ?>
                        </div>
                        <div id="step6" style="padding: 6rem 0rem;display: none;">
                            <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/verificacion'); ?>
                        </div>
                    </form>
                    <div class="text-center" id="moveArrows" style="display: none;">
                        <a class="iconArrows" id="arrowBack" href="" style="display: none;"><i class="fas fa-arrow-left"></i></a>
                        <a class="iconArrows" id="arrowNext" href="" style="display: none;"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex-partial cont-inicio" id="conten-productos">
                <div id="listaProductos" style="max-height: 120vh;overflow: auto;display: none;">
                    <?php $this->load->view('plataforma/cliente/pedidos/nuevo_pedido/pasos_pedido/items'); ?>
                </div>
                <div class="text-center" id="incioProductos">
                    <p class="icon-cardPedidos"><i class="fas fa-ship"></i></p>
                    <p class="text-cardPedidos">Estas listo para realizar <br> tu primera importación</p>
                </div>
            </div>
        </div>

        <div class="row" id="container-final" style="padding: 7rem 0rem 8rem 0rem;display: none;">
            <div class="col-12 d-flex-partial">
                <div class="text-center">
                    <div class="form-group text-center">
                        <p class="text-cardPedidos">Hemos recibido la solicitud de tu pedido a la
                            <br> brevedad uno de nuestros asesores se estará <br> comunicando
                            contigo para dar seguimiento.
                        </p>
                    </div>
                    <div class="form-group text-center" style="margin: 1rem 0rem;">
                        <a type="button" href="<?= base_url() ?>Plataforma/Proyectos" class="btn btn-outline-success btn-sm btn-border" id="btnPedidos">Ir a mis proyectos</a>
                    </div>
                    <div class="form-group text-center" style="margin: 1rem 0rem;">
                        <a type="button" href="<?= base_url() ?>NuevoProyecto/" class="btn btn-outline-success btn-sm btn-border" id="btnNuevoPedido">Nuevo Pedido</a>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-hidden="true">
            <?php $this->load->view('plataforma/cliente/modals/modal-pedido'); ?>
        </div>
        
        <script src="<?= base_url(); ?>js/clientes/nuevo-pedido.js"></script>