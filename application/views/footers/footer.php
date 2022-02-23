</div>
<script>
    $(document).ready(function() {
        $('[data-mask]').inputmask();
        $('[data-toggle="popover"]').popover();

        var selLada = $("#selLada").val();
        if (selLada == 1) {
            $('#txtLada').val("(+ 1)");
        } else if (selLada == 2) {
            $('#txtLada').val("(+ 52)");
        }

        $('#selLada').on('change', function() {
            console.log(this.value);
            if (this.value == "1") {
                $('#txtLada').val("(+ 1)");
            } else if (this.value == "2") {
                $('#txtLada').val("(+ 52)");
            }
        });

        var winWidth = $(window).width();
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
<!-- Tablas -->
<script src="<?= base_url(); ?>js/tablas.js"></script>
<!-- Global -->
<script src="<?= base_url(); ?>js/global.js"></script>
<!-- Dashboard -->
<script src="<?= base_url(); ?>js/proveedores.js"></script>
<!-- <script src="<?= base_url(); ?>js/dashboard.js"></script> -->
<!-- chart JS -->
<script src="<?= base_url(); ?>resources/libraries/chartJS/Chart.js"></script>
<script src="<?= base_url(); ?>resources/libraries/chartJS/Chart.bundle.js"></script>
<script src="<?= base_url(); ?>resources/libraries/chartJS/chartjs-plugin-datalabels.js"></script>

<!-- bootstrap -->
<script src="<?= base_url(); ?>resources/libraries/bootstrap/js/bootstrap-table.js"></script>
<script src="<?= base_url(); ?>resources/libraries/bootstrap/js/bootstrap-tagsinput.js"></script>
<script src="<?= base_url(); ?>resources/libraries/bootstrap/js/bootstrap-table-locale-all.js"></script>

<!-- dataTable -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/responsive/js/dataTables.responsive.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/datatables/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/responsive/js/responsive.dataTables.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/rowreorder/js/dataTables.rowReorder.js"></script>

<script src="<?= base_url(); ?>resources/libraries/dataTable/jsZip/jszip.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/buttons/js/buttons.html5.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/buttons/js/buttons.print.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/buttons/js/buttons.colVis.js"></script>
<script src="<?= base_url(); ?>resources/libraries/dataTable/buttons/js/buttons.bootstrap4.js"></script>

<!-- admin LTE -->
<script src="<?= base_url(); ?>resources/libraries/adminlte/js/adminlte.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/chartJS/Chart.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/jquery/jquery.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/toastr/toastr.min.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/moment/moment.min.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/inputmask/inputmask.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/inputmask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/inputmask/inputmask.binding.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/jquery-ui/jquery-ui.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/select2/select2.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/select2/select2.full.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/sparklines/sparkline.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/summernote/summernote.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/summernote/summernote-bs4.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/sweetalert2/sweetalert2.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/sweetalert2/sweetalert2.all.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/tempusdominus/tempusdominus.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/jqvmap/jquery.vmap.js"></script>
<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/jqvmap/maps/jquery.vmap.world.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/bootstrap/js/bootstrap.bundle.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/bootstrap-switch/bootstrap-switch.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/overlayscrollbars/jquery.overlayScrollbars.js"></script>

<script src="<?= base_url(); ?>resources/libraries/adminlte/plugins/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>

<script>
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
</script>
</body>

</html>