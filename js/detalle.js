const SwalStatus = Swal.mixin({
    customClass: {
        cancelButton: 'btn btn-outline-danger btn-nuevo padding-buttons',
        confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons'
    },
    buttonsStyling: false
});

var baseUrl = $("#baseURL").val();
var IdCotizacion;


var detalle = {
    activos: function () {
        $("#liValoresOpen").css('display', 'block');
        $("#liValoresClose").css('display', 'none');
        $("#liDesglose").html('<i class="fas fa-chevron-up" style="font-size: 12px;"></i> Menos Información');
        $("#listCot").css('display', 'block');
        $("#listDetCot").css('display', 'none');
        $(".liCotizacion").css('display', 'block');
        $(".liDetCotizacion").css('display', 'none');
    },

    gastos: function () {
        $(document).on('click', '#headingGastos', function (event) {
            event.preventDefault();
            col = $("#collapseGastos").attr('class');
            console.log(col);
            console.log('cerrado');
            if (col == 'collapse') {
                $("#liValoresOpen").css('display', 'block');
                $("#liValoresClose").css('display', 'none');
                $("#liDesglose").html('<i class="fas fa-chevron-up" style="font-size: 12px;"></i> Menos Información');
            } else if (col == 'collapse show') {
                $("#liValoresOpen").css('display', 'none');
                $("#liValoresClose").css('display', 'block');
                $("#liDesglose").html('<i class="fas fa-chevron-down" style="font-size: 12px;"></i> Más Información');
            }
        });
    },

    cotizaciones: function () {
        $(document).on('click', '#liCotizacion', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            IdCotizacion = id;
            $("#listCot").css('display', 'none');
            $("#listDetCot").css('display', 'block');
            $(".liCotizacion").css('display', 'none');
            $("#liDetCotizacion" + IdCotizacion + "").css('display', 'block');
        });


        $(document).on('click', '#btnVolver', function (event) {
            event.preventDefault();
            $("#listCot").css('display', 'block');
            $("#listDetCot").css('display', 'none');
            $(".liCotizacion").css('display', 'block');
            $("#liDetCotizacion" + IdCotizacion + "").css('display', 'none');
        });
    },

    estatus: function () {
        $(document).on('click', '.btnAceptar', function (event) {
            event.preventDefault();
            var idCot = $(this).data('id');
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
                        // location.reload();
                    });
                }
            });
        });

        $(document).on('click', '.btnRecotizar', function (event) {
            event.preventDefault();
            var idCot = $(this).data('id');
            var data = {
                id_cotizacion: idCot,
                activo: 5 //solicitud recotizar cliente
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
    },

    media_proyecto: function () {
        $(document).on('click', '.imgDetPodCar', function (event) {
            event.preventDefault();
            $("#divPdfProd").css('display', 'none');
            $("#divImgProd").css('display', 'none');
            $("#carouselMedia").css('display', 'none');
            $("#divPdfProd").empty();
            $("#divImgProd").empty();
            $("#carouselProdCont").empty();
            $("#slidersProd").empty();
            $("#titleModal").html('Producto/s cotización');

            var id_producto_cot = { id_producto_cot: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaProdCot', id_producto_cot);
            var primerPath = response[0].path_prod_cot;
            var path = baseUrl + primerPath;
        
            if (response.length == 1) {
                $("#divImgProd").css('display', '');
                var img = '';        
                img = '<img class="img-fluid img-caroucel" src="' + path + '">';        
                $("#divImgProd").append(img);
            } else {
                $("#carouselMedia").css('display', '');
                var count = 1;
                var ca_active = '';
                var sl_active = '';
                var caroucel = '';
                var slider = '';
        
                ca_active = '<div class="carousel-item active">' +
                    '<img id="imgProd" src="' + path + '" class="img-fluid img-caroucel">' +
                    '</div>';
                sl_active = '<li data-target="#carouselMedia" data-slide-to="' + count + '" class="active"></li>';
        
                $("#carouselProdCont").append(ca_active);
                $("#slidersProd").append(sl_active);
        
                response.forEach(element => {
                    var imgsrc = $('#imgProd').attr('src');
                    var mediapath = baseUrl + element.path_prod_cot;
                    if (imgsrc !== mediapath) {
                        count++;
                        caroucel += '<div class="carousel-item">' +
                            '<img class="img-fluid img-caroucel" src="' + mediapath + '">' +
                            '</div>';
                        slider += '<li data-target="#carouselMedia" data-slide-to="' + count + '"></li>';
                    }
                });
        
                $("#carouselProdCont").append(caroucel);
                $("#slidersProd").append(slider);
            }
        
            jQuery(function ($) {
                $('#modalFiles').modal('show');
            });
        });
        // abril en modal el logotipo agregado para el producto del pedido
        $(document).on('click', '#mediaOEM', function (event) {
            event.preventDefault();
            $("#divPdfProd").css('display', 'none');
            $("#divImgProd").css('display', 'none');
            $("#carouselMedia").css('display', 'none');
            $("#divPdfProd").empty();
            $("#divImgProd").empty();
            $("#carouselProdCont").empty();
            $("#slidersProd").empty();
            $("#titleModal").html('Logotipo para el producto');
            $("#divImgProd").css('display', '');

            var id_proyecto = { id_proyecto: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaPedidoOEM', id_proyecto);
            var oem_path = baseUrl + response.oemservice_path;
            var file = response.oemservice_path;
            var ext = file.split('.').pop();
            if (ext == 'pdf' || ext == 'PDF') {
                $("#divPdfProd").css('display', '');
                var pdf = '';
                pdf = '<embed src="' + oem_path + '" frameborder="0" width="100%" height="440px">';        
                $("#divPdfProd").append(pdf);
            } else {
                $("#divImgProd").css('display', '');
                var img = '';
                img = '<img class="img-fluid img-caroucel" src="' + oem_path + '">';        
                $("#divImgProd").append(img);
            }
        
            jQuery(function ($) {
                $('#modalFiles').modal('show');
            });
        });
        // abril en modal el archivo invoice/ no. de factura del proveedor del producto
        $(document).on('click', '#mediaProv', function (event) {
            event.preventDefault();
            $("#divPdfProd").css('display', 'none');
            $("#divImgProd").css('display', 'none');
            $("#carouselMedia").css('display', 'none');
            $("#divPdfProd").empty();
            $("#divImgProd").empty();
            $("#carouselProdCont").empty();
            $("#slidersProd").empty();
            $("#titleModal").html('No. de factura');
            
            var id_producto_c = { id_producto_c: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaPedidoP', id_producto_c);
            var invoice_path = baseUrl + response.invoice_path;
            var file = response.invoice_path;
            var ext = file.split('.').pop();
            if (ext == 'pdf' || ext == 'PDF') {
                $("#divPdfProd").css('display', '');
                var pdf = '';
                pdf = '<embed src="' + invoice_path + '" frameborder="0" width="100%" height="440px">';        
                $("#divPdfProd").append(pdf);
            } else {
                $("#divImgProd").css('display', '');
                var img = '';
                img = '<img class="img-fluid img-caroucel" src="' + invoice_path + '">';        
                $("#divImgProd").append(img);
            }
            
            jQuery(function ($) {
                $('#modalFiles').modal('show');
            });
        });
        // abril en modal la imagen del producto con proveedor del pedido
        $(document).on('click', '#mediaProd_P', function (event) {
            event.preventDefault();
            $("#divPdfProd").css('display', 'none');
            $("#divImgProd").css('display', 'none');
            $("#carouselMedia").css('display', 'none');
            $("#divPdfProd").empty();
            $("#divImgProd").empty();
            $("#carouselProdCont").empty();
            $("#slidersProd").empty();
            $("#titleModal").html('Producto');
            $("#divImgProd").css('display', '');
            
            var id_producto_c = { id_producto_c: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaPedidoP', id_producto_c);
            var img_p = baseUrl + response.img_path;
            var img = '';    
            img = '<img class="img-fluid img-caroucel" src="' + img_p + '">';    
            $("#divImgProd").append(img);
        
            jQuery(function ($) {
                $('#modalFiles').modal('show');
            });
        });
        // abril en modal la imagen del producto sin proveedor del pedido
        $(document).on('click', '#mediaProd_SP', function (event) {
            event.preventDefault();
            $("#divPdfProd").css('display', 'none');
            $("#divImgProd").css('display', 'none');
            $("#carouselMedia").css('display', 'none');
            $("#divPdfProd").empty();
            $("#divImgProd").empty();
            $("#carouselProdCont").empty();
            $("#slidersProd").empty();
            $("#titleModal").html('Producto');
            $("#divImgProd").css('display', '');
            
            var id_producto_sp_c = { id_producto_sp_c: $(this).data('id') };
            var response = cargar_ajax.run_server_ajax('Plataforma/mediaPedidoSP', id_producto_sp_c);
            var img_sp = baseUrl + response.img_path;
            var img = '';    
            img = '<img class="img-fluid img-caroucel" src="' + img_sp + '">';    
            $("#divImgProd").append(img);
        
            jQuery(function ($) {
                $('#modalFiles').modal('show');
            });
        });
    },

    term_cond: function () {
        $(document).on('click', '#btnTer_Con', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $('#modalTyC').modal();
            });
        });
    },
}
jQuery(document).ready(function () {
    detalle.activos(this);
    detalle.gastos(this);
    detalle.cotizaciones(this);
    detalle.estatus(this);
    detalle.media_proyecto(this);
    detalle.term_cond(this);
});