</div>

<?php
		$data_ver =  $this->versiones->get_version();
		$version = $data_ver->version;
?>

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script defer type="text/javascript">
	window.__lc = window.__lc || {};
	window.__lc.license = 12705315;;
	(function(n, t, c) {
		function i(n) {
			return e._h ? e._h.apply(null, n) : e._q.push(n)
		};
		var e = {
			_q: [],
			_h: null,
			_v: "2.0",
			on: function() {
				i(["on", c.call(arguments)])
			},
			once: function() {
				i(["once", c.call(arguments)])
			},
			off: function() {
				i(["off", c.call(arguments)])
			},
			get: function() {
				if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
				return i(["get", c.call(arguments)])
			},
			call: function() {
				i(["call", c.call(arguments)])
			},
			init: function() {
				var n = t.createElement("script");
				n.async = !0, n.type = "text/javascript",
					n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
			}
		};
		!n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
	}(window, document, [].slice))
</script>
<noscript>
	<a href="https://www.livechatinc.com/chat-with/12705315/" rel="nofollow">Chat with us</a>,
	powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->

<script defer src="<?= base_url() ?>template_home/js/propper.js"></script>
<script defer src="<?= base_url() ?>template_home/js/bootstrap.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/wow/wow.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/owl-carousel/owl.carousel.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/sckroller/jquery.parallax-scroll.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/isotope/isotope-min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/magnify-pop/jquery.magnific-popup.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/circle-progress/circle-progress.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/modernizr/modernizr-2.7.2.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/nice-select/jquery.nice-select.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/counterup/jquery.counterup.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/counterup/jquery.waypoints.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/counterup/appear.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/pagepiling/jquery.pagepiling.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/stellar/jquery.stellar.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/red-countdown/knob.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/red-countdown/throttle.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/red-countdown/moment.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/red-countdown/redcountdown.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/red-countdown/red-countdown-settings.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/multiscroll/jquery.easings.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/multiscroll/multiscroll.responsiveExpand.limited.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/multiscroll/jquery.multiscroll.extensions.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/slick/slick.min.js"></script>
<script defer src="<?= base_url() ?>template_home/vendors/stellar/jquery.stellar.js"></script>
<!-- <script defer src="<?= base_url() ?>template_home/js/jquery.form.js"></script> -->
<script defer src="<?= base_url() ?>template_home/js/jquery.validate.min.js"></script>
<script defer src="<?= base_url() ?>template_home/js/signin.js"></script>
<script defer src="<?= base_url() ?>template_home/js/contact.js"></script>
<script defer src="<?= base_url() ?>template_home/js/plugins.js"></script>
<script defer src="<?= base_url() ?>template_home/js/main.js"></script>
<script defer src="<?= base_url(); ?>js/headers/toastr.min.js"></script>
<script defer src="<?= base_url(); ?>js/headers/mask/jquery.mask.js"></script>
<script defer src="<?= base_url(); ?>js/headers/mask/jquery.mask.min.js"></script>
<script defer src="<?= base_url(); ?>js/global/mascaras copy.js"></script>
<!-- jQuery -->
<script src="<?= base_url(); ?>template_home/js/jquery-3.2.1.min.js"></script>

<!-- Js para traducciones local -->
<script src="<?= base_url() ?>js/traduction.js?v=<?=$version;?>"></script>

<script defer>
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
</script>
</body>

</html>