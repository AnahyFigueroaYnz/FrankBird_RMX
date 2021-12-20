<!DOCTYPE html>
<html lang="es">

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
    <!-- Icon pestaña -->
	<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,500,700&display=fallback">
    <!-- Google Font: Ubuntu -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:100,300,400,500,700,300,400,500,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>system/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>system/template/dist/css/adminlte.css">


    <!--jQuery-->
    <script src="<?= base_url(); ?>js/headers/jquery-3.3.1.min.js"></script>
</head>

<body class="login-page">
    <div class="login-content">
        <div class="col login-banner">
            <div class="banner-box text-left">
                <h1 class="banner-title">El futuro del comercio comienza aquí</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="far fa-check-square"></i> Seguridad</li>
                        <li class="list-group-item"><i class="far fa-check-square"></i> Calidad</li>
                        <li class="list-group-item"><i class="far fa-check-square"></i> Rapidez</li>
                    </ul>
            </div>
        </div>
        <div class="col login-form">
            <div class="login-box">
                <div class="login-logo">
                    <a href="<?= base_url() ?>Dashboard">birdie</a>
                </div>
                <form id="frmLogin" class="login-card-body">
                    <div class="form-group text-left">
                        <label for="txtUsuario" class="mb-0">Usuario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append m-0">
                                <div class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" id="txtUsuario" class="form-control form-control-border" placeholder="usuario@dominio.com">
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <label for="txtClave" class="mb-0">Contraseña</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append m-0">
                                <div class="input-group-text">
                                    <i class="fas fa-unlock-alt"></i>
                                </div>
                            </div>
                            <input type="password" id="txtClave" class="form-control form-control-border" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
                            <div class="input-group-append m-0">
                                <div class="input-group-text" style="border-radius: 0px;">
                                    <span class="login-password">
                                        <i id="iShowPass" class="fa fa-eye"> </i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-submit">
                        <button type="submit" id="btnIngresar" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url() ?>system/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>system/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url() ?>system/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>system/template/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

</body>

</html>