<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1-title">Detalles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="/index.html"><i class="nav-icon fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/aplication/proyectos-todos.html">Todos los proyectos</a>
                        </li>
                        <li class="breadcrumb-item active">Detalles</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-base card-outline">
                <div class="card-header">
                    <h5 class="card-title h5-title"><i class="far fa-file-alt"></i> <span id="dataFolio">2021-01</span>_<span id="dataProyecto"> Prueba I</span></h5>
                    <div class="card-tools ml-auto">
                        <a href type="button" class="btn btn-colap" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </a>
                        <a href type="button" class="btn btn-edit editProyecto">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body" style="display: block">
                    <div class="row">
                        <div class="col-xm-12 col-sm-4">
                            <strong class="text-mute">Cliente</strong>
                            <p class="mb-0"><span class="text-muted" id="dataCliente">Hector Cliente</span></p>
                        </div>
                        <div class="col-xm-12 col-sm-4">
                            <strong class="text-mute">Estatus</strong>
                            <p class="mb-0"><span class="text-muted" id="dataStatus">Producción</span></p>
                        </div>
                        <div class="col-xm-12 col-sm-4">
                            <strong class="text-mute">Asesor</strong>
                            <p class="mb-0"><span class="text-muted" id="dataAsesor">Héctor López</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <input type="hidden" id="txtTabDrop" value="" />
                    <div class="card card-second card-outline" style="border-top: 2px solid #fff !important">
                        <div class="card-header">
                            <ul class="nav nav-tabs nav-fill responsive-tabs" role="tablist">
                                <li id="liActive" class="nav-item liCollapsed hidden">
                                    <a class="nav-link" id="tabActive" data-toggle="tab" href="" role="tab" aria-selected="true"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tabProductos" data-toggle="tab" href="#Productos" role="tab" aria-selected="false">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabDocumentos" data-toggle="tab" href="#Documentos" role="tab" aria-selected="false">Documentos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabCotizacion" data-toggle="tab" href="#Cotizacion" role="tab" aria-selected="true">Cotizacion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabChecklist" data-toggle="tab" href="#Checklist" role="tab" aria-selected="false">Checklist</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body body-tabs">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Productos" role="tabpanel">
                                    <div class="post">
                                        <div class="card card-content">
                                            <div class="card-header">
                                                <h3 class="card-title mr-auto" data-card-widget="collapse">Termos</h3>
                                                <div class="card-tools ml-auto">
                                                    <a type="button" class="btn btn-min" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: block">
                                                <div class="row media">
                                                    <div class="col-12 media-body">
                                                        <div class="text-muted">
                                                            <p class="text-sm m-0">
                                                                <strong>Producto: </strong>
                                                                <span> Termo</span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Prec. Unit.: </strong>
                                                                <span> $3.45<small class="s-xs"> USD</small></span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Cantidad: </strong>
                                                                <span> 3,000.00<small> pzas.</small></span>
                                                            </p>
                                                            <p class="text-sm mb-1">
                                                                <strong>Total neto: </strong>
                                                                <span> $10,350.00<small class="s-xs"> USD</small></span>
                                                            </p>
                                                            <p class="text-sm mb-1">
                                                                <strong>Especificaciones: </strong>
                                                                <span> Capacidades entre 125ml, 500ml, 750ml, 1lt Distintos tipos, tamaños y colores.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="card card-content collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title mr-auto" data-card-widget="collapse">Prensa francesa</h3>
                                                <div class="card-tools ml-auto">
                                                    <a type="button" class="btn btn-min" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: none">
                                                <div class="row media">
                                                    <div class="col-sm-12 col-md-4 imgs">
                                                        <div class="single">
                                                            <img class="img-single img-fluid" src="/resources/proyecto/productos/producto_02-1.jpg" alt="Unic slide" data-id="1" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7 media-body">
                                                        <div class="text-muted">
                                                            <p class="text-sm m-0">
                                                                <strong>Producto: </strong>
                                                                <span> Termo</span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Prec. Unit.: </strong>
                                                                <span> $3.45<small class="s-xs"> USD</small></span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Cantidad: </strong>
                                                                <span> 3,000.00<small> pzas.</small></span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Total neto: </strong>
                                                                <span> $10,350.00<small class="s-xs"> USD</small></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="card card-content collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title mr-auto" data-card-widget="collapse">Vaso acrilico</h3>
                                                <div class="card-tools ml-auto">
                                                    <a type="button" class="btn btn-min" data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: none">
                                                <div class="row media">
                                                    <div class="col-sm-12 col-md-4 imgs">
                                                        <div class="carousel">
                                                            <div id="CarProducto_03" class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner" style="padding: 0px 12px">
                                                                    <div id="imgCarFirst_03" class="carousel-item active">
                                                                        <img class="img-carousel img-fluid" src="/resources/proyecto/productos/producto_03-1.png" alt="First slide" />
                                                                    </div>
                                                                    <div id="imgCarSecond_03" class="carousel-item">
                                                                        <img class="img-carousel img-fluid" src="/resources/proyecto/productos/producto_03-2.png" alt="Second slide" />
                                                                    </div>
                                                                    <div id="imgCarThird_03" class="carousel-item">
                                                                        <img class="img-carousel img-fluid" src="/resources/proyecto/productos/producto_03-3.png" alt="Third slide" />
                                                                    </div>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#CarProducto_03" role="button" data-slide="prev">
                                                                    <i class="fas fa-caret-left"></i>
                                                                </a>
                                                                <a class="carousel-control-next" href="#CarProducto_03" role="button" data-slide="next">
                                                                    <i class="fas fa-caret-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="minis">
                                                            <a href="" id="img_01" class="img_01 imgProdMin child-carousel mt-0 mx-0 mb-1" data-id="1">
                                                                <img src="/resources/proyecto/productos/producto_03-1.png" class="img-fluid" data-id="1" />
                                                            </a>
                                                            <a href="" id="img_02" class="img_02 imgProdMin child-carousel mt-0 mx-0 mb-1" data-id="2">
                                                                <img src="/resources/proyecto/productos/producto_03-2.png" class="img-fluid" data-id="2" />
                                                            </a>
                                                            <a href="" id="img_03" class="img_03 imgProdMin child-carousel mt-0 mx-0 mb-1" data-id="3">
                                                                <img src="/resources/proyecto/productos/producto_03-3.png" class="img-fluid" data-id="3" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7 media-body">
                                                        <div class="text-muted">
                                                            <p class="text-sm m-0">
                                                                <strong>Producto: </strong>
                                                                <span> Termo</span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Prec. Unit.: </strong>
                                                                <span> $3.45<small class="s-xs"> USD</small></span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Cantidad: </strong>
                                                                <span> 3,000.00<small> pzas.</small></span>
                                                            </p>
                                                            <p class="text-sm m-0">
                                                                <strong>Total neto: </strong>
                                                                <span> $10,350.00<small class="s-xs"> USD</small></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Documentos" role="tabpanel">
                                    <ul class="docs-list">
                                        <li class="lstDocs">
                                            <span class="span-rg text-left">
                                                <span id="docsName01">Ordenes de compra</span>
                                                <a href="" id="docsFile01" class="btn-link docsFile hidden" data-id="01"> <i class="far fa-fw fa-file-pdf"></i>Ordenes de compra.pdf </a>
                                            </span>
                                            <span class="span-rg text-right spTools">
                                                <a href="" data-id="01" id="fileClip01" class="fileClip" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                                    <label for="inpFiles01" id="lblClip01" class="fileClip icon-label" data-id="01">
                                                        <i class="fas fa-paperclip"></i>
                                                    </label>
                                                    <input id="inpFiles01" class="fileClip hidden" data-id="01" accept=".pdf" type="file" />
                                                    <div class="nameFile01 hidden"></div>
                                                </a>
                                                <a type="button" href="#" data-id="01" id="saveFile01" class="saveFile hidden">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                                <a type="button" href="#" data-id="01" id="cancelEx01" class="cancelEx hidden">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a type="button" href="#" data-id="01" id="trashCan01" class="trashCan hidden">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </span>
                                        </li>
                                        <li class="lstDocs">
                                            <span class="span-rg text-left">
                                                <span id="docsName02">Proforma invoice</span>
                                                <a href="" id="docsFile02" class="btn-link docsFile hidden" data-id="02"><i class="far fa-fw fa-file-pdf"></i>Proforma invoice.pdf</a>
                                            </span>
                                            <span class="span-rg text-right spTools">
                                                <a href="" data-id="02" id="fileClip02" class="fileClip" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                                    <label for="inpFiles02" id="lblClip02" class="fileClip icon-label" data-id="02">
                                                        <i class="fas fa-paperclip"></i>
                                                    </label>
                                                    <input id="inpFiles02" class="fileClip hidden" data-id="02" accept=".pdf" type="file" />
                                                    <div class="nameFile02 hidden"></div>
                                                </a>
                                                <a type="button" href="#" data-id="02" id="saveFile02" class="saveFile hidden">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                                <a type="button" href="#" data-id="02" id="cancelEx02" class="cancelEx hidden">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a type="button" href="#" data-id="02" id="trashCan02" class="trashCan hidden">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </span>
                                        </li>
                                        <li class="lstDocs">
                                            <span class="span-rg text-left">
                                                <span id="docsName03">Lista de empaque</span>
                                                <a href="" id="docsFile03" class="btn-link docsFile hidden" data-id="03"><i class="far fa-fw fa-file-pdf"></i>Lista de empaque.pdf</a>
                                            </span>
                                            <span class="span-rg text-right spTools">
                                                <a href="" data-id="03" id="fileClip03" class="fileClip" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                                    <label for="inpFiles03" id="lblClip03" class="fileClip icon-label" data-id="03">
                                                        <i class="fas fa-paperclip"></i>
                                                    </label>
                                                    <input id="inpFiles03" class="fileClip hidden" data-id="03" accept=".pdf" type="file" />
                                                    <div class="nameFile03 hidden"></div>
                                                </a>
                                                <a type="button" href="#" data-id="03" id="saveFile03" class="saveFile hidden">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                                <a type="button" href="#" data-id="03" id="cancelEx03" class="cancelEx hidden">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a type="button" href="#" data-id="03" id="trashCan03" class="trashCan hidden">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </span>
                                        </li>
                                        <li class="lstDocs">
                                            <span class="span-rg text-left">
                                                <span id="docsName04">Guía de embarques</span>
                                                <a href="" id="docsFile04" class="btn-link docsFile hidden" data-id="04"><i class="far fa-fw fa-file-pdf"></i>Guía de embarques.pdf</a>
                                            </span>
                                            <span class="span-rg text-right spTools">
                                                <a href="" data-id="04" id="fileClip04" class="fileClip" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                                    <label for="inpFiles04" id="lblClip04" class="fileClip icon-label" data-id="04">
                                                        <i class="fas fa-paperclip"></i>
                                                    </label>
                                                    <input id="inpFiles04" class="fileClip hidden" data-id="04" accept=".pdf" type="file" />
                                                    <div class="nameFile04 hidden"></div>
                                                </a>
                                                <a type="button" href="#" data-id="04" id="saveFile04" class="saveFile hidden">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                                <a type="button" href="#" data-id="04" id="cancelEx04" class="cancelEx hidden">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a type="button" href="#" data-id="04" id="trashCan04" class="trashCan hidden">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </span>
                                        </li>
                                        <li class="lstDocs">
                                            <span class="span-rg text-left">
                                                <span id="docsName05">Pedimentos</span>
                                                <a href="" id="docsFile05" class="btn-link docsFile hidden" data-id="05"><i class="far fa-fw fa-file-pdf"></i>Pedimentos.pdf</a>
                                            </span>
                                            <span class="span-rg text-right spTools">
                                                <a href="" data-id="05" id="fileClip05" class="fileClip" data-toggle="tooltip" data-placement="bottom" title="Seleccionar archivo">
                                                    <label for="inpFiles05" id="lblClip05" class="fileClip icon-label" data-id="05">
                                                        <i class="fas fa-paperclip"></i>
                                                    </label>
                                                    <input id="inpFiles05" class="fileClip hidden" data-id="05" accept=".pdf" type="file" />
                                                </a>
                                                <a type="button" href="#" data-id="05" class="saveFile hidden">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                                <a type="button" href="#" data-id="05" class="cancelEx hidden">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a type="button" href="#" data-id="05" class="trashCan hidden">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="Cotizacion" role="tabpanel">
                                    <!-- <div class="f-block">
                                                    <div class="form-group form-sm ml-auto mb-1 ml-2">
                                                    </div>
                                                </div> -->
                                    <div class="f-flex">
                                        <div class="form-group mx-2 mb-1 w-50 ml-auto">
                                            <label for="txtCambio" class="lbl-form p-0">Tipo cambio</label>
                                            <input type="text" class="form-control form-control-border" id="txtCambio" value="20.15" />
                                        </div>
                                    </div>
                                    <div class="f-flex">
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtTotal" class="lbl-form p-0">Total neto</label>
                                            <input type="text" class="form-control form-control-border" id="txtTotal" disabled />
                                        </div>
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtSubtotal" class="lbl-form p-0">Subtotal</label>
                                            <input type="text" class="form-control form-control-border" id="txtSubtotal" disabled />
                                        </div>
                                    </div>
                                    <div class="prodsContent">
                                        <div class="card card-lists" id="crdProductos">
                                            <div class="card-header" id="hdProductos">
                                                <label class="card-title mr-auto">Productos</label>
                                                <a href="" class="card-btn ml-auto newProd">Agregar</a>
                                            </div>
                                            <div class="card-body" id="byProductos" style="display: none">
                                                <input type="text" class="hidden" id="txtTotalProds" value="0" />
                                                <input type="text" class="form-control form-control-border hidden" id="txtMercancia" />
                                                <input type="text" class="form-control form-control-border hidden" id="txtTotalProd" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="f-flex">
                                        <input type="text" class="form-control form-control-border hidden" id="txtLogistica" />
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtInternacional" class="lbl-form p-0">Flete internacional <small class="s-sm">(USD)</small></label>
                                            <input type="text" class="form-control form-control-border" id="txtInternacional" />
                                        </div>
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtOtros" class="lbl-form p-0">Otros incrementos <small class="s-sm">(USD)</small></label>
                                            <input type="text" class="form-control form-control-border" id="txtOtros" />
                                        </div>
                                    </div>
                                    <div class="agenContent">
                                        <div class="card card-lists" id="crdAduana">
                                            <div class="card-header" id="hdAduana">
                                                <label class="card-title mr-auto">Agencia aduanales</label>
                                                <a href="" class="card-btn ml-auto newAduana">Seleccionar</a>
                                            </div>
                                            <div class="card-body" id="byAduana" style="display: none">
                                                <input type="text" id="txtTotalAd" value="0" class="hidden" />
                                                <input type="text" class="form-control form-control-border hidden" id="txtDespachoAd" />
                                                <div class="lists-cont">
                                                    <div id="crdElmAduana" class="card card-element collapsed-card">
                                                        <div class="card-header" data-card-widget="collapse">
                                                            <label class="card-title mr-auto" id="dataName"></label>
                                                            <div class="card-btns ml-auto">
                                                                <a type="button" class="btn-min" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </a>
                                                                <a type="button" class="btn-del trashCan" data-card-widget="remove" id="delAduana">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div id="byElmAduana" class="card-body" style="display: none">
                                                            <span class="element-title">
                                                                <span class="mr-auto">Total aduana</span>
                                                                <span class="ml-auto" id="dataTotalAd">$0.00</span>
                                                            </span>
                                                            <div class="element-cont mt-2 mb-1">
                                                                <div class="w-100 d-flex justify-content-between align-items-center">
                                                                    <div class="w-100 mx-1 mr-auto text-left">
                                                                        <div class="post" style="border-bottom: 0px !important">
                                                                            <dl class="text-muted mb-0">
                                                                                <div class="post-dl mb-1">
                                                                                    <strong>Honorarios</strong>
                                                                                    <p class="mb-0">$<span id="dataHonorarios">0.00</span></p>
                                                                                </div>
                                                                                <div class="post-dl mb-1">
                                                                                    <strong>Revalidación</strong>
                                                                                    <p class="mb-0">$<span id="dataRevalidación">0.00</span></p>
                                                                                </div>
                                                                                <div class="post-dl mb-0">
                                                                                    <strong>Complementarios</strong>
                                                                                    <p class="mb-0">$<span id="dataComplementarios">0.00</span></p>
                                                                                </div>
                                                                            </dl>
                                                                        </div>
                                                                    </div>
                                                                    <div class="w-100 mx-1 ml-auto text-right">
                                                                        <div class="post" style="border-bottom: 0px !important">
                                                                            <dl class="text-muted mb-0">
                                                                                <div class="post-dl mb-1">
                                                                                    <strong>Previo</strong>
                                                                                    <p class="mb-0">$<span id="dataPrevio">0.00</span></p>
                                                                                </div>
                                                                                <div class="post-dl mb-1">
                                                                                    <strong>Maniobras Puertos</strong>
                                                                                    <p class="mb-0">$<span id="dataManiobras">0.00</span></p>
                                                                                </div>

                                                                                <div class="post-dl mb-0">
                                                                                    <strong>Desconsolidación</strong>
                                                                                    <p class="mb-0">$<span id="dataDesconsolidación">0.00</span></p>
                                                                                </div>
                                                                            </dl>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="f-flex">
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="selSalida" class="lbl-form p-0">Puerto salida</label>
                                            <select class="custom-select form-control-border" id="selSalida">
                                                <option value="" disabled selected class="text-muted">Seleccionar</option>
                                                <option value="CN-TJN">Tianjin</option>
                                                <option value="CN-SHZ">Shenzhen</option>
                                                <option value="CN-SHA">Shanghai</option>
                                                <option value="CN-QND">Qingdao</option>
                                                <option value="CN-NGB">Ningbo</option>
                                            </select>
                                        </div>
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="selLlegada" class="lbl-form p-0">Puerto llegda</label>
                                            <select class="custom-select form-control-border" id="selLlegada">
                                                <option value="" disabled selected class="text-muted">Seleccionar</option>
                                                <option value="MX-HMO">Hermosillo</option>
                                                <option value="MX-GDL">Guadalajara</option>
                                                <option value="MX-CDM">Ciudad de México</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="f-flex">
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtNacional" class="lbl-form p-0">Flete nacional</label>
                                            <input type="text" class="form-control form-control-border" id="txtNacional" />
                                        </div>
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtDTA" class="lbl-form p-0">DTA</label>
                                            <input type="text" class="form-control form-control-border" id="txtDTA" disabled />
                                        </div>
                                    </div>
                                    <div class="f-flex">
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <input type="text" id="txtArancel" value="0" class="hidden" />
                                            <label for="selArancel" class="lbl-form p-0">Arancel</label>
                                            <select class="custom-select form-control-border" id="selArancel">
                                                <option value="">Seleccionar</option>
                                                <option value="0">0%</option>
                                                <option value="0.05">5%</option>
                                                <option value="0.10">10%</option>
                                                <option value="0.15">15%</option>
                                            </select>
                                        </div>
                                        <div class="form-group mx-2 mb-1 w-100">
                                            <label for="txtIVA" class="lbl-form p-0">IVA<small class="s-sm"> (16%)</small></label>
                                            <input type="text" class="form-control form-control-border" id="txtIVA" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Checklist" role="tabpanel">
                                    <div class="card card-tasks">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tabs1" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><span>1</span>
                                                        <p>Orden compra</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tabs2" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><span>2</span>
                                                        <p>Producción</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tabs3" data-toggle="pill" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><span>3</span>
                                                        <p>Flete</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tabs4" data-toggle="pill" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><span>4</span>
                                                        <p>Despacho aduna</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <hr />
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tabs1">
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Orden de compra</p>
                                                    </div>
                                                    <ul class="todo-list" data-widget="todo-list">
                                                        <li class="lstTask" data-id="1">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo1" id="todoCheck1" />
                                                                <label for="todoCheck1"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask1">Se selecciono al proveedor correcto</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck1" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="2">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck2" />
                                                                <label for="todoCheck2"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask2">Se verificaron los SKUs con el sistema interno</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck2" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="3">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck3" />
                                                                <label for="todoCheck3"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask3">Cantidades coinciden con el requerimiento solicitado </span>
                                                            <span class="span-rg text-right"><small id="badgetCheck3" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="4">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck4" />
                                                                <label for="todoCheck4"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask4">Se solicito descuento a proveedor por volumen</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck4" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="5">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck5" />
                                                                <label for="todoCheck5"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask5">Proveedor confirmo de recibido la orden de compra</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck5" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="6">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck6" />
                                                                <label for="todoCheck6"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask6">Almacen notificado de fecha estimada de entrega</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck6" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="7">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck7" />
                                                                <label for="todoCheck7"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask7">Anticipo realizado a proveedor</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck7" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tabs2">
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Producción</p>
                                                    </div>
                                                    <ul class="todo-list" data-widget="todo-list">
                                                        <li class="lstTask" data-id="0-1">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo1" id="todoCheck0-1" />
                                                                <label for="todoCheck0-1"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-1">Proveedor se mantiene alineado a fecha de entrega pactada</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-1" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-2">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-2" />
                                                                <label for="todoCheck0-2"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-2">Inspección de calidad realizada</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-2" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-3">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-3" />
                                                                <label for="todoCheck0-3"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-3">Agente de carga designado para operación</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-3" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-4">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-4" />
                                                                <label for="todoCheck0-4"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-4">Agente aduanal designado para operación</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-4" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-5">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-5" />
                                                                <label for="todoCheck0-5"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-5">Fecha de término de producción confirmada</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-5" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-6">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-6" />
                                                                <label for="todoCheck0-6"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-6">Liquidación a proveedor</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-6" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0-7">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0-7" />
                                                                <label for="todoCheck0-7"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0-7">Documentos de embarque recibidos</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0-7" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tabs3">
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Flete</p>
                                                    </div>
                                                    <ul class="todo-list" data-widget="todo-list">
                                                        <li class="lstTask" data-id="01">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo1" id="todoCheck01" />
                                                                <label for="todoCheck01"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask01">Packing list recibido por agente de carga</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck01" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="02">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck02" />
                                                                <label for="todoCheck02"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask02">Booking realizado</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck02" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="03">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck03" />
                                                                <label for="todoCheck03"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask03">Documentos de carga recibidos</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck03" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="04">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck04" />
                                                                <label for="todoCheck04"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask04">Fecha de arribo a puerto confirmada</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck04" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="05">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck05" />
                                                                <label for="todoCheck05"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask05">Pago realizado a agente de carga</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck05" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tabs4">
                                                    <div class="tab-custom-content">
                                                        <p class="lead mb-0">Despacho aduana</p>
                                                    </div>
                                                    <ul class="todo-list" data-widget="todo-list">
                                                        <li class="lstTask" data-id="0_1">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo1" id="todoCheck0_1" />
                                                                <label for="todoCheck0_1"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_1">Documentos de mercancia enviados a agente aduanal</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_1" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_2">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_2" />
                                                                <label for="todoCheck0_2"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_2">Mercancia recibida en aduana</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_2" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_3">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_3" />
                                                                <label for="todoCheck0_3"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_3">Fracciones arancelarias confirmadas</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_3" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_4">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_4" />
                                                                <label for="todoCheck0_4"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_4">Pro forma de pedimento recibida</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_4" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_5">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_5" />
                                                                <label for="todoCheck0_5"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_5">Pago realizado a agente aduanal</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_5" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_6">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_6" />
                                                                <label for="todoCheck0_6"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_6">Mercancia liberada</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_6" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                        <li class="lstTask" data-id="0_7">
                                                            <div class="icheck icheck-success d-inline">
                                                                <input type="checkbox" value="" name="todo2" id="todoCheck0_7" />
                                                                <label for="todoCheck0_7"></label>
                                                            </div>
                                                            <span class="span-rg text-left" id="spTask0_7">Pedimento y cuenta de gastos recibida</span>
                                                            <span class="span-rg text-right"><small id="badgetCheck0_7" class="badge badge-light badgeCheck hidden"></small></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-map collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title mr-auto">Mapa</h3>
                            <div class="card-tools ml-auto" style="margin: -3px 0px 0px !important">
                                <a type="button" class="btn btn-min" data-card-widget="collapse" title="Collapse" style="font-size: 12px; line-height: 0rem; padding: 0rem 0.75rem; vertical-align: baseline">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body" style="display: none">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3486.4506061989196!2d-110.95029088540284!3d29.09237546987128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ce858f714cee0d%3A0x29010f6b3a544538!2sReachmx%20Trade%20Solutions!5e0!3m2!1ses!2smx!4v1629782645866!5m2!1ses!2smx" width="650" height="250" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-xm-12 col-sm-5">
                    <div class="card card-base">
                        <div class="card-header">
                            <h3 class="card-title mr-auto">Proyecto</h3>
                            <div class="card-tools ml-auto">
                                <a href type="button" class="btn btn-colap" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </a>
                                <a href type="button" class="btn btn-edit editProyect">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <ul class="nav flex-column">
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_0-5">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">No. Contenedor</span>
                                            <span class="span-rg text-right" id="dataContenedor">COSU6261141790</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Fecha salida</span>
                                            <span class="span-rg text-right" id="dataETD">19/07/2021</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Fecha llegada</span>
                                            <span class="span-rg text-right" id="dataETA">30/08/2021</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Resticciones</span>
                                            <span class="span-rg text-right" id="dataRestigciones">NOM. 050 Etiquetado</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Frac. Arancel</span>
                                            <span class="span-rg text-right" id="dataFracc">90041001</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_0_5">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">No. Viaje</span>
                                            <span class="span-rg text-right" id="dataViaje">2033</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Buque carga</span>
                                            <span class="span-rg text-right" id="dataBuque">CMA CGM LISA MARIE 0MH59E1</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card card-third card-outline">
                        <div class="card-header">
                            <h3 class="card-title mr-auto">Resumen de gastos</h3>
                            <div class="card-tools ml-auto">
                                <a href type="button" class="btn btn-colap" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-2" style="display: block">
                            <ul class="nav flex-column">
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_0-5">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Valor mercancía <small class="s-xs">(USD)</small></span>
                                            <span class="span-rg text-right" id="dataMercancia">$13,320.00</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item border-0">
                                    <a class="list-group-item flex-column align-items-center border-0 px_05">
                                        <div class="d-flex justify-content-between">
                                            <span class="span-rg text-left">Tipo de cambio</span>
                                            <span class="span-rg text-right" id="dataCambio">$20.20</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="card card-extend collapsed-card">
                                <div class="card-tools">
                                    <a href="" type="button" class="btn btn-show" data-card-widget="collapse">
                                        <span id="extendText"> Ver más</span>
                                    </a>
                                </div>
                                <div class="card-body" style="display: none; padding: 5px 0px; margin: 0px -5px">
                                    <ul class="nav flex-column">
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">Logística internacional <small class="s-xs">(USD)</small></span>
                                                <span class="span-rg text-right" id="dataLogistica">$6,200.00</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">Despacho aduanal</span>
                                                <span class="span-rg text-right" id="dataDesAduanal">$20,174.37</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left sp-info">
                                                    <span>Arancel </span>
                                                    <small class="s-sm">
                                                        <span id="dataPorcentaje">(0%) </span>
                                                        <span id="popAran" class="badge bg-pop disabled"><i class="far fa-question-circle"></i></span></small>
                                                </span>
                                                <span class="span-rg text-right" id="dataArancel">$6,308.86</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">Flete nacional</span>
                                                <span class="span-rg text-right" id="dataNacional">$19,715.20</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">Honorarios</span>
                                                <span class="span-rg text-right" id="dataHonorario">$33,000.00</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">Subtotal</span>
                                                <span class="span-rg text-right" id="dataSubtotal">$473,502.43</span>
                                            </a>
                                        </li>
                                        <li class="nav-item border-0">
                                            <a class="nav-link d-flex justify-content-between" style="padding: 5px">
                                                <span class="span-rg text-left">IVA <small class="s-sm">(16%)</small></span>
                                                <span class="span-rg text-right" id="dataIVA">$75,760.39</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <label>Total neto</label>
                            <h3 id="dataTotal">$549,262.82</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalProyecto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProyecto" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModalP" class="modal-title title-color"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form class="form-horizontal" id="guardarProyecto">
                            <div class="modal-body p-0">
                                <div class="card-body cards-productos pb-0">
                                    <div class="form-group">
                                        <label class="span-rg p-0">Cliente</label>
                                        <input required id="txtCliente" type="text" class="form-control form-control-border" placeholder="Cliente" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Estatus</label>
                                        <select class="custom-select form-control-border" id="selEstatus">
                                            <option value="Nuevo">Nuevo</option>
                                            <option value="Producción">Producción</option>
                                            <option value="Log.Internacional">Log.Internacional</option>
                                            <option value="En proceso">En proceso</option>
                                            <option value="Despacho aduanal">Despacho aduanal</option>
                                            <option value="Tránsito">Tránsito</option>
                                            <option value="Concluido">Concluido</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Asesor</label>
                                        <select class="custom-select form-control-border" id="selAsesor">
                                            <option value="Por definir" disabled selected>Asesor</option>
                                            <option value="Héctor López">Héctor López</option>
                                            <option value="Monica Badillo">Monica Badillo</option>
                                            <option value="Gerardo Sanchez">Gerardo Sanchez</option>
                                            <option value="Carla García">Carla García</option>
                                            <option value="Jose Gómez">Jose Gómez</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo saveProyecto" id="btn-proyecto">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalProyect" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProyect" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModal" class="modal-title title-color"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form class="form-horizontal" id="guardarProyect">
                            <div class="modal-body p-0" style="height: 42vh; width: 100%; overflow-y: auto">
                                <div class="card-body cards-productos pb-0">
                                    <div class="form-group">
                                        <label class="span-rg p-0">N° Contenedor</label>
                                        <input id="txtContenedor" type="text" class="form-control form-control-border" placeholder="N° Contenedor" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Fecha Limite</label>
                                        <input id="txtETD" type="date" max="3000-12-31" min="1950-01-01" class="form-control form-control-border" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Fecha llegada</label>
                                        <input id="txtETA" type="date" max="3000-12-31" min="1950-01-01" class="form-control form-control-border" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Restricciones</label>
                                        <input id="txtRestricciones" type="text" class="form-control form-control-border" placeholder="Restricciones" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Fracc.Arancelaria</label>
                                        <input id="txtFraccAran" type="text" class="form-control form-control-border" placeholder="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">N° Viaje</label>
                                        <input id="txtNoViaje" type="text" class="form-control form-control-border" placeholder="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="span-rg p-0">Buque carga</label>
                                        <input id="txtBuque" type="text" class="form-control form-control-border" placeholder="Bueque carga" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo saveProyect" id="btn-proyect">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDocs" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDocs" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModalDoc" class="modal-title title-color"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="card-body cards-productos p-0">
                                <embed src="/resources/proyecto/documentos/docExample.pdf" frameborder="0" width="100%" height="440px" />
                            </div>
                        </div>
                        <div class="modal-footer ml-auto">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalImgProd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalImgProd" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModalImg" class="modal-title title-color">Producto imagenes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-prodImgs">
                                <div class="single text-center p-4">
                                    <img id="imgZoom" class="img-fluid" src="/resources/proyecto/productos/producto_03-1.png" alt="First Img" />
                                </div>
                                <div id="minis" class="hidden">
                                    <div class="minis">
                                        <a href="" id="imgProdMin1" class="imgProdMin mt-0 mx-0 mb-1 hidden" data-id="1">
                                            <img src="/resources/proyecto/productos/producto_03-1.png" class="img-fluid" id="img_1" />
                                        </a>
                                        <a href="" id="imgProdMin2" class="imgProdMin mt-0 mx-0 mb-1 hidden" data-id="2">
                                            <img src="/resources/proyecto/productos/producto_03-2.png" class="img-fluid" id="img_2" />
                                        </a>
                                        <a href="" id="imgProdMin3" class="imgProdMin mt-0 mx-0 mb-1 hidden" data-id="3">
                                            <img src="/resources/proyecto/productos/producto_03-3.png" class="img-fluid" id="img_3" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ml-auto">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalProductos" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProductos" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModalProd" class="modal-title title-color">Productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body p-0">
                            <div id="cardProductos" class="card direct-chat">
                                <div class="card-body">
                                    <div class="direct-chat-messages">
                                        <ul class="producto-list">
                                            <li class="lsProducto">
                                                <span class="span-rg text-left">
                                                    <p id="nameProducto01" class="nameProducto" style="margin-bottom: -6px">Filtros de agua</p>
                                                    <small id="nameProv01" class="nameProv">Amed Refrigeration Solutions</small>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editProducto" title="Contacts" data-id="01" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsProducto">
                                                <span class="span-rg text-left">
                                                    <p id="nameProducto02" class="nameProducto" style="margin-bottom: -6px">Popotes de Bambú</p>
                                                    <small id="nameProv02" class="nameProv">Anhui Green Earth Technology Co., Ltd</small>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editProducto" title="Contacts" data-id="02" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsProducto">
                                                <span class="span-rg text-left">
                                                    <p id="nameProducto03" class="nameProducto" style="margin-bottom: -6px">Productos de papel</p>
                                                    <small id="nameProv03" class="nameProv">Anping County Yize Metal Products Co., Ltd</small>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editProducto" title="Contacts" data-id="03" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsProducto">
                                                <span class="span-rg text-left">
                                                    <p id="nameProducto04" class="nameProducto" style="margin-bottom: -6px">Piezas de acero</p>
                                                    <small id="nameProv04" class="nameProv">Chaozhou Jurong Melamine Products Co., Ltd</small>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editProducto" title="Contacts" data-id="04" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsProducto">
                                                <span class="span-rg text-left">
                                                    <p id="nameProducto05" class="nameProducto" style="margin-bottom: -6px">Termos</p>
                                                    <small id="nameProv05" class="nameProv">Shenzhen Zhenghao Plasyic Packaging Co.,Ltd</small>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editProducto" title="Contacts" data-id="05" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="direct-chat-contacts">
                                        <div class="f-flex">
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <span class="span-rg" id="txtProd"></span>
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100 text-right">
                                                <a type="button" class="btn trashCan btn-tool" data-widget="chat-pane-toggle">
                                                    <i class="fas fa-backspace"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="f-block text-center">
                                            <span class="span-rg" id="txtProv"></span>
                                        </div>

                                        <div class="f-flex">
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtPrecio" class="lbl-form p-0">Prec.Unit <small class="s-xs">(USD)</small></label>
                                                <input type="text" class="form-control form-control-border" id="txtPrecio" />
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtCantidad" class="lbl-form p-0">Cantidad</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-border" id="txtCantidad" />
                                                    <div class="input-group-append">
                                                        <select class="form-control form-control-border" id="selUnidad" style="width: 100%">
                                                            <option value="" selected="" disabled="" class="text-muted">Unidad</option>
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
                                                <label for="txtProdTotal" class="lbl-form p-0">Total <small class="s-xs">(USD)</small></label>
                                                <input type="text" class="form-control form-control-border" id="txtProdTotal" />
                                            </div>

                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtCantidad" class="lbl-form p-0">Media</label>
                                                <div class="media-group">
                                                    <span class="actions">Producto imagenes</span>
                                                    <div class="actions-group ml-auto">
                                                        <a type="button" href="" id="fileClip" class="btn-action fileClip">
                                                            <label for="inpFiles" id="lblClip" class="btn-action fileClip">
                                                                <i class="fas fa-paperclip"></i>
                                                            </label>
                                                            <input type="file" id="inpFiles" class="fileClip hidden" accept="image/*" />
                                                        </a>
                                                        <a type="button" href="" id="upFiles" class="btn-action upFiles hidden">
                                                            <i class="fas fa-upload"></i>
                                                        </a>
                                                        <a type="button" href="" id="cancelEx" class="btn-action cancelEx hidden">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="f-block mx-2">
                                            <div class="form-group mb-1 w-100">
                                                <label for="txtEspecf" class="lbl-form p-0">Especificaciones</label>
                                                <textarea type="text" class="form-control form-control-border" id="txtEspecf"></textarea>
                                            </div>
                                        </div>
                                        <div class="mediaStock hidden">
                                            <div class="f-flex">
                                                <div class="mediaStock1 hidden">
                                                    <span class="mediaBlock">
                                                        <a type="button" href="" data-id="1" class="badge trashCan del-prod" id="trashCan1">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                        <i class="far fa-image"></i>
                                                        <span class="imgProdName"> Prod imag_1.png</span>
                                                        <span id="imgProdName1" class="hidden"></span>
                                                    </span>
                                                </div>
                                                <div class="mediaStock2 hidden">
                                                    <span class="mediaBlock">
                                                        <a type="button" href="" data-id="2" class="badge trashCan del-prod" id="trashCan2">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                        <i class="far fa-image"></i>
                                                        <span class="imgProdName"> Prod imag_2.png</span>
                                                        <span id="imgProdName2" class="hidden"></span>
                                                    </span>
                                                </div>
                                                <div class="mediaStock3 hidden">
                                                    <span class="mediaBlock">
                                                        <a type="button" href="" data-id="3" class="badge trashCan del-prod" id="trashCan3">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                        <i class="far fa-image"></i>
                                                        <span class="imgProdName"> Prod imag_3.png</span>
                                                        <span id="imgProdName3" class="hidden"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="mediWarning" class="infoWarning hidden">Maximo de archivos alcanzado, eliminar alguno para agregar uno nuevo</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mdFootP" class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo hidden saveProducto">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalDespAduana" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDespAduana" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titleModalAduana" class="modal-title title-color">Agencias aduanales</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body p-0">
                            <div id="cardAduanas" class="card direct-chat">
                                <div class="card-body">
                                    <div class="direct-chat-messages">
                                        <ul class="aduna-list">
                                            <li class="lsAduana">
                                                <span class="span-rg text-left">
                                                    <span id="nameAduana01" class="nameAduana">Gamas</span>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editAduana" title="Contacts" data-id="01" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsAduana">
                                                <span class="span-rg text-left">
                                                    <span id="nameAduana02" class="nameAduana">Giraud</span>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editAduana" title="Contacts" data-id="02" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsAduana">
                                                <span class="span-rg text-left">
                                                    <span id="nameAduana03" class="nameAduana">Joffroy</span>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editAduana" title="Contacts" data-id="03" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="lsAduana">
                                                <span class="span-rg text-left">
                                                    <span id="nameAduana04" class="nameAduana">Maval</span>
                                                </span>
                                                <span class="span-rg text-right spTools">
                                                    <a type="button" class="btn btn-tool editAduana" title="Contacts" data-id="04" data-widget="chat-pane-toggle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="direct-chat-contacts">
                                        <div class="f-flex">
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <span class="span-rg" id="txtAduana"></span>
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100 text-right">
                                                <a type="button" class="btn trashCan btn-tool" data-widget="chat-pane-toggle">
                                                    <i class="fas fa-backspace"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="f-block text-right"></div>
                                        <div class="f-flex">
                                            <input type="text" class="form-control form-control-border hidden" id="txtTotalAgAd" />
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtHonorarios" class="lbl-form p-0">Honorarios</label>
                                                <input type="text" class="form-control form-control-border" id="txtHonorarios" disabled />
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtRevalidación" class="lbl-form p-0">Revalidación</label>
                                                <input type="text" class="form-control form-control-border" id="txtRevalidación" value="500.00" />
                                            </div>
                                        </div>
                                        <div class="f-flex">
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtComplementarios" class="lbl-form p-0">Complementarios</label>
                                                <input type="text" class="form-control form-control-border" id="txtComplementarios" value="400.00" />
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtPrevio" class="lbl-form p-0">Previo</label>
                                                <input type="text" class="form-control form-control-border" id="txtPrevio" value="300.00" />
                                            </div>
                                        </div>
                                        <div class="f-flex">
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtManiobras" class="lbl-form p-0">Maniobras puertos</label>
                                                <input type="text" class="form-control form-control-border" id="txtManiobras" value="5000.00" />
                                            </div>
                                            <div class="form-group mx-2 mb-1 w-100">
                                                <label for="txtDesconsolidación" class="lbl-form p-0">Desconsolidación</label>
                                                <input type="text" class="form-control form-control-border" id="txtDesconsolidación" value="1500.00" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mdFoot" class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo hidden saveAduana">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>