// variable global de validacion
var valTask = false;

// variables globales para la fecha actual
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + '-' + mm + '-' + dd;
todayPrint = dd + '-' + mm + '-' + yyyy;

const swalDeletetask = Swal.mixin({
    customClass: {
        cancelButton: 'btn btn-outline-secondary btn-nuevo padding-buttons',
        confirmButton: 'btn btn-outline-primary btn-nuevo margin-buttons'
    },
    buttonsStyling: false
});

// validar comentario de la tarea lista
function validarPendiente() {
    var valPendiente = $('#txtTask').val();
    var valFecha = $('#txtfechaLimite').val();

    if (valPendiente != '') {
        document.getElementById('val_txtTask').style.display = 'none';
    } else if (valPendiente == '') {
        document.getElementById('val_txtTask').style.display = '';
    }
    if (valFecha == undefined) {
        document.getElementById('val_txtfechaLimite').style.display = '';
    } else if (valFecha != undefined) {
        document.getElementById('val_txtfechaLimite').style.display = 'none';
    }

    if (valPendiente != '' && valFecha != "") {
        valTask = true;
    } else {
        valTask = false;
    }
}

var grafics = {
    graficaAdmin: function() {
        admin = cargar_ajax.run_server_ajax('Plataforma/statusProyecto');
        if (admin != null) {
            var sourcingAd = admin.sourcing;
            var cotizadosAd = admin.cotizados;
            var produccionAd = admin.en_proceso;
            var puerto_salidaAd = admin.puerto_salida;
            var puerto_llegadaAd = admin.puerto_llegada;
            var concluidoAd = admin.concluido;

            Chart.defaults.global.defaultFontSize = 18;

            var donutAdmin = document.getElementById("donutAdmin");
            if (donutAdmin != null) {
                var chartAdmin = new Chart(donutAdmin, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            "Sourcing",
                            "Cotizacion aceptada",
                            "En proceso",
                            "En puerto de salida",
                            "En puerto de llegada",
                            "Proyecto concluido"
                        ],
                        datasets: [{
                            data: [
                                sourcingAd,
                                cotizadosAd,
                                produccionAd,
                                puerto_salidaAd,
                                puerto_llegadaAd,
                                concluidoAd
                            ],
                            backgroundColor: ['#d2d6de', '#23bb52', '#007bff', '#6c757d', '#7800b6', '#008f39'],
                        }]
                    },
                    options: {
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        rotation: -Math.PI,
                        cutoutPercentage: 30,
                        circumference: Math.PI,
                        legend: {
                            position: 'bottom'
                        },
                    }
                });
            }
        }
    },
    graficaAsesor: function() {
        asesor = cargar_ajax.run_server_ajax('Plataforma/statusProyectoAsesor');
        if (asesor != null) {
            var sourcingAs;
            var cotizadosAs;
            var produccionAs;
            var puerto_salidaAs;
            var puerto_llegadaAs;
            var concluidoAs;

            asesor.forEach(elem => {
                sourcingAs = elem.sourcing;
                cotizadosAs = elem.cotizados;
                produccionAs = elem.en_proceso;
                puerto_salidaAs = elem.puerto_salida;
                puerto_llegadaAs = elem.puerto_llegada;
                concluidoAs = elem.concluido;
            });

            Chart.defaults.global.defaultFontSize = 18;

            var donutAsesor = document.getElementById("donutAsesor");
            if (donutAsesor != null) {
                var charAsesor = new Chart(donutAsesor, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            "Sourcing",
                            "Cotizacion aceptada",
                            "En proceso",
                            "En puerto de salida",
                            "En puerto de llegada",
                            "Proyecto concluido"
                        ],
                        datasets: [{
                            data: [
                                sourcingAs,
                                cotizadosAs,
                                produccionAs,
                                puerto_salidaAs,
                                puerto_llegadaAs,
                                concluidoAs
                            ],
                            backgroundColor: ['#d2d6de', '#23bb52', '#007bff', '#6c757d', '#7800b6', '#008f39'],
                        }]
                    },
                    options: {
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        rotation: -Math.PI,
                        cutoutPercentage: 30,
                        circumference: Math.PI,
                        legend: {
                            position: 'bottom'
                        },
                    }
                });
            }
        }
    },
    graficaCliente: function() {
        cliente = cargar_ajax.run_server_ajax('Clientes/statusProyectoCliente');
        if (cliente != null) {
            var sourcingCl;
            var cotizadosCl;
            var produccionCl;
            var puerto_salidaCl;
            var puerto_llegadaCl;
            var concluidoCl;

            cliente.forEach(elem => {
                sourcingCl = elem.sourcing;
                cotizadosCl = elem.cotizados;
                produccionCl = elem.en_proceso;
                puerto_salidaCl = elem.puerto_salida;
                puerto_llegadaCl = elem.puerto_llegada;
                concluidoCl = elem.concluido;
            });

            Chart.defaults.global.defaultFontSize = 18;

            var donutCliente = $('#donutCliente').get(0);
            if (donutCliente != null) {
                var charCliente = new Chart(donutCliente, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            "Sourcing",
                            "Cotizacion aceptada",
                            "En proceso",
                            "En puerto de salida",
                            "En puerto de llegada",
                            "Proyecto concluido"
                        ],
                        datasets: [{
                            data: [
                                sourcingCl,
                                cotizadosCl,
                                produccionCl,
                                puerto_salidaCl,
                                puerto_llegadaCl,
                                concluidoCl
                            ],
                            backgroundColor: ['#d2d6de', '#23bb52', '#007bff', '#6c757d', '#7800b6', '#008f39'],
                        }]
                    },
                    options: {
                        title: {
                            display: false,
                            text: 'Chart.js Doughnut Chart'
                        },
                        maintainAspectRatio: false,
                        responsive: true,
                        rotation: -Math.PI,
                        cutoutPercentage: 30,
                        circumference: Math.PI,
                        legend: {
                            position: 'bottom'
                        },
                    }
                });
            }
        }
    },
}

var task = {
    addCheck: function() {
        $(document).on('click', '.btnNoCheck', function(event) {
            event.preventDefault();
            jQuery.noConflict();

            var id = { id_task_dash: $(this).data('id') };
            var id_task_dash = id.id_task_dash;

            var data = {
                id_task_dash: id_task_dash,
                estatus: 1,
                fecha_cambio: today
            }
            response = cargar_ajax.run_server_ajax('plataforma/taskChekin', data);
            if (response == 'false') {
                title = "Error!";
                icon = "error";
                mensaje = "No se puede terminar esta tarea";
            } else {
                icon = "success";
                title = "Correcto";
                mensaje = "Se terminó la tarea correctamente";
            }
            swal.fire({
                title: title,
                text: mensaje,
                icon: icon,
                timer: 2000,
                showConfirmButton: false,
                timerProgressBar: true,
            }).then((result) => {
                jQuery(function($) {
                    $("#modalComentarios").modal('hide');
                });
                $('#idTask').val(0);
                $('#idCust').val(0);
                $('.txtComentario').val('');
                $("#btnNoCheck" + id_task_dash + "").addClass('hide-button');
                $("#btnCheck" + id_task_dash + "").removeClass('hide-button');
                $("#taskNoCheck" + id_task_dash + "").addClass('hide-button');
                $("#taskCheck" + id_task_dash + "").removeClass('hide-button');
                $('#limite' + id_task_dash + '').addClass('hide-button');
                $("#nocheckDate" + id_task_dash + "").addClass('hide-button');
                $("#checkDate" + id_task_dash + "").removeClass('hide-button');
                $("#checkDate" + id_task_dash + "").html(todayPrint);
            });
        });
    },

    removeCheck: function() {
        $(document).on('click', '.btnCheck', function(event) {
            event.preventDefault();

            var id = { id_task_dash: $(this).data('id') };
            var id_task_dash = id.id_task_dash;

            var data = {
                id_task_dash: id_task_dash,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00
            }
            response = cargar_ajax.run_server_ajax('plataforma/taskChekin', data);

            $("#btnCheck" + id_task_dash + "").addClass('hide-button');
            $("#btnNoCheck" + id_task_dash + "").removeClass('hide-button');
            $("#taskCheck" + id_task_dash + "").addClass('hide-button');
            $("#taskNoCheck" + id_task_dash + "").removeClass('hide-button');
            $('#limite' + id_task_dash + '').removeClass('hide-button');
            $("#checkDate" + id_task_dash + "").addClass('hide-button');
            $("#nocheckDate" + id_task_dash + "").removeClass('hide-button');
        });
    }
}

var pendientes = {
    add_edit: function() {
        $(document).on('click', '#btnAgregar', function(event) {
            event.preventDefault();
            jQuery.noConflict();
            var id_task_dash = $('#txtIdTask').val();

            validarPendiente();

            if (valTask == true) {
                if (id_task_dash == '') {
                    var data = {
                        id_usuario: $('#txtIdUsuario').val(),
                        task_dash: $('#txtTask').val(),
                        estatus: 0,
                        fecha_limite: $('#txtfechaLimite').val()
                    }
                    response = cargar_ajax.run_server_ajax('Plataforma/taskDash', data);
                    if (response == 'false') {
                        title = "Error!";
                        icon = "error";
                        mensaje = "Tarea no registrada correctamente";
                    } else {
                        icon = "success";
                        title = "Correcto";
                        mensaje = "Se guardo la tarea correctamente";
                    }
                    swal.fire({
                        title: title,
                        text: mensaje,
                        icon: icon,
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        $('#txtIdTask').val();
                        jQuery(function($) {
                            $('#modalTask').modal('hide');
                        });
                        location.reload();
                    });
                } else if (id_task_dash != '') {
                    var data = {
                        id_task_dash: id_task_dash,
                        task_dash: $('#txtTask').val(),
                        estatus: 0,
                        fecha_limite: $('#txtfechaLimite').val()
                    }
                    response = cargar_ajax.run_server_ajax('Plataforma/taskDashEdit', data);
                    if (response == 'false') {
                        title = "Error!";
                        icon = "error";
                        mensaje = "Tarea no registrada correctamente";
                    } else {
                        icon = "success";
                        title = "Correcto";
                        mensaje = "Se guardo la tarea correctamente";
                    }
                    swal.fire({
                        title: title,
                        text: mensaje,
                        icon: icon,
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                    }).then((result) => {
                        $('#txtIdTask').val();
                        jQuery(function($) {
                            $('#modalTask').modal('hide');
                        });
                        //location.reload();
                    });
                }
            }
        });

        $(document).on('click', '#btnAddTask', function(event) {
            event.preventDefault();
            jQuery.noConflict();

            jQuery(function($) {
                $('#modalTask').modal();
            });
            $('#titleModal').html('Nuevo pendiente');
        });

        $(document).on('click', '.editTask', function(event) {
            event.preventDefault();
            jQuery.noConflict();

            var id = { id_task_dash: $(this).data('id') };
            var id_task_dash = id.id_task_dash;
            var data = {
                id_task_dash: id_task_dash
            }

            jQuery(function($) {
                $('#modalTask').modal();
            });
            $('#titleModal').html('Editar pendiente');
            $('#txtIdTask').val(id_task_dash);

            response = cargar_ajax.run_server_ajax('Plataforma/taskData', data);
            $('#txtTask').val(response.task_dash);
            if (response.fecha_limite === null || response.fecha_limite === 0000 - 00 - 00 || response.fecha_limite === '') {
                $('#txtfechaLimite').val();
            } else {
                $('#txtfechaLimite').val(response.fecha_limite);
            }
        });

        $(document).on('click', '.deleteTask', function(event) {
            event.preventDefault();

            var id = { id_task_dash: $(this).data('id') };
            var id_task_dash = id.id_task_dash;
            var data = {
                id_task_dash: id_task_dash,
                activo: 0
            }
            swalDeletetask.fire({
                title: "¿Está seguro de eliminar esté pendiente?",
                text: "¡No podrás revertir esto, la información se perderá!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                    cargar_ajax.run_server_ajax('Plataforma/taskDashDelet', data);
                    location.reload();
                }
            });
        });
    },

    limite_task: function() {
        var idUsuario = $('#idUsuario').val();
        var data = {
            id_usuario: idUsuario,
        }
        response = cargar_ajax.run_server_ajax('Plataforma/taskDatas', data);
        if (response != false) {
            response.forEach(element => {
                var last = element.fecha_limite;
                var elem = last.split('-');
                var dia = elem[2];
                var mes = elem[1];
                var anio = elem[0];
                var lastday = dia - 01;
                var intDay = parseInt(dd);
                if (element.estatus === '1') {
                    $('#limite' + element.id_task_dash + '').addClass('hide-button');
                }

                if (lastday === intDay || parseInt(dia) === intDay) {
                    $('#limite' + element.id_task_dash + '').removeClass('badge-warning');
                    $('#limite' + element.id_task_dash + '').addClass('badge-danger');
                    if (element.correo === '0') {
                        var dataT = {
                            id_task_dash: element.id_task_dash,
                            correo: 1,
                        }
                        var dataC = {
                            id_task_dash: element.id_task_dash,
                            id_usuario: element.id_usuario,
                        }
                        cargar_ajax.run_server_ajax('plataforma/taskDashCorreo', dataT);
                        response = cargar_ajax.run_server_ajax('plataforma/correo_pendiente', dataC);
                    }
                    if (element.correo === '1' && parseInt(dia) === intDay) {
                        var dataT = {
                            id_task_dash: element.id_task_dash,
                            correo: 2,
                        }
                        var dataC = {
                            id_task_dash: element.id_task_dash,
                            id_usuario: element.id_usuario,
                        }
                        cargar_ajax.run_server_ajax('plataforma/taskDashCorreo', dataT);
                        response = cargar_ajax.run_server_ajax('plataforma/correo_pendiente', dataC);
                    }
                }
            });
        }
    }
}

jQuery(document).ready(function() {
    grafics.graficaAdmin(this);
    grafics.graficaAsesor(this);
    grafics.graficaCliente(this);
    task.addCheck(this);
    task.removeCheck(this);
    pendientes.add_edit(this);
    pendientes.limite_task(this);
});