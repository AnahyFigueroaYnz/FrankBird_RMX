<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Seleccione su metodo de pago</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="form" id="formPagos">
            <div class="modal-body">
                <div class="form-group row d-flex justify-content-around">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="chkReferencia" name="customRadio" checked onclick="checkPago()">
                        <label for="chkReferencia" class="custom-control-label">Transferencia</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="chkTarjeta" name="customRadio" onclick="checkPago()">
                        <label for="chkTarjeta" class="custom-control-label">Tarjeta Débito/Crédito</label>
                    </div>
                </div>
                <div id="formTrans">
                    <div class="form-group row">
                        <div class="col-12 text-center">
                            <span>Favor de realizar transferencia a:</span>
                            <ul class="list-group" style="margin: 1rem 0rem;">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Banco
                                    <span>HSBC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Beneficiario
                                    <span>Reachmx Trade Solutions SAPI de CV</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    No. de cuenta
                                    <span>4061 285 904</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    CLABE
                                    <span>021 760 040 612 859 041</span>
                                </li>
                            </ul>
                            <span>Una vez realizado su pago favor de enviar comprobante a <strong>pagos@reachmx.com</strong></span>
                        </div>
                    </div>
                </div>
                <div id="formTrajeta" style="display: none;">
                    <div class="col-12">
                        <h5 style="color: orangered;">Seccion aun en desarrollo, estamos trabajando en ello</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="txtTitular">Nombre titular</label>
                            <input type="text" class="form-control form-control-sm borders txtbuque" id="txtTitular" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="txtNoTarjeta">Numero de tarjeta</label>
                            <input type="text" class="form-control form-control-sm borders" id="txtNoTarjeta" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Fecha Vecimiento</label>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <select id="slMes" class="form-control form-control-sm borders">
                                        <option selected>Mes</option>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <select id="slAno" class="form-control form-control-sm borders">
                                        <option selected>Año</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                        <option>2027</option>
                                        <option>2028</option>
                                        <option>2029</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="txtCvv">CVV</label>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <input type="text" class="form-control form-control-sm borders" id="txtCvv" value="">
                                </div>
                                <div class="form-group col-1 text-center" style="margin-bottom: 0;padding-top: 4px;">
                                    <a class="infoArancel" style="cursor: help;" data-toggle="popover" data-trigger="hover" data-placement="top" title="CVV" data-html="true" data-content="Son los ultimos 3 digitos al reverso de la tarjeta o los 4 digitos arriba del numero de tarjeta <img src='<?= base_url() ?>resources/cvv.png' width='250'>"><i class="far fa-question-circle"></i></a>
                                </div>
                                <div class="form-group col-5 ml-auto">
                                    <button disabled class="btn btn-outline-primary btn-sm" type="button" id="btnPagar" style="border-radius: 2rem;">Realizar pago</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo closeProy" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
    </div>
</div>