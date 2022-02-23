<?php
if ($Data_Proyecto != FALSE) {
    foreach ($Data_Proyecto as $row) {
        $Destino = $row['destino'];
        $Envio = $row['tipo_envio'];
        $Comentarios = $row['comentarios'];
        $status = $row['id_estadoproyectos'];
    }
}

// if ($Data_Productos_C != FALSE) {
//     $Prod_c_prov = 0;
//     var_dump($Data_Productos_C);
//     foreach ($Data_Productos_C as $row) {
//         $Prod_c_prov++;
//     }
// }
// if ($Data_Productos_SP_C != FALSE) {
//     $Prod_s_prov = 0;
//     foreach ($Data_Productos_SP_C as $row) {
//         $Prod_s_prov++;
//     }
// }
// var_dump($Prod_c_prov);
// var_dump($Prod_s_prov);
?>
<div class="card shadow-cards tarjeta" style="margin-bottom: 1rem">
    <div class="card tarjeta-form" style="border-bottom: transparent;padding: 0rem 1rem 0.5rem 1rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-Info" style="padding: 1rem 0rem 0.5rem 0rem !important;">
                <p class="titlePedido m-0"><strong>Datos sobre tu pedido</strong></p>
            </li>
            <li class="list-group-item list-Info">
                <p class="list-extra"><strong>Destino: </strong>
                    <label class="m-0 font-w"><?= $Destino ?></label>
                </p>
                <p class="list-extra"><strong>Tipo de envio: </strong>
                    <label class="m-0 font-w"><?= $Envio ?></label>
                </p>
                <?php if ($Comentarios != '') { ?>
                    <p class="list-extra"><strong>Comentarios: </strong>
                        <label class="m-0 font-w"><?= $Comentarios ?></label>
                    </p>
                <?php } ?>
            </li>
            <li class="list-group-item list-Pedido" id="listProductos" style="padding-left: 0.4rem !important;">
                <p class="list-Title"><strong>Productos</strong></p>
                <div class="accordion" id="accordCotDet">
                    <ul class="list-group">
                        <?php if ($status < 5) {
                            if ($Data_Productos_C != FALSE) {
                                $Prod_c_prov = 0;
                                foreach ($Data_Productos_C as $row) {
                                    $Prod_c_prov++;
                                }
                                $this->load->view('plataforma/cliente/pedidos/detalle/forms/producto_cp');
                            }
                            if ($Data_Productos_SP_C != FALSE) {
                                $Prod_s_prov = 0;
                                foreach ($Data_Productos_SP_C as $row) {
                                    $Prod_s_prov++;
                                }
                                if ($Prod_s_prov >= 2) { ?>
                                    <p class="hr"></p>
                                <?php }
                                $this->load->view('plataforma/cliente/pedidos/detalle/forms/producto_sp');
                            }
                        } else if ($status >= 5) {
                            $this->load->view('plataforma/cliente/pedidos/detalle/forms/producto_cot');
                        } ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>