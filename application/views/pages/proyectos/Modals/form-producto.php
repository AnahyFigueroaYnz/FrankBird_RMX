<div class="card-body cards-productos" style="padding-bottom: 0rem;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <form class="form-horizontal">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="txtPrecio">Precio Unitario</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right txtPrecio" id="txtPrecio" min="1" pattern="^[0-9]+" onkeyup="mostrar()" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="txtviaje">Cantidad</label>
                        <input type="text" class="form-control form-control-sm borders text-right txtCantidad" id="txtCantidad" min="0" pattern="^[0-9]*" onkeyup="mostrar()">
                    </div>
                    <div class="col-md-4">
                        <label for="txtTotal">Total del Producto</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-prefix">$</span>
                            </div>
                            <input type="text" class="form-control border-currency text-right txtTotal" id="txtTotal" name="txtTotal" min="0" pattern="^[0-9]+" onkeyup="mostrar()" disabled, value="0">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="txtExpe">Especificaciones</label>
                        <textarea class="form-control form-control-sm borders" id="txtExpe" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="detalle-base-lable" for="Shipment">Imagen producto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input col-input-label-sm" accept="image/*" id="input-imgProducto">
                                <label id="lblProducto" class="custom-file-label col-form-label-sm borders" for="input-imgProducto"></label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secundary border-limpiar" type="button" id="btnLimpiarProducto">
                                    <i class="far fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card-body">
                <div>
                    <img id="img-producto" class="img-fluid" src="<?= base_url() ?>/resources/PicturesGalery.png">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body card-footer-product">
    <button id="btnAgProducto" type="button" class="btn btn-outline-primary btn-sm btn-nuevo text-righ btnAddProducto">Agregar <i class="fas fa-plus"></i></button>
</div>