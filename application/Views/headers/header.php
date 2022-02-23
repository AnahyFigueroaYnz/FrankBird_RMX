<!DOCTYPE html>
<html lang="es" />

<head>

    <title>birdie</title>
    <!-- ASCII -->
    <meta charset="UTF-8" />
    <!-- HTTP Headers -->
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <!-- Autor -->
    <meta name="author" content="ReachMx Trade Solutions" />
    <!-- Palabras claves -->
    <meta name="keywords" content="Importaciones, Exportaciones" />
    <!-- Derechos de autor -->
    <meta name="copyright" content="© 2016 ReachMx Trade Solutions" />
    <!-- Descripcion -->
    <meta name="description" content="Plantilla basada en la plataforma existente de www.reachmx.com" />
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,700&display=fallback" />
    <!-- Google Font: Ubuntu -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,500,700,300,400,500,700&display=fallback" />
    <!-- Icon pestaña -->
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon" />
    <!-- Toast -->
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/toastr/toastr.css" />
    <!-- Charts CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/chartJS/Chart.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/bootstrap/css/bootstrap-table.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/bootstrap/css/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/bootstrap/css/bootstrap-switch-button.css" />
    <!-- Datatables net-->
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/dataTable/datatables.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/dataTable/datatables/css/dataTables.bootstrap4.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/dataTable/rowreorder/css/rowReorder.dataTables.css" />

    <!-- Template -->
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/css/adminlte.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/css/ionicons.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/chartJS/Chart.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/toastr/toastr.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/jqvmap/jqvmap.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/jsgrid/jsgrid.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/fullcalendar/main.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/select2/select2-bootstrap4.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/jquery-ui/jquery-ui.theme.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/dropzone/css/dropzone.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/bs-stepper/bs-stepper.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/summernote/summernote.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/sweetalert2/sweetalert2.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/fontawesome-free/css/all.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/summernote/summernote-bs4.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/flag-icon-css/css/flag-icon.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/tempusdominus/tempusdominus.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/ekko-lightbox/ekko-lightbox.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/ion-rangeslider/ion.rangeSlider.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/overlayscrollbars/OverlayScrollbars.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/bootstrap-duallistbox/bootstrap-duallistbox.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>resources/libraries/adminlte/plugins/bootstrap-colorpicker/bootstrap-colorpicker.css" />

    <!-- Gloal -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/global.css" />
    <!-- Navbar -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/navbar.css" />
    <!-- Dashboard -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/dashboard.css" />

    <!-- Popper -->
    <script src="<?= base_url(); ?>resources/libraries/popper/popper.js"></script>

    <!-- SweetAlert -->
    <script src="<?= base_url(); ?>resources/libraries/sweetalert2/sweetAlert.js"></script>
    <script src="<?= base_url(); ?>resources/libraries/sweetalert2/sweetAlert2.js"></script>
    <script src="<?= base_url(); ?>resources/libraries/sweetalert2/sweetalert2@9.js"></script>

    <!-- JQuery -->
    <script src="<?= base_url(); ?>resources/libraries/jquery/jquery-3.min.js"></script>
</head>
<body class="sidebar-mini-md layout-fixed control-sidebar-slide-open">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-icon-menu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="" class="nav-link dropdown-toggle nav-drop-img" data-toggle="dropdown">
                        <img src="<?= base_url(); ?>resources/img/user.jpg" class="user-image img-circle elevation-2" alt="Imagen Usuario" />
                        <span class="d-none d-md-inline">Héctor López</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px">
                        <li class="user-header bg-primary">
                            <img src="<?= base_url(); ?>resources/img/user.jpg" class="user-image img-circle elevation-2" alt="Imagen Usuario Dropdown" />
                            <p class="text-capitalize">Héctor López <small>Gerente Logística</small></p>
                        </li>
                        <li class="user-footer d-flex justify-content-between">
                            <a href="<?= base_url(); ?>Perfil" class="btn btn-default">Perfil</a>
                            <a href="<?= base_url(); ?>Dashboard" class="btn btn-default ml-auto">Cerrar Session</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
<?php
$Controller = $this->uri->segment(1);
$SubController = $this->uri->segment(2);

$Agencias = '';
$Dashboard = '';
$Productos = '';
$Proyectos = '';
$Proveedores = '';
$Proyectos_Menu = '';
$Proyectos_Nuevo = '';
$Proyectos_Todos = '';
$Proyectos_Activos = '';
$Proyectos_Concluidos = '';
$Proyectos_Eliminados = '';

if ($Controller == 'Agencias') {
    $Agencias = 'active';
}
if ($Controller == 'Dashboard') {
    $Dashboard = 'active';
}
if ($Controller == 'Productos') {
    $Productos = 'active';
}
if ($Controller == 'Proveedores') {
    $Proveedores = 'active';
}
if ($Controller == 'Proyectos') {
    $Proyectos = 'active';
    $Proyectos_Menu = 'menu-open';

    if ($SubController == 'Nuevo') {
        $Proyectos_Nuevo = 'active';
    }
    if ($SubController == 'Todos') {
        $Proyectos_Todos = 'active';
    }
    if ($SubController == 'Activos') {
        $Proyectos_Activos = 'active';
    }
    if ($SubController == 'Concluidos') {
        $Proyectos_Concluidos = 'active';
    }
    if ($SubController == 'Eliminados') {
        $Proyectos_Eliminados = 'active';
    }
}
?>
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <a href="https://www.reachmx.com/" class="brand-link">
                <img src="<?= base_url(); ?>resources/logo/birdie_icon.svg" class="brand-image" alt="Logo Empresa" />
                <span class="brand-text font-weight-light"> <img src="<?= base_url(); ?>resources/logo/birdie.svg" class="brand-imagen img-fluid img-sm" alt="Nombre Empresa" />&nbsp; </span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>Dashboard" class="nav-link <?= $Dashboard; ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p class="nav-titles">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $Proyectos_Menu; ?>">
                            <a href="" class="nav-link <?= $Proyectos; ?>">
                                <i class="nav-icon fas fa-archive"></i>
                                <p class="nav-titles">Proyectos<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>Proyectos/Nuevo" class="nav-link <?= $Proyectos_Nuevo; ?>">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p class="nav-titles">Nuevo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>Proyectos/Todos" class="nav-link <?= $Proyectos_Todos; ?>">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>Proyectos/Activos" class="nav-link <?= $Proyectos_Activos; ?>">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Activos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>Proyectos/Concluidos" class="nav-link <?= $Proyectos_Concluidos; ?>">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Concluidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>Proyectos/Eliminados" class="nav-link <?= $Proyectos_Eliminados; ?>">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Eliminados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link <?= $Productos; ?>">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p class="nav-titles">Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>Proveedores" class="nav-link <?= $Proveedores; ?>">
                                <i class="nav-icon fas fa-city"></i>
                                <p class="nav-titles">Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link <?= $Agencias; ?>">
                                <i class="nav-icon fas fa-route"></i>
                                <p class="nav-titles">Agencias aduanales</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-custom">
                <nav>
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-collapse-hide-child" role="menu">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p class="nav-titles">Términos y condiciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-file-archive"></i>
                                <p class="nav-titles">Aviso de privacidad</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>