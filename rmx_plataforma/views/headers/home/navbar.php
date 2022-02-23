<?php
$nombre = $this->session->userdata('nombre');
$level = $this->session->userdata('nivel');
$img_path = $this->session->userdata('img_path');

$FAQ = '';
$Inicio = '';
$Contactanos = '';
$Cotizador = '';
$Nosotros = '';
$Servicios = '';
if ($this->uri->segment(1) == "Home" || $this->uri->segment(2) == "" || $this->uri->uri_string(2) == "Inicio") {
    $Inicio = 'active';
}
if ($this->uri->segment(2) == "Services") {
    $Servicios = 'active';
}
if ($this->uri->segment(2) == "Quote") {
    $Cotizador = 'active';
}
if ($this->uri->segment(2) == "FAQ") {
    $FAQ = 'active';
}
if ($this->uri->segment(2) == "Contactus") {
    $Contactanos = 'active';
}
?>
<div style="display: none;" id="preloader">
	<div id="ctn-preloader" class="ctn-preloader">
		<div class="animation-preloader">
			<div class="spinner"></div>
			<div class="txt-loading">
				<span data-text-preloader="R" class="letters-loading">
					R
				</span>
				<span data-text-preloader="E" class="letters-loading">
					E
				</span>
				<span data-text-preloader="A" class="letters-loading">
					A
				</span>
				<span data-text-preloader="C" class="letters-loading">
					C
				</span>
				<span data-text-preloader="H" class="letters-loading">
					H
				</span>
				<span data-text-preloader="&nbsp;" class="letters-loading">
					&nbsp;
				</span>
				<span data-text-preloader="M" class="letters-loading">
					M
				</span>
				<span data-text-preloader="X" class="letters-loading">
					X
				</span>
			</div>
			<p id="navLoaderCargando" class="text-center"></p>
		</div>
		<div class="loader">
			<div class="row">
				<div class="col-3 loader-section section-left">
					<div class="bg"></div>
				</div>
				<div class="col-3 loader-section section-left">
					<div class="bg"></div>
				</div>
				<div class="col-3 loader-section section-right">
					<div class="bg"></div>
				</div>
				<div class="col-3 loader-section section-right">
					<div class="bg"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="body_wrapper">
	<header class="header_area">
		<nav class="navbar navbar-expand-lg menu_one menu_five">
			<div class="container">
				<a id="navimglogo" class="navbar-brand sticky_logo" href="<?= base_url() ?>">
					<img src="<?= base_url() ?>template_home/img/logo2.png" srcset="<?= base_url() ?>template_home/img/logo2_x.png 2x" alt="logo">
					<img src="<?= base_url() ?>template_home/img/logo.png" srcset="<?= base_url() ?>template_home/img/logo_x.png 2x" alt="">
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="menu_toggle">
						<span class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="hamburger-cross">
							<span></span>
							<span></span>
						</span>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav menu w_menu ml-auto">
						<li class="nav-item <?= $Inicio ?>">
							<a id="navInicio" class="nav-link" href="<?= base_url() ?>" role="button"></a>
						</li>
						<li class="nav-item <?= $Servicios ?>">
							<a id="navServicios" class="nav-link" href="<?= base_url() ?>Services" role="button"></a>
						</li>
						<li class="nav-item <?= $Cotizador ?>">
							<a id="navCotizador" class="nav-link" href="<?= base_url() ?>Quote" role="button"></a>
						</li>
						<li class="nav-item <?= $FAQ ?>">
							<a id="navFAQ" class="nav-link" href="<?= base_url() ?>FAQ" role="button"></a>
						</li>
						<li class="nav-item <?= $Contactanos ?>">
							<a id="navContacto" class="nav-link" href="<?= base_url() ?>Contactus" role="button"></a>
						</li>
					</ul>
				</div>

				<div class="alter_nav">
					<ul class="navbar-nav search_cart menu">
						<li class="nav-item leng_box dropdown submenu">
							<a href="" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dpleng">
								<!-- <i class="flag-icon flag-icon-mx"></i> -->
							</a>
							<ul class="dropdown-menu">
								<li class="lengs">
									<a id="es" href="#es" class="drop-link"> 
										<!-- <i class="flag-icon flag-icon-mx"></i><span> Español</span> -->
									</a>
								</li>
								<li class="lengs">
									<a id="en" href="#en" class="drop-link">
										<!-- <i class="flag-icon flag-icon-us"></i><span> Ingles</span> -->
									</a>
								</li>
							</ul>
						</li>
						<?php if (($this->session->userdata('logueado') == 0)) { ?>
							<li class="nav-item login">
								<a id="navbtnIngresar" class="main_btn" href="<?= base_url() ?>Login"></a>
							</li>
						<?php } else { ?>
							<li class="nav-item user_box dropdown submenu">
								<a href="" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php if ($img_path != null) { ?>
										<img class="img-fluid" src="<?= base_url($img_path) ?>">
									<?php } else { ?>
										<img class="img-fluid header_img" src="<?= base_url() ?>template_home/img/user2_x.png">
										<img class="img-fluid fixed_header_img" src="<?= base_url() ?>template_home/img/user2_x2.png">
									<?php } ?>
								</a>
								<ul class="dropdown-menu">
									<li class="clearfix">
										<div class="user_img">
											<img class="img-fluid userImgDrop" src="<?= base_url() ?>template_home/img/user2_x.png">
											<p class="m-0"><?= $nombre; ?></p>
											<?php if ($level == 1) { ?>
												<p class="m-0">Root</p>
											<?php } elseif ($level == 2) { ?>
												<p class="m-0">Administrador</p>
											<?php } elseif ($level == 3) { ?>
												<p class="m-0">Asesor</p>
											<?php } elseif ($level == 4) { ?>
												<p class="m-0">Cliente</p>
											<?php } elseif ($level == 5) { ?>
												<p class="m-0">Agente Aduanal</p>
											<?php } ?>
										</div>
									</li>
									<li class="action_box">
										<?php if ($level == 1) { ?>
											<a href="<?= base_url() ?>Mantenimiento/DashboardRoot" class="btn btn-default">Dashboard</a>
										<?php } elseif ($level == 2) { ?>
											<a href="<?= base_url() ?>Plataforma/DashboardAdministrador" class="btn btn-default">Dashboard</a>
										<?php } elseif ($level == 3) { ?>
											<a href="<?= base_url() ?>Plataforma/DashboardAsesor" class="btn btn-default">Dashboard</a>
										<?php } elseif ($level == 4) { ?>
											<a href="<?= base_url() ?>Clientes/DashboardCliente" class="btn btn-default">Dashboard</a>
										<?php } elseif ($level == 5) { ?>
											<a href="<?= base_url() ?>Plataforma/DashboardAgente" class="btn btn-default">Dashboard</a>
										<?php } ?>
										<a href="<?= base_url() ?>Home/logout" class="btn btn-default">Cerrar Sesión</a>
									</li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<input type="hidden" id="url" value="<?= $this->uri->segment(2); ?>">
	<script type="text/javascript">
		var url = document.getElementById('url').value;
		if (window.localStorage.getItem(url) == null) {
			switch (url) {
				case 'Servicios':
					window.localStorage.setItem("Servicios", "true");
					document.getElementById('preloader').style.display = '';
					break;
				case 'Cotizador':
					window.localStorage.setItem("Cotizador", "true");
					document.getElementById('preloader').style.display = '';
					break;
				case 'FAQ':
					window.localStorage.setItem("FAQ", "true");
					document.getElementById('preloader').style.display = '';
					break;
				case 'Contactanos':
					window.localStorage.setItem("Contactanos", "true");
					document.getElementById('preloader').style.display = '';
					break;
				default:
					if (localStorage.getItem('Home') == null) {
						window.localStorage.setItem("Home", "true");
						document.getElementById('preloader').style.display = '';
					}
					break;
			}
		}
	</script>
