<?php
$data_ver =  $this->versiones->get_version();
$version = $data_ver->version;
$nombre = $this->session->userdata('nombre');
$level = $this->session->userdata('nivel');
$img_path = $this->session->userdata('img_path');
$Home = '';
$ComoFunciona = '';
$Nosotros = '';
$Contacto = '';

if ($this->uri->segment(2) == "inicio" || $this->uri->segment(1) == "" || $this->uri->uri_string() == 'Home') {
  $Home = 'active';
  $ComoFunciona = '';
  $Nosotros = '';
  $Contacto = '';
} if ($this->uri->segment(2) == "como_funciona") {
  $Home = '';
  $ComoFunciona = 'active';
  $Nosotros = '';
  $Contacto = '';
} if ($this->uri->segment(2) == "nosotros") {
  $Home = '';
  $ComoFunciona = '';
  $Nosotros = 'active';
  $Contacto = '';
} if ($this->uri->segment(2) == "contacto") {
  $Home = '';
  $ComoFunciona = '';
  $Nosotros = '';
  $Contacto = 'active';
} 
?>
<link rel="stylesheet" href="<?= base_url(); ?>css/navbar/navbarHome.css">
<nav class="navbar navbar-light navbar-expand-lg navbar-template topbar static-top shadow justify-content-between">
  <a class="navbar-brand logo-home" href="<?= base_url() ?>Home">
    <img id="logo" src="<?= base_url() ?>resources/logos/logo_footer_beta.svg" style="height: 50px;display: none;" alt="Image">
    <img id="logoLetter" src="<?= base_url() ?>resources/logos/logo_letter_beta.svg" style="height: 45px;display: none;" alt="Image">
  </a>
  <div class="d-flex flex-row order-2 order-lg-3 menu-home">
    <div class="row icon-static">
      <a class="nav-link" href="<?= base_url() ?>Contactus">
        <span class="normal-text"><i class="fas fa-envelope"></i></span>
      </a>
      <a class="nav-link" target="_blank" href="https://wa.me/526622570384">
        <span class="normal-text"><i class="fab fa-whatsapp"></i></span>
      </a>
      <?php
      if (($this->session->userdata('logueado') == 1)) {
      ?>
        <div class="nav-item">
          <a href="#" class="nav-link-sesion" data-toggle="dropdown" aria-expanded="false">
            <?php if ($img_path != null) { ?>
              <img src="<?= base_url($img_path) ?>" class="user-image img-circle elevation-2" alt="User Image" style="height: 2.5rem; width: 2.5rem;">
            <?php } else { ?>
              <img src="<?= base_url() ?>resources/navbar/user.jpg" class="user-image img-circle elevation-2" alt="User Image" style="height: 2.5rem; width: 2.5rem;">
            <?php } ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in position-drop" aria-labelledby="userDropdown" id="userSettings">
            <div class="user-header">
              <?php if ($img_path != null) { ?>
                <img src="<?= base_url($img_path) ?>" class="user-image img-circle elevation-2" alt="User Image">
              <?php } else { ?>
                <img src="<?= base_url() ?>resources/navbar/user.jpg" class="user-image img-circle elevation-2" alt="User Image">
              <?php } ?>
              <p><?php echo $nombre; ?></p>
              <?php if ($level == 1) { ?>
                <p>Root</p>
              <?php } else if ($level == 2) { ?>
                <p>Administrador</p>
              <?php } else if ($level == 3) { ?>
                <p>Asesor</p>
              <?php } else if ($level == 4) { ?>
                <p>Cliente</p>
              <?php } else if ($level == 5) { ?>
                <p>Agente Aduanal</p>
              <?php } ?>
            </div>
            <div class="user-footer d-flex justify-content-between">
              <?php if ($level == 1) { ?>
                <a href="<?= base_url() ?>Mantenimiento/DashboardRoot" class="btn btn-default btn-flat">Dashboard</a>
              <?php } else if ($level == 2) { ?>
                <a href="<?= base_url() ?>Plataforma/DashboardAdministrador" class="btn btn-default btn-flat">Dashboard</a>
              <?php } else if ($level == 3) { ?>
                <a href="<?= base_url() ?>Plataforma/DashboardAsesor" class="btn btn-default btn-flat">Dashboard</a>
              <?php } else if ($level == 4) { ?>
                <a href="<?= base_url() ?>Clientes/DashboardCliente" class="btn btn-default btn-flat">Dashboard</a>
              <?php } else if ($level == 5) { ?>
                <a href="<?= base_url() ?>Plataforma/DashboardAgente" class="btn btn-default btn-flat">Dashboard</a>
              <?php } ?>
              <a href="<?= base_url() ?>Home/logout" class="btn btn-default btn-flat">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      <?php
      } else {
      ?>
        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>Login" role="button" style="border-radius: 2rem;">
          <p class="normal-text" style="color: white;">Ingresar</p>
        </a>
      <?php } ?>
    </div>
    <a class="navbar-toggler menu-navbar collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false">
      <i class="fas fa-bars"></i>
    </a>
  </div>
  <div class="navbar-collapse order-3 order-lg-2 collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?= $Home ?>">
        <a class="nav-link" href="<?= base_url() ?>Home">
          <p class="normal-text">Inicio</p><span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item <?= $ComoFunciona ?>">
        <a class="nav-link" href="">
          <p class="normal-text">¿Cómo funciona?</p>
        </a>
      </li>
      <li class="nav-item <?= $Nosotros ?>">
        <a class="nav-link" href="">
          <p class="normal-text">Nosotros</p>
        </a>
      </li>
      <li class="nav-item <?= $Contacto ?>">
        <a class="nav-link" href="">
          <p class="normal-text">Contacto</p>
        </a>
      </li>
    </ul>
  </div>
</nav>
<div>