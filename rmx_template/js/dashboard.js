var table;
var dd;
var mm;
var yyyy;
var date;
var dtfm;
var frmt;
var task;
var count;
var limit;
var today;
var id_task;
var valFecha;
var todayPrint;
var valPendiente;
var id_task_dash;
var valTask = false;

// variables globales para la fecha actual
function fechaLive() {
    today = new Date();
    dd = String(today.getDate()).padStart(2, "0");
    mm = String(today.getMonth() + 1).padStart(2, "0");
    yyyy = today.getFullYear();
    today = yyyy + "-" + mm + "-" + dd;
    todayPrint = dd + "-" + mm + "-" + yyyy;
}

function validarPendiente() {
    valPendiente = $("#txtTask").val();
    valFecha = $("#txtDate").val();

    if (valPendiente == "") {
        $("#val_txtTask").css("display", "");
    } else if (valPendiente != "") {
        $("#val_txtTask").css("display", "none");
    }
    if (valFecha == undefined || valFecha == "") {
        $("#val_txtDate").css("display", "");
    } else if (valFecha != undefined) {
        $("#val_txtDate").css("display", "none");
    }

    if (valPendiente != "" && valFecha != "") {
        valTask = true;
    } else {
        valTask = false;
    }
}

$(document).ready(function() {
    jQuery.noConflict();
    fechaLive();

    Chart.defaults.global.defaultFontSize = 18;

    var donutAdmin = $("#donutAdmin");
    if (donutAdmin != null) {
        new Chart(donutAdmin, {
            type: "doughnut",
            data: {
                labels: ["Producción", "Logística internacional", "En proceso", "Despacho aduanal", "Entrega última milla", "Proyecto concluido"],
                datasets: [{
                    data: [10, 04, 15, 05, 05, 10],
                    backgroundColor: ["#d2d6de", "#23bb52", "#007bff", "#6c757d", "#7800b6", "#008f39"],
                }, ],
            },
            options: {
                title: false,
                maintainAspectRatio: false,
                responsive: true,
                rotation: -Math.PI,
                cutoutPercentage: 30,
                circumference: Math.PI,
                legend: {
                    position: "bottom",
                },
            },
        });
    }

    table = $("#tblPendientes")
        .DataTable({
            dom: '<tr><"mt-3 ml-auto"p>',
            responsive: {
                details: {
                    targets: [0],
                    type: "column",
                    orderable: false,
                },
            },
            autoWidth: true,
            pageLength: 5,
            order: [
                [1, "asc"]
            ],
            columnDefs: [{
                    targets: [0],
                    className: "control",
                },
                {
                    targets: [1],
                    visible: false,
                    className: "noVisible",
                },
                {
                    targets: "_all",
                    orderable: false,
                },
            ],
            lengthMenu: [
                [3, 5, 10, 25, 50, -1],
                ["3", "5", "10", "25", "50", "Todo"],
            ],
            buttons: [{
                extend: "pageLength",
                className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
            }, ],
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                spageLength: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún pendiente disponible",
                sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "",
                sUrl: "",
                sInfoDecimals: ".",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior",
                },
                oAria: {
                    sSortAscending: ": Activar orden ascendente",
                    sSortDescending: ": Activar orden descendente",
                },
                buttons: {
                    copy: "Copiar",
                    colvis: "Columnas",
                    print: "Imprimir",
                    pageLength: {
                        _: "Mostrar  %d",
                        "-1": "Todo",
                    },
                },
            },
        })
        .columns.adjust();
    $("#tblPendientes_filter input").attr("placeholder", "Buscar");

    $("#tblPendientes").on("click", "a.trashCan", function(e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este pendiente?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar.",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    table.row($(this).parents("tr")).remove().draw();
                    Toast.fire({
                        icon: "success",
                        title: "Pendiente eliminado correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    // pendientes
    $(document).on("click", ".btn-bf", function(event) {
        event.preventDefault();
        id_task_dash = $(this).data("id");

        $("#btnCheck_" + id_task_dash + "").removeClass("btn-light btn-check btn-bf");
        $("#btnCheck_" + id_task_dash + "").addClass("btn-success btn-check btn-af");
        $("#btnCheck_" + id_task_dash + "").html('<i class="fas fa-check"></i>');

        $("#checkDate_" + id_task_dash + "").removeClass("hide-button");
        $("#checkDate_" + id_task_dash + "").html(today);

        $("#limiteDate_" + id_task_dash + "").removeClass("badge-info");
        $("#limiteDate_" + id_task_dash + "").addClass("badge-secondary");

        $("#task_" + id_task_dash + "").css("font-weight", "600");
        $("#task_" + id_task_dash + "").css("text-decoration", "line-through");
    });

    $(document).on("click", ".btn-af", function(event) {
        event.preventDefault();
        id_task_dash = $(this).data("id");

        $("#btnCheck_" + id_task_dash + "").removeClass("btn-success btn-check btn-af");
        $("#btnCheck_" + id_task_dash + "").addClass("btn-light btn-check btn-bf");
        $("#btnCheck_" + id_task_dash + "").html("&nbsp;&nbsp;");

        $("#checkDate_" + id_task_dash + "").addClass("hide-button");
        $("#checkDate_" + id_task_dash + "").html("");

        $("#limiteDate_" + id_task_dash + "").removeClass("badge-secondary");
        $("#limiteDate_" + id_task_dash + "").addClass("badge-info");

        $("#task_" + id_task_dash + "").css("font-weight", "400");
        $("#task_" + id_task_dash + "").css("text-decoration", "none");
    });

    $(document).on("click", ".newTask", function(event) {
        event.preventDefault();

        $("#modalTask").modal();
        $("#titleModal").html("Nuevo pendiente");
        $("#btn-task").html("Agregar");
        $("#btn-task").addClass("addTask");
        $("#btn-task").removeClass("saveTask");
    });

    $(document).on("click", ".editTask", function(event) {
        event.preventDefault();
        id_task_dash = $(this).data("id");

        $("#modalTask").modal();
        $("#titleModal").html("Editar pendiente");
        $("#btn-task").html("Guardar");
        $("#btn-task").addClass("saveTask");
        $("#btn-task").removeClass("addTask");

        task = $("#task_" + id_task_dash + "").html();
        date = $("#limiteDate_" + id_task_dash + "").html();
        console.log(task, date);
        dtfm = date.split("/");
        // dtft = dtfm.trim();
        frmt = dtfm[2].trim() + "-" + dtfm[1].trim() + "-" + dtfm[0].trim();
        console.log(dtfm[2].trim());

        $("#txtTask").val(task);
        $("#txtDate").val(frmt);
        $("#idTask").val(id_task_dash);
    });

    $(document).on("click", ".saveTask", function(event) {
        event.preventDefault();
        validarPendiente();

        id_task_dash = $("#idTask").val();
        task = $("#txtTask").val();
        date = $("#txtDate").val();
        console.log(task, date);

        dtfm = date.split("-");
        limit = dtfm[2] + "/" + dtfm[1] + "/" + dtfm[0];

        if (valTask == true) {
            $("#task_" + id_task_dash + "").html(task);
            $("#limiteDate_" + id_task_dash + "").html(limit);

            Toast.fire({
                icon: "success",
                title: "Pendiente actualizado correctamente",
            });

            $("#modalTask").modal("hide");
            $("#txtTask").val();
            $("#txtDate").val();
            $("#idTask").val();
        }
    });

    $(document).on("click", ".addTask", function(event) {
        event.preventDefault();
        validarPendiente();

        count = $("#taskCont").val();
        task = $("#txtTask").val();
        date = $("#txtDate").val();

        dtfm = date.split("-");
        limit = dtfm[2] + "/" + dtfm[1] + "/" + dtfm[0];

        if (valTask == true) {
            count++;

            const tr = $(
                '<tr class="shadow border-row align-td">' +
                '<td class="align-td"></td>' +
                '<td class="visible-td">0' +
                count +
                "</td>" +
                '<td class="align-td">' +
                '<a id="btnCheck_0' +
                count +
                '" class="btn btn-light btn-check btn-bf" data-id="0' +
                count +
                '">&nbsp;&nbsp;</a>' +
                "</td>" +
                '<td class="align-td">' +
                '<span id="task_0' +
                count +
                '" class="badget-task">Actualizar perfil </span>' +
                '<small id="limiteDate_0' +
                count +
                '" class="badge badge-info badge-task"> 23/07/2021 </small>' +
                '<small id="checkDate_0' +
                count +
                '" class="badge badge-success badge-task hide-button"></small>' +
                "</td>" +
                '<td class="align-td">' +
                '<a href="" type="button" class="editTask" data-id="0' +
                count +
                '"><i class="fas fa-edit"></i></a>' +
                '<a href="" type="button" class="trashCan" data-id="0' +
                count +
                '"><i class="far fa-trash-alt"></i></a>' +
                "</td>" +
                "</tr>",
            );
            table.row.add(tr[0]).draw(false);

            Toast.fire({
                icon: "success",
                title: "Pendiente agregado correctamente",
            });

            $("#modalTask").modal("hide");
            $("#txtTask").val();
            $("#txtDate").val();
            $("#idTask").val();
        }
    });
});