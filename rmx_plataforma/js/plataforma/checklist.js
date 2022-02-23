// variable global de validacion
var valCheck = false;
// variables globales para la fecha actual
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
todayPrint = dd + '-' + mm + '-' + yyyy;

//Variables para archivo done
var arreglo_done = new Array();
var frmData_done = new FormData();
var file_Files_done = " ";

// base de la url para los archivos
var baseURL = $('#baseURL').html();

// validar comentario de la tarea lista
function validarComentario() {
    var valComentario = $('.txtComentario').val();

    if (valComentario !== '') {
        document.getElementById('val_txtComentario').style.display = 'none';
    } else if (valComentario === '') {
        document.getElementById('val_txtComentario').style.display = '';
    }

    if (valComentario !== '') {
        valCheck = true;
    } else {
        valCheck = false;
    }
}

var sourcing = {
    // cambiar el estatus y la fecha de la tarea realizada a listo
    addCheck: function () {
        $(document).on('click', '.btnNoCheckS', function (event) {
            event.preventDefault();
            var id = { id_sourcing: $(this).data('id') };
            data = { id_sourcing: id.id_sourcing };
            check = cargar_ajax.run_server_ajax('Plataforma/sourcing_task', data);
            // comprobar si coincide con los id requeridos
            // sino no coicide entones solo poner la tarea lista
            var id_task = parseInt(check.id_task);
            if (id_task === 5 || id_task === 6 || id_task === 9) {
                jQuery(function ($) {
                    $("#modalComentarios").modal();
                });
                $('#idTask').val(1);
                $('#idSour').val(id.id_sourcing);
                // poner la descripcion de la tare en el modal
                document.getElementById('txtDescripcion').style.display = '';
                $('#txtDescripcion').html(check.detalle);
            } else {
                var id_sourcing = id.id_sourcing;
                var coment = '';

                var data = {
                    id_sourcing: id_sourcing,
                    estatus: 1,
                    fecha_cambio: today,
                    comentario: coment
                }

                responseS = cargar_ajax.run_server_ajax('Plataforma/checkSourcing', data);

                jQuery(function ($) {
                    $("#modalComentarios").modal('hide');
                });
                $('#idTask').val(0);
                $('#idSour').val(0);
                $('.txtComentario').val('');
                $("#btnNoCheckS" + id_sourcing + "").addClass('hide-button');
                $("#btnCheckS" + id_sourcing + "").removeClass('hide-button');
                $("#taskNoCheckS" + id_sourcing + "").addClass('hide-button');
                $("#taskCheckS" + id_sourcing + "").removeClass('hide-button');

                $("#nocheckDateS" + id_sourcing + "").addClass('hide-button');
                $("#checkDateS" + id_sourcing + "").removeClass('hide-button');
                $("#checkDateS" + id_sourcing + "").html(todayPrint);

            }
        });
    },

    // devolver los valores de estatus y fecha a tarea sin realizar
    removeCheck: function () {
        $(document).on('click', '.btnCheckS', function (event) {
            event.preventDefault();
            var id = { id_sourcing: $(this).data('id') };

            var data = {
                id_sourcing: id.id_sourcing,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkSourcing', data);
            $("#btnCheckS" + id.id_sourcing + "").addClass('hide-button');
            $("#btnNoCheckS" + id.id_sourcing + "").removeClass('hide-button');
            $("#taskCheckS" + id.id_sourcing + "").addClass('hide-button');
            $("#taskNoCheckS" + id.id_sourcing + "").removeClass('hide-button');

            $("#checkDateS" + id.id_sourcing + "").addClass('hide-button');
            $("#nocheckDateS" + id.id_sourcing + "").removeClass('hide-button');
            $("#collapseTaskS" + id.id_sourcing + "").removeClass('show');
        });
    }
}

var production = {
    addCheck: function () {
        $(document).on('click', '.btnNoCheckP', function (event) {
            event.preventDefault();
            var id = { id_production: $(this).data('id') };
            data = { id_production: id.id_production };
            check = cargar_ajax.run_server_ajax('Plataforma/production_task', data);
            // comprobar si coincide con los id requeridos
            // sino no coicide entones solo poner la tarea lista
            var id_task = parseInt(check.id_task);
            if (id_task === 12 || id_task === 15 || id_task === 18 || id_task === 16) {
                if (id_task === 16) {
                    jQuery(function ($) {
                        $("#modalBL").modal();
                    });
                    $('#idTask_bl').val(2);
                    $('#idProc_bl').val(id.id_production);
                    //txtbl

                } else {
                    jQuery(function ($) {
                        $("#modalComentarios").modal();
                    });
                    $('#idTask').val(2);
                    $('#idProc').val(id.id_production);
                    // poner la descripcion de la tare en el modal
                    document.getElementById('txtDescripcion').style.display = '';
                    $('#txtDescripcion').html(check.detalle);
                }
            }
            else {
                var id_production = id.id_production;
                var coment = '';

                var data = {
                    id_production: id_production,
                    estatus: 1,
                    fecha_cambio: today,
                    comentario: coment
                }

                responseP = cargar_ajax.run_server_ajax('Plataforma/checkProduction', data);

                jQuery(function ($) {
                    $("#modalComentarios").modal('hide');
                });
                $('#idTask').val(0);
                $('#idProc').val(0);
                $('.txtComentario').val('');
                $("#btnNoCheckP" + id_production + "").addClass('hide-button');
                $("#btnCheckP" + id_production + "").removeClass('hide-button');
                $("#taskNoCheckP" + id_production + "").addClass('hide-button');
                $("#taskCheckP" + id_production + "").removeClass('hide-button');

                $("#noCheckDateP" + id_production + "").addClass('hide-button');
                $("#checkDateP" + id_production + "").removeClass('hide-button');
                $("#checkDateP" + id_production + "").html(todayPrint);

            }

        });
    },

    removeCheck: function () {
        $(document).on('click', '.btnCheckP', function (event) {
            event.preventDefault();
            var id = { id_production: $(this).data('id') };

            var data = {
                id_production: id.id_production,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkProduction', data);
            $("#btnCheckP" + id.id_production + "").addClass('hide-button');
            $("#btnNoCheckP" + id.id_production + "").removeClass('hide-button');
            $("#taskCheckP" + id.id_production + "").addClass('hide-button');
            $("#taskNoCheckP" + id.id_production + "").removeClass('hide-button');

            $("#checkDateP" + id.id_production + "").addClass('hide-button');
            $("#noCheckDateP" + id.id_production + "").removeClass('hide-button');
            $("#collapseTaskP" + id.id_production + "").removeClass('show');
        });
    }
}

var freight = {
    addCheck: function () {
        $(document).on('click', '.btnNoCheckF', function (event) {
            event.preventDefault();
            var id = { id_freight: $(this).data('id') };
            data = { id_freight: id.id_freight };
            check = cargar_ajax.run_server_ajax('Plataforma/freight_task', data);
            // comprobar si coincide con los id requeridos
            // sino no coicide entones solo poner la tarea lista
            var id_task = parseInt(check.id_task);
            if (id_task === 21) {
                jQuery(function ($) {
                    $("#modalComentarios").modal();
                });
                $('#idTask').val(3);
                $('#idFrei').val(id.id_freight);
                // poner la descripcion de la tare en el modal
                document.getElementById('txtDescripcion').style.display = '';
                $('#txtDescripcion').html(check.detalle);
            } else {
                var id_freight = id.id_freight;
                var coment = '';

                var data = {
                    id_freight: id_freight,
                    estatus: 1,
                    fecha_cambio: today,
                    comentario: coment
                }
                responseF = cargar_ajax.run_server_ajax('Plataforma/checkFreight', data);

                jQuery(function ($) {
                    $("#modalComentarios").modal('hide');
                });
                $('#idTask').val(0);
                $('#idFrei').val(0);
                $('.txtComentario').val('');
                $("#btnNoCheckF" + id_freight + "").addClass('hide-button');
                $("#btnCheckF" + id_freight + "").removeClass('hide-button');
                $("#taskNoCheckF" + id_freight + "").addClass('hide-button');
                $("#taskCheckF" + id_freight + "").removeClass('hide-button');

                $("#nocheckDateF" + id_freight + "").addClass('hide-button');
                $("#checkDateF" + id_freight + "").removeClass('hide-button');
                $("#checkDateF" + id_freight + "").html(todayPrint);


            }
        });
    },

    removeCheck: function () {
        $(document).on('click', '.btnCheckF', function (event) {
            event.preventDefault();
            var id = { id_freight: $(this).data('id') };

            var data = {
                id_freight: id.id_freight,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkFreight', data);
            $("#btnCheckF" + id.id_freight + "").addClass('hide-button');
            $("#btnNoCheckF" + id.id_freight + "").removeClass('hide-button');
            $("#taskCheckF" + id.id_freight + "").addClass('hide-button');
            $("#taskNoCheckF" + id.id_freight + "").removeClass('hide-button');

            $("#checkDateF" + id.id_freight + "").addClass('hide-button');
            $("#nocheckDateF" + id.id_freight + "").removeClass('hide-button');
            $("#collapseTaskF" + id.id_freight + "").removeClass('show');
        });
    }
}

var customs = {
    addCheck: function () {
        $(document).on('click', '.btnNoCheckC', function (event) {
            event.preventDefault();

            var id = { id_customs: $(this).data('id') };
            $('#idTask').val(4);
            var id_customs = id.id_customs;
            var coment = '';

            var data = {
                id_customs: id_customs,
                estatus: 1,
                fecha_cambio: today,
                comentario: coment
            }
            responseC = cargar_ajax.run_server_ajax('Plataforma/checkCustoms', data);

            jQuery(function ($) {
                $("#modalComentarios").modal('hide');
            });
            $('#idTask').val(0);
            $('#idCust').val(0);
            $('.txtComentario').val('');
            $("#btnNoCheckC" + id_customs + "").addClass('hide-button');
            $("#btnCheckC" + id_customs + "").removeClass('hide-button');
            $("#taskNoCheckC" + id_customs + "").addClass('hide-button');
            $("#taskCheckC" + id_customs + "").removeClass('hide-button');

            $("#nocheckDateC" + id_customs + "").addClass('hide-button');
            $("#checkDateC" + id_customs + "").removeClass('hide-button');
            $("#checkDateC" + id_customs + "").html(todayPrint);

        });
    },

    removeCheck: function () {
        $(document).on('click', '.btnCheckC', function (event) {
            event.preventDefault();
            var id = { id_customs: $(this).data('id') };

            var data = {
                id_customs: id.id_customs,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkCustoms', data);
            $("#btnCheckC" + id.id_customs + "").addClass('hide-button');
            $("#btnNoCheckC" + id.id_customs + "").removeClass('hide-button');
            $("#taskCheckC" + id.id_customs + "").addClass('hide-button');
            $("#taskNoCheckC" + id.id_customs + "").removeClass('hide-button');

            $("#checkDateC" + id.id_customs + "").addClass('hide-button');
            $("#nocheckDateC" + id.id_customs + "").removeClass('hide-button');
            $("#collapseTaskC" + id.id_customs + "").removeClass('show');
        });
    }
}

var quoted = {
    addCheck: function () {
        $(document).on('click', '.btnNoCheckQ', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $("#modalComentarios").modal();
            });

            var id = { id_quoted: $(this).data('id') };
            $('#idTask').val(6);
            $('#idQuo').val(id.id_quoted);



            var data = {
                id_quoted: id.id_quoted,
                estatus: 1,
                fecha_cambio: today,
            }
            cargar_ajax.run_server_ajax('Plataforma/checkQuoted', data);
            $("#btnNoCheckQ" + id.id_quoted + "").addClass('hide-button');
            $("#btnCheckQ" + id.id_quoted + "").removeClass('hide-button');

            $("#nocheckDateQ" + id.id_quoted + "").addClass('hide-button');
            $("#checkDateQ" + id.id_quoted + "").removeClass('hide-button');
            $("#checkDateQ" + id.id_quoted + "").html(todayPrint);
        });
    },

    removeCheck: function () {
        $(document).on('click', '.btnCheckQ', function (event) {
            event.preventDefault();
            var id = { id_quoted: $(this).data('id') };

            var data = {
                id_quoted: id.id_quoted,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkQuoted', data);
            $("#btnCheckQ" + id.id_quoted + "").addClass('hide-button');
            $("#btnNoCheckQ" + id.id_quoted + "").removeClass('hide-button');

            $("#checkDateQ" + id.id_quoted + "").addClass('hide-button');
            $("#nocheckDateQ" + id.id_quoted + "").removeClass('hide-button');
            $("#collapseTaskQ" + id.id_quoted + "").removeClass('show');
        });
    }
}

var done = {
    addCheck: function () {
        $(document).on('click', '.btnNoCheckD', function (event) {
            event.preventDefault();
            jQuery(function ($) {
                $("#modalDone").modal();
            });
            var task = 5;

            var id = { id_done: $(this).data('id') };
            var id_done = id.id_done;
            $('#idDone_d').val(id_done);
        });

        $('#agregarevidencia').on('submit', function (event) {
            event.preventDefault();
            var id_done = $('#idDone_d').val();
            var data = {
                id_done: id_done,
                estatus: 1,
                fecha_cambio: today,
                comentario: ''
            }

            frmData_done.append("id", id_done);
            frmData_done.append("imagen", file_Files_done);

            responseD = cargar_ajax.run_server_ajax('Plataforma/checkDone', data);
            cargar_ajax2.run_server_ajax2('Plataforma/subir_evidencia', frmData_done);
            var resonseFile = cargar_ajax.run_server_ajax('Plataforma/get_evidencia', data);
            var path = resonseFile.comentario;
            var pathext = path.substring(path.lastIndexOf('.') + 1, path.length) || path;

            if (pathext === 'pdf' || pathext === 'PDF') {
                $('#pdfEvidencia').removeClass('hide-button');
                $('#imgEvidencia').addClass('hide-button');
                $('#srcPDF').html(baseURL + path);

            } else if (pathext === 'png' || pathext === 'PNG' || pathext === 'jpg' 
            || pathext === 'JPG' || pathext === 'jpeg' || pathext === 'JPEG') {
                $('#imgEvidencia').removeClass('hide-button');
                $('#pdfEvidencia').addClass('hide-button');
                $('#imgEvidencia').attr("src", baseURL + path);
            }

            jQuery(function ($) {
                $("#modalDone").modal('hide');
            });

            $('#idDone_d').val();
            $('#lblDone').html('');
            $("#btnNoCheckD" + id_done + "").addClass('hide-button');
            $("#btnCheckD" + id_done + "").removeClass('hide-button');
            $("#taskNoCheckD" + id_done + "").addClass('hide-button');
            $("#taskCheckD" + id_done + "").removeClass('hide-button');

            $("#nocheckDateD" + id_done + "").addClass('hide-button');
            $("#checkDateD" + id_done + "").removeClass('hide-button');
            $("#checkDateD" + id_done + "").html(todayPrint);

            jQuery(function ($) {
                $("#modalDone").modal('hide');
            });
        });

        $(document).on('click', '.closeimgdone', function (event) {
            event.preventDefault();
            file_Files_done = " ";
            for (var key of frmData_done.keys()) {
                frmData_done.delete(key);
            }
            var id = $('#idDone_d').val()
            var data = {
                id_done: id,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkDone', data);
            $('#idDone_d').val();
            $('#lblDone').html('');
            $("#btnCheckD" + id + "").addClass('hide-button');
            $("#btnNoCheckD" + id + "").removeClass('hide-button');
            $("#taskCheckD" + id + "").addClass('hide-button');
            $("#taskNoCheckD" + id + "").removeClass('hide-button');

            $("#checkDateD" + id + "").addClass('hide-button');
            $("#nocheckDateD" + id + "").removeClass('hide-button');
            $("#collapseTaskD" + id + "").removeClass('show');
        });

        $(document).on('click', '#pdfEvidencia', function (event) {
            event.preventDefault();
            
            jQuery(function ($) {
                $("#modalInvoice").modal();
            });
            $("#titleModal").html('Evidencia');
            var path = $('#srcPDF').html();
            var pdf = "";
            
            $("#divPDFInvoice").css('display', 'none');
            $("#divImgInvoice").css('display', 'none');
            $("#divPDFCheck").css('display', '');
            $("#divPDFInvoice").empty();
            $("#divImgInvoice").empty();
            $("#divPDFCheck").empty();
            pdf = '<embed id="pdfCheck" src="' + path + '" frameborder="0" width="100%" height="440px">';
            $("#divPDFCheck").append(pdf);
        });

    },

    getdoc: function () {
        //Seccion documento done
        $('#inputdone').on('change', function (e) {
            var inputFile = e.currentTarget;
            file_Files_done = inputFile.files[0];

            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        });

        $('#btnLimpiardone').on('click', function (e) {
            file_Files_done = " ";
            document.getElementById("inputdone").value = "";
        });
    },

    removeCheck: function () {
        $(document).on('click', '.btnCheckD', function (event) {
            event.preventDefault();
            var id = { id_done: $(this).data('id') };

            var data = {
                id_done: id.id_done,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
                comentario: '',
            }
            cargar_ajax.run_server_ajax('Plataforma/checkDone', data);
            $("#btnCheckD" + id.id_done + "").addClass('hide-button');
            $("#btnNoCheckD" + id.id_done + "").removeClass('hide-button');
            $("#taskCheckD" + id.id_done + "").addClass('hide-button');
            $("#taskNoCheckD" + id.id_done + "").removeClass('hide-button');

            $("#checkDateD" + id.id_done + "").addClass('hide-button');
            $("#nocheckDateD" + id.id_done + "").removeClass('hide-button');
            $("#collapseTaskD" + id.id_done + "").removeClass('show');            
            $('#srcPDF').html();
            $('#imgEvidencia').attr('src', '');
        });
    },
}

var comentarios = {
    addComents: function () {
        $('#agregarComentario').on('submit', function (event) {
            event.preventDefault();
            validarComentario();

            var task = $('#idTask').val();

            if (valCheck === true) {
                if (task === "1") {
                    var id_sourcing = $('#idSour').val();
                    var coment = $('.txtComentario').val();
                    $('#txtComentS' + id_sourcing + '').html(coment);

                    var data = {
                        id_sourcing: id_sourcing,
                        estatus: 1,
                        fecha_cambio: today,
                        comentario: coment
                    }

                    responseS = cargar_ajax.run_server_ajax('Plataforma/checkSourcing', data);

                    jQuery(function ($) {    
                        $("#modalComentarios").modal('hide');
                    });
                    $('#idTask').val(0);
                    $('#idSour').val(0);
                    $('.txtComentario').val('');
                    $("#btnNoCheckS" + id_sourcing + "").addClass('hide-button');
                    $("#btnCheckS" + id_sourcing + "").removeClass('hide-button');
                    $("#taskNoCheckS" + id_sourcing + "").addClass('hide-button');
                    $("#taskCheckS" + id_sourcing + "").removeClass('hide-button');

                    $("#nocheckDateS" + id_sourcing + "").addClass('hide-button');
                    $("#checkDateS" + id_sourcing + "").removeClass('hide-button');
                    $("#checkDateS" + id_sourcing + "").html(todayPrint);

                } else if (task === "2") {
                    var id_production = $('#idProc').val();
                    var coment = $('.txtComentario').val();
                    $('#txtComentP' + id_production + '').html(coment);

                    var data = {
                        id_production: id_production,
                        estatus: 1,
                        fecha_cambio: today,
                        comentario: coment
                    }

                    responseP = cargar_ajax.run_server_ajax('Plataforma/checkProduction', data);

                    jQuery(function ($) {
                        $("#modalComentarios").modal('hide');
                    });
                    $('#idTask').val(0);
                    $('#idProc').val(0);
                    $('.txtComentario').val('');
                    $("#btnNoCheckP" + id_production + "").addClass('hide-button');
                    $("#btnCheckP" + id_production + "").removeClass('hide-button');
                    $("#taskNoCheckP" + id_production + "").addClass('hide-button');
                    $("#taskCheckP" + id_production + "").removeClass('hide-button');

                    $("#noCheckDateP" + id_production + "").addClass('hide-button');
                    $("#checkDateP" + id_production + "").removeClass('hide-button');
                    $("#checkDateP" + id_production + "").html(todayPrint);


                } else if (task === "3") {
                    var id_freight = $('#idFrei').val();
                    var coment = $('.txtComentario').val();
                    $('#txtComentF' + id_freight + '').html(coment);

                    var data = {
                        id_freight: id_freight,
                        estatus: 1,
                        fecha_cambio: today,
                        comentario: coment
                    }
                    responseF = cargar_ajax.run_server_ajax('Plataforma/checkFreight', data);
                    jQuery(function ($) {
                        $("#modalComentarios").modal('hide');
                    });
                    $('#idTask').val(0);
                    $('#idFrei').val(0);
                    $('.txtComentario').val('');
                    $("#btnNoCheckF" + id_freight + "").addClass('hide-button');
                    $("#btnCheckF" + id_freight + "").removeClass('hide-button');
                    $("#taskNoCheckF" + id_freight + "").addClass('hide-button');
                    $("#taskCheckF" + id_freight + "").removeClass('hide-button');

                    $("#nocheckDateF" + id_freight + "").addClass('hide-button');
                    $("#checkDateF" + id_freight + "").removeClass('hide-button');
                    $("#checkDateF" + id_freight + "").html(todayPrint);

                }
            }
        });

        $(document).on('click', '.closeComent', function (event) {
            event.preventDefault();
            $('#idTask').val(0);
            $('#idSour').val(0);
            $('#idProc').val(0);
            $('#idFrei').val(0);
            $('#idCust').val(0);
            $('#idDon').val(0);
            $('.txtComentario').val();
        });

        $(document).on('click', '.closeBL', function (event) {
            event.preventDefault();
            $('#idTask_bl').val(0);
            $('#txtbl').val('');
        });

        $('#agregarBL').on('submit', function (event) {
            event.preventDefault();

            var task = $('#idTask_bl').val();

            if (task === "2") {
                var id_production = $('#idProc_bl').val();
                var num_bl = $('#txtbl').val();
                var coment = '';
                var id_proyecto = $('#idProy_bl').val();
                $(".blchange").empty();
                $(".blchange").append(num_bl);

                var data = {
                    id_production: id_production,
                    estatus: 1,
                    fecha_cambio: today,
                    comentario: coment,
                }

                var data_bl = {
                    num_bl: num_bl,
                    id_proyecto: id_proyecto,
                }

                responseP = cargar_ajax.run_server_ajax('Plataforma/checkProduction', data);
                cargar_ajax.run_server_ajax('Plataforma/actualizar_bl', data_bl);

                jQuery(function ($) {
                    $("#modalBL").modal('hide');
                });
                $('#idTask_bl').val(0);
                $('#idProc_bl').val(0);
                $('#txtbl').val('');
                $("#btnNoCheckP" + id_production + "").addClass('hide-button');
                $("#btnCheckP" + id_production + "").removeClass('hide-button');
                $("#taskNoCheckP" + id_production + "").addClass('hide-button');
                $("#taskCheckP" + id_production + "").removeClass('hide-button');

                $("#noCheckDateP" + id_production + "").addClass('hide-button');
                $("#checkDateP" + id_production + "").removeClass('hide-button');
                $("#checkDateP" + id_production + "").html(todayPrint);

            }

        });

    },

    addDocdone: function () {


    }
}

jQuery(document).ready(function () {
    sourcing.addCheck(this);
    sourcing.removeCheck(this);

    production.addCheck(this);
    production.removeCheck(this);

    freight.addCheck(this);
    freight.removeCheck(this);

    customs.addCheck(this);
    customs.removeCheck(this);

    quoted.addCheck(this);
    quoted.removeCheck(this);

    done.addCheck(this);
    done.removeCheck(this);
    done.getdoc(this);

    comentarios.addComents(this);
});