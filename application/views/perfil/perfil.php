<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1-title">Perfil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.html">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile pb-0">
                            <div class="text-center">
                                <img src="/resources/img/usuario.jpg" class="profile-user-image img-fluid img-circle" id="imgPerfil" alt="Imagen usuario perfil" />
                            </div>
                            <h3 class="profile-username text-center" id="dataNombre">Héctor López</h3>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-12">
                                <div class="post">
                                    <strong><i class="fas fa-user mr-1"></i> Sobre mi</strong>
                                    <dl class="text-muted">
                                        <dt>Correo</dt>
                                        <dd id="dataCorreo">hector@xyz.com.com</dd>
                                        <dt>Telefono</dt>
                                        <dd>
                                            <span id="dataLada">(+ 52)</span>
                                            <span id="dataTelefono">(000) 000-0000</span>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="post clearfix">
                                    <strong><i class="fas fa-book mr-1"></i> Profesión</strong>
                                    <dl class="text-muted">
                                        <dt>Área</dt>
                                        <dd id="dataArea">Gerenye Logística</dd>
                                        <dt>Puesto</dt>
                                        <dd id="dataPuesto">Administrador</dd>
                                    </dl>
                                </div>
                                <div class="post">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Empresa</strong>
                                    <dl class="text-muted">
                                        <dt>Nombre</dt>
                                        <dd id="dataEmpresa">ReachMx</dd>
                                        <dt>Dirección</dt>
                                        <dd>
                                            <span id="dataCalle">Zacatecas</span>,
                                            <span id="dataNoExt">73</span>
                                            <span id="dataNoInt">A</span>
                                            <span id="dataEntreCll">entre Felicitas Zermeño y C. Rayón</span>, <span id="dataColonia">5 de Mayo</span>, <span id="dataCodigoP">83010</span>.
                                        </dd>
                                        <dt>Localidad</dt>
                                        <dd><span id="dataCiudad">Hermosillo</span>, <span id="dataEstado">Sonora</span>, <span id="dataPais">México</span>.</dd>
                                    </dl>
                                </div>
                                <div class="post clearfix">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Notas</strong>
                                    <p class="text-muted" id="dataNotas">sobre mi persona ante los equipos, presentaciones, empresa y clientes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body pr-0 pl-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="post">
                                        <div class="card shadow-none">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <strong><i class="fas fa-user mr-1"></i> Sobre mi</strong>
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group text-center">
                                                    <label id="lblImg btn-app" style="position: relative">
                                                        <img id="imgUsuario" src="/resources/img/usuario.jpg" class="profile-user-image img-fluid img-circle" />
                                                        <input id="fileImgUsuario" onchange="readURL(this);" accept="image/*" type="file" style="display: none" />
                                                        <span class="badge bg-perfil"><i class="far fa-edit"></i></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtNombre">Nombre completo</label>
                                                    <input type="text" class="form-control form-control-border" id="txtNombre" placeholder="Nombre completo" />
                                                </div>
                                                <div class="row m-0">
                                                    <div class="col-sm-7 pl-0">
                                                        <div class="form-group">
                                                            <label for="txtCorreo">Correo</label>
                                                            <input type="text" class="form-control form-control-border" id="txtCorreo" placeholder="ejemplo@ejemplo.com" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 pr-0">
                                                        <div class="form-group">
                                                            <label for="">Telefono</label>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post clearfix">
                                        <div class="card shadow-none collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <strong><i class="fas fa-book mr-1"></i> Profesión</strong>
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: none">
                                                <div class="row m-0">
                                                    <div class="col-sm-6 pl-0">
                                                        <div class="form-group">
                                                            <label for="txtArea">Área</label>
                                                            <input type="text" class="form-control form-control-border" id="txtArea" placeholder="Gerencia" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 pr-0">
                                                        <div class="form-group">
                                                            <label for="txtPuesto">Puesto</label>
                                                            <input type="text" class="form-control form-control-border" id="txtPuesto" placeholder="Administrador" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="card shadow-none collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Empresa</strong>
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: none">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtEmpresa" placeholder="Nombre de tu empresa" />
                                                </div>
                                                <label>Dirección</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtCalle" placeholder="Calle/avenida" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtEntreC" placeholder="Entre calles" />
                                                </div>
                                                <div class="row m-0">
                                                    <div class="col-sm-6 pl-0">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-border" id="txtNoEx" placeholder="No.Externo" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 pr-0">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-border" id="txtNoIn" placeholder="No.Interno" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-0">
                                                    <div class="col-sm-6 pl-0">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-border" id="txtColonia" placeholder="Colonia" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 pr-0">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-border" id="txtCodigoP" placeholder="Codigo postal" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Localidad</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtCiudad" placeholder="Ciudad/Municipio" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtEstado" placeholder="Estado" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-border" id="txtPais" placeholder="País" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post clearfix">
                                        <div class="card shadow-none collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Notas</strong>
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body" style="display: none">
                                                <textarea class="form-control form-control-border" rows="2" id="txtNotas" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="card shadow-none mb-0">
                                            <div class="card-body d-flex justify-content-end pb-0">
                                                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo" id="btnGuardar">Guardar</button>
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
    </section>
</div>