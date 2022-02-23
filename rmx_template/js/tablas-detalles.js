var table;
$(document).ready(function() {
    jQuery.noConflict();


    // table = $("#tblAgentes")
    //     .DataTable({
    //         dom: '<tr><"mt-3 ml-auto"p>',
    //         responsive: {
    //             details: {
    //                 targets: [0],
    //                 type: "column",
    //                 orderable: false,
    //             },
    //         },
    //         autoWidth: true,
    //         pageLength: 5,
    //         order: [
    //             [1, "asc"]
    //         ],
    //         columnDefs: [{
    //                 targets: "_all",
    //                 orderable: false,
    //                 className: "align-td",
    //             },
    //             {
    //                 targets: [1],
    //                 className: "visible-td",
    //             },
    //             {
    //                 targets: [0],
    //                 orderable: false,
    //                 className: "control",
    //             },
    //             {
    //                 targets: [1],
    //                 visible: false,
    //                 orderable: false,
    //                 className: "noVisible",
    //             },
    //             {
    //                 targets: [2, 4],
    //                 orderable: false,
    //             },
    //         ],
    //         lengthMenu: [
    //             [3, 5, 10, 25, 50, -1],
    //             ["3", "5", "10", "25", "50", "Todo"],
    //         ],
    //         buttons: [{
    //             extend: "pageLength",
    //             className: "btn btn-outline-primary btn-sm border-buttons num-pag-only",
    //         }, ],
    //         language: {
    //             sProcessing: "Procesando...",
    //             sLengthMenu: "Mostrar _MENU_ registros",
    //             spageLength: "Mostrar _MENU_ registros",
    //             sZeroRecords: "No se encontraron resultados",
    //             sEmptyTable: "Ningún pendiente disponible",
    //             sInfo: "Registros del _START_ al _END_ de _TOTAL_ registros",
    //             sInfoEmpty: "Registros del 0 al 0 de un total de 0 registros",
    //             sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    //             sInfoPostFix: "",
    //             sSearch: "",
    //             sUrl: "",
    //             sInfoDecimals: ".",
    //             sInfoThousands: ",",
    //             sLoadingRecords: "Cargando...",
    //             oPaginate: {
    //                 sFirst: "Primero",
    //                 sLast: "Último",
    //                 sNext: "Siguiente",
    //                 sPrevious: "Anterior",
    //             },
    //             oAria: {
    //                 sSortAscending: ": Activar orden ascendente",
    //                 sSortDescending: ": Activar orden descendente",
    //             },
    //             buttons: {
    //                 copy: "Copiar",
    //                 colvis: "Columnas",
    //                 print: "Imprimir",
    //                 pageLength: {
    //                     _: "Mostrar  %d",
    //                     "-1": "Todo",
    //                 },
    //             },
    //         },
    //     })
    //     .columns.adjust();
    // $("#tblAgentes_filter input").attr("placeholder", "Buscar");

    // $("#tblAgentes").on("click", "a.trashCan", function(e) {
    //     e.preventDefault();

    //     swalWithBootstrapButtons
    //         .fire({
    //             title: "¿Seguro que deseas eliminar este pendiente?",
    //             text: "¡No podrás revertir esto!",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonText: "Si",
    //             cancelButtonText: "Cancelar.",
    //             reverseButtons: false,
    //         })
    //         .then((result) => {
    //             if (result.isConfirmed) {
    //                 table.row($(this).parents("tr")).remove().draw();
    //                 Toast.fire({
    //                     icon: "success",
    //                     title: "Pendiente eliminado correctamente",
    //                 });
    //             } else if (result.dismiss === Swal.DismissReason.cancel) {
    //                 Swal.DismissReason.cancel;
    //             }
    //         });
    // });

    $("a.toggle-vis").on("click", function(e) {
        e.preventDefault();
        var column = table.column($(this).attr("data-column"));
        column.visible(!column.visible());
    });
});

// tblPuertosAg
// tblAgentes