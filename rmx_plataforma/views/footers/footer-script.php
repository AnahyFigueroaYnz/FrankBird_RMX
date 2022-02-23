<?php
		$data_ver =  $this->versiones->get_version();
		$version = $data_ver->version;
?>

		<!-- Tablas Globales -->
		<script defer src="<?= base_url(); ?>js/global/tablas.js?v=<?=$version;?>"></script>
		<!-- Mascaras Globales -->
		<script defer src="<?= base_url(); ?>js/global/mascaras.js?v=<?=$version;?>"></script>
		<!-- Script boostrap popper 1.16.0 -->
		<script defer src="<?= base_url(); ?>js/headers/popper/popper.min.js"></script>
		<!-- Flags -->
		<script defer src="<?= base_url(); ?>js/headers/flags/flags.js"></script>
		<!-- toastr -->
		<script defer src="<?= base_url(); ?>js/headers/toastr.min.js"></script>
		<!-- Mascaras para inputs -->
		<script src="<?= base_url(); ?>js/headers/mask/jquery.mask.js"></script>
		<script src="<?= base_url(); ?>js/headers/mask/jquery.mask.min.js"></script>
		<!-- Swith Bootstrap -->
		<script defer src="<?= base_url(); ?>js/headers/switch/bootstrap-switch-button.min.js"></script>
		<!-- Chart JS -->
		<script defer src="<?= base_url(); ?>js/headers/chartJs/Chart.bundle.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/chartJs/Chart.bundle.min.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/chartJs/Chart.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/chartJs/Chart.min.js"></script>
		<!-- Tabla bootstrap -->
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table.min.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table-locale-all.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table-locale-all.min.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table-export.js"></script>
		<script defer src="<?= base_url(); ?>js/headers/bootstrap/bootstrap-table-export.min.js"></script>
		<!-- Datatables net-->
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/buttons.bootstrap4.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/jszip.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/pdfmake.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/vfs_fonts.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/buttons.html5.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/buttons.print.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/buttons.colVis.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/dataTables.responsive.min.js"></script>
		<script src="<?= base_url(); ?>js/headers/datatables/responsive.bootstrap4.min.js"></script>
		
		<!-- AdminLTE -->
		<script  src="<?= base_url(); ?>template_plataforma/dist/js/adminlte.js"></script>
		<!-- toastr LTE -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/toastr/toastr.min.js"></script>
		<!-- sweetalert2 LTE -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/sweetalert2/sweetalert2.all.min.js"></script>
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/sweetalert2/sweetalert2.min.js"></script>
		
		<!-- jQuery -->
		<script src="<?= base_url(); ?>template_plataforma/plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?= base_url(); ?>template_plataforma/plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- select2 -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/select2/dist/js/select2.full.min.js"></script>

		<!-- Bootstrap 4 -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- ChartJS -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/moment/moment.min.js"></script>
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Color Picker -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script defer src="<?= base_url(); ?>template_plataforma/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script defer>
			// FUNCION PARA CARGAR AJAX DESDE CUALQUIER ARCHIVO JS o <script defer> DEL SISTEMA
			var cargar_ajax = {
				run_server_ajax: function(_url, _data = null) {
					var json_result = $.ajax({
						url: '<?= base_url(); ?>' + _url,
						dataType: "json",
						method: "post",
						async: false,
						type: 'post',
						data: _data,
						done: function(response) {
							return response;
						}
					}).responseJSON;
					return json_result;
				}
			}
			var cargar_ajax2 = {
				run_server_ajax2: function(_url, _data = null) {
					var json_result = $.ajax({
						url: '<?= base_url(); ?>' + _url,
						dataType: "json",
						method: "post",
						async: false,
						type: 'post',
						data: _data,
						processData: false,
						contentType: false,
						done: function(response) {
							return response;
						}
					}).responseJSON;
					return json_result;
				}
			}
			// FUNCION PARA CARGAR MENSAJES SWAL DESDE LOS CONTROLADORES
			<?php if (isset($mensajes_swal)) {
				echo  $mensajes_swal;
			} ?>

			$(document).ready(function() {
				$("#inpt_form_colores").colorpicker();

				// jQuery.noConflict();

				jQuery(document).ready(function($) {
					$('[data-toggle="popover"]').popover();
				});

				var logo = document.getElementById('logo');
				var winWidth = $(window).width();
				if (logo !== null) {
					if (winWidth < 576) {
						document.getElementById('logo').style.display = 'none';
						document.getElementById('logoLetter').style.display = '';
					} else if (winWidth < 768) {
						document.getElementById('logo').style.display = 'none';
						document.getElementById('logoLetter').style.display = '';
					} else if (winWidth < 992) {
						document.getElementById('logo').style.display = 'none';
						document.getElementById('logoLetter').style.display = '';
					} else if (winWidth < 1200) {
						document.getElementById('logo').style.display = 'none';
						document.getElementById('logoLetter').style.display = '';
					} else {
						document.getElementById('logo').style.display = '';
						document.getElementById('logoLetter').style.display = 'none';
					}
				}


				$(window).on('resize', function() {
					var winWidth = $(window).width();
					if (winWidth < 576) {
						console.log('Window Width: ' + winWidth + 'class used: col');
					} else if (winWidth < 768) {
						console.log('Window Width: ' + winWidth + 'class used: col-sm');
					} else if (winWidth < 992) {
						console.log('Window Width: ' + winWidth + 'class used: col-md');
					} else if (winWidth < 1200) {
						console.log('Window Width: ' + winWidth + 'class used: col-lg');
					} else {
						console.log('Window Width: ' + winWidth + 'class used: col-xl');
					}
					if (logo !== null) {
						if (winWidth < 576) {
							document.getElementById('logo').style.display = 'none';
							document.getElementById('logoLetter').style.display = '';
						} else if (winWidth < 768) {
							document.getElementById('logo').style.display = 'none';
							document.getElementById('logoLetter').style.display = '';
						} else if (winWidth < 992) {
							document.getElementById('logo').style.display = 'none';
							document.getElementById('logoLetter').style.display = '';
						} else if (winWidth < 1200) {
							document.getElementById('logo').style.display = 'none';
							document.getElementById('logoLetter').style.display = '';
						} else {
							document.getElementById('logo').style.display = '';
							document.getElementById('logoLetter').style.display = 'none';
						}
					}
				});
			});
		</script>
		

		</body>

		</html>