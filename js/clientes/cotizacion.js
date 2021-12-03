const SwalStatus = Swal.mixin({
    customClass: {
        cancelButton: 'btn btn-outline-danger btn-nuevo padding-buttons',
        confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons'
    },
    buttonsStyling: false
});
var idCot = $('#idCotizacion').val();
var baseUrl = $("#baseURL").val();

var cotizacion = {
    modalProd: function () {
        $(document).on('click', '.imgProdCat', function (event) {
            event.preventDefault();
            var id_producto_cot = { id_producto_cot: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Clientes/mediaProdCot', id_producto_cot);
            var primerMedi = response[0].id_media_prod_cot;
            var primerPath = response[0].path_prod_cot;
            var path = baseUrl + primerPath;
            $("#divImgProdCot").css('display', 'none');
            $("#carouselMediaCot").css('display', 'none');
            $("#divImgProdCot").empty();
            $(".caroucelModal").empty();
            $(".slidersModal").empty();

            if (response.length == 1) {
                var img = '';
                $("#divImgProdCot").css('display', '');

                img = '<img class="img-fluid img-caroucel" src="' + path + '">';

                $("#divImgProdCot").append(img);
            } else {
                var count = 1;
                var ca_active = '';
                var sl_active = '';
                var caroucel = '';
                var slider = '';
                $("#carouselMediaCot").css('display', '');

                var ca_active = '<div class="carousel-item active">' +
                    '<img id="imgProd" src="' + path + '" class="img-fluid img-caroucel">' +
                    '</div>';
                var sl_active = '<li data-target="#carouselMediaCot" data-slide-to="' + count + '" class="active"></li>';

                $(".caroucelModal").append(ca_active);
                $(".slidersModal").append(sl_active);

                response.forEach(element => {
                    var imgsrc = $('#imgProd').attr('src');
                    var mediapath = baseUrl + element.path_prod_cot;
                    if (imgsrc !== mediapath) {
                        count++;
                        caroucel += '<div class="carousel-item">' +
                            '<img class="img-fluid img-caroucel" src="' + mediapath + '">' +
                            '</div>';
                        slider += '<li data-target="#carouselMediaCot" data-slide-to="' + count + '"></li>';
                    }
                });

                $(".caroucelModal").append(caroucel);
                $(".slidersModal").append(slider);
            }

            jQuery(function ($) {
                $('#modal_cotCliente').modal('show');
            });
        });
    },

    estatus: function () {
        $(document).on('click', '.btnAceptar', function (event) {
            event.preventDefault();
            var data = {
                id_cotizacion: idCot,
                activo: 3 //aceptada cliente
            };

            SwalStatus.fire({
                title: '¿Seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Si, aceptar.',
                cancelButtonText: 'Cancelar.'
            }).then((result) => {
                if (result.value) {
                    cargar_ajax.run_server_ajax('Plataforma/update_status_cotizacion', data);
                    //rechazar las demas cotizaciones
                    cargar_ajax.run_server_ajax('Plataforma/update_otras_cotizaciones', data);
                    swal.fire({
                        title: '¡Listo!',
                        text: 'Cotización aceptada',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                }
            });
        });

        $(document).on('click', '.btnRecotizar', function (event) {
            event.preventDefault();
            var data = {
                id_cotizacion: idCot,
                activo: 4 //solicitud recotizar cliente
            };

            SwalStatus.fire({
                title: '¿Seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Si, aceptar.',
                cancelButtonText: 'Cancelar.'
            }).then((result) => {
                if (result.value) {
                    cargar_ajax.run_server_ajax('Plataforma/update_status_cotizacion', data);
                    swal.fire({
                        title: '¡Listo!',
                        text: 'Has solicitado la recotización de tu pedido!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                }
            });

        });
    }
}
jQuery(document).ready(function () {
    cotizacion.estatus(this);
    cotizacion.modalProd(this);
});