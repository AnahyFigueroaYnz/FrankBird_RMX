<title>ReachMx Cotiza tus importaciones sin costos adicionales</title>
<meta name="description" content="Cotiza tus importaciones y exportaciones en solo unos clics y recibe tu cotización en 24-48 hrs. ReachMx pone al mundo a tu alcance.">
<?php
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
?>
<label id="baseURL" style="display: none"><?= base_url() ?></label>
<div class="modal_wreppper" id="filesModal">
    <div class="animation_box">
        <a href="" class="modal_close"><i class="icon_close"></i></a>
        <div class="files_box navbar">
        </div>
    </div>
</div>
<input type="hidden" value="<?= base_url() ?>" id="LogBaseURL">
<section class="startup_banner_area_three">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="startup_content_three">
                    <h2 id="cotizadorTitulo" class="wow fadeInUp"></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="stratup_app_screen">
        <img class="phone" src="<?= base_url() ?>template_home/resources/world.png">
        <div class="stratup_app_img">
            <img class="app_screen one wow fadeInDown" src="<?= base_url() ?>template_home/resources/pin.png">
            <img class="app_screen two wow fadeInDown" src="<?= base_url() ?>template_home/resources/pin.png">
            <img class="app_screen three wow fadeInDown" src="<?= base_url() ?>template_home/resources/pin.png">
        </div>
        <img class="laptop wow slideInnew" src="<?= base_url() ?>template_home/resources/planeRMX.png" data-wow-delay="0.8s">
    </div>
</section>

<section class="developer_product_area">
    <div class="container">
        <form id="frmCotizador">
            <div class="developer_product_content d_product_content_two text-center">
                <h2 id="cotizadorTitulo2" class="f_600 f_size_25 l_height30 t_color3 mb_5"></h2>
                <p id="cotizadorSubtitulo1" class="f_400 f_size_16 mb_15"></p>
                <ul class="nav nav-tabs develor_tab nav-justified mb_20" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link disabled active show" id="tbMovimiento" data-toggle="tab" href="#dvMovimiento" role="tab" aria-controls="dvMovimiento" aria-selected="true">
                            <span>1</span>
                            <p id="cotizadorNavTitulo1" class="m-0"></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " id="tbEnvio" data-toggle="tab" href="#dvEnvio" role="tab" aria-controls="dvEnvio" aria-selected="false">
                            <span>2</span>
                            <p id="cotizadorNavTitulo2" class="m-0"></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " id="tbContenedor" data-toggle="tab" href="#dvContenedor" role="tab" aria-controls="dvContenedor" aria-selected="false">
                            <span>3</span>
                            <p id="cotizadorNavTitulo3" class="m-0"></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " id="tbCapacidad" data-toggle="tab" href="#dvCapacidad" role="tab" aria-controls="dvCapacidad" aria-selected="false">
                            <span>4</span>
                            <p id="cotizadorNavTitulo4" class="m-0"></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="tbCarga" data-toggle="tab" href="#dvCarga" role="tab" aria-controls="dvCarga" aria-selected="false">
                            <span>5</span>
                            <p id="cotizadorNavTitulo5" class="m-0"></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="tbDetalle" data-toggle="tab" href="#dvDetalle" role="tab" aria-controls="dvDetalle" aria-selected="false">
                            <span>6</span>
                            <p id="cotizadorNavTitulo6" class="m-0"></p>
                        </a>
                    </li>
                </ul>
                <div class="tab-content developer_tab_content">
                    <div class="tab-pane fade active show" id="dvMovimiento" role="tabpanel" aria-labelledby="tbMovimiento">
                        <section class="support_price_area">
                            <div class="container custom_container p0">
                                <div class="sec_title text-center mb_30">
                                    <h2 id="cotizadorMovimientoTexto1" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <div class="price_content price_content_two">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnMovimiento" id="Exportar">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_1.png" alt="Exporta tu producto fácilmente con ReachMx" style="width: 88.5%;">
                                                </div>
                                                <h5 id="cotizadorMovimientoTexto2" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnMovimiento" id="Importar">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_2.png" alt="Importa tu producto fácilmente con ReachMx" style="width: 88%;">
                                                </div>
                                                <h5 id="cotizadorMovimientoTexto3" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="dvEnvio" role="tabpanel" aria-labelledby="tbEnvio">
                        <section class="support_price_area">
                            <div class="container custom_container p0">
                                <div class="sec_title text-center mb_30">
                                    <h2 id="cotizadorEnvioTexto1" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <div class="price_content price_content_two">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnEnvio" id="Marítimo">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_3.png" style="width: 56%;">
                                                </div>
                                                <h5 id="cotizadorEnvioTexto2" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnEnvio" id="Aéreo">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_4.png" style="width: 60%;">
                                                </div>
                                                <h5 id="cotizadorEnvioTexto3" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="dvContenedor" role="tabpanel" aria-labelledby="tbContenedor">
                        <section class="support_price_area">
                            <div class="container custom_container p0">
                                <div class="sec_title text-center mb_30">
                                    <h2 id="cotizadorContenedorTexto1" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <div class="price_content price_content_two">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnContenedor" id="FCL">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_5.png" style="width: 42%;">
                                                </div>
                                                <h5 id="cotizadorContenedorTexto2" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="price_item btnContenedor" id="LCL">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_6.png" style="width: 45%;">
                                                </div>
                                                <h5 id="cotizadorContenedorTexto3" class="f_p f_size_20 f_600 t_color2 mt_20 mb-0"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="dvCapacidad" role="tabpanel" aria-labelledby="tbCapacidad">
                        <section class="support_price_area scFCL sec_hidden">
                            <div class="container custom_container p0">
                                <div class="sec_title text-center mb_30">
                                    <h2 id="cotizadorCargaTitulo" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <p id="divValContenedor" class="invalid-msj"></p>
                                <div class="price_content price_content_two">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4 col-sm-12" style="margin-bottom: 1rem;">
                                            <div class="price_item btnCapacidad" id="20FT">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_7.png" style="width: 45%;">
                                                </div>
                                                <div class="price f_size_40 f_p f_700">
                                                    <span id="cotizadorCargaTexto1" class="f_p f_size_18 f_500"></span>
                                                    <div class="product-qty dvCant20ft sec_hidden">
                                                        <button class="ar_top" type="button"><i class="ti-angle-up"></i></button>
                                                        <input type="number" name="txt20FT" id="txt20FT" value="0" class="manual-adjust">
                                                        <button class="ar_down" type="button"><i class="ti-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12" style="margin-bottom: 1rem;">
                                            <div class="price_item btnCapacidad" id="40FT">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_8.png" style="width: 50%;">
                                                </div>
                                                <div class="price f_size_40 f_p f_700">
                                                    <span id="cotizadorCargaTexto2" class="f_p f_size_18 f_500"></span>
                                                    <div class="product-qty dvCant40ft sec_hidden">
                                                        <button class="ar_top" type="button"><i class="ti-angle-up"></i></button>
                                                        <input type="number" name="txt40FT" id="txt40FT" value="0" class="manual-adjust">
                                                        <button class="ar_down" type="button"><i class="ti-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12" style="margin-bottom: 1rem;">
                                            <div class="price_item btnCapacidad" id="40HQ">
                                                <div class="item f_700 f_size_40">
                                                    <img class="img-fluid" src="<?= base_url() ?>template_home/resources/Recurso_9.png" style="width: 55%;">
                                                </div>
                                                <div class="price f_size_40 f_p f_700">
                                                    <span id="cotizadorCargaTexto3" class="f_p f_size_18 f_500"></span>
                                                    <div class="product-qty dvCant40hq sec_hidden">
                                                        <button class="ar_top" type="button"><i class="ti-angle-up"></i></button>
                                                        <input type="number" name="txt40HQ" id="txt40HQ" value="0" class="manual-adjust">
                                                        <button class="ar_down" type="button"><i class="ti-angle-down"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="button siguiente" id="btnSigCap"></button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="checkout_area bg_color scLCL sec_hidden">
                            <div class="container">
                                <div class="sec_title text-center mb_20">
                                    <h2 id="cotizadorCargaTitulo2" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <div class="row justify-content-center text-justify capacidadForm">
                                    <div class="col-md-6">
                                        <div class="row checkout_content">
                                            <div class="col-md-6 txtLCL sec_hidden" style="margin-bottom: 2rem;">
                                                <label id="cotizadorCargaTexto4">
                                                    <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                                </label>
                                                <div class="input-group right">
                                                    <input type="text" id="txtVolumen" name="txtVolumen" placeholder="25.100">
                                                    <div class="input-group-prepend right">
                                                        <span class="right">m3</span>
                                                    </div>
                                                </div>
                                                <p id="divVal_Volumen" class="invalid-msj"></p>
                                            </div>
                                            <div class="col-md-6 txtLCL sec_hidden" style="margin-bottom: 2rem;">
                                                <label id="cotizadorCargaTexto5">
                                                    <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                                </label>
                                                <div class="input-group right">
                                                    <input type="text" id="txtPeso" name="txtPeso" placeholder="15.750">
                                                    <div class="input-group-prepend right">
                                                        <span class="right">kg</span>
                                                    </div>
                                                </div>
                                                <p id="divVal_Peso" class="invalid-msj"></p>
                                            </div>
                                            <div class="col-md-6 colOrigen" style="margin-bottom: 2rem;">
                                                <label id="cotizadorCargaTexto6">
                                                    <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                                </label>
                                                <select class="selectpickers" id="selOrigen" name="selOrigen">
                                                    <option value="0">Origen</option>
                                                </select>
                                                <p id="divVal_Origen" class="invalid-msj"></p>
                                            </div>
                                            <div class="col-md-6 colDestino" style="margin-bottom: 2rem;">
                                                <label id="cotizadorCargaTexto7">
                                                    <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                                </label>
                                                <select class="selectpickers" id="selDestino" name="selDestino">
                                                    <option value="0">Destino</option>
                                                </select>
                                                <p id="divVal_Destino" class="invalid-msj"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row checkout_content">
                                            <div class="col-lg-12">
                                                <label id="cotizadorCargaTexto8"></label>
                                                <textarea id="txtComentarios" placeholder="Información adicional, 140 caracteres máximo" rows="6" cols="50" maxlength="140"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="button siguiente" id="btnSigCapForm"></button>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="dvCarga" role="tabpanel" aria-labelledby="tbCarga">
                        <section class="checkout_area bg_color">
                            <div class="container">
                                <div class="sec_title text-center mb_30">
                                    <h2 id="cotizadorMercanciaTitulo" class="f_p f_size_20 l_height50 f_600 t_color3"></h2>
                                </div>
                                <div class="row text-justify">
                                    <div class="col-md-6 checkout_content">
                                        <div class="col-md-12" style="margin-bottom: 2rem;">
                                            <label id="cotizadorMercanciaTexto1">
                                                <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                            </label>
                                            <input type="text" id="txtProducto" placeholder="¿Qué producto sería?" maxlength="">
                                            <p id="DivProducto" class="invalid-msj"></p>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 2rem;">
                                            <label id="cotizadorMercanciaTexto2">
                                                <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo requerido">*</a>
                                            </label>
                                            <div class="input-group center">
                                                <div class="input-group-prepend left">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" id="txtValor" placeholder="Valor">
                                                <div class="input-group-append right">
                                                    <span class="input-group-text">USD</span>
                                                </div>
                                            </div>
                                            <p id="DivValor" class="invalid-msj"></p>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom: 2rem;">
                                            <label id="cotizadorMercanciaTexto3">
                                                <a class="popValidacion" data-toggle="popover" data-trigger="hover" data-content="Campo opcional">(Op)</a>
                                            </label>
                                            <input type="number" id="txtFrac_arancel" placeholder="000000">
                                        </div>
                                        <div class="col-md-12">
                                            <label id="cotizadorMercanciaTexto4"></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="chAgentAd" name="chAgentAd">
                                            <label id="cotizadorMercanciaTexto5" class="l_text" for="chAgentAd"></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="chPrevOrg" name="chPrevOrg">
                                            <label id="cotizadorMercanciaTexto6" class="l_text" for="chPrevOrg"></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="chInspeccion" name="chInspeccion">
                                            <label id="cotizadorMercanciaTexto7" class="l_text" for="chInspeccion"></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="checkbox" id="chSeguro" name="chSeguro">
                                            <label id="cotizadorMercanciaTexto8" class="l_text" for="chSeguro"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cart_total_box">
                                            <h3 id="cotizadorMercanciaSubtitulo" class="checkout_title f_p f_600 f_size_20 mb_20"></h3>
                                            <div id="order_review" class="woocommerce-checkout-review-order">
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <tbody>
                                                        <tr class="subtotal">
                                                            <td id="cotizadorMercanciaTexto9"></td>
                                                            <td class="price tdMovimiento"></td>
                                                        </tr>
                                                        <tr class="subtotal">
                                                            <td id="cotizadorMercanciaTexto10"></td>
                                                            <td class="price tdEnvio"></td>
                                                        </tr>
                                                        <tr class="subtotal trLCL sec_hidden">
                                                            <td id="cotizadorMercanciaTexto11"></td>
                                                            <td class="price tdContenedro"></td>
                                                        </tr>
                                                        <tr class="subtotal trFCL sec_hidden">
                                                            <td id="cotizadorMercanciaTexto12"></td>
                                                            <td class="price tdCapCpontenedor"></td>
                                                        </tr>
                                                        <tr class="subtotal trLCL_A sec_hidden">
                                                            <td id="cotizadorMercanciaTexto13"></td>
                                                            <td class="price tdVolumen"></td>
                                                        </tr>
                                                        <tr class="subtotal trLCL_A sec_hidden">
                                                            <td id="cotizadorMercanciaTexto14"></td>
                                                            <td class="price tdPeso"></td>
                                                        </tr>
                                                        <tr class="subtotal">
                                                            <td id="cotizadorMercanciaTexto15"></td>
                                                            <td class="price tdOrigen"></td>
                                                        </tr>
                                                        <tr class="subtotal">
                                                            <td id="cotizadorMercanciaTexto16"></td>
                                                            <td class="price tdDestino"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="list-unstyled payment_list trComentario sec_hidden">
                                                    <li class="payment">
                                                        <h6 id="cotizadorMercanciaTexto17"></h6>
                                                        <div class="note tdComentario"></div>
                                                    </li>
                                                </ul>
                                                <div class="condition">
                                                    <input type="checkbox" value="None" id="squarednine" name="check">
                                                    <label class="l_text" for="squarednine">
                                                        <p id="cotizadorMercanciaTexto18"></p> <span id="cotizadorMercanciaTexto19" class="files_TermConds"></span>
                                                        <p id="cotizadorMercanciaTexto20"></p> <span id="cotizadorMercanciaTexto21" class="files_Privacy"></span>
                                                    </label>
                                                    <p id="DivCbxTerminos" class="invalid-msj"></p>
                                                </div>
                                                <button type="button" class="button" id="btnCotizar"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="dvDetalle" role="tabpanel" aria-labelledby="tbDetalle">
                        <section id="scCotizacion" class="checkout_area bg_color">
                            <div class="container text-justify">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card_details">
                                            <div class="icon"><img class="img-fluid" src="<?= base_url() ?>template_home/img/R-icon.png"></div>
                                            <h4 id="cotizadorCotizacionTitulo" class="f_p"></h4>
                                            <div class="box" style="margin-left: 0px;">
                                                <div id="order_review" class="woocommerce-checkout-review-detail">
                                                    <table class="shop_table woocommerce-checkout-review-detail-table">
                                                        <tbody>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto1"></td>
                                                                <td class="price tdFolio"></td>
                                                            </tr>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto2"></td>
                                                                <td class="price tdProducto"></td>
                                                            </tr>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto3"></td>
                                                                <td class="price tdMovimiento"></td>
                                                            </tr>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto4"></td>
                                                                <td class="price tdEnvio"></td>
                                                            </tr>
                                                            <tr class="subtotal trLCL sec_hidden">
                                                                <td id="cotizadorCotizacionTexto5"></td>
                                                                <td class="price tdContenedro"></td>
                                                            </tr>
                                                            <tr class="subtotal trFCL sec_hidden">
                                                                <td id="cotizadorCotizacionTexto6"></td>
                                                                <td class="price tdCapCpontenedor"></td>
                                                            </tr>
                                                            <tr class="subtotal trLCL_A">
                                                                <td id="cotizadorCotizacionTexto7"></td>
                                                                <td class="price tdVolumen"></td>
                                                            </tr>
                                                            <tr class="subtotal trLCL_A">
                                                                <td id="cotizadorCotizacionTexto8"></td>
                                                                <td class="price tdPeso"></td>
                                                            </tr>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto9"></td>
                                                                <td class="price tdOrigen"></td>
                                                            </tr>
                                                            <tr class="subtotal">
                                                                <td id="cotizadorCotizacionTexto10"></td>
                                                                <td class="price tdDestino"></td>
                                                            </tr>
                                                            <tr class="subtotal trFracArancel">
                                                                <td id="cotizadorCotizacionTexto11"></td>
                                                                <td class="price tdFracArancel"></td>
                                                            </tr>
                                                            <tr class="order_item" style="border-top: 1px solid #dfe2f1;">
                                                                <td id="cotizadorCotizacionTexto12" colspan="2"></td>
                                                            </tr>
                                                            <tr class="order_item" style="border-bottom: 1px solid #dfe2f1;">
                                                                <td colspan="2" class="note tdComentario"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="tab-content faq_content Cus_acc" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="purchas" role="tabpanel" aria-labelledby="purchas-tab">
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingCotizacion">
                                                                        <h5 class="m-0">
                                                                            <a id="cotizadorCotizacionTexto13" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collCotizacion" aria-expanded="false" aria-controls="collCotizacion" style="padding: 5px 0px;font-size: 16px;">
                                                                                <i class="ti-plus"></i><i class="ti-minus"></i>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collCotizacion" class="collapse" aria-labelledby="headingCotizacion" data-parent="#accordion">
                                                                        <div class="card-body" style="padding: 0;">
                                                                            <div class="cart_detail_box" style="margin-left: 0px;padding: 0rem 0.5rem;box-shadow: none;">
                                                                                <div id="order_review" class="woocommerce-checkout-review-detail">
                                                                                    <table class="shop_table woocommerce-checkout-review-detail-table">
                                                                                        <tbody>
                                                                                            <tr class="subtotal" style="border-top: 0px;">
                                                                                                <td id="cotizadorCotizacionSubTexto1"></td>
                                                                                                <td class="price tdTipoCambio"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal">
                                                                                                <td id="cotizadorCotizacionSubTexto2"></td>
                                                                                                <td class="price tdMercancia"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal">
                                                                                                <td id="cotizadorCotizacionSubTexto3"> <span class="infoAlertPrimary">*</span></td>
                                                                                                <td class="price tdLogistica"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal trDespachoAduana">
                                                                                                <td id="cotizadorCotizacionSubTexto4"> <span class="infoAlertPrimary">*</span></td>
                                                                                                <td class="price tdDespachoAduana"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal trPrevioOrigen">
                                                                                                <td id="cotizadorCotizacionSubTexto5"></td>
                                                                                                <td class="price tdPrevioOrigen"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal trInspeccion">
                                                                                                <td id="cotizadorCotizacionSubTexto6"></td>
                                                                                                <td class="price tdInspeccion"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal trSeguro">
                                                                                                <td id="cotizadorCotizacionSubTexto7"></td>
                                                                                                <td class="price tdSeguro"></td>
                                                                                            </tr>
                                                                                            <tr class="subtotal">
                                                                                                <td id="cotizadorCotizacionSubTexto8"></td>
                                                                                                <td class="price tdIVA"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-header">
                                                                        <div class="cart_detail_box" style="margin-left: 0px;padding: 0rem;box-shadow:none">
                                                                            <div id="order_review" class="woocommerce-checkout-review-detail">
                                                                                <table class="shop_table woocommerce-checkout-review-detail-table">
                                                                                    <tbody>
                                                                                        <tr class="subtotal order">
                                                                                            <td id="cotizadorCotizacionTexto14" class="price"></td>
                                                                                            <td class="total tdTotal"></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="return_customer list-group">
                                                        <div class="list-group-item">
                                                            <div class="head">
                                                                <p id="cotizadorCotizacionTexto15"><i class="icon_error-circle_alt"></i></p>
                                                                <small>
                                                                    <a id="btnWhatsapp" class="what_btn" href="https://wa.me/526622570384" target="_blank" rel="noopener noreferrer">
                                                                        <i class="fab fa-whatsapp"></i>
                                                                    </a>
                                                                </small>
                                                            </div>
                                                            <div class="body">
                                                                <p id="cotizadorCotizacionTexto16"></p>
                                                                <div class="form">
                                                                    <input type="text" id="txtEmail_Cliente" placeholder="ejemplo@ejemplo.com">
                                                                    <button type="button" class="btn button" id="btnEnviarCorreo"></button>
                                                                </div>
                                                                <p id="DivVal_Email" class="invalid-msj"></p>
                                                                <p id="cotizadorCotizacionTexto17" class="conzo">*
                                                                    <a href="https://wa.me/526622570384" id="btnConzo" target="_blank" rel="noopener noreferrer"></a>
                                                                <p id="cotizadorCotizacionTexto18"></p>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="<?= base_url() ?>template_home/js/cotizador.js?v=<?= $version; ?>"></script>