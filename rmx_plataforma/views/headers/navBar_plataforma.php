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

<?php if (
  $segmento == "DetalleProyectos" || $segmento == "DetalleAgenciaAduanal" || $segmento == "detalleProveedor"
  || $segmento == "DetalleUsuario" || $segmento == "perfil" || $segmento == "DesgloseCotizacion" || $segmento == "DetalleProveedor"
) { ?>
  <div class="content-wrapper" style="background: white;">
  <?php } else { ?>
    <div class="content-wrapper" style="background: white;background-image: url(<?= base_url() ?>resources/logos/logo_marca_agua.svg);background-repeat: no-repeat;background-position: center;background-size: inherit;">
    <?php } ?>