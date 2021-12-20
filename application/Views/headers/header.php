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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,700&display=fallback" />
    <!-- Google Font: Ubuntu -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,500,700,300,400,500,700&display=fallback" />
    <!-- Icon pestaña -->
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/headers/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>css/headers/bootstrap.css" />
    <!-- Charts CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/headers/chartJs/Chart.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>css/headers/chartJs/Chart.min.css" />
    <!-- Datatables net-->
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/DataTables/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/AutoFill/css/autoFill.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/Buttons/css/buttons.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/ColReorder/css/colReorder.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/DateTime/css/dataTables.dateTime.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/FixedColumns/css/fixedColumns.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/FixedHeader/css/fixedHeader.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/KeyTable/css/keyTable.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/Responsive/css/responsive.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/RowGroup/css/rowGroup.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/RowReorder/css/rowReorder.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/Scroller/css/scroller.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/SearchBuilder/css/searchBuilder.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/SearchPanes/css/searchPanes.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/Select/css/select.bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/datatables/StateRestore/css/stateRestore.bootstrap4.css" />

    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/fontawesome-free/css/all.css" />
    <!-- Toast -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/toastr/toastr.min.css" />
    <!-- admin LTE -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/dist/css/adminlte.css" />
    <!-- Charts CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/chart.js/Chart.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/chart.js/Chart.min.css" />
    <!-- select2-->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/select2/css/select2.css" />
    <link rel="stylesheet"
        href="<?= base_url(); ?>system/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/summernote/summernote-bs4.css" />
    <!-- Datarange Picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/daterangepicker/daterangepicker.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- Color Picker -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>system/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>system/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>system/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/daterangepicker/daterangepicker.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/jqvmap/jqvmap.min.css" />
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>system/template/dist/css/ionicons.min.css" /> -->
    <!-- Ion Slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/ion-rangeslider/css/ion.rangeSlider.css" />
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="<?= base_url(); ?>system/template/plugins/bootstrap-slider/css/bootstrap-slider.css" />


    <!--CSS GLOBAL-->
    <link rel="stylesheet" href="<?= base_url() ?>css/plataforma.css" />
    <link rel="stylesheet" href="<?= base_url() ?>css/slider.css" />

    <!-- jQuery -->
    <script src="<?= base_url(); ?>system/datatables/jQuery/jquery-3.6.0.js"></script>


</head>

<body class="sidebar-mini-md layout-fixed control-sidebar-slide-open">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navbar-icon-menu" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="" class="nav-link dropdown-toggle nav-drop-img" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?= base_url() ?>resources/imgs/user.jpg"
                            class="user-image img-circle elevation-2 nav-user-img">
                        <span class="hidden-xs text-capitalize">Usuario</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <li class="user-header bg-primary drop-user-img">
                            <img src="<?= base_url() ?>resources/imgs/user.jpg"
                                class="user-image img-circle elevation-2">
                            <p class="text-capitalize">Usuario
                                <small>Administrador</small>
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
                <img src="<?= base_url() ?>" class="brand-image">
                <span class="brand-text font-weight-light">
                    <img src="<?= base_url() ?>" class="brand-imagen">&nbsp;
                </span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact nav-collapse-hide-child"
                        data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/index.html" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p class="nav-titles">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-archive"></i>
                                <p class="nav-titles">Proyectos<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/aplication/proyectos-nuevo.html" class="nav-link">
                                        <i class="nav-icon fas fa-plus"></i>
                                        <p class="nav-titles">Nuevo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/aplication/proyectos-todos.html" class="nav-link active">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/aplication/proyectos-activos.html" class="nav-link">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Activos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/aplication/proyectos-concluidos.html" class="nav-link">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Concluidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/aplication/proyectos-eliminados.html" class="nav-link">
                                        <i class="nav-icon fas fa-record-vinyl"></i>
                                        <p class="nav-titles">Eliminados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/aplication/productos.html" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p class="nav-titles">Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aplication/proveedores.html" class="nav-link">
                                <i class="nav-icon fas fa-city"></i>
                                <p class="nav-titles">Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aplication/agencias-aduanales.html" class="nav-link">
                                <i class="nav-icon fas fa-route"></i>
                                <p class="nav-titles">Agencias aduanales</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-custom">
                <nav>
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact nav-flat" role="menu">
                        <li class="nav-item">
                            <a href="/aplication/views/terminos_condiciones.html" class="nav-link">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p class="nav-titles">Términos y condiciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aplication/views/aviso_privacidad.html" class="nav-link">
                                <i class="nav-icon fas fa-file-archive"></i>
                                <p class="nav-titles">Aviso de privacidad</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
