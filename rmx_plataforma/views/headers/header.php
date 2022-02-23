<!DOCTYPE html>
<html>

<head>
	<!-- Google Tag Manager -->
		<script defer>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5M63B6B');</script>
	<!-- End Google Tag Manager -->
	
	<?php
		$data_ver =  $this->versiones->get_version();
		$version = $data_ver->version;
	?>
	<title>ReachMx</title>
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />

	<!-- 	   Responsivo -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- icono reachmx-->
	<link href="<?= base_url() ?>favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<!-- bootstrap -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/bootstrap.min.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/bootstrap.css">
	<!--Bootstrap 4 buttons-->
	<link rel="stylesheet" media href="<?= base_url() ?>css/headers/buttons.bootstrap4.min.css">
	<!-- CSS tabla bootstrap -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/bootstrap-table.min.css">
	<!-- flags -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/flags/flag-icon.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/flags/flag-icon.min.css">
	<!--data table net-->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/datatables.min.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/responsive.bootstrap4.min.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/buttons.bootstrap4.min.css">
	<!-- Charts CSS -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/chartJs/Chart.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/chartJs/Chart.min.css">
	<!-- Swith Bootstrap -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/switch/bootstrap-switch-button.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/switch/bootstrap-switch-button.min.css">
	<!-- toast -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/toastr.min.css" />
	<!--CSS GLOBAL-->
	<link rel="stylesheet" media href="<?= base_url() ?>css/global.css?v=<?= $version; ?>">
	
	<!-- admin LTE -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/dist/css/adminlte.min.css">
	<!-- sweetalert2 LTE -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Color Picker -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<!-- Datarange Picker -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/daterangepicker/daterangepicker.css">
	<!-- JQVMap -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/jqvmap/jqvmap.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/summernote/summernote-bs4.css">
	<!-- Ionicons -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/dist/css/ionicons.min.css">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" media href="<?= base_url() ?>template_plataforma/plugins/fontawesome-free/css/all.min.css">
	<!-- Charts CSS -->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/chart.js/Chart.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/chart.js/Chart.min.css">
	<!-- toast LTE-->
	<!-- <link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/toastr/toastr.min.css"> -->
	
	<!--script jquery-->
	<script src="<?= base_url(); ?>js/headers/jquery-3.3.1.min.js"></script>
	
	<!-- select2-->
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" media href="<?= base_url(); ?>template_plataforma/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!--Link popper-->
	<script defer src="<?= base_url(); ?>js/headers/popper.js"></script>
	<!-- SweetAlert2 -->
	<script  src="<?= base_url(); ?>js/headers/sweetalert2@9.js"></script>
	
	<!-- Facebook Pixel Code -->
	<script defer>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '875560492930385');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=875560492930385&ev=PageView&noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open" style="height: 100%;">
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5M63B6B"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="wrapper">