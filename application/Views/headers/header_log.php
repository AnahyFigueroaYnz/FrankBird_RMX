<!DOCTYPE html>
<html lang="es">

<head>

	<?php
	$data_ver =  $this->versiones->get_version();
	$version = $data_ver->version;
	?>
	<title>Frankie Birdie</title>
	<meta charset="utf-8">
	
	<!-- Cache -->
	<meta content="no-cache" http-equiv="Cache-Control" />
	<!-- Responsive -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

	<!-- Login style -->
	<link rel="stylesheet" href="<?= base_url() ?>css/login.css">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>resources/template/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>resources/template/dist/css/adminlte.css">


	<!--jQuery-->
	<script src="<?= base_url(); ?>js/headers/jquery-3.3.1.min.js"></script>
</head>

<body class="login-page" style="height: 100%;">