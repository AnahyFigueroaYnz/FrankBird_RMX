<link rel="stylesheet" href="<?= base_url() ?>css/formularios.css">

<input type="hidden" id="txtBaseUrl" value="<?= base_url(); ?>">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h1-title">Proveedores</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard">Inicio</a></li>
            <li class="breadcrumb-item active">Proveedores</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline shadow">
        <div class="card-body pt-0">
          <div class="card m-0" style="border: 0; border-radius: 0; box-shadow: none">
            <div class="text-right border-0 px-3 pt-3 pb-2">
              <a href="" class="btnNuevo" type="button">Nuevo Proveedor</a>
            </div>
            <div class="card-body p-0">
                <input type="hidden" id="txtCountProveedor" value="5">
                <table id="tblProveedores" class="table row-border table-hover responsive nowrap w-100 p-0">
                  <thead>
                    <tr>
                      <th data-priority="0"></th>
                      <th class="hidden-td" class="align-td">ID</th>
                      <th data-priority="1" class="align-td" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Nombre del producto">Proveedor</th>
                      <th data-priority="3" class="align-td">Contacto</th>
                      <th data-priority="4" class="align-td">Email</th>
                      <th data-priority="5" class="align-td">Telefono</th>
                      <th class="visible-td">Direccion</th>
                      <th class="visible-td">Sitio Web</th>
                      <th data-priority="2" class="row-icons"></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="mdlProveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mdlProveedor" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <form class="form-horizontal" id="agregarProveedor">
              <div class="modal-header">
                <h5 id="mdlProveedor_title" class="modal-title title-color"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body cards-productos p-2">
                <input type="hidden" id="txtIDProveedor" value="0">
                <div class="form-group">
                  <label for="txtProveedores" class="lbl-form">Proveedor</label>
                  <input type="text" class="form-control form-control-border" id="txtProveedores" required placeholder="Proveedor" />
                  <div id="val_txtProveedores" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-7">
                    <label for="txtDireccion" class="lbl-form">Direccion</label>
                    <input type="text" class="form-control form-control-border" id="txtDireccion" required placeholder="Dirección" />
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="txtPais" class="lbl-form">País</label>
                    <input type="text" class="form-control form-control-border" id="txtPais" required placeholder="País" />
                  </div>
                  <div id="val_txtPais" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                </div>
                <div class="form-group">
                  <label for="txtOrigen" class="lbl-form">Puntos de partida</label>
                  <input type="text" id="txtOrigen" data-role="tagsinput" class="form-control form-control-border" placeholder="Shenzhen">
                  <div id="val_txtOrigen" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-7">
                    <label for="txtWebSite" class="lbl-form">Sitio web</label>
                    <input type="text" class="form-control form-control-border" id="txtWebSite" required placeholder="www.ejemplo.com" />
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="txtFactura" class="lbl-form">N° Factura</label>
                    <input type="text" class="form-control form-control-border" id="txtFactura" required placeholder="Seleccionar archivo" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="txtContacto" class="lbl-form">Nombre contacto</label>
                  <input type="text" class="form-control form-control-border" id="txtContacto" required placeholder="Nombre" />
                  <div id="val_txtContacto" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-7">
                    <label for="txtCorreo" class="lbl-form">Correo</label>
                    <input type="email" class="form-control form-control-border" id="txtCorreo" required placeholder="ejemplo@sejemplo.com" />
                    <div id="val_txtCorreo" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="txtTelefono" class="lbl-form">Teléfono contacto</label>
                    <div class="input-group">
                      <div class="input-group-prepend igp-width">
                        <select class="custom-select custom-select-border" id="selLada">
                          <option value="0" selected disabled class="text-muted">Lada</option>
                          <?php
                          if ($Data_ladas != FALSE) {
                            foreach ($Data_ladas->result() as $row) { ?>
                              <option value="<?= $row->id_lada; ?>"><?= $row->lada; ?> <small>(+
                                  <?= $row->codigo; ?>)</small></option>
                          <?php }
                          }
                          ?>
                        </select>
                      </div>
                      <input type="text" class="form-control form-control-border" disabled id="txtTelefono" data-inputmask="'mask': ['(999) 999 9999', '(999) 999 999', '(999) 9999 9999', '(999) 9999 9999 999', '(999) 9999 9999 9999', '(999) 9999 9999 99999']" data-mask>
                    </div>
                    <div id="val_txtTelefono" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-7">
                    <label for="txtProducto" class="lbl-form">Producto</label>
                    <input type="text" class="form-control form-control-border" id="txtProducto" required placeholder="Producto" />
                    <div id="val_txtProducto" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="txtPrecio" class="lbl-form">Precio por unidad</label>
                    <input type="text" class="form-control form-control-border" id="txtPrecio" placeholder="$0.00 ud" />
                    <div id="val_txtPrecio" class="valid-inputs" style="display: none">Este campo es obligatorio</div>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary btn-sm btn-nuevo" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success btn-sm btn-nuevo addProveedor">Agregar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>