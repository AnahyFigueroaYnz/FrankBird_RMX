<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase title-color">Configurar Producto</h5>
            <button type="button" class="close closeProd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal agregarProducto" id="agregarProducto">
            <div class="modal-body" style="padding: 0rem;">
                <div class="card-body cards-productos" style="padding-bottom: 0rem;">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input id="idProv" class="idProv" type="hidden">
                            <input id="idProd" class="idProd" type="hidden">
                            <input id="txtNomProd" class="txtNomProd" type="hidden">
                            <div class="text-center" style="padding: 0rem 1rem 1rem 1rem;">
                                <label for="txtProveedor" class="text-uppercase" style="margin-bottom: 0rem;padding: 7px 0px 0px 13px;">Proveedor: </label>
                                <label type="text" readonly="" class="font-weight-light" id="lblProveedor" style="margin-bottom: 0rem;padding: 7px 0px 0px 13px;"></label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="txtPrecio">Precio Unitario USD</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-prefix">$</span>
                                        </div>
                                        <input type="text" class="form-control border-currency text-right txtPrecio" min="0" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="mostrar()" onchange="mostrar()" placeholder="0.00">
                                    </div>
                                    <div id="val_txtPrecio" style="display: none; color: red;">Debe ingresar un valor</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cantidad">Cantidad</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm borders border-prefix text-right txtCantidad" min="0" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="mostrar()" onchange="mostrar()" placeholder="0.00">
                                        <div class="input-group-append">
                                            <select class="form-control form-control-sm borders border-submit slUnidad" onchange="mostrar()">
                                                <option value="0" selected="">Unidades</option>
                                                <?php
                                                if ($data_unidades != FALSE) {
                                                    foreach ($data_unidades->result() as $row) {
                                                ?>
                                                        <option value="<?= $row->id_unidad_md; ?>"><?= $row->clave; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div id="val_txtCantidad" style="display: none; color: red;">Debe ingresar un valor</div>
                                        <div id="val_slUnidad" style="display: none; color: red;">Debe seleccionar una unidad de medida</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="txtTotal">Total del Producto USD</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-prefix">$</span>
                                        </div>
                                        <input type="text" class="form-control border-currency text-right txtTotal" name="txtTotal" min="0" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="mostrar()" disabled onchange="mostrar()" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    <label class="detalle-base-lable" for="Shipment">Imagen</label>
                                    <div class="input-group">
                                        <a href="" class="selectImgs" data-toggle="tooltip" data-placement="bottom" title="Seleccionar imagenes" style="margin-left: 1.5rem">
                                            <label for="files-Imgs" class="iconProds icon-label">
                                                <i id="selectImg" class="far fa-folder-open" style="margin-top: 0.6rem; font-size: 1.5rem;"></i>
                                                <i id="imgSelected" class="far fa-images" style="margin-top: 0.6rem; font-size: 1.5rem; display: none; color: green;"></i>
                                            </label>
                                        </a>
                                        <a href="" type="button" class="cancelImgs icons-margens" style="color: red;" data-toggle="tooltip" data-placement="bottom" title="Cancelar operación">
                                            <i class="fas fa-ban" style="margin-top: 0.6rem; font-size: 1.5rem;"></i>
                                        </a>
                                        <input id="files-Imgs" type="file" class="iconProds hide-button" multiple accept="image/*" />
                                        <div id="info" class="nameFile hide-button"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="detalle-base-lable" for="txtExpe">Especificaciones</label>
                                    <textarea class="form-control form-control-sm borders txtExpe" rows="2" onchange="mostrar()"></textarea>
                                    <div id="val_txtExpe" style="display: none; color: red;">Debe ingresar una especificaciones o comentario</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProd" data-dismiss="modal">Cancelar</button>
                <button id="btnAgProducto" type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnAddProducto">Agregar <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
</div>