
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
                                        <a href="/aplication/agencias-aduanales.html">Proveedores</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detalles</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fas fa-city"></i> Proveedor</h5>
                                <div class="card-tools">
                                    <div class="btn-group">
                                        <a href="" type="button" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="" class="editProveedor dropdown-item">Proveedor</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="" id="dataIdContacto" data-id="01" class="editContacto dropdown-item">Contacto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="display: block">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" id="dataStatus" value="1" />
                                        <h4><span class="text-muted" id="dataProveedor">Amed Refrigeration Solutions</span></h4>
                                    </div>
                                    <div class="col-xm-12 col-sm-6">
                                        <strong>Contacto</strong>
                                        <p class="mb-0"><span class="text-muted" id="dataContacto">Jack Xu</span></p>
                                    </div>
                                    <div class="col-xm-12 col-sm-6">
                                        <strong>Correo</strong>
                                        <p class="mb-0"><span class="text-muted" id="dataCorreo">supplier1@supplier.com</span></p>
                                    </div>
                                    <div class="col-xm-12 col-sm-6">
                                        <strong>Telefono</strong>
                                        <p class="mb-0">
                                            <span class="text-muted" id="dataLada">(+ 86)</span>
                                            <span class="text-muted" id="dataTelefono">(000) 0000-0000</span>
                                        </p>
                                    </div>
                                    <div class="col-xm-12 col-sm-6">
                                        <strong>Dirección</strong>
                                        <p class="mb-0"><span class="text-muted" id="dataDireccion">Qingdao,China</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom">
                                <ul class="nav nav-tabs nav-fill ml-auto" role="tablist">
                                    <li class="nav-item">
                                        <a href="" class="nav-link active" id="tabsProductos" data-toggle="pill" role="tab">Productos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" id="tabsContactos" data-toggle="pill" role="tab">Contactos</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div id="tabProductos">
                                    <div class="p-0 m-0">
                                        <div class="text-right border-0 px-3 pt-3 pb-2">
                                            <a href="" class="newProducto" type="button">Nueva Producto</a>
                                        </div>
                                        <div class="card-body p-2">
                                            <input id="txtCountProducto" type="hidden" value="1" />
                                            <table id="tblProdProv" class="table table-borderless responsive" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="0"></th>
                                                        <th data-priority="1">Producto</th>
                                                        <th data-priority="3">Frac. Arancelaria</th>
                                                        <th data-priority="2" class="row-icons"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="shadow border-row align-td">
                                                        <td class="align-td"></td>
                                                        <td class="align-td">
                                                            <span class="dataProducto_01 td-text">Filtros de agua</span>
                                                        </td>
                                                        <td class="align-td">
                                                            <span class="dataFraccion_01 td-text">12345678</span>
                                                        </td>
                                                        <td class="icons-td">
                                                            <a href="" type="button" class="editProducto" data-id="01"><i class="fas fa-edit"></i></a>
                                                            <a href="" type="button" class="trashCan" data-id="01"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabContactos" class="hidden">
                                    <div class="p-0 m-0">
                                        <div class="text-right border-0 px-3 pt-3 pb-2">
                                            <a href="" class="newContacto" type="button">Nuevo Contacto</a>
                                        </div>
                                        <div class="card-body p-2">
                                            <input id="txtCountContacto" type="hidden" value="1" />
                                            <table id="tblContacto" class="table table-borderless responsive" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="0"></th>
                                                        <th data-priority="1">Contacto</th>
                                                        <th data-priority="3">Correo</th>
                                                        <th data-priority="4">Telefono</th>
                                                        <th data-priority="5">Estatus</th>
                                                        <th data-priority="2" class="row-icons"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="shadow border-row align-td">
                                                        <td class="align-td"></td>
                                                        <td class="align-td">
                                                            <span class="dataContacto_01 td-text">Luis Pérez</span>
                                                        </td>
                                                        <td class="align-td">
                                                            <span class="dataCorreo_01 td-text">supplier1@supplier.com</span>
                                                        </td>
                                                        <td class="align-td">
                                                            <span class="dataLada_01 td-text">(+ 86)</span>
                                                            <span class="dataTelefono_01 td-text">(000) 0000-0000</span>
                                                        </td>
                                                        <td class="align-td">
                                                            <span class="dataStatus_01 td-text tdStatus selected">Definido</span>
                                                        </td>
                                                        <td class="icons-td">
                                                            <a href="" type="button" class="editContacto" data-id="01"><i class="fas fa-edit"></i></a>
                                                            <a href="" type="button" class="trashCan" data-id="01"><i class="far fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalContacto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalContacto" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="titleModalA" class="modal-title title-color"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form class="form-horizontal" id="agregarContacto">
                                        <input type="hidden" id="idContacto" value="0" />
                                        <div class="modal-body p-0">
                                            <div class="card-body cards-productos pb-0">
                                                <div class="row">
                                                    <div class="fmContacto col-9">
                                                        <div class="form-group">
                                                            <label for="txtContacto">Nombre</label>
                                                            <input type="text" class="form-control form-control-border" id="txtContacto" required placeholder="Nombre" />
                                                            <div id="val_txtContacto" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                        </div>
                                                    </div>
                                                    <div class="fmStatus col-3">
                                                        <div class="form-group">
                                                            <label for="selEstatus">Definido</label>
                                                            <select class="form-control form-control-border" id="selEstatus">
                                                                <option value="0">No</option>
                                                                <option value="1">Si</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtCorreo">Correo</label>
                                                    <input type="email" class="form-control form-control-border" id="txtCorreo" required placeholder="ejemplo@ejemplo.com" />
                                                    <div id="val_txtCorreo" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtTelefono">Telefono</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-border" disabled id="txtTelefono" placeholder="(000) 000-0000" />
                                                        <div class="input-group-append">
                                                            <select class="form-control form-control-border" id="selLada" style="width: 100%">
                                                                <option disabled selected>Lada</option>
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
                                                    <div id="val_selLada" class="valid-inputs" style="display: none">Este campo es necesario para llenar el teléfono</div>
                                                    <div id="val_txtTelefono" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo addContacto" id="btn-contacto"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalProducto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProducto" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="titleModalPd" class="modal-title title-color"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form class="form-horizontal" id="agregarProducto">
                                        <input type="hidden" id="idProducto" value="0" />
                                        <div class="modal-body p-0">
                                            <div class="card-body cards-productos pb-0">
                                                <div class="form-group">
                                                    <label for="txtProducto">Producto</label>
                                                    <input type="text" class="form-control form-control-border" id="txtProducto" required placeholder="Producto" />
                                                    <div id="val_txtProducto" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtFraccion">Frac. Arancelaria</label>
                                                    <input type="text" class="form-control form-control-border" id="txtFraccion" required placeholder="00000000" maxlength="8" minlength="8"/>
                                                    <div id="val_txtFraccion" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo addProducto" id="btn-producto"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalProv" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalProv" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="titleModalPv" class="modal-title title-color">Editar Proveedor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form class="form-horizontal" id="editarProveedor">
                                        <div class="modal-body p-0">
                                            <div class="card-body cards-productos pb-0">
                                                <div class="form-group">
                                                    <label for="txtProveedor">Proveedor</label>
                                                    <input type="text" class="form-control form-control-border" id="txtProveedor" required placeholder="Proveedor" />
                                                    <div id="val_txtProveedor" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtProvDirec">Dirección</label>
                                                    <input type="text" class="form-control form-control-border" id="txtProvDirec" required placeholder="Dirección" />
                                                    <div id="val_txtProvDirec" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo saveProveedor">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>