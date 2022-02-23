<?php
    $id_proyecto_uri = $this->uri->segment(3);
    $id_proyecto = $this->cript->decrypted_id($id_proyecto_uri);
?>
<div class="card-header borders-card">
    <h4 style="margin-bottom: 0;text-align: justify;">Calculo de Costos </h4>
</div>
<form class="form-horizontal agregarCotizacion" id="agregarCotizacion">
    <div class="card-body" style="padding-bottom: 0rem;">
        <div class="form-group row" style="margin-bottom: 1rem">
            <div class="col-md-6 ml-auto">
                <label for="txtTotalCotizacion">Total Cotización</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-disabled text-right txtTotalCotizacion" id="txtTotalCotizacion" min="0" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" disabled placeholder="0.00">
                    <button id="btnCotizacion" type="submit" class="btn btn-outline-success btn-sm border-submit btnCotizacion" style="border: 0rem;border-radius: 2rem;width: 2.5rem;">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
                <div id="val_txtTotalCotizacion" style="display: none; color: red;">Campo requerido, valor distinto de cero</div>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 1rem">
            <div class="col-md-6">
                <label for="txtNombreCot">Nombre cotización</label>
                <input type="text" class="form-control form-control-sm borders txtNombreCot">
                <div id="val_txtNombreCot" style="display: none; color: red;">Campo requerido, dar nombre a la cotización</div>
            </div>
            <div class="col-md-6 ml-auto">
                <label for="txtEntrega">Tiempo entrega</label>
                <input type="text" class="form-control form-control-sm borders txtEntrega">
                <div id="val_txtEntrega" style="display: none; color: red;">Campo requerido, escribir un tiempo estimado</div>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="txtDolar">Tipo de cambio</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtDolar" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" value="10.00" onkeyup="convValues()" onChange="convValues()">
                </div>
                <div id="val_txtDolar" style="display: none; color: red;">Campo requerido, valor distinto de cero</div>
            </div>
            <div class="col-md-6">
                <label for="slpuertoSalida">Puerto salida</label>
                <select class="form-control form-control-sm borders slpuertoSalida" style="padding: 0rem 0.5rem;margin-right: 1rem;" onChange="changeSelect()">
                    <option value="0" selected="">Elegir</option>
                    <?php
                    if ($Data_Puertos_Salida != FALSE) {
                        foreach ($Data_Puertos_Salida->result() as $row) {
                            echo '<option value="' . $row->id_puerto . '">';
                            echo $row->puerto;
                            echo ' -  ';
                            echo $row->clave;
                            echo '</option>';
                        }
                    }
                    ?>
                </select>
                <div id="val_slpuertoSalida" style="display: none; color: red;">Debe elegir un valor</div>
            </div>
        </div>   
        <div class="card card-table">
            <div class="card-header card-content-table" id="cardProductos">
                <table class="table" style="margin-bottom: 0;">
                    <tbody>
                        <tr>
                            <td style="border-top: transparent;padding: 1rem 0rem;vertical-align: middle;width: 80%;" data-toggle="collapse" data-target="#colProductos" aria-expanded="true" aria-controls="colProductos" class="colProd">
                                <label class="detalle-base-lable">Productos</label>
                            </td>
                            <td style="border-top: transparent;padding: 1rem 0.2rem;vertical-align: middle;width: 20%;text-align: right">
                                <button id="btnProveedores" type="button" class="btn btn-outline-primary btn-sm btn-nuevo">Nuevo &nbsp;<i class="fas fa-plus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="colProductos" class="colProductos collapse" aria-labelledby="cardProductos" data-parent="#accordion">
                <div class="card-body" style="padding: 0rem;">
                    <div id="productosList">
                        <table id="tblproducto" class="table table-borderless" style="margin-bottom: 0;">
                            <thead class="table-respon-filas" style="border-top: 1px solid #d0d0d2;">
                                <th class="td-prod-total">Producto</th>
                                <th class="td-prod-cant" style="width: 20%">Precio unit.</th>
                                <th class="td-prod-cant" style="width: 20%">Cantidad</th>
                                <th colspan="2" class="td-prod-cant1 dato" style="width: 20%">Precio total</th>
                            </thead>
                        </table>

                        <div id="accProd" style="margin-bottom: 0rem;">
                        </div>

                        <table id="tblproductoF" class="table table-borderless">
                            <tfoot class="table-respon-filas" style="border-top: 1px solid #d0d0d2;">
                                <th class="td-prod-total">Total mercancia</th>
                                <td class="td-prod-cant"><label>USD $ </label><label id="totalPrecio">0.00</label></td>
                                <td class="td-prod-cant"><label id="totalCantidad">0.00</label></td>
                                <td colspan="2" class="td-prod-cant1"><label>USD $ </label><label id="totalTotal">0.00</label></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="val_txtValorMercancia" style="display: none; color: red;">Elegir al menos un producto</div>
        <hr style="margin-top: 0rem;">
        <div class="form-group row" style="margin-top: 1rem">
            <div class="col-md-6">
                <label for="txtnacional">Flete internacional USD</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtInternacional" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="changeValues()" onChange="changeValues()">
                </div>
                <div id="val_txtInternacional" style="display: none; color: red;">Debe ingresar un valor</div>
            </div>
            <div class="col-md-6">
                <label for="txtOtros">Otros incrementables USD</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtOtros" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="changeValues()" onChange="changeValues()">
                </div>
            </div>
        </div>
        <hr style="margin-bottom: 0rem;">
        <div class="card card-table">
            <div class="card-header card-content-table" id="cardAgencias">
                <table class="table" style="margin-bottom: 0;">
                    <tbody>
                        <tr>
                            <td style="border-top: transparent;padding: 1rem 0rem;vertical-align: middle;width: 60%;" data-toggle="collapse" data-target="#colAgencias" aria-expanded="true" aria-controls="colAgencias" class="">
                                <label class="detalle-base-lable">Agencia</label>
                            </td>
                            <td style="border-top: transparent;padding: 1rem 0.2rem;vertical-align: middle;width: 40%;text-align: right">
                                <button id="btnEditar" type="button" class="btn btn-outline-secondary btn-sm btn-nuevo btnEditar hide-button">
                                    Editar &nbsp;<i class="fas fa-pencil-alt"></i>
                                </button>
                                <button id="btnAgencias" type="button" class="btn btn-outline-primary btn-sm btn-nuevo btnAgencias">
                                    Nuevo &nbsp;<i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="colAgencias" class="colAgencias collapse" aria-labelledby="cardAgencias" data-parent="#accordion">
                <div class="card-body" style="padding: 0rem;">
                    <div id="AgenciasList">
                        <table id="tblAgencias" class="table">
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="td-agen-total-foot">Total</th>
                                    <td class="text-right td-agen-cant-foot"><label class="font-weight-bold">$ </label><label class="totalAgencia" style="margin-bottom: 0;">0.00</label></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="val_txtIdAgencia" style="display: none; color: red;">Elegir una agencia aduanal</div>  
        <div class="form-group row" style="margin-bottom: 1rem;margin-top: 0.5rem">
            <div class="col-md-6">
                <label for="txtInternacional" style="margin-bottom: 0;margin-top: 6px;">Puerto llegada</label>
            </div>
            <div class="col-md-6">
                <select class="form-control form-control-sm borders slpuertoLllegada" disabled style="padding: 0rem 0.5rem;margin-right: 1rem;" onChange="changeSelect()"></select>
                <div id="val_slpuertoLllegada" style="display: none; color: red;">Debe elegir un valor</div>
            </div>
        </div> 
        <div class="form-group row" style="margin-bottom: 1rem">
            <div class="col-md-6">
                <label for="txtnacional">Flete nacional</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtnacional" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="changeValues()" onChange="changeValues()">
                </div>
                <div id="val_txtnacional" style="display: none; color: red;">Debe ingresar un valor</div>
            </div>
            <div class="col-md-6">
                <label for="txtDTA">DTA</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtDTA" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="changeValues()" onChange="changeValues()" disabled>
                </div>
                <!-- <div id="val_txtDTA" style="display: none; color: red;">Debe ingresar un valor</div> -->
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="slArancel">Arancel</label>
                <select class="form-control form-control-sm borders slArancel" style="padding: 0rem 0.5rem;margin-right: 1rem;" onChange="changeValues()">
                    <option value="-1" selected="">Elegir</option>
                    <option value="0" >0%</option>
                    <option value="0.05" >5%</option>
                    <option value="0.10" >10%</option>
                    <option value="0.15" >15%</option>
                </select>
                <div id="val_slArancel" style="display: none; color: red;">Debe elegir un valor</div>
            </div>
            <div class="col-md-6">
                <label for="txtHonorarios">Honorarios</label>
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-prefix">$</span>
                    </div>
                    <input type="text" class="form-control border-currency text-right txtHonorarios" min="1" placeholder="0.00" pattern="^(\d{1,3}(,\d{3})*|(\d+))(.\d{2})?$" onkeyup="changeValues()" onChange="changeValues()" disabled>
                </div>
                <!-- <div id="val_txtHonorarios" style="display: none; color: red;">Debe ingresar un valor</div> -->
            </div>
        </div>
        <br>
        <div class="form-group row" style="display: none">
            <input type="text" value="<?= $id_proyecto ?>" class="txtIdProyecto">
            <input type="text" class="text-right txtValorMercancia" value="0">
            <input type="text" class="text-right txtIdAgencia">
            <input type="text" class="text-right txtIdProveedor">
            <input type="text" class="text-right txtValorAgencia" value="0">
            <input type="text" class="text-right txtCountProductos">
            <input type="text" class="text-right txtHonorarioA">
            <input type="text" class="text-right txtRevalidacionA">
            <input type="text" class="text-right txtComplementarioA">
            <input type="text" class="text-right txtPrevioA">
            <input type="text" class="text-right txtManiobraA">
            <input type="text" class="text-right txtDesconsolidacionA">
        </div>
    </div>
    <!-- <div class="modal-footer">
        <button id="btnCotizacion" type="submit" class="btn btn-outline-success btn-sm btn-nuevo btnCotizacion">Guardar <i class="fas fa-check"></i></button>
    </div> -->
</form>