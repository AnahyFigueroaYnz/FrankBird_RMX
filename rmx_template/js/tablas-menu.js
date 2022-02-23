var table;
$(document).ready(function () {
    jQuery.noConflict();

    table = $("#tblTodosProy")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
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
                sEmptyTable: "Ningún proyecto disponible en esta seccion",
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
    $("#tblTodosProy_filter_filter input").attr("placeholder", "Buscar");

    $("#tblTodosProy").on("click", "a.trashCan", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este proyecto?",
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
                        title: "Proyecto eliminado correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    table = $("#tblProyElimiados")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 8, 9],
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
                sEmptyTable: "Ningún proyecto disponible en esta seccion",
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
    $("#tblProyElimiados_filter input").attr("placeholder", "Buscar");

    table = $("#tblAsesores")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
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
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
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
                sEmptyTable: "Ningún asesor disponible al momento",
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
    $("#tblAsesores_filter input").attr("placeholder", "Buscar");

    table = $("#tblClientes")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
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
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3],
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
                sEmptyTable: "Ningún cliente disponible al momento",
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

    table = $("#tblProveedores")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
                },
                {
                    targets: [5],
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
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
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
                sEmptyTable: "Ningún proveedor disponible al momento",
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

    $("#tblProveedores").on("click", "a.eliminar_proveedor", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar este proveedor?",
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
                        title: "Proveedor y productos eliminados correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    table = $("#tblSearchProd")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
            order: [[2, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
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
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3],
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
                sEmptyTable: "Ningún producto disponible al momento",
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

    table = $("#tblAgentesCg")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
                    targets: [5],
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
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
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
                sEmptyTable: "Ningún agente disponible al momento",
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
    $("#tblAgentesCg_filter input").attr("placeholder", "Buscar");
    $("#tblAgentesCg").on("click", "a.eliminar_agente", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar esté agente?",
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
                        title: "Agente y tarifas eliminados correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    table = $("#tblAgenciasAd")
        .DataTable({
            dom: '<"row"<"col-sm-12 col-md-4 text-center align-self-center"B><"col-sm-12 col-md-4 ml-auto align-self-center"f>><"row"<"col-sm-12"tr>><"row mt-3"<"col-sm-12 col-md-6 align-self-center"i><"col-sm-12 col-md-6 ml-auto align-self-center"p>>',
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
            order: [[1, "asc"]],
            columnDefs: [
                {
                    targets: [0],
                    orderable: false,
                    className: "control",
                },
                {
                    targets: [5],
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
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "excel",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "csv",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "pdf",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
                            },
                        },
                        {
                            extend: "print",
                            exportOptions: {
                                columns: [1, 2, 3, 4],
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
                sEmptyTable: "Ningúna agencia disponible al momento",
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
    $("#tblAgenciasAd_filter input").attr("placeholder", "Buscar");
    $("#tblAgenciasAd").on("click", "a.eliminar_agencia", function (e) {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "¿Seguro que deseas eliminar esta agencia?",
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
                        title: "Agencia, agentes y puestos eliminados correctamente",
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.DismissReason.cancel;
                }
            });
    });

    $("a.toggle-vis").on("click", function (e) {
        e.preventDefault();
        var column = table.column($(this).attr("data-column"));
        column.visible(!column.visible());
    });
});
