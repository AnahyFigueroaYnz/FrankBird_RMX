<?php
$nombre = $this->session->userdata('nombre');
$img_path = $this->session->userdata('img_path');
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
$segmento = $this->uri->segment(2);


$open = 'class="nav-item"';
$stOpen = ' style="display: none;"';
$icon = '<i class="fas fa-angle-left right"></i>';
$navLinkOpen = 'class="nav-link"';
$navLinkDash = 'class="nav-link"';
$navLinkPoyMine = 'class="nav-link"';
$navLinkPoyAct = 'class="nav-link"';
$navLinkPoyClose = 'class="nav-link"';

if ($segmento == 'DetalleProyectos' || $segmento == 'Proyectos_agencia' || $segmento == 'ProyectosActivosAgencia' || $segmento == 'ProyectosConcluidosAgencia') {
    $open = 'class="nav-item menu-is-opening menu-open"';
    $stOpen = 'style="display: block;"';
    $icon = '<i class="fas fa-angle-down right"></i>';
    $navLinkOpen = 'class="nav-link active"';

    if ($segmento == 'Proyectos_agencia') {
        $navLinkPoyMine = 'class="nav-link active"';
    } else if ($segmento == 'ProyectosActivosAgencia') {
        $navLinkPoyAct = 'class="nav-link active"';
    } else if ($segmento == 'ProyectosConcluidosAgencia') {
        $navLinkPoyClose = 'class="nav-link active"';
    }
}

if ($segmento == 'DashboardAgente') {
    $navLinkDash = 'class="nav-link active"';
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
                    <p class="text-capitalize"><?= $nombre; ?><small>Asesor</small></p>
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
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?= base_url() ?>Plataforma/DashboardAgente" <?= $navLinkDash ?>><i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
          <a <?= $navLinkOpen ?>>
            <i class="nav-icon fas fa-project-diagram"></i>
            <p>Proyectos<?= $icon ?></p>
          </a>
          <ul class="nav nav-treeview" <?= $stOpen ?>>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/Proyectos_agencia" <?= $navLinkPoyMine ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Mis proyectos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/ProyectosActivosAgencia" <?= $navLinkPoyAct ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Activos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>Plataforma/ProyectosConcluidosAgencia" <?= $navLinkPoyClose ?>>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Concluidos</p>
              </a>
            </li>
          </ul>
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
<?php if ($segmento == 'DashboardAgente' || $segmento == "DetalleProyectos" || $segmento == "perfil") { ?>
    <div class="content-wrapper">
    <?php } else { ?>
        <div class="content-wrapper marca-agua">
        <?php } ?>