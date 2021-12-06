</div>
<!-- jQuery -->
<script src="<?= base_url() ?>resources/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>resources/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>resources/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>resources/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url() ?>resources/template/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
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
	$(document).ready(function() {
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
		});
	});
</script>


</body>

</html>