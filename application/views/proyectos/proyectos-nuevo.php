<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1-title">Nuevo proyecto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.html">Inicio</a></li>
                        <li class="breadcrumb-item active">Nuevo proyecto</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-none">
                <section>
                    <form role="form">
                        <input type="hidden" id="txtStepNow" value="1" />
                        <input type="hidden" id="txtOrder" value="0" />
                        <div class="card m-0 p-0">
                            <div class="card shadow-none m-0 hidden" id="cardSendOrder">
                                <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                    <div class="item-head">
                                        <div class="col-12 col-md-7 w-100">
                                            <span class="title"> <i class="fas fa-check"></i> Orden concretada con éxito.</span>
                                            <p class="description">Se ha registrado y enviado tu orden para seguimientos adelante.</p>
                                        </div>
                                        <div class="col-12 col-md-5 w-100 ml-auto" style="margin-top: 35px;">
                                            <div class="wd-70 ml-auto">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped prc-100" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="porcentText">100<small> %</small></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="padding: 8.5rem 1rem;">
                                    <div class="card-body px-2 py-0">
                                        <div class="f-flex">
                                            <div class="text-center mx-2 mt-2 mb-5 w-100">
                                                <label class="lbl-title p-0"> Hemos recibido la solicitud a la brevedad uno de nuestros asesores se estará
                                                    comunicando contigo para dar seguimiento.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="f-flex text-center">
                                            <div class="form-group mx-2 my-0 w-100">
                                                <a href="/aplication/proyectos-nuevo.html" class="btn-save-block"> Nuevo proyecto</a>
                                            </div>
                                            <div class="form-group mx-2 my-0 w-100">
                                                <a href="/aplication/proyectos-mis-asignados.html" class="btn-update-block"> Mis proyectos</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="cardOrderItems">
                                <div class="tab-content titleTab-content">
                                    <div class="tab-pane active" role="tabpanel" id="headStep1">
                                        <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                            <div class="item-head">
                                                <div class="col-12 col-md-7 w-100">
                                                    <span id="step1New" class="title"><i class="fas fa-shopping-cart"></i> Comenzar orden</span>
                                                    <span id="step1More" class="title hidden"><i class="fas fa-shopping-cart"></i> Agregar más a orden</span>
                                                    <p class="description">Agregar producto deseado</p>
                                                </div>
                                                <div class="col-12 col-md-5 w-100 ml-auto">
                                                    <div class="tools">
                                                        <div class="next btnProd visible">
                                                            <a href="" type="button" class="action next-step" data-id="1">
                                                                <i class="fas fa-step-forward"></i>
                                                                <p class="actionText">continuar</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="wd-70 ml-auto">
                                                        <div id="step1ProgNew" class="progress">
                                                            <span class="empty">0<small> %</small></span>
                                                            <div class="progress-bar progress-bar-striped prc-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div id="step1ProgMore" class="progress hidden">
                                                            <div class="progress-bar progress-bar-striped prc-80" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="porcentText">80<small> %</small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="headStep2">
                                        <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                            <div class="item-head">
                                                <div class="col-12 col-md-7 w-100">
                                                    <span class="title"><i class="fas fa-shopping-cart"></i> Comenzar orden</span>
                                                    <p class="description">Tu producto cuenta con proveedor</p>
                                                </div>
                                                <div class="col-12 col-md-5 w-100 ml-auto">
                                                    <div class="tools">
                                                        <div class="skip btnProv" id="skipProv">
                                                            <a href="" type="button" class="action next-step" data-id="2">
                                                                <i class="fas fa-forward"></i>
                                                                <p class="actionText">saltar</p>
                                                            </a>
                                                        </div>
                                                        <div class="back btnProv visible">
                                                            <a href="" type="button" class="action prev-step" data-id="2">
                                                                <i class="fas fa-step-backward"></i>
                                                                <p class="actionText">regresar</p>
                                                            </a>
                                                        </div>
                                                        <div class="next btnProv visible">
                                                            <a href="" type="button" class="action next-step" data-id="2">
                                                                <i class="fas fa-step-forward"></i>
                                                                <p class="actionText">continuar</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="wd-70 ml-auto">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped prc-20" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="porcentText">20<small> %</small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="headStep3">
                                        <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                            <div class="item-head">
                                                <div class="col-12 col-md-7 w-100">
                                                    <span class="title"> <i class="fas fa-ship"></i> Sobre el envío</span>
                                                    <p class="description">¿A dónde se dirige tu producto?</p>
                                                </div>
                                                <div class="col-12 col-md-5 w-100 ml-auto">
                                                    <div class="tools">
                                                        <div class="back btnEnvio visible">
                                                            <a href="" type="button" class="action prev-step" data-id="3">
                                                                <i class="fas fa-step-backward"></i>
                                                                <p class="actionText">regresar</p>
                                                            </a>
                                                        </div>
                                                        <div class="next btnEnvio visible">
                                                            <a href="" type="button" class="action next-step" data-id="3">
                                                                <i class="fas fa-step-forward"></i>
                                                                <p class="actionText">continuar</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="wd-70 ml-auto">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped prc-40" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="porcentText">40<small> %</small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="headStep4">
                                        <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                            <div class="item-head">
                                                <div class="col-12 col-md-7 w-100">
                                                    <span class="title"> <i class="far fa-comment-dots"></i> Complemento</span>
                                                    <p class="description">¿Álgo mas que desee agregar?</p>
                                                </div>
                                                <div class="col-12 col-md-5 w-100 ml-auto">
                                                    <div class="tools">
                                                        <div class="skip btnComent" id="skipComent">
                                                            <a href="" type="button" class="action next-step" data-id="4">
                                                                <i class="fas fa-forward"></i>
                                                                <p class="actionText">saltar</p>
                                                            </a>
                                                        </div>
                                                        <div class="back btnComent visible">
                                                            <a href="" type="button" class="action prev-step" data-id="4">
                                                                <i class="fas fa-step-backward"></i>
                                                                <p class="actionText">regresar</p>
                                                            </a>
                                                        </div>
                                                        <div class="next btnComent visible">
                                                            <a href="" type="button" class="action next-step" data-id="4">
                                                                <i class="fas fa-step-forward"></i>
                                                                <p class="actionText">continuar</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="wd-70 ml-auto">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped prc-60" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="porcentText">60<small> %</small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="headStep5">
                                        <div class="card-header" style="padding: 8px 2px 2px 12px !important">
                                            <div class="item-head">
                                                <div class="col-12 col-md-7 w-100">
                                                    <span class="title"> <i class="fas fa-check"></i> Verifica la información.</span>
                                                    <p class="description">Estas listo para finalizar tu orden.</p>
                                                </div>
                                                <div class="col-12 col-md-5 w-100 ml-auto">
                                                    <div class="tools">
                                                        <div class="back btnVerificar visible">
                                                            <a href="" type="button" class="action prev-step" data-id="5">
                                                                <i class="fas fa-step-backward"></i>
                                                                <p class="actionText">regresar</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="wd-70 ml-auto">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped prc-80" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="porcentText">80<small> %</small></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-flex w-100">
                                    <div class="col-sm-12 col-md-6 w-100 tabsEspacio" id="colTabs">
                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                <div>
                                                    <div class="card-body px-2 py-0 tabsCardEspacio">
                                                        <div class="f-flex">
                                                            <div class="form-group mx-2 mb-1 w-100">
                                                                <label for="txtProducto" class="lbl-form p-0"> Nombre producto <a id="popProducto" class="trashCan mr-auto disabled">*</a> </label>
                                                                <input type="text" class="form-control form-control-border" id="txtProducto" placeholder="Filtro de agua" />
                                                            </div>
                                                        </div>
                                                        <div class="f-flex">
                                                            <div class="form-group mx-2 mb-1 w-100">
                                                                <label for="txtCantidad" class="lbl-form p-0">Cantidad <a id="popCantidad" class="trashCan mr-auto disabled">*</a></label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control form-control-border" id="txtCantidad" />
                                                                    <div class="input-group-append">
                                                                        <select class="form-control form-control-border" id="selUnidad">
                                                                            <option value=" " selected disabled class="text-muted">Unidad</option>
                                                                            <option value="pzas.">pzas.</option>
                                                                            <option value="mts.">mts.</option>
                                                                            <option value="Kg.">Kg.</option>
                                                                            <option value="m2.">m2.</option>
                                                                            <option value="tm.">tm.</option>
                                                                            <option value="tn.">tn.</option>
                                                                            <option value="Lt.">Lt.</option>
                                                                            <option value="Kt.">Kt.</option>
                                                                            <option value="TEU.">TEU</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="f-flex">
                                                            <div class="form-group mx-2 mb-1 w-100">
                                                                <label for="txtRazonSocial" class="lbl-form p-0"> Razón social</label>
                                                                <input type="text" class="form-control form-control-border" id="txtRazonSocial" placeholder="Razón social" />
                                                            </div>
                                                        </div>
                                                        <div class="f-flex">
                                                            <div class="form-group mx-2 mb-1 w-100">
                                                                <label for="fileClip" class="lbl-form p-0">Imagen producto</label>
                                                                <div class="actions-group">
                                                                    <a href="" id="lnkClip">
                                                                        <label id="fileClip" class="btn-choose" for="inpFiles"><i class="fas fa-paperclip"></i> Adjuntar </label>
                                                                        <input id="inpFiles" class="hidden" type="file" accept="image/*" />
                                                                        <span id="spFiles" class="hidden"></span>
                                                                    </a>
                                                                    <div id="filesGroup" class="file-group">
                                                                        <a href="" id="filesUp" class="btn-file-block-xs hidden" disabled><i class="fas fa-image"></i> Prod-Img.png</a>
                                                                        <a href="" id="cancelEx" class="btn-cancel-xs hidden"><i class="fas fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer px-3 py-0" style="background-color: transparent;">
                                                        <a href="" id="btnContinuar1" class="btn-save-block addOrder visible" data-id="1"> Agregar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                <div class="card-body px-2 py-0 tabsCardEspacio">
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label class="lbl-form p-0">¿Cuentas con proveedor? <a id="popProvCheck" class="trashCan mr-auto disabled">*</a></label>
                                                            <div class="f-flex my-1">
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkSiProv" name="r1" class="chkProv" />
                                                                    <label for="chkSiProv" class="lbl-form p-0">Sí</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkNoProv" name="r1" class="chkProv" />
                                                                    <label for="chkNoProv" class="lbl-form p-0">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-2 w-100">
                                                            <label class="lbl-form p-0">Proveedor <a id="popProveedor" class="trashCan mr-auto disabled">*</a></label>
                                                            <select id="selProv" class="form-control select2 w-100" disabled>
                                                                <option value=""></option>
                                                                <option value="1">Amed Refrigeration Solutions</option>
                                                                <option value="2">Anhui Green Earth Technology Co., Ltd</option>
                                                                <option value="3">Anping County Yize Metal Products Co., Ltd</option>
                                                                <option value="4">Chaozhou Jurong Melamine Products Co., Ltd</option>
                                                                <option value="5">Shenzhen Zhenghao Plasyic Packaging Co.,Ltd</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label for="txtContacto" class="lbl-form p-0"> Contacto <a id="popContacto" class="trashCan mr-auto disabled">*</a></label>
                                                            <input type="text" class="form-control form-control-border" id="txtContacto" placeholder="Nombre completo" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label for="txtCorreo" class="lbl-form p-0"> Correo <a id="popCorreo" class="trashCan mr-auto disabled">*</a></label>
                                                            <input type="text" class="form-control form-control-border" id="txtCorreo" placeholder="ejemplo@ejemplo.com" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 wd-100">
                                                            <label for="txtTelefono" class="lbl-form p-0">Teléfono</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-border" id="txtTelefono" placeholder="(000) 000-0000" inputmode="text" disabled />
                                                                <div class="input-group-append">
                                                                    <select class="form-control form-control-border" id="selLada" style="width: 100%" disabled>
                                                                        <option value="" disabled="" selected="">Lada</option>
                                                                        <option value="(+ 66)">TH</option>
                                                                        <option value="(+ 84)">VN</option>
                                                                        <option value="(+ 1)">US</option>
                                                                        <option value="(+ 52)">MX</option>
                                                                        <option value="(+ 82)">KR</option>
                                                                        <option value="(+ 81)">JP</option>
                                                                        <option value="(+ 91)">IN</option>
                                                                        <option value="(+ 86)">CN</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label for="txtPagina" class="lbl-form p-0"> Página</label>
                                                            <input type="text" class="form-control form-control-border" id="txtPagina" placeholder="www.ejemplo.com" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 wd-100">
                                                            <label for="txtFolio" class="lbl-form p-0">N° Folio</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control form-control-border" id="txtFolio" placeholder="######" disabled />
                                                                <div class="input-group-append" style="height: calc(2rem - 8px) !important">
                                                                    <div class="media-group">
                                                                        <div class="actions-group ml-auto">
                                                                            <a type="button" href="" id="fileFolio" class="btn-action fileClip disabled">
                                                                                <label for="inpFolio" id="lblFolio" class="btn-action fileClip">
                                                                                    <i class="fas fa-paperclip"></i>
                                                                                </label>
                                                                                <input type="file" id="inpFolio" class="fileClip hidden" accept=".pdf" />
                                                                                <span id="spFolio" class="hidden"></span>
                                                                            </a>
                                                                            <a type="button" href="" id="folioUp" class="btn-action btn-file disabled hidden" style="margin-right: 10px">
                                                                                <i class="far fa-file-pdf"></i>
                                                                            </a>
                                                                            <a type="button" href="" id="cancelFl" class="btn-action cancelEx hidden">
                                                                                <i class="fas fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer px-3 py-0" style="background-color: transparent;">
                                                    <a href="" id="btnContinuar2" class="btn-save-block addOrder visible" data-id="2"> Agregar</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step3">
                                                <div class="card-body px-2 py-0 tabsCardEspacio">
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label for="txtDestino" class="lbl-form p-0"> Destino <a id="popDestino" class="trashCan mr-auto disabled">*</a></label>
                                                            <input type="text" class="form-control form-control-border" id="txtDestino" placeholder="Hermosillo, Sonora, México" />
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label class="lbl-form p-0">Tipo de Envío <a id="popEnvio" class="trashCan mr-auto disabled">*</a></label>
                                                            <div class="f-flex my-1">
                                                                <input type="hidden" id="txtEnvio" value="">
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkMaritimo" name="r2" class="chkEnvio" />
                                                                    <label for="chkMaritimo" class="lbl-form p-0">Máritimo</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkAereo" name="r2" class="chkEnvio" />
                                                                    <label for="chkAereo" class="lbl-form p-0">Áereo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-1 w-100">
                                                            <label class="lbl-form p-0 m-0">Incoterm <a id="popIncoterm" class="trashCan mr-auto disabled" data-original-title="" title="">*</a>
                                                                <label for="text-muted mb-1">
                                                                    <small>Los Incoterms son las normativas y cláusulas que rigen los contratos de compraventa del transporte de mercancías internacional.</small>
                                                                </label>
                                                            </label>
                                                            <div class="f-flex">
                                                                <input type="hidden" id="txtIcoterm" value="">
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkExworks" name="r3" class="chkIncoterm">
                                                                    <label for="chkExworks" class="lbl-form p-0">Exworks</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkFOB" name="r3" class="chkIncoterm">
                                                                    <label for="chkFOB" class="lbl-form p-0">FOB</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkCIF" name="r3" class="chkIncoterm">
                                                                    <label for="chkCIF" class="lbl-form p-0">CIF</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="chkDDP" name="r3" class="chkIncoterm">
                                                                    <label for="chkDDP" class="lbl-form p-0">DDP</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer px-3 py-0" style="background-color: transparent;">
                                                    <a href="" id="btnContinuar3" class="btn-save-block addOrder visible" data-id="3"> Agregar</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step4">
                                                <div class="card-body px-2 py-0 tabsCardEspacio">
                                                    <div class="f-flex">
                                                        <div class="form-group mx-2 mb-3 w-100">
                                                            <label for="txtCxomentario" class="lbl-form p-0"> Comentario</label>
                                                            <textarea class="form-control form-control-border" id="txtComentario" placeholder="Términos depago, coniciones de entrega, válidez de tiempo en la orden, etc." rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer px-3 py-0" style="background-color: transparent;">
                                                    <a href="" id="btnContinuar4" class="btn-save-block addOrder" data-id="4"> Agregar</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step5">
                                                <div class="card-body px-2 py-0">
                                                    <div class="f-flex">
                                                        <div class="text-center mx-2 mt-2 mb-5 w-100">
                                                            <label class="lbl-form p-0">
                                                                Si toda la informacion está correcta dar clic en
                                                                <span style="font-style: italic">Confirmar y enviar</span> o bien puedes <span style="font-style: italic">Agregar más</span> productos.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="text-center mx-2 mt-2 mb-2 w-100">
                                                            <a href="" id="btnEnviar" class="btn-save-block"> Confirmar y enviar</a>
                                                        </div>
                                                    </div>
                                                    <div class="f-flex">
                                                        <div class="text-center mx-2 mt-2 mb-5 w-100">
                                                            <a href="" id="btnMas" class="btn-link"> Agregar más</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 w-100 ml-auto tabsEspacio" id="colCard">
                                        <div id="cardInicio" class="card m-0 w-100 h-100">
                                            <div class="card-body f-flex">
                                                <div class="w-100">
                                                    <div class="icon-cardPedidos">
                                                        <i class="fas fa-ship"></i>
                                                    </div>
                                                    <div class="text-cardPedidos">Estas listo para realizar <br />tu primera importación</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="cardOrder" class="card hidden" style="margin: 2px 0px 0px !important;">
                                            <div class="card-body p-0 border-0">
                                                <div class="div-title">
                                                    <label class="lbl-title">Resumen orden</label>
                                                </div>
                                            </div>
                                            <div class="card-body p-0" id="cardProductos"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </section>
</div>