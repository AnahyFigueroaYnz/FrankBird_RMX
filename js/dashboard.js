// variable global de validacion
var table;
var date;
var dd;
var mm;
var yyyy;
var frmt;
var task;
var count;
var limit;
var id_task;
var valFecha;
var todayPrint;
var graph = "";
var noGraph = "";
var valPendiente;
var id_task_dash;
var valTask = false;
var today = new Date();

dd = String(today.getDate()).padStart(2, "0");
mm = String(today.getMonth() + 1).padStart(2, "0");
yyyy = today.getFullYear();

today = yyyy + "-" + mm + "-" + dd;
todayPrint = dd + "-" + mm + "-" + yyyy;

const swalDeletetask = Swal.mixin({
    customClass: {
        cancelButton: "btn btn-outline-secondary btn-nuevo padding-buttons",
        confirmButton: "btn btn-outline-primary btn-nuevo margin-buttons",
    },
    buttonsStyling: false,
});



// validar comentario de la tarea lista
function validarPendiente() {
    valPendiente = $('#txtTask').val();
    valFecha = $('#txtDate').val();

    if (valPendiente == "") {
        $('#val_txtTask').css("display", "");
    } else if (valPendiente != "") {
        $('#val_txtTask').css("display", "none");
    }
    if (valFecha == undefined || valFecha == "") {
        $('#val_txtDate').css("display", "");
    } else if (valFecha != undefined) {
        $('#val_txtDate').css("display", "none");
    }

    if (valPendiente != "" && valFecha != "") {
        valTask = true;
    } else {
        valTask = false;
    }
}

var dash = {
    grafica: function() {

        proyectos = cargar_ajax.run_server_ajax("dashboard/AvanceProyectos");
        console.log(proyectos);
        if (proyectos.proyectos == '0' || proyectos == false) {
            noGraph = '<p>No se encuentran datos para graficar</p>';
            $("#divGraph").append(noGraph);
        } else {
            graph = '<canvas id="doughnut" class="chartjs-render-monitor" width="550" height="200"></canvas>';
            $("#divGraph").append(graph);
            var sourcing = proyectos.sourcing;
            var cotizado = proyectos.cotizado;
            var produccion = proyectos.produccion;
            var transito = proyectos.transito;
            var entregado = proyectos.entregado;
            var concluido = proyectos.concluido;

            var Grafica = $('#doughnut')[0].getContext('2d');

            if (Grafica != null) {
                new Chart(Grafica, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Sourcing',
                            'Cotizados',
                            'Producción',
                            'Transito',
                            'Entregados',
                            'Concluidos',
                        ],
                        datasets: [{
                            data: [
                                sourcing,
                                cotizado,
                                produccion,
                                transito,
                                entregado,
                                concluido,
                            ],
                            backgroundColor: [
                                '#f4f8a4',
                                '#cefaa1',
                                '#95fa9b',
                                '#b1ffef',
                                '#a9e5ff',
                                '#9197ff',
                            ],
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        // rotation: Math.PI,
                        // cutoutPercentage: 50,
                        // circumference: Math.PI,
                        animation: {
                            animateRotate: true,
                            animationSteps: 100,
                            animationEasing: 'easeInOutQuart',
                        },
                        legend: {
                            position: 'right',
                        },
                    },
                });
            }
        }
    },
};

var task = {
    tasks: function() {
        taskList = cargar_ajax.run_server_ajax("Dashboard/taskList");

    },
    onCheck: function() {
        $(document).on("click", ".btn-bf", function(event) {
            event.preventDefault();
            jQuery.noConflict();
            id_task_dash = $(this).data("id");

            var data = {
                id_task_dash: id_task_dash,
                estatus: 1,
                fecha_cambio: today,
            };

            response = cargar_ajax.run_server_ajax("Dashboard/taskChekin", data);
            if (response == "false") {
                title = "Error!";
                icon = "error";
                mensaje = "Ocurrio un problema al terminar la tarea";
            } else {
                icon = "success";
                title = "Correcto";
                mensaje = "Se terminó la tarea correctamente";
            }

            $('#btnCheck_' + id_task_dash + '').removeClass("btn-light btn-bf");
            $('#btnCheck_' + id_task_dash + '').addClass("btn-success btn-af");
            $('#btnCheck_' + id_task_dash + '').html('<i class="fas fa-check"></i>');

            $('#checkDate_' + id_task_dash + '').removeClass("hide-button");
            $('#checkDate_' + id_task_dash + '').html(today);

            $('#limiteDate_' + id_task_dash + '').removeClass("badge-info");
            $('#limiteDate_' + id_task_dash + '').addClass("badge-secondary");

            $('#task_' + id_task_dash + '').css("font-weight", "600");
            $('#task_' + id_task_dash + '').css("text-decoration", "line-through");
        });
    },
    offCheck: function() {
        $(document).on("click", ".btn-af", function(event) {
            event.preventDefault();
            id_task_dash = $(this).data("id");

            var data = {
                id_task_dash: id_task_dash,
                estatus: 0,
                fecha_cambio: 0000 - 00 - 00,
            };

            response = cargar_ajax.run_server_ajax("Dashboard/taskChekin", data);
            if (response == "false") {
                title = "Error!";
                icon = "error";
                mensaje = "Ocurrio un problema al reactivar la tarea";
            } else {
                icon = "success";
                title = "Correcto";
                mensaje = "Se reactivó la tarea correctamente";
            }

            $('#btnCheck_' + id_task_dash + '').removeClass("btn-success btn-af");
            $('#btnCheck_' + id_task_dash + '').addClass("btn-light btn-bf");
            $('#btnCheck_' + id_task_dash + '').html("&nbsp;&nbsp;");

            $('#checkDate_' + id_task_dash + '').addClass("hide-button");
            $('#checkDate_' + id_task_dash + '').html("");

            $('#limiteDate_' + id_task_dash + '').removeClass("badge-secondary");
            $('#limiteDate_' + id_task_dash + '').addClass("badge-info");

            $('#task_' + id_task_dash + '').css("font-weight", "400");
            $('#task_' + id_task_dash + '').css("text-decoration", "none");
        });
    },
    newCheck: function() {
        $(document).on("click", ".newTask", function(event) {
            event.preventDefault();

            jQuery(function($) {
                $('#modalTask').modal();
            });
            $('#titleModal').html("Nuevo pendiente");
            $('#btn-task').html("Agregar");
            $('#btn-task').addClass("addTask");
            $('#btn-task').removeClass("saveTask");
        });
    },
    addCheck: function() {
        $(document).on("click", ".addTask", function(event) {
            event.preventDefault();
            validarPendiente();

            task_dash = $('#txtTask').val();
            fecha_limite = $('#txtDate').val();
            id_usuario = $('#txtIdUsuario').val();

            var fSplit = fecha_limite.split('-');
            var fLimit = fSplit[2] + "-" + fSplit[1] + "-" + fSplit[0];

            if (valTask == true) {
                var data = {
                    estatus: 0,
                    task_dash: task_dash,
                    id_usuario: id_usuario,
                    fecha_limite: fecha_limite
                }
                response = cargar_ajax.run_server_ajax('Dashboard/taskList', data);
                if (response == 'false') {
                    Toast.fire({
                        icon: "error",
                        title: "Pendiente no registrado",
                    });
                } else {
                    Toast.fire({
                        icon: "success",
                        title: "Pendiente agregado correctamente",
                    });
                }
                var data = {
                    id_usuario: id_usuario,
                }

                lastID = cargar_ajax.run_server_ajax('Dashboard/taskData', data);

                const tr = $(
                    '<tr class="shadow border-row align-td">' +
                    '<td class="align-td"></td>' +
                    '<td class="visible-td">' + lastID.id_task_dash + '</td>' +
                    '<td class="align-td">' +
                    '<a id="btnCheck_' + lastID.id_task_dash + '" class="btn btn-light btn-task btn-bf" data-id="' + lastID.id_task_dash + '">&nbsp;&nbsp;</a>' +
                    '</td>' +
                    '<td class="align-td">' +
                    '<span id="task_' + lastID.id_task_dash + '" class="badget-task">' + task_dash + '  </span>' +
                    '<small id="limiteDate_' + lastID.id_task_dash + '" class="badge badge-info badge-task">' + fLimit + '</small>' +
                    '<small id="checkDate_' + lastID.id_task_dash + '" class="badge badge-success badge-task hide-button"></small>' +
                    '</td>' +
                    '<td class="align-td">' +
                    '<a href="" type="button" class="editTask" data-id="' + lastID.id_task_dash + '"><i class="fas fa-edit"></i></a>' +
                    '<a href="" type="button" class="trashCan" data-id="' + lastID.id_task_dash + '"><i class="far fa-trash-alt"></i></a>' +
                    '</td>' +
                    '</tr>',
                );
                $("#tblTareas").DataTable().row.add(tr[0]).draw(false);

                jQuery(function($) {
                    $('#modalTask').modal("hide");
                });
                $('#txtTask').val('');
                $('#txtDate').val('');
            }
        });
    },
    editCheck: function() {
        $(document).on("click", ".editTask", function(event) {
            event.preventDefault();
            var id_task_dash = $(this).data("id");

            jQuery(function($) {
                $('#modalTask').modal();
            });
            $('#titleModal').html("Editar tarea");
            $('#btn-task').html("Guardar");
            $('#btn-task').addClass("saveTask");
            $('#btn-task').removeClass("addTask");
            $('#txtIdTask').val(id_task_dash);

            task = $('#task_' + id_task_dash + '').html();
            date = $('#limiteDate_' + id_task_dash + '').html();

            var dSplit = date.split('-');
            var fecha_limite = dSplit[2] + '-' + dSplit[1] + '-' + dSplit[0];

            console.log(task, date, dSplit);

            $('#txtTask').val(task);
            $('#txtDate').val(fecha_limite);
            $('#idTask').val(id_task_dash);
        });
    },
    saveCheck: function() {
        $(document).on("click", ".saveTask", function(event) {
            event.preventDefault();
            validarPendiente();

            id_task_dash = $('#idTask').val();
            task = $('#txtTask').val();
            date = $('#txtDate').val();
            console.log(task, date);

            dtfm = date.split("-");
            limit = dtfm[2] + '/' + dtfm[1] + '/' + dtfm[0];

            if (valTask == true) {
                $('#task_' + id_task_dash + '').html(task);
                $('#limiteDate_' + id_task_dash + '').html(limit);

                Toast.fire({
                    icon: "success",
                    title: "Pendiente actualizado correctamente",
                });

                $('#modalTask').modal("hide");
                $('#txtTask').val();
                $('#txtDate').val();
                $('#idTask').val();
            }
        });
    },
};

var pendientes = {
    add_edit: function() {
        $(document).on("click", "#btnAgregar", function(event) {
            event.preventDefault();
            jQuery.noConflict();

            var id_task_dash = $('#txtIdTask').val();

            validarPendiente();

            if (valTask == true) {
                if (id_task_dash == "") {
                    var data = {
                        id_usuario: $('#txtIdUsuario').val(),
                        task_dash: $('#txtTask').val(),
                        estatus: 0,
                        fecha_limite: $('#txtfechaLimite').val(),
                    };
                    response = cargar_ajax.run_server_ajax("Dashboard/taskList", data);
                    if (response == "false") {
                        title = "Error!";
                        icon = "error";
                        mensaje = "Tarea no registrada correctamente";
                    } else {
                        icon = "success";
                        title = "Correcto";
                        mensaje = "Se guardo la tarea correctamente";
                    }
                    swal
                        .fire({
                            title: title,
                            text: mensaje,
                            icon: icon,
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        })
                        .then((result) => {
                            $('#txtIdTask').val();
                            jQuery(function($) {
                                $('#modalTask').modal("hide");
                            });
                            location.reload();
                        });
                } else if (id_task_dash != "") {
                    var data = {
                        id_task_dash: id_task_dash,
                        task_dash: $('#txtTask').val(),
                        estatus: 0,
                        fecha_limite: $('#txtfechaLimite').val(),
                    };
                    response = cargar_ajax.run_server_ajax(
                        "Dashboard/taskEdit",
                        data
                    );
                    if (response == "false") {
                        title = "Error!";
                        icon = "error";
                        mensaje = "Tarea no registrada correctamente";
                    } else {
                        icon = "success";
                        title = "Correcto";
                        mensaje = "Se guardo la tarea correctamente";
                    }
                    swal
                        .fire({
                            title: title,
                            text: mensaje,
                            icon: icon,
                            timer: 2000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        })
                        .then((result) => {
                            $('#txtIdTask').val();
                            jQuery(function($) {
                                $('#modalTask').modal("hide");
                            });
                            //location.reload();
                        });
                }
            }
        });

        $(document).on("click", "#btnAddTask", function(event) {
            event.preventDefault();
            jQuery.noConflict();

            jQuery(function($) {
                $('#modalTask').modal();
            });
            $('#titleModal').html("Nuevo pendiente");
        });

        $(document).on("click", ".deleteTask", function(event) {
            event.preventDefault();

            var id = {
                id_task_dash: $(this).data("id"),
            };
            var id_task_dash = id.id_task_dash;
            var data = {
                id_task_dash: id_task_dash,
                activo: 0,
            };
            swalDeletetask
                .fire({
                    title: "¿Está seguro de eliminar esté pendiente?",
                    text: "¡No podrás revertir esto, la información se perderá!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, eliminar!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.value) {
                        cargar_ajax.run_server_ajax("Dashboard/taskDelete", data);
                        location.reload();
                    }
                });
        });
    },

    limite_task: function() {
        var idUsuario = $('#idUsuario').val();
        var data = {
            id_usuario: idUsuario,
        };
        response = cargar_ajax.run_server_ajax("Dashboard/taskLists", data);
        if (response != false) {
            response.forEach((element) => {
                var last = element.fecha_limite;
                var elem = last.split("-");
                var dia = elem[2];
                var mes = elem[1];
                var anio = elem[0];
                var lastday = dia - 01;
                var intDay = parseInt(dd);
                if (element.estatus === "1") {
                    $('#limite' + element.id_task_dash + '').addClass("hide-button");
                }

                if (lastday === intDay || parseInt(dia) === intDay) {
                    $('#limite' + element.id_task_dash + '').removeClass("badge-warning");
                    $('#limite' + element.id_task_dash + '').addClass("badge-danger");
                    if (element.correo === "0") {
                        var dataT = {
                            id_task_dash: element.id_task_dash,
                            correo: 1,
                        };
                        var dataC = {
                            id_task_dash: element.id_task_dash,
                            id_usuario: element.id_usuario,
                        };
                        cargar_ajax.run_server_ajax("Dashboard/taskListCorreo", dataT);
                        response = cargar_ajax.run_server_ajax(
                            "Dashboard/correo_pendiente",
                            dataC
                        );
                    }
                    if (element.correo === "1" && parseInt(dia) === intDay) {
                        var dataT = {
                            id_task_dash: element.id_task_dash,
                            correo: 2,
                        };
                        var dataC = {
                            id_task_dash: element.id_task_dash,
                            id_usuario: element.id_usuario,
                        };
                        cargar_ajax.run_server_ajax("Dashboard/taskListCorreo", dataT);
                        response = cargar_ajax.run_server_ajax(
                            "Dashboard/correo_pendiente",
                            dataC
                        );
                    }
                }
            });
        }
    },
};

jQuery(document).ready(function() {
    dash.grafica(this);
    task.onCheck(this);
    task.offCheck(this);
    task.newCheck(this);
    task.addCheck(this);
    task.editCheck(this);
    task.saveCheck(this);
});