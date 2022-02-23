// variables globales
var file_Files;
var id_nivel = $('#inpt_id').val();
var tipos = cargar_ajax.run_server_ajax('Plataforma/get_tipos_documentos');
var baseUrl = $("#baseURL").val();

// clases dadas a los botones del mensaje emergente de sweet alert
const swalDeleteDoc = Swal.mixin({
    customClass: {
        cancelButton: "btn btn-outline-secondary btn-nuevo margin-buttons",
        confirmButton: "btn btn-outline-danger btn-nuevo padding-buttoni"
    },
    buttonsStyling: false
});

var documentos = {
    // al accionar el input de archivos obtener la informacion de la imagen y 
    // cambiar los valores primarios a los nuevos para mostrar los pasos a seguir
    subir: function () {
        $('.iconUpload').on('change', function (e) {
            e.preventDefault();
            id = $(this).data('id');
            var inputFile = e.currentTarget;
            $(inputFile).parent().find('.nameFile' + id + '').html(inputFile.files[0].name);
            if ($('.nameFile' + id + '').html() !== '') {
                $('.subir' + id + '').addClass('hide-button');
                $('.enviar' + id + '').removeClass('hide-button');
                $('.cancelar' + id + '').removeClass('hide-button');
            }
            var files = inputFile.files[0];
            file_Files = files;
        });
    },

    cancelar: function () {
        $('.cancelar').on('click', function (e) {
            e.preventDefault();
            id = $(this).data('id');

            $('.noFile' + id + '').removeClass('hide-button');
            $('.fileUp' + id + '').addClass('hide-button');
            $('.nameDoc' + id + '').html('');
            $('.nameFile' + id + '').html('');
            $('.subir' + id + '').removeClass('hide-button');
            $('.enviar' + id + '').addClass('hide-button');
            $('.cancelar' + id + '').addClass('hide-button');
        });
    },

    enviar: function () {
        $('.enviar').on('click', function (e) {
            e.preventDefault();
            id = $(this).data('id');
            idProy = parseFloat($('.inpIdProyecto').val());

            $('#pdf').attr("src", '');

            var Files = file_Files;
            var fileName = $('.nameFile' + id + '').html();
            var extension = fileName.split('.')[1];
            var nameFile = $('.noFile' + id + '').html();
            var name = nameFile.split(" ").join("_").toLowerCase();

            var frmData = new FormData();
            frmData.append("input-imgProducto", Files);
            frmData.append("id_tipo_doc", id);
            frmData.append("id_proyecto", idProy);
            frmData.append("nombre_archivo", name);

            cargar_ajax2.run_server_ajax2('Plataforma/enviar_doc', frmData);

            dataGet = {
                id_tipo_doc: id,
                id_proyecto: idProy
            };
            var docInfo = cargar_ajax.run_server_ajax('Plataforma/get_documento', dataGet);
            var archivo_path = baseUrl + docInfo[0].archivo_path;

            // $('.fileUp' + id + '').attr("href", archivo_path);
            $('.fileUp' + id + '').removeClass('hide-button');
            $('.borrar' + id + '').removeClass('hide-button');
            $('.noFile' + id + '').addClass('hide-button');
            $('.enviar' + id + '').addClass('hide-button');
            $('.cancelar' + id + '').addClass('hide-button');
            $('.nameFile' + id + '').html('');
            $('#pdf' + id + '').attr("src", archivo_path);
        });
    },

    eliminar: function () {
        $('.borrarDocumento').on('click', function (e) {
            e.preventDefault();
            id = $(this).data('id');

            dataGetID = {
                id_tipo_doc: id,
                id_proyecto: idProy
            };
            var idUp = cargar_ajax.run_server_ajax('Plataforma/get_id_documento', dataGetID);
            var dataUp = {
                id_documento: idUp.id_documento,
                archivo_path: idUp.archivo_path,
                activo: 0,
            }

            swalDeleteDoc.fire({
                title: "¿Está seguro?",
                text: "El documento se eliminará!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax('Plataforma/update_documento', dataUp);
                    Swal.fire(
                        'Eliminado!',
                        'Se elimino correctamente',
                        'success'
                    );

                    $('.noFile' + id + '').removeClass('hide-button');
                    $('.fileUp' + id + '').addClass('hide-button');
                    $('.nameDoc' + id + '').html('');
                    $('.subir' + id + '').removeClass('hide-button');
                    $('.enviar' + id + '').addClass('hide-button');
                    $('.cancelar' + id + '').addClass('hide-button');
                    $('.borrar' + id + '').addClass('hide-button');
                }
            });
        });
    },

    get_docum: function () {
        $('#nav-Documentos-tab').on('click', function (e) {
            e.preventDefault();
            idProy = $(this).data('id');
            var tipos = cargar_ajax.run_server_ajax('Plataforma/get_tipos_documentos');

            $('#pdf').attr("src", '');

            tipos.forEach(elem => {
                var idT = elem.id_tipo_doc;
                if (id_nivel == 5) {
                    if (idT == 8) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').removeClass('hide-button');
                    }
                    else if (idT == 9) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').removeClass('hide-button');
                    }
                    else if (idT == 10) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').removeClass('hide-button');
                    }
                    else if (idT == 11) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').removeClass('hide-button');
                    }
                    else {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').addClass('hide-button');
                    }
                } else {
                    if (idT == 8) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').addClass('hide-button');
                    }
                    else if (idT == 9) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').addClass('hide-button');
                    }
                    else if (idT == 10) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').addClass('hide-button');
                    }
                    else if (idT == 11) {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').addClass('hide-button');
                    }
                    else {
                        $('.noFile' + idT + '').removeClass('hide-button');
                        $('.subir' + idT + '').removeClass('hide-button');
                    }
                }
            });

            data = {
                id_proyecto: idProy
            };

            var docs = cargar_ajax.run_server_ajax('Plataforma/get_documentos', data);

            if (docs !== false) {
                docs.forEach(element => {
                    var id = element.id_tipo_doc;
                    var nomDoc = element.nombre_documento;
                    var archivo_path = baseUrl + element.archivo_path;

                    $('.fileUp' + id + '').removeClass('hide-button');
                    $('.noFile' + id + '').addClass('hide-button');
                    $('#pdf' + id + '').attr("src", archivo_path);

                    if (id_nivel == 5) {
                        if (id == 8) {
                            $('.borrar' + id + '').removeClass('hide-button');
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        }
                        else if (id == 9) {
                            $('.borrar' + id + '').removeClass('hide-button');
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        }
                        else if (id == 10) {
                            $('.borrar' + id + '').removeClass('hide-button');
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        }
                        else if (id == 11) {
                            $('.borrar' + id + '').removeClass('hide-button');
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        }
                        else {
                            $('.subir' + id + '').addClass('hide-button');
                        }

                    } else {
                        if (id == 8) {
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        } else if (id == 9) {
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        } else if (id == 10) {
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        } else if (id == 11) {
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        } else {
                            $('.borrar' + id + '').removeClass('hide-button');
                            $('.subir' + id + '').addClass('hide-button');
                            $('.nameDoc' + id + '').html(nomDoc);
                        }
                    }

                });

                // $('.enviar' + id + '').addClass('hide-button');
                // $('.cancelar' + id + '').addClass('hide-button');

            } else {
                tipos.forEach(elem => {
                    var idT = elem.id_tipo_doc;
                    if (id_nivel == 5) {
                        if (idT == 8) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').removeClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 9) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').removeClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 10) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').removeClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 11) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').removeClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').addClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                    } else {
                        if (idT == 8) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').addClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 9) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').addClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 10) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').addClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else if (idT == 11) {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').addClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                        else {
                            $('.noFile' + idT + '').removeClass('hide-button');
                            $('.subir' + idT + '').removeClass('hide-button');
                            $('.nameDoc' + idT + '').html('');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.fileName', function (event) {
            event.preventDefault();
            jQuery.noConflict();
            document.getElementById('pdf1').style.display = 'none';
            document.getElementById('pdf2').style.display = 'none';
            document.getElementById('pdf3').style.display = 'none';
            document.getElementById('pdf4').style.display = 'none';
            document.getElementById('pdf5').style.display = 'none';
            document.getElementById('pdf6').style.display = 'none';
            document.getElementById('pdf7').style.display = 'none';
            document.getElementById('pdf8').style.display = 'none';
            document.getElementById('pdf9').style.display = 'none';
            document.getElementById('pdf10').style.display = 'none';
            document.getElementById('pdf11').style.display = 'none';
            document.getElementById('pdf12').style.display = 'none';
            jQuery(function ($) {
                $("#modalDocumentos").modal();
            });

            var id = $(this).data('id');
            document.getElementById('pdf' + id + '').style.display = '';
        });

        $(document).on('click', '.closeDocs', function (event) {
            event.preventDefault();
            document.getElementById('pdf1').style.display = 'none';
            document.getElementById('pdf2').style.display = 'none';
            document.getElementById('pdf3').style.display = 'none';
            document.getElementById('pdf4').style.display = 'none';
            document.getElementById('pdf5').style.display = 'none';
            document.getElementById('pdf6').style.display = 'none';
            document.getElementById('pdf7').style.display = 'none';
            document.getElementById('pdf8').style.display = 'none';
            document.getElementById('pdf9').style.display = 'none';
            document.getElementById('pdf10').style.display = 'none';
            document.getElementById('pdf11').style.display = 'none';
            document.getElementById('pdf12').style.display = 'none';
        });
    },
}

jQuery(document).ready(function () {
    documentos.subir(this);
    documentos.cancelar(this);
    documentos.enviar(this);
    documentos.eliminar(this);
    documentos.get_docum(this);
});