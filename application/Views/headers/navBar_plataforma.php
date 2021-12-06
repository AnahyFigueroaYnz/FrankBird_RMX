<?php
  $level = $this->session->userdata('nivel');
  $nombre = $this->session->userdata('nombre');
  $img_path = $this->session->userdata('img_path');
  $data_ver =  $this->versiones->get_version();
  $version = $data_ver->version;
  $segmento = $this->uri->segment(2);

  $stOpen = ' style="display: none;"';
  $itOpen = ' class="nav-item"';
  $detProy = 'style="display: none;"';
  $navLinkOpen = 'class="nav-link"';
  $stOpencotiza = ' style="display: none;"';
  $itOpencotiza = ' class="nav-item"';
  $detcotiza = 'style="display: none;"';
  $navLinkOpencotiza = 'class="nav-link"';
  $navLinkDash = 'class="nav-link"';
  $navLinkDetalle = 'class="nav-link"';
  $navLinkPoyAll = 'class="nav-link"';
  $navLinkPoyMine = 'class="nav-link"';
  $navLinkPoyAct = 'class="nav-link"';
  $navLinkPoyClose = 'class="nav-link"';
  $navLinkPoyMClose = 'class="nav-link"';
  $navLinkPoyDel = 'class="nav-link"';
  $navLinkAses = 'class="nav-link"';
  $navLinkAgent = 'class="nav-link"';
  $navLinkProv = 'class="nav-link"';
  $navLinkProds = 'class="nav-link"';
  $navLinkClien = 'class="nav-link"';
  $navLinkCotiza = 'class="nav-link"';
  $navLinkDatosCotiza = 'class="nav-link"';
  $navLinkDestinos = 'class="nav-link"';
    
  if ($segmento == 'DashboardRoot' || $segmento == 'DashboardAdministrador') {
    $navLinkDash = 'class="nav-link active"';
  } else if ($segmento == 'lista_asesores') {
    $navLinkAses = 'class="nav-link active"';
  } else if ($segmento == 'agencias_aduanales' || $segmento == 'DetalleAgenciaAduanal') {
    $navLinkAgent = 'class="nav-link active"';
  } else if ($segmento == 'Proveedores' || $segmento == 'detalleProveedor') {
    $navLinkProv = 'class="nav-link active"';
  } else if ($segmento == 'Busqueda_productos') {
    $navLinkProds = 'class="nav-link active"';
  } else if ($segmento == 'vista_clientes' || $segmento == 'DetalleUsuario') {
    $navLinkClien = 'class="nav-link active"';
  }else if ($segmento == 'ListaTarifas' ) {
    $navLinkCotiza = 'class="nav-link active"';
  }else if ($segmento == 'ListaCotizaciones' ) {
    $navLinkDatosCotiza = 'class="nav-link active"';
  }else if ($segmento == 'ListaDestinos') {
    $navLinkDestinos = 'class="nav-link active"';
  }

  if ($segmento == 'DetalleProyectos' || $segmento == 'vista_admin_proyectos' || $segmento == 'MisProyectos' || $segmento == 'Proyectos_activos'
  || $segmento == 'Proyectos_concluidos' || $segmento == 'MisProyectosConcluidos' || $segmento == 'Proyectos_eliminados') {
    $stOpen = 'style="display: block;"';
    $itOpen = ' class="nav-item menu-open"';
    $navLinkOpen = 'class="nav-link active"';
    
    if ($segmento == 'DetalleProyectos') {
      $detProy = 'style="display: block;"';
      $navLinkDetalle = 'class="nav-link active"';
    } else if ($segmento == 'vista_admin_proyectos') {
      $navLinkPoyAll = 'class="nav-link active"';
    } else if ($segmento == 'MisProyectos') {
      $navLinkPoyMine = 'class="nav-link active"';
    } else if ($segmento == 'Proyectos_activos') {
      $navLinkPoyAct = 'class="nav-link active"';
    } else if ($segmento == 'Proyectos_concluidos') {
      $navLinkPoyClose = 'class="nav-link active"';
    } else if ($segmento == 'MisProyectosConcluidos') {
      $navLinkPoyMClose = 'class="nav-link active"';
    } else if ($segmento == 'Proyectos_eliminados') {
      $navLinkPoyDel = 'class="nav-link active"';
    }
  }

  if ($segmento == 'DetalleTarifa' || $segmento == 'DetalleCotizacion') {
      $detcotiza = 'style="display: block;"';
      $navLinkDetalle = 'class="nav-link active"';
      $stOpencotiza = 'style="display: block;"';
      $itOpencotiza = ' class="nav-item menu-open"';
      $navLinkOpencotiza = 'class="nav-link active"';
    }
?>
<link rel="stylesheet" href="<?= base_url() ?>css/navbar/navbarPlataforma.css?v=<?= $version; ?>">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link navbar-icon-menu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
      <a href="" class="nav-link dropdown-toggle nav-drop-img" data-toggle="dropdown" aria-expanded="false">
        <?php if ($img_path == null) { ?>
          <img src="<?= base_url() ?>resources/navbar/user.jpg" class="user-image img-circle elevation-2 nav-user-img">
        <?php } else { ?>
          <img src="<?= base_url($img_path) ?>" class="user-image img-circle elevation-2 nav-user-img">
        <?php } ?>
        <span class="hidden-xs text-capitalize"><?= $nombre; ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <li class="user-header bg-primary drop-user-img">
          <?php if ($img_path == null) { ?>
            <img src="<?= base_url() ?>resources/navbar/user.jpg" class="user-image img-circle elevation-2">
          <?php } else { ?>
            <img src="<?= base_url($img_path) ?>" class="user-image img-circle elevation-2">
          <?php } ?>
          <p class="text-capitalize"><?= $nombre; ?>
            <?php if ($level == 1) { ?>
              <small>Root</small>
            <?php } else if ($level == 2) { ?>
              <small>Administrador</small>
            <?php } ?>
          </p>
        </li>
        <li class="user-footer d-flex justify-content-between">
          <a href="<?= base_url() ?>Plataforma/perfil" class="btn btn-default">Perfil</a>
          <a href="<?= base_url() ?>Home/logout" class="btn btn-default ml-auto">Cerrar Session</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url() ?>Home" class="brand-link">
    <img src="<?= base_url() ?>resources/logos/logo_letter_beta.svg" class="brand-image">
    <span class="brand-text font-weight-light">
      <img src="<?= base_url() ?>resources/logos/logo_name.svg" class="brand-imagen">&nbsp;
    </span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <?php if ($level == 1) { ?>
            <a href="<?= base_url() ?>Mantenimiento/DashboardRoot" <?= $navLinkDash ?>><i class="nav-icon fas fa-home"></i>
              <p class="nav-titles">Dashboard</p>
            </a>
          <?php } else if ($level == 2) { ?>
            <a href="<?= base_url() ?>Plataforma/DashboardAdministrador" <?= $navLinkDash ?>><i class="nav-icon fas fa-home"></i>
              <p class="nav-titles">Dashboard</p>
            </a>
          <?php } ?>
        </li>
        <li <?= $itOpen ?>>
          <a <?= $navLinkOpen ?>>
            <i class="nav-icon fas fa-project-diagram"></i>
            <p class="nav-titles">Proyectos<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview" <?= $stOpen ?>>
            <li class="nav-item" <?= $detProy ?>>
              <a href="" <?= $navLinkDetalle ?> style="padding-left: 2.3rem;">
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Detalle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/vista_admin_proyectos" <?= $navLinkPoyAll ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Todos los proyectos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/MisProyectos" <?= $navLinkPoyMine ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Mis proyectos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/Proyectos_activos" <?= $navLinkPoyAct ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Activos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/Proyectos_concluidos" <?= $navLinkPoyClose ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Concluidos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/MisProyectosConcluidos" <?= $navLinkPoyMClose ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Mis proy. concluidos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/Proyectos_eliminados" <?= $navLinkPoyDel ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Eliminados</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Usuarios/lista_asesores" <?= $navLinkAses ?>>
            <i class="nav-icon fas fa-users"></i>
            <p class="nav-titles">Asesores</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/agencias_aduanales" <?= $navLinkAgent ?>>
            <i class="nav-icon fas fa-warehouse"></i>
            <p class="nav-titles">Agencias Aduanales</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/Proveedores" <?= $navLinkProv ?>>
            <i class="nav-icon fas fa-city"></i>
            <p class="nav-titles">Proveedores</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/Busqueda_productos" <?= $navLinkProds ?>>
            <i class="fas fa-truck-loading nav-icon"></i>
            <p class="nav-titles">Productos</p>
          </a>
        </li>
        <li <?= $itOpencotiza ?>>
          <a <?= $navLinkOpencotiza ?>>
            <i class="nav-icon fas fa-calculator"></i>
            <p class="nav-titles">Cotizador<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview" <?= $stOpencotiza ?>>
            <li class="nav-item" <?= $detcotiza ?>>
              <a href="" <?= $navLinkDetalle ?> style="padding-left: 2.3rem;">
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Detalle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Administrador/ListaTarifas" <?= $navLinkCotiza ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Tarifas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Administrador/ListaCotizaciones" <?= $navLinkDatosCotiza ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Cotizaciones</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Administrador/ListaDestinos" <?= $navLinkDestinos ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p class="nav-titles">Destino/Origen</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/vista_clientes" <?= $navLinkClien ?>>
            <i class="fas fa-address-book nav-icon"></i>
            <p class="nav-titles">Clientes</p>
          </a>
        </li>
      </ul>
    </nav>

    <footer class="slider-footer">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/TerminosCondiciones" class="nav-link text-nav-footer">
            <p>Términos y condiciones</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>Plataforma/PoliticasPrivacidad" class="nav-link text-nav-footer">
            <p>Aviso de privacidad</p>
          </a>
        </li>
        <!-- <li class="nav-item">
                <a href="<?= base_url() ?>Plataforma/Help" class="nav-link text-nav-footer">
                  <p>Preguntas frecuentes</p>
                </a>
              </li> -->
      </ul>
    </footer>
  </div>
</aside>

<?php if (
  $segmento == "DetalleProyectos" || $segmento == "DetalleAgenciaAduanal" || $segmento == "detalleProveedor"
  || $segmento == "DetalleUsuario" || $segmento == "perfil" || $segmento == "DesgloseCotizacion" || $segmento == "DetalleProveedor"
) { ?>
  <div class="content-wrapper" style="background: white;">
  <?php } else { ?>
    <div class="content-wrapper" style="background: white;background-image: url(<?= base_url() ?>resources/logos/logo_marca_agua.svg);background-repeat: no-repeat;background-position: center;background-size: inherit;">
    <?php } ?>