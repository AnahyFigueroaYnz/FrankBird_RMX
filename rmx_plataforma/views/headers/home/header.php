<!DOCTYPE html>
<html lang="es">

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

	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	
	<!-- Responsivo -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- icono reachmx-->
	<link href="<?= base_url() ?>favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<!-- template_home clases -->
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/bootstrap.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/bootstrap.css.map">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/bootstrap.min.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/bootstrap.min.css.map">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/bootstrap-select.min.css">
	<!--icon font css-->
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/themify-icon/themify-icons.css">
    <link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/simple-line-icon/simple-line-icons.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/font-awesome/css/all.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/flaticon/flaticon.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/animation/animate.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/owl-carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/magnify-pop/magnific-popup.css">
    <link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/pagepiling/jquery.pagepiling.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/nice-select/nice-select.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/scroll/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/elagent/style.css">
    <link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/slick/slick.css">
    <link rel="stylesheet" media href="<?= base_url() ?>template_home/vendors/slick/slick-theme.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/predefine.css">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/style.css?v=<?= $version; ?>">
	<link rel="stylesheet" media href="<?= base_url() ?>template_home/css/responsive.css?v=<?= $version; ?>">

	<!--script jquery-->
	<script src="<?= base_url(); ?>js/headers/jquery-3.3.1.min.js"></script>

	<!-- toastr -->
	<link rel="stylesheet" media href="<?= base_url(); ?>css/headers/toastr.min.css" />
	<!-- SweetAlert2 -->
	<script defer src="<?= base_url(); ?>js/headers/sweetalert2@9.js"></script>
		
		<script src="<?= base_url(); ?>js/headers/lazysizes.min.js" async=""></script>
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

	<script>
		if (window.location.hash === '' && window.localStorage.getItem("Lenguage") === (null || 'es')) {
			location.hash = 'es';
			window.localStorage.setItem("Lenguage", "es");
		}else if (window.localStorage.getItem("Lenguage") ==='en'){
			location.hash = 'en';
			window.localStorage.setItem("Lenguage", "en");
		}
	</script>
</head>

<body style="height: auto;">
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5M63B6B"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->