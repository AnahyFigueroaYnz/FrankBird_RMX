<div class="card cardPedido">
    <div class="card-body cont-inicio">
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-Pedido" style="padding: 0.5rem 0.5rem 0rem 0.5rem !important;">
                <p class="titlePedido m-0"><strong>Datos sobre pedido</strong></p>
            </li>
            <li class="list-group-item list-Pedido" id="listEnvio" style="display: none;">
                <p class="list-Title"><strong>Datos de entrega</strong>
                    <a href type="button" id="btnEditarEnvio" style="font-size: 15px;margin-left: 10px;">
                        <i class="far fa-edit"></i>
                    </a>
                </p>
                <p class="list-Content"><strong>Destino: </strong><label class="m-0" id="lblDestino" style="font-weight: 300;"></label></p>
                <p class="list-Content"><strong>Tipo de envio: </strong><label class="m-0" id="lblEmpaque" style="font-weight: 300;"></label></p>
            </li>
            <li class="list-group-item list-Pedido" id="listComents" style="display: none;">
                <p class="list-Title"><strong>Comentarios</strong>
                    <a href="" type="button" id="btnEditarComent" style="font-size: 15px;margin-left: 10px;">
                        <i class="far fa-edit"></i>
                    </a>
                </p>
                <p class="list-Content" id="pComentario" style="display: none;"><label class="m-0" id="lblComentario" style="font-weight: 300;"></label></p>
            </li>
            <li class="list-group-item list-Pedido" id="listProductos">
                <p class="list-Title"><strong>Productos</strong>
                <div class="accordion">
                    <ul class="list-group" id="accordionItems">

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>