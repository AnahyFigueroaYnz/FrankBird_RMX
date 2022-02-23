// array de las row abierta
var openRows = new Array();
var table;
var tableProv;
var tableDestinosCot;
var tableTarifas;

// funcion para crear la tabla de los valores de la agencia
function tablaCollapseAgencias(d) {
    return (
        '<div class="row">' +
        '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">' +
        '<div class="row" style="padding: 0rem">' +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Honorarios</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detHon"></span></li>' +
        "</ul>" +
        "</div>" +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Revalidación</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detRev"></span></li>' +
        "</ul>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">' +
        '<div class="row" style="padding: 0rem">' +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Complementario</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detCom"></span></li>' +
        "</ul>" +
        "</div>" +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Previo</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detPre"></span></li>' +
        "</ul>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">' +
        '<div class="row" style="padding: 0rem">' +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Maniobra puerto</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detMan"></span></li>' +
        "</ul>" +
        "</div>" +
        '<div class="col-6" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="title-valAgen">Desconsolidación</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0.5rem 0rem 0.5rem;border: 0;"><span class="pre-valores" id="detDes"></span></li>' +
        "</ul>" +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="col-12 col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1" style="padding: 0rem">' +
        '<ul class="list-group text-center">' +
        '<li class="list-group-item" style="padding: 0.5rem 0rem 0rem 0rem;border: 0;"><span>&nbsp;</span></li>' +
        '<li class="list-group-item" style="padding: 0.5rem 0rem;border: 0;">' +
        '<span class="pre-valores" id="detBtn">' +
        '<a class="btnEdit" role="button" href="" style="font-size: 13px;">' +
        'Editar <i class="fas fa-pencil-alt btnEdit"></i>' +
        "</a>" +
        "</span>" +
        "</li>" +
        "</ul>" +
        "</div>" +
        "</div>"
    );
}
// funcion para crear la tabla de los valores del producto
function tablaCollapseProve(d) {
    return '<table id="tblProductosProv" class="table" style="margin-bottom: 0;">' + "<thead>" + "<tr>" + '<th colspan="2" class="only-tb">' + '<h5 class="h9">Producto</h9>' + "</th>" + "</tr>" + "</thead>" + "<tbody>" + "</tbody>" + "</table>";
}
// funcion para comprobar si ya existe una agencia en el calculo
function tablaAgen(tabla) {
    let filasAgen = $(tabla).find("tbody tr").length;
    console.log(filasAgen);
    if (filasAgen > 1) {
        return 1;
    } else {
        return 0;
    }
}
// funcion para cerrar la row que se encuentra en el array
function closeOpenedRows(table, selectedRow) {
    $.each(openRows, function (index, openRow) {
        // se busca en las rows no seleccionadas
        if ($.data(selectedRow) !== $.data(openRow)) {
            var rowToCollapse = table.row(openRow);
            rowToCollapse.child.hide();
            openRow.removeClass("shown");
            // quita del array la row antes abierta
            var index = $.inArray(selectedRow, openRows);
            openRows.splice(index, 1);
        }
    });
}
var tablas = {
    globales: function () {
        $(document).ready(function () {
            jQuery.noConflict();
            /* Tablas Clientes */
            /* Table de Mis Pedidos */
            table = $("#tblPedidos")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[6, "desc"]],
                    columnDefs: [
                        {
                            targets: [6],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: ["copy", "excel", "csv", "pdf", "print"],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblPedidos_filter input").attr("placeholder", "Buscar");

            /* Tabla de Productos*/
            table = $("#tblProductos")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [
                        [3, "desc"],
                        [4, "desc"],
                    ],
                    columnDefs: [
                        {
                            targets: [3],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [4],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: ["copy", "excel", "csv", "pdf", "print"],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProductos_filter input").attr("placeholder", "Buscar");

            /* Tabla de Proveedores*/
            table = $("#tblProveedoresC")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [
                        [4, "desc"],
                        [5, "desc"],
                    ],
                    columnDefs: [
                        {
                            targets: [3],
                            orderable: false,
                            className: "noVisible",
                        },
                        {
                            targets: [4],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [5],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProveedoresC_filter input").attr("placeholder", "Buscar");

            /* Tabla de Productos de Proveedores*/
            table = $("#tblProdProve")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProdProve_filter input").attr("placeholder", "Buscar");
            $("#tblProdProve_filter input").addClass("shadow");

            /* Tabla de Cotizaciones*/
            table = $("#tblCotizaciones")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [
                        [5, "desc"],
                        [6, "desc"],
                    ],
                    columnDefs: [
                        {
                            targets: [5],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [6],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblCotizaciones_filter input").attr("placeholder", "Buscar");

            /* Tablas globales del Dashboard */
            /* Tabla de Pendientes */

            /* Tabla de los proyectos aun en el estatus Sourcing */
            table = $("#tblSourcings")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ml-auto"f>>rtp',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblSourcings_filter input").attr("placeholder", "Buscar");

            /* Tabla de los proyectos de los agentes */
            table = $("#tblProy_Agente")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[6, "desc"]],
                    columnDefs: [
                        {
                            targets: [6],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();

            /* Tablas Administradores y Asesores */
            /* Tabla de mis proyectos */
            /* 
            /* Tablas Administradores y Asesores */
            /* Tabla de mis proyectos */
            /* "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", */
            /* "<'row'<'col-sm-12 col-md-7'B><'col-sm-12 col-md-5'f>>" + "<rt>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>", */
            /* Bfrtilp */
            table = $("#tblMisProyectos").DataTable({
                    dom: '<"row"<"col-sm-12 col-md-7 text-center"B><"col-sm-12 col-md-5 ml-auto"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7 ml-auto"p>>',
                    responsive: true,
                    autoWidth: true,
                    processing: true,
                    pageLength: 3,
                    order: [[0, "desc"]],
                    columnDefs: [
                        {
                            targets: [0],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [6],
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblMisProyectos_filter input").attr("placeholder", "Buscar");

            /* Tabla todos los proyectos vista Admin */
            table = $("#tblTodosProy").DataTable({
                dom: '<"row"<"col-sm-12 col-md-4 text-center"B><"col-sm-12 col-md-4 ml-auto"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 ml-auto"p>>',
                responsive: {
                        details: {
                            targets: [0],
                            type: "column",
                            orderable: false,
                        },
                },
                processing: true,
                autoWidth: true,
                pageLength: 3,
                order: [[1, "desc"]],
                columnDefs: [
                        {
                            targets: [0],
                            orderable: false,
                            className: "control",
                        },
                        {
                            targets: [1],
                            visible: false,
                            orderable: false,
                            className: "noVisible",
                        },
                        {
                            targets: [10],
                            orderable: false,
                        },
                ],
                lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                ],
                buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                            // aiExclude: [ 0, 1 ]
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 2, 3, 4, 5, 6, 7, 8],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 2, 3, 4, 5, 6, 7, 8],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 2, 3, 4, 5, 6, 7, 8],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 2, 3, 4, 5, 6, 7, 8],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 2, 3, 4, 5, 6, 7, 8],
                                    },
                                },
                            ],
                        },
                ],
                language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                },
            }).columns.adjust();
            $("#tblTodosProy_filter input").attr("placeholder", "Buscar");

            /* Tabla asesores de la vista Admin */
            table = $("#tblAsesores")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[5, "asc"]],
                    columnDefs: [
                        {
                            targets: [4],
                            orderable: false,
                        },
                        {
                            targets: [5],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "Buscar:",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblAsesores_filter input").attr("placeholder", "Buscar");

            /* Tabla de proyectos concluidos vista Admin */
            table = $("#tblProyConclAdmin")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[8, "desc"]],
                    columnDefs: [
                        {
                            targets: [8],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProyConclAdmin_filter input").attr("placeholder", "Buscar");

            /* Tabla de proyectos eliminados vista Admin */
            table = $("#tblProyectoEliminado")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[8, "desc"]],
                    columnDefs: [
                        {
                            targets: [8],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProyectoEliminado_filter input").attr("placeholder", "Buscar");

            /* Tabla de clientes de la vista Admin */
            table = $("#tblClientes")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[3, "asc"]],
                    columnDefs: [
                        {
                            targets: [3],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblClientes_filter input").attr("placeholder", "Buscar");

            /* Tabla de los proyectos correspondientes al cliente */
            table = $("#tblProyCleinte")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProyCleinte_filter input").attr("placeholder", "Buscar");
            $("#tblProyCleinte_filter input").addClass("shadow");

            /* tabla de las agencias aduanales */
            table = $("#tblAgenciasAduanales")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[5, "asc"]],
                    columnDefs: [
                        {
                            targets: "levelAdmin",
                            orderable: false,
                            className: "noVisible",
                        },
                        {
                            targets: "levelAsesor",
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [5],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblAgenciasAduanales_filter input").attr("placeholder", "Buscar");
            $("#tblAgenciasAduanales_filter input").addClass("shadow");

            /* tabla de los puertos de la agencia */
            table = $("#tblPuertosAg")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    columnDefs: [
                        {
                            targets: 2,
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblPuertosAg_filter input").attr("placeholder", "Buscar");
            $("#tblPuertosAg_filter input").addClass("shadow");

            /* tabla de los asesores correspondientes de la agencia */
            table = $("#tblAgentes")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblAgentes_filter input").attr("placeholder", "Buscar");
            $("#tblAgentes_filter input").addClass("shadow");

            /* tabla de los proveedores */
            table = $("#tblProveedores")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [[5, "asc"]],
                    columnDefs: [
                        {
                            targets: "levelAdmin",
                            orderable: false,
                            className: "noVisible",
                        },
                        {
                            targets: "levelAsesor",
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [5],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProveedores_filter input").attr("placeholder", "Buscar");

            /* tabla de los productos correspondientes del proveedor */
            table = $("#tblProductosProv")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    columnDefs: [
                        {
                            targets: 2,
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblProductosProv_filter input").attr("placeholder", "Buscar");
            $("#tblProductosProv_filter input").addClass("shadow");

            /* tabla de los productos globales */
            table = $("#tblSearchProd")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    order: [
                        [3, "asc"],
                        [4, "asc"],
                    ],
                    columnDefs: [
                        {
                            targets: [3],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                        {
                            targets: [4],
                            orderable: false,
                            visible: false,
                            className: "noVisible",
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "colvis",
                            text: '<i class="far fa-eye-slash"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons show-column",
                            columns: ":not(.noVisible)",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0, 1],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0, 1],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0, 1],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0, 1],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0, 1],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblSearchProd_filter input").attr("placeholder", "Buscar");

            /* Tabla de agencia aduanales en cotizacion */
            var tableAgen = $("#tblNombreAgencias")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-4 text-center"B>' + '<"col-12 col-xs-12 col-sm-12 col-md-5 col-lg-3 col-xl-4 ml-auto"f>>rt' + '<"row"<"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center"i>' + '<"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 ml-auto"p>>',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tblNombreAgencias_filter input").attr("placeholder", "Buscar");
            $("#tblNombreAgencias_paginate").css("font-size", "14px");
            $("#tblNombreAgencias_info").css("font-size", "14px");
            $("#tblNombreAgencias_info").css("padding", "0.5rem 0rem");
            // evento para abrir y cerrar las rows de detalles
            $("#tblNombreAgencias tbody").on("click", "td.details-agencias", function () {
                // obtener la fila mas cercana
                var tr = $(this).closest("tr");
                // asignar la fila de la tabla a una variable
                var row = tableAgen.row(tr);
                // comprobar si el fila esta abierta
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableAgen, tr);
                    // abrir esta row
                    row.child(tablaCollapseAgencias(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
            });
            // al cerrar el modal de las agencias o cancelar el formulario, limpiar el formulario
            $(document).on("click", ".closeAgencias", function (event) {
                event.preventDefault();
                var tr = $(".nameAgenciaRow");
                var row = tableAgen.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableAgen, tr);
                    // abrir esta row
                    row.child(tablaCollapseAgencias(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                $(".nameAgenciaRow").removeClass("shown");
            });
            // al agregar la agencia restaurar las filas
            $(document).on("click", ".btnAddAgencias", function (event) {
                event.preventDefault();
                var tr = $(".nameAgenciaRow");
                var row = tableAgen.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableAgen, tr);
                    // abrir esta row
                    row.child(tablaCollapseAgencias(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                $(".nameAgenciaRow").removeClass("shown");
            });
            // al cerrar o cancelar el formulario de la agencia restaurar las filas
            $(document).on("click", ".closeEditAg", function (event) {
                event.preventDefault();
                var tr = $(".nameAgenciaRow");
                var row = tableAgen.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableAgen, tr);
                    // abrir esta row
                    row.child(tablaCollapseAgencias(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                $(".nameAgenciaRow").removeClass("shown");
            });
            // al cambiar o editar la agencia agregada al calculo restaurar las filas
            $(document).on("click", ".btnEditar", function (event) {
                event.preventDefault();
                var tr = $(".nameAgenciaRow");
                var row = tableAgen.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableAgen, tr);
                    // abrir esta row
                    row.child(tablaCollapseAgencias(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                $(".nameAgenciaRow").removeClass("shown");
            });

            /* Tabla de proveedores en cotizacion */
            tableProv = $("#tblProvedores")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-4 text-center"B>' + '<"col-12 col-xs-12 col-sm-12 col-md-5 col-lg-3 col-xl-4 ml-auto"f>>rt' + '<"row"<"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center"i>' + '<"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 ml-auto"p>>',
                    // dom: '<"row"<"col-5 col-lg-6 col-md-6 col-sm-12"B><"col-7 col-lg-6 col-md-6 col-sm-12"f>>rti<"col-12 col-lg-12 col-md-6 col-sm-12"p>',
                    responsive: true,
                    autoWidth: true,
                    lengthMenu: [
                        [3, 5, 10, 25, 50, -1],
                        ["3", "5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag",
                        },
                        {
                            extend: "collection",
                            text: '<i class="fas fa-download"></i>',
                            className: "btn btn-outline-primary btn-sm border-buttons expor-table",
                            buttons: [
                                {
                                    extend: "copy",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "excel",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "csv",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "pdf",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                                {
                                    extend: "print",
                                    exportOptions: {
                                        columns: [0],
                                    },
                                },
                            ],
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                    // Processing indicator
                    processing: true,
                    // DataTables server-side processing mode
                    serverSide: false,
                    // Initial no order.
                    ajax: {
                        url: "../get_proveedores_tabla",
                        dataSrc: "",
                        method: "POST",
                    },
                    columns: [{ data: "proveedor" }],
                    createdRow: function (row, data, index) {
                        if (data != false) {
                            $(row).addClass("shadow border-row nameProv");
                            $("td", row).addClass("details-control btnDetailsProv");
                            $("td", row).attr("data-id", data.id_proveedor);
                            $("td", row).attr("style", "vertical-align: middle");
                            $("td", row).attr("role", "button");
                            $("td", row).attr("href", "colProve" + data.id_proveedor);
                        }
                    },
                })
                .columns.adjust();
            $("#tblProvedores_filter input").attr("placeholder", "Buscar");
            $("#tblProvedores_paginate").css("font-size", "14px");
            $("#tblProvedores_info").css("font-size", "14px");
            $("#tblProvedores_info").css("padding", "0.5rem 0rem");
            // evento para abrir y cerrar las rows de detalles
            $("#tblProvedores tbody").on("click", "td.details-control", function () {
                var tr = $(this).closest("tr");
                var row = tableProv.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableProv, tr);
                    // abrir esta row
                    row.child(tablaCollapseProve(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
            });
            // al cerrar o cancelar el fromulario del proveedor restaurar las filas
            $(document).on("click", ".closeProve", function (event) {
                event.preventDefault();
                var tr = $(".nameProv");
                var row = tableProv.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableProv, tr);
                    // abrir esta row
                    row.child(tablaCollapseProve(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                // limpiar el formulario
                $(".nameProv").removeClass("shown");
                $(".txtPrecio").val();
                $(".txtCantidad").val();
                $(".txtTotal").val();
                $(".txtExpe").val("");
                $(".slUnidad").val("0");
            });
            // al agregar un producto restaurar las filas
            $(document).on("click", ".btnAddProducto", function (event) {
                event.preventDefault();
                var tr = $(".nameProv");
                var row = tableProv.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableProv, tr);
                    // abrir esta row
                    row.child(tablaCollapseProve(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                $(".nameProv").removeClass("shown");
            });
            // al cerrar o cancelar el fromulario del producto restaurar las filas
            $(document).on("click", ".closeProd", function (event) {
                event.preventDefault();
                var tr = $(".nameProv");
                var row = tableProv.row(tr);
                if (row.child.isShown()) {
                    // si esta row esta abierta, entonces cerrarla
                    row.child.hide();
                    tr.removeClass("shown");
                } else {
                    // entrar a la funcion para comprobar si esta una row abierta cerrarla y abrir la seleccionada
                    closeOpenedRows(tableProv, tr);
                    // abrir esta row
                    row.child(tablaCollapseProve(row.data())).show();
                    tr.addClass("shown");
                    // agregar la row seleccionada al array
                    openRows.push(tr);
                }
                row.child.hide();
                // limpiar todo el formulario
                $(".nameProv").removeClass("shown");
                $(".txtPrecio").val();
                $(".txtCantidad").val();
                $(".txtTotal").val();
                $(".txtExpe").val("");
                $(".slUnidad").val("0");
                jQuery(function ($) {
                    $("#modalProveedores").modal("show");
                    $("#modalProducto").modal("hide");
                });
            });

            /* tabla de los destinos del cotizador de home */
            tableDestinosCot = $("#tbl_destinosCotizador")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    columnDefs: [
                        {
                            targets: 2,
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "get_destinosAjax",
                        dataSrc: "",
                        method: "post",
                    },
                    columns: [
                        {
                            data: "destino",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.destino + "</span></td>";
                            },
                        },
                        {
                            data: "tipo",
                            render: function (data, type, row) {
                                if (row.tipo == 1) {
                                    return '<td class="align-td"><span class="td-text">Origen</span></td>';
                                } else if (row.tipo == 2) {
                                    return '<td class="align-td"><span class="td-text">Destino</span></td>';
                                } else if (row.tipo == 3) {
                                    return '<td class="align-td"><span class="td-text">Origen y Destino</span></td>';
                                }
                            },
                        },
                        {
                            data: "id_destino",
                            render: function (data, type, row) {
                                return '<td class="align-td"><a type="button" href="" data-id="' + row.id_destino + '" class="eliminar_destino" style="color: #dc3545;"><i class="far fa-trash-alt" data-id="' + row.id_destino + '" title="Eliminar destino"></i></a></td>';
                            },
                        },
                    ],
                    createdRow: function (row, data, index) {
                        if (data != false) {
                            $(row).addClass("shadow border-row");
                            $(row).attr("data-id", data["id_destino"]);
                            $("td", row).attr("data-id", data["id_destino"]);
                        }
                    },
                })
                .columns.adjust();
            $("#tbl_destinosCotizador_filter input").attr("placeholder", "Buscar");
            $("#tbl_destinosCotizador_filter input").attr("id", "inptBuscar");
            $("#tbl_destinosCotizador_filter input").addClass("shadow");

            /* tabla de las tarifas del cotizador de home */
            tableTarifas = $("#tblTarifas")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    columnDefs: [
                        {
                            targets: 8,
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: "get_tarifasAjax",
                        dataSrc: "",
                        method: "post",
                    },
                    columns: [
                        {
                            data: "origen",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.origen + "</span></td>";
                            },
                        },
                        {
                            data: "destino",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.destino + "</span></td>";
                            },
                        },
                        {
                            data: "tipo",
                            render: function (data, type, row) {
                                if (row.tipo == 1) {
                                    var tipo = "Aer";
                                } else {
                                    var tipo = "Mar";
                                }
                                return '<td class="align-td"><span class="td-text">' + tipo + "</span></td>";
                            },
                        },
                        {
                            data: "movimiento",
                            render: function (data, type, row) {
                                if (row.movimiento == 1) {
                                    var movimiento = "Import";
                                } else {
                                    var movimiento = "Export";
                                }
                                return '<td class="align-td"><span class="td-text">' + movimiento + "</span></td>";
                            },
                        },
                        {
                            data: "tarifa_aerea",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.tarifa_aerea + "</span></td>";
                            },
                        },
                        {
                            data: "lcl_cbm",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.lcl_cbm + "</span></td>";
                            },
                        },
                        {
                            data: "ft20",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.ft20 + "</span></td>";
                            },
                        },
                        {
                            data: "ft40",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.ft40 + "</span></td>";
                            },
                        },
                        {
                            data: "hq40",
                            render: function (data, type, row) {
                                return '<td class="align-td"><span class="td-text">' + row.hq40 + "</span></td>";
                            },
                        },
                        {
                            data: "id_catalogo",
                            render: function (data, type, row) {
                                return '<td class="align-td"><a type="button" href="" data-id="' + row.id_catalogo + '" class="eliminar_tarifa" style="color: #dc3545;"><i class="far fa-trash-alt" data-id="' + row.id_destino + '" title="Eliminar destino"></i></a></td>';
                            },
                        },
                    ],
                    createdRow: function (row, data, index) {
                        if (data != false) {
                            $(row).addClass("shadow border-row");
                            $(row).attr("data-id", data["id_catalogo"]);
                            $("td", row).attr("data-id", data["id_catalogo"]);
                        }
                    },
                })
                .columns.adjust();
            $("#tbl_tarifasCot_filter input").attr("placeholder", "Buscar");
            $("#tbl_tarifasCot_filter input").addClass("shadow");

            /* tabla de los destinos del cotizador de home */
            table = $("#tbl_Cotizador")
                .DataTable({
                    dom: '<"row"<"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center"B><"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ml-auto"f>>rtip',
                    responsive: true,
                    autoWidth: true,
                    pageLength: 5,
                    columnDefs: [
                        {
                            targets: 7,
                            orderable: false,
                        },
                    ],
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        ["5", "10", "25", "50", "Todo"],
                    ],
                    buttons: [
                        {
                            extend: "pageLength",
                            className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
                        },
                    ],
                    language: {
                        sProcessing: "Procesando...",
                        sLengthMenu: "Mostrar _MENU_ registros",
                        spageLength: "Mostrar _MENU_ registros",
                        sZeroRecords: "No se encontraron resultados",
                        sEmptyTable: "Ningún dato disponible en esta tabla =(",
                        sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
                        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                        sInfoPostFix: "",
                        sSearch: "",
                        sUrl: "",
                        sInfoThousands: ",",
                        sLoadingRecords: "Cargando...",
                        oPaginate: {
                            sFirst: "Primero",
                            sLast: "Último",
                            sNext: "Siguiente",
                            sPrevious: "Anterior",
                        },
                        oAria: {
                            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Columnas",
                            print: "Imprimir",
                            pageLength: {
                                _: "Mostrar  %d ",
                                "-1": "Todo",
                            },
                        },
                    },
                })
                .columns.adjust();
            $("#tbl_listaCotizador_filter input").attr("placeholder", "Buscar");
            $("#tbl_listaCotizador_filter input").addClass("shadow");

            /* configuraciones globales de las tablas */
            $("a.toggle-vis").on("click", function (e) {
                e.preventDefault();
                var column = table.column($(this).attr("data-column"));
                column.visible(!column.visible());
            });
            /* configuracion de proveedores cotizacion */
            $("a.toggle-vis").on("click", function (e) {
                e.preventDefault();
                var column = tableProv.column($(this).attr("data-column"));
                column.visible(!column.visible());
            });

            /* configuracion de agencias cotizacion */
            $("div.dt-buttons").addClass("buttons_filter");
            $("a.toggle-vis").on("click", function (e) {
                e.preventDefault();
                var column = tableAgen.column($(this).attr("data-column"));
                column.visible(!column.visible());
            });

            /* configuracion de tabla destinos cotizador */
            $("a.toggle-vis").on("click", function (e) {
                e.preventDefault();
                var column = tableDestinosCot.column($(this).attr("data-column"));
                column.visible(!column.visible());
            });

            /* configuracion de tabla destinos cotizador */

            /* configuracion de tabla tarifas del cotizador */
            $("a.toggle-vis").on("click", function (e) {
                e.preventDefault();
                var column = tableTarifas.column($(this).attr("data-column"));
                column.visible(!column.visible());
            });
        });
    },
};
jQuery(document).ready(function () {
    tablas.globales(this);
});
